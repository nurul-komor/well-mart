<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('getCategory')->latest()->get();
        return view('admin.news.index', ['news' => $news, 'pageTitle' => 'All News']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news = News::latest()->get();
        $categories = NewsCategory::where('status', 'active')->latest()->get();
        $title = "News";
        $pageTitle = "Add News";
        return view('admin.news.create', [
            'title' => $title,
            "pageTitle" => $pageTitle,
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        validator($request->all(), [
            'title' => "required|max:250|min:3|unique:news",
            'image' => 'required|file|mimes:jpeg,png,gif,jpg',
            'description' => 'required|min:10',

        ])->validate();
        $destination = null;
        if ($request->file('image') != "") {
            $fileName = str_replace(" ", "_", $request->file('image')->getClientOriginalName());
            $destination = "uploads/news/";
            $request->file('image')->move(public_path($destination), $fileName);

        }
        $news = new News;
        $news->title = $request->title;
        $news->news_cat = $request->category;
        $news->content = nl2br($request->description);
        $news->tags = json_encode($request->tags);
        $news->image = $destination . $fileName;
        if ($request->status == "on") {
            $news->status = 'active';
        } elseif ($request->status == "off") {
            $news->status = 'inactive';
        }
        $news->save();
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
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
        $news = News::with('getCategory')->where('id', $id)->latest()->first();
        $categories = NewsCategory::where('status', 'active')->get();
        $title = "Edit news";
        $pageTitle = "Edit news";
        return view('admin.news.edit', [
            'title' => $title,
            "pageTitle" => $pageTitle,
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        validator($request->all(), [
            'title' => "required|max:250|min:3|unique:news,title," . $id,
            'image' => 'file|mimes:jpeg,png,gif,jpg',
            'description' => 'required|min:10',

        ])->validate();
        // return $request->all();
        $news = News::find($id);
        $destination = null;
        if ($request->file('image') != "") {
            $fileName = str_replace(" ", "_", $request->file('image')->getClientOriginalName());
            $destination = "uploads/news/";
            $request->file('image')->move(public_path($destination), $fileName);
            $news->image = $destination . $fileName;
        }
        $news->title = $request->title;
        $news->news_cat = $request->category;
        $news->content = nl2br($request->description);
        $news->tags = json_encode($request->tags);

        if ($request->status == "on") {
            $news->status = 'active';
        } else {
            $news->status = 'inactive';
        }
        $news->save();



        return redirect()->route('admin.news.index')->with('success', 'news updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);
        if ($news != null) {
            $news->delete();
        }
        return redirect()->route('admin.news.index')->with('success', 'news deleted successfully.');
    }
}