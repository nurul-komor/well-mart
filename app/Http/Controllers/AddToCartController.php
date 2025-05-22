<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function add(Request $request)
    {

        validator($request->all(), [
            'quantity' => "max:5|min:1|integer"
        ], )->validate();
        $product = Products::where('product_code', $request->product_code)->first();
        if ($product == null) {
            abort(400);
        }

        $cart = session()->get('cart');
        if ($cart == null) {
            $cart = [];
        }
        $newValues = [
            'code' => $request->product_code,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'option' => $request->option,
            'name' => $product->productName,
            'image' => $product->productImage
        ];

        if (array_key_exists($request->product_code, $cart)) {

            if ($cart[$product->product_code]['quantity'] + $request->quantity < 6) {
                $cart[$request->product_code]['quantity'] += $request->quantity;

            } else {
                session()->flash("error", "max items  reached");
                return redirect()->back();
            }

        } else {
            $cart[$request->product_code] = $newValues;

        }

        session()->put('cart', $cart);
        session()->flash('success', 'added');
        return back();
    }
}