<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect() {
        $userType = Auth::user() -> user_type;

        if ($userType == '1') {
            return view('admin.home');
        } else {
            $data = Product::paginate(6); //get all product data from db
            return view('user.home', compact('data'));
        }
    }

    public function index() {
        /**
         * Quick explanation:
         * we are starting form index method.
         * after going through login/registration -> we are calling redirect method
         * that's why we need to redirect the route here
         *
         * Auth::id() means : check if someone logged in or not
         */
        if (Auth::id()) {
            return redirect('redirect');
        } else {
            $data = Product::paginate(6); //get all product data from db
            return view('user.home', compact('data'));
        }
    }

    public function searchProduct(Request $request) {
        $search = $request->search;

        if ($search == '') {
            $data = Product::paginate(6);
            return view('user.home', compact('data'));
        }

        $data = Product::where('title', 'Like', '%'.$search.'%')->get();

        return view('user.home', compact('data'));
    }

    public function addToCart(Request $request, $id) {
        if (Auth::id()) {
            $user = auth()->user();
            $product = Product::find($id);
            $cart = new Cart();

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Product added to cart');
        } else {
            return redirect('login');
        }
    }
}
