<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class OrderPlaceController extends Controller
{
    public function index(Request $request)
    {
        // validator($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'country' => 'required',
        //     'address' => 'required',
        //     'payment' => 'required'
        // ])->validate();

        // $cart = session('cart');
        // $products = [];
        // if ($cart == '' || $cart == null) {
        //     session()->flash('error', 'cart-empty');
        //     return redirect()->back();
        // } else {
        //     foreach ($cart as $item) {
        //         $product = Products::where('product_code', $item['code'])->first();
        //         $price = $product->discount != null || $product->discount > 0 ? $product->price * (100 - $product->discount) / 100 : $product->price;
        //         $products[] = [
        //             'name' => $product->productName,
        //             'image' => $product->productImage,
        //             'price' => $price + 50,
        //             'quantity' => $item['quantity'],
        //             'option' => $item['option'],
        //             'code' => $item['code'],
        //             'sellerId' => $product->sellerId,
        //         ];
        //     }
        //     return redirect('/pay')->with(['products' => $products]);
        // }
    }
}