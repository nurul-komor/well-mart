<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;
use App\Jobs\DatabaseNotificationJobAboutProduct;

class SellerProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellerId = auth()->guard('seller')->user()->sellerCode;
        $products = Products::where('sellerId', $sellerId)->with('getCategory')->latest()->get();
        return view('seller.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategories::where('status', 1)->get();
        return view('seller.products.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productCode = Str::uuid();


        $request->validate([
            'productName' => ['required', 'string', 'max:100', 'min:3'],
            'category' => ['required'],
            'productPrice' => ['required'],
            'description' => ['required'],
            'profile' => 'required|file|mimes:jpeg,png,gif,jpg',
            'profile2' => 'file|mimes:jpeg,png,gif,jgp',
            'quantity' => ['required'],
            // 'vrImage' => ['mimes:gltf']

        ]);

        $destination1 = null;
        $destination2 = null;
        $destination3 = null;
        $fileName1 = null;
        $fileName2 = null;
        $fileName3 = null;
        if ($request->file('profile') != "") {
            $fileName1 = str_replace(" ", "_", $request->file('profile')->getClientOriginalName());
            $destination1 = "uploads/products/";
            $request->file('profile')->move(public_path($destination1), $fileName1);

        }
        if ($request->file('profile2') != "") {
            $fileName2 = str_replace(" ", "_", $request->file('profile2')->getClientOriginalName());
            $destination2 = "uploads/products/";
            $request->file('profile2')->move(public_path($destination2), $fileName2);

        }
        if ($request->file('vrImage') != "") {
            $fileName3 = time() . uniqid() . '.' . $request->file('vrImage')->getClientOriginalExtension();
            $destination3 = "uploads/vr/";
            $request->file('vrImage')->move(public_path($destination3), $fileName3);

        }

        $product = Products::insert([
            'sellerId' => auth()->guard('seller')->user()->sellerCode,
            'productName' => $request->productName,
            'productImage' => $destination1 . $fileName1,
            'productImage2' => $destination2 . $fileName2,
            'vr_image' => $destination3 . $fileName3,
            'description' => nl2br($request->description),
            'price' => $request->productPrice,
            'options' => json_encode($request->options),
            'colors' => json_encode($request->colors),
            'product_cat' => $request->category,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'brands' => $request->brand,
            'product_code' => $productCode,
            'created_at' => Carbon::now(),
        ]);

        if ($product != null) {
            DatabaseNotificationJobAboutProduct::dispatch();
        }


        session()->flash('success', 'Product stored');
        return redirect()->route('seller.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::where('id', $id)->with('getCategory')->first();
        $categories = ProductCategories::where('status', 1)->get();
        return view('seller.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'productName' => ['required', 'string', 'max:100', 'min:3'],
            'category' => ['required'],
            'productPrice' => ['required'],
            'description' => ['required'],
            'profile' => 'file|mimes:jpeg,png,gif,jpg',
            'profile2' => 'file|mimes:jpeg,png,gif,jgp',
            'quantity' => ['required'],
        ]);

        $destination = null;
        $destination3 = null;
        $fileName1 = null;
        $fileName2 = null;
        $fileName3 = null;

        if ($request->file('profile') != null) {
            $fileName1 = str_replace(" ", "_", $request->file('profile')->getClientOriginalName());
            $destination = "uploads/products/";
            $request->file('profile')->move(public_path($destination), $fileName1);
            $product = DB::table("products")->where('id', $id)->update([
                'productImage' => $destination . $fileName1,
            ]);
        }
        if ($request->file('profile2') != null) {
            $fileName2 = str_replace(" ", "_", $request->file('profile2')->getClientOriginalName());
            $destination = "uploads/products/";
            $request->file('profile2')->move(public_path($destination), $fileName2);
            $product = DB::table("products")->where('id', $id)->update([
                'productImage2' => $destination . $fileName2,
            ]);
        }
        // if ($request->file('vrImage') != "") {
        //     $fileName3 = time() . uniqid() . '.' . $request->file('vrImage')->getClientOriginalExtension();
        //     $destination3 = "uploads/vr/";
        //     $request->file('vrImage')->move(public_path($destination3), $fileName3);

        // }

        $product = DB::table("products")->where('id', $id)->update([
            'sellerId' => auth()->guard('seller')->user()->sellerCode,
            'productName' => $request->productName,

            'description' => nl2br($request->description),
            'price' => $request->productPrice,
            'options' => json_encode($request->options),
            'colors' => json_encode($request->colors),
            'product_cat' => $request->category,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'brands' => $request->brand,
            'created_at' => Carbon::now(),
        ]);

        session()->flash('success', 'Product updated');
        return redirect()->route('seller.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
        if ($product != null) {
            $product->delete();
            session()->flash("success", 'Product has been deleted');
            return redirect()->route('seller.products.index');
        }
    }
}