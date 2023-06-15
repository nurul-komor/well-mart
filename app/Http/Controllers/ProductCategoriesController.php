<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategories::latest()->get();
        return view('admin.categories.index', ['categories' => $categories, 'pageTitle' => 'Product Categories']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategories::latest()->get();
        $title = "Product Category";
        $pageTitle = "Create category";
        return view('admin.categories.create', [
            'title' => $title,
            "pageTitle" => $pageTitle,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        validator($request->all(), [
            'categoryName' => "required|max:50|min:3|unique:product_categories",
            'profileImage' => 'required|file|mimes:jpeg,png,gif,jpg',
        ])->validate();
        $destination = null;
        if ($request->file('profileImage') != "") {
            $fileName = str_replace(" ", "_", $request->file('profileImage')->getClientOriginalName());
            $destination = "uploads/categories/";
            $request->file('profileImage')->move(public_path($destination), $fileName);

        }
        $category = new ProductCategories;
        $category->categoryName = $request->categoryName;
        $category->profile = $destination . $fileName;
        if ($request->status == "on") {
            $category->status = 1;
        } elseif ($request->status == "off") {
            $category->status = 0;
        }
        $category->save();
        return redirect()->route('admin.product_categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductCategories::find($id);
        $title = "Edit Category";
        $pageTitle = "Edit category";
        return view('admin.categories.edit', [
            'title' => $title,
            "pageTitle" => $pageTitle,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        validator($request->all(), [
            'categoryName' => "required|max:50|min:3|unique:product_categories,categoryName," . $id,
            'profileImage' => 'file|mimes:jpeg,png,gif,jpg',
        ])->validate();


        $category = ProductCategories::find($id);
        $category->categoryName = $request->categoryName;
        $destination = null;
        if ($request->file('profileImage') != "") {
            $fileName = str_replace(" ", "_", $request->file('profileImage')->getClientOriginalName());
            $destination = "uploads/categories/";
            $request->file('profileImage')->move(public_path($destination), $fileName);
            $category->profile = $destination . $fileName;
        }
        if ($request->status == "on") {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();

        $products = DB::table('products')->where('product_cat', $category->id)->update([
            'status' => 0
        ]);


        return redirect()->route('admin.product_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProductCategories::find($id);
        if ($category != null) {
            $category->delete();
        }
        return redirect()->route('admin.product_categories.index')->with('success', 'Category deleted successfully.');
    }
}