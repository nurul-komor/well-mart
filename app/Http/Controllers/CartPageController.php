<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function index()
    {
        return view('common.cart');
    }
    public function removeItemFromCart($code)
    {
        $data = session('cart');
        if (isset($data[$code])) {
            unset($data[$code]);
            session(['cart' => $data]);
        }
        return redirect()->back();
    }

    public function getProductsFromCart(Request $request)
    {
        $cart = session('cart');
        $products = [];
        if ($cart == '' || $cart == null) {
            return response()->json([
                'total' => 0
            ]);
        } else {
            foreach ($cart as $item) {
                $product = Products::where('product_code', $item['code'])->first();
                $price = $product->discount != null || $product->discount > 0 ? $product->price * (100 - $product->discount) / 100 : $product->price;
                $products[] = [
                    'name' => $product->productName,
                    'image' => $product->productImage,
                    'price' => $price,
                    'quantity' => $item['quantity'],
                    'option' => $item['option'],
                    'code' => $item['code'],
                ];
            }
            return response()->json([
                'total' => count($products),
                'products' => $products
            ]);
        }

    }
    public function cartItemIncrement($code)
    {
        $cart = session('cart');
        if (isset($cart)) {
            $product = $cart[$code];

            if ($product['quantity'] < 5) {
                $cart[$code]['quantity'] = $product['quantity'] + 1;
                session()->put('cart', $cart);
            }
            return 1;
        }
    }
    public function cartItemDecrement($code)
    {
        $cart = session('cart');
        if (isset($cart)) {
            $product = $cart[$code];

            if ($product['quantity'] > 1) {
                $cart[$code]['quantity'] = $product['quantity'] - 1;
                session()->put('cart', $cart);
            }
            return 1;
        }
    }
}