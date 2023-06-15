<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $NewsCategories = NewsCategory::latest()->get();
        return view('admin.news_category.index', ['NewsCategories' => $NewsCategories, 'pageTitle' => ' News Categories']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $NewsCategory = NewsCategory::latest()->get();
        $title = "NewsCategory";
        $pageTitle = "Add NewsCategory";
        return view('admin.news_category.create', [
            'title' => $title,
            "pageTitle" => $pageTitle,
            'NewsCategory' => $NewsCategory
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        validator($request->all(), [
            'name' => "required|max:50|min:3|unique:news_category",

        ])->validate();



        $category = new NewsCategory;
        $category->name = $request->name;

        if ($request->status == "on") {
            $category->status = 'active';
        } elseif ($request->status == "off") {
            $category->status = 'inactive';
        }
        $category->save();

        return redirect()->route('admin.news_category.index')->with('success', 'Category created successfully.');
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
        $category = NewsCategory::find($id);
        $title = "Edit Category";
        $pageTitle = "Edit category";
        return view('admin.news_category.edit', [
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
            'name' => "required|max:50|min:3|unique:news_category,name," . $id,

        ])->validate();


        $category = NewsCategory::find($id);
        $category->name = $request->name;

        if ($request->status == "on") {
            $category->status = 'active';
        } else {
            $category->status = 'inactive';
        }
        $category->save();

        $products = DB::table('products')->where('product_cat', $category->id)->update([
            'status' => 0
        ]);


        return redirect()->route('admin.news_category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = NewsCategory::find($id);
        if ($category != null) {
            $category->delete();
        }
        return redirect()->route('admin.news_category.index')->with('success', 'Category deleted successfully.');
    }
}