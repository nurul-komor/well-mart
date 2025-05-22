<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Notifications\ProductApprovedCancelled;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('getCategory')->latest()->get();
        $title = "Products";
        $pageTitle = " Products";
        $data = compact('products', 'title', 'pageTitle');
        return view('admin.products.index')->with($data);
    }
    public function changeStatus(Request $request)
    {
        $product = Products::where('product_code', $request->productCode)->first();

        if ($product == null) {
            abort(404);
        } else {
            $seller = Seller::where('sellerCode', $product->sellerId)->first();
            if ($request->status == 1) {
                $product->status = 1;
                $message = "Product published successfully";
                $seller->notify(new ProductApprovedCancelled($product));


            } else {
                $product->status = 0;
                $message = "Product hidden successfully";
            }
            $product->save();
            session()->flash('success', $message);
        }
        return redirect()->route('admin.products.index');
    }
}