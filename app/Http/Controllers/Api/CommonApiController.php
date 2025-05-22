<?php

namespace App\Http\Controllers\Api;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategories;

class CommonApiController extends Controller
{
    public function products($sorting, $min, $max, $category)
    {
        $data = null;
        // sending "null" from ajax request
        if ($category == "null") {
            if ($sorting != "priceLowToHigh") {
                $data = Products::with('getCategory')->where('status', 1)->orderBy('price', 'desc')->whereBetween('price', [$min, $max])->get();
            } else if ($sorting != "priceHighToLow") {
                $data = Products::with('getCategory')->where('status', 1)->orderBy('price', 'asc')->whereBetween('price', [$min, $max])->get();

            } else {
                $data = Products::with('getCategory')->where('status', 1)->latest()->whereBetween('price', [$min, $max])->get();
            }
        } else {
            $category = ProductCategories::where('categoryName', $category)->first();
            if ($sorting != "priceLowToHigh") {
                $data = Products::with('getCategory')->where(['status' => 1, 'product_cat' => $category->id])->orderBy('price', 'desc')->whereBetween('price', [$min, $max])->get();
            } else if ($sorting != "priceHighToLow") {
                $data = Products::with('getCategory')->where(['status' => 1, 'product_cat' => $category->id])->orderBy('price', 'asc')->whereBetween('price', [$min, $max])->get();

            } else {
                $data = Products::with('getCategory')->where(['status' => 1, 'product_cat' => $category->id])->latest()->whereBetween('price', [$min, $max])->get();
            }
        }
        return response()->json([
            'status' => 1,
            'data' => $data
        ], 200);
    }
}