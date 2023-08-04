<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function products() {
        return view('admin.products');
    }

    public function uploadProduct(Request $request) {
        $data = new Product();

        /**
         * (1) get the file [image] from form request
         * (2) form a unique name to rename the file (with file extension)
         */
        $image = $request->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();

        /**
         * (1) moving the file [image] to 'product_image' directory within the project
         * (2) assign the file name to the 'image' property of the 'data' object [Product type] and will be sent to db later on
         *
         * so that we can use the unique name [from db] as a reference to access the actual image file in the 'product_image' directory
         */
        $request->file->move('product_image', $imageName);
        $data->image = $imageName;

        /**
         * $request->description
         * it is coming from name property of the form
         */
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;

        $data->save();  //this line saves the object to the database [inserts a new record]
        return redirect()->back()->with('message', 'Product added successfully');
    }
}
