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
         * this code is for processing the image file
         */
        $image = $request->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('product_image', $imageName);
        $data->image = $imageName;

        /**
         * $request->description
         * it is coming from name property of the form
         */
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desription;
        $data->quantity = $request->quantity;

        $data->save();
        return redirect()->back();
    }
}
