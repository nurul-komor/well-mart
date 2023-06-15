<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\News;
use App\Models\User;
use App\Models\Products;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'active')->latest()->take(3)->get();
        $productCategories = ProductCategories::with('getProducts')->where('status', 1)->latest()->take(6)->get();

        $data = compact('productCategories', 'news');
        return view('common.index')->with($data);
    }
    public function products()
    {
        $title = "Products";
        $suggestedProducts = null;
        if (auth()->user() != null) {
            // user
            $user = auth()->user();

            $suggestions = json_decode($user->suggestion);

            if (($suggestions) != null) {
                foreach (array_reverse($suggestions) as $suggestion) {
                    $suggestedProducts[] = Products::where('product_cat', $suggestion)->with('getCategory')->orderBy('total_visited')->latest()->take(5)->get();
                }
            }
            // return auth()->user();
        }

        $productCategories = DB::table('product_categories')->get();
        $category = null;
        $data = compact('title', 'productCategories', 'category', 'suggestedProducts');
        return view('common.products')->with($data);
    }
    public function singleProduct($code)
    {
        $title = "Products";
        $product = Products::where('product_code', $code)->with('getCategory')->first();
        // adding visited to product
        $product->total_visited = $product->total_visited + 1;
        $product->save();
        // adding suggestion to to user
        if (auth()->user() != null) {
            $user = User::find(auth()->user()->id);
            $suggestions = $user->suggestion;
            $data = $suggestions == "" ? [] : json_decode($suggestions);
            if (!in_array($product->product_cat, $data)) {
                array_push($data, $product->product_cat);
                $user->suggestion = json_encode($data);
                $user->save();
            }
        }

        $productCategories = DB::table('product_categories')->get();
        $product = Products::where('product_code', $code)->with('getCategory')->first();
        $relatedProducts = Products::where(['product_cat' => $product->getCategory->id, 'status' => 1])->take(5)->get();

        $data = compact('title', 'productCategories', 'product', 'relatedProducts');
        return view('common.single_product')->with($data);
    }

    public function productsByCategory($category)
    {
        $title = "Products >" . $category;
        $productCategories = DB::table('product_categories')->get();
        $data = compact('title', 'productCategories', 'category');
        return view('common.productsByCategory')->with($data);
    }
    public function news()
    {
        $title = "News";
        $news = News::with('getCategory')->where('status', 'active')->paginate(6);
        $categories = NewsCategory::where('status', 'active')->latest()->take(3)->get();
        $latestNews = News::latest()->take(3)->get();
        $data = compact('title', 'news', 'categories', 'latestNews');
        return view('common.news.index', $data);
    }
    public function singleNews($newsTitle)
    {
        $title = "News";
        $news = News::where('title', 'like', '%' . $newsTitle . '%')->first();
        $categories = NewsCategory::where('status', 'active')->latest()->take(3)->get();
        $latestNews = News::latest()->take(3)->get();
        $data = compact('title', 'news', 'categories', 'latestNews');
        if ($news != null) {
            return view('common.news.single_news', $data);
        } else {
            abort(404);
        }
    }
    public function contact()
    {
        $title = "Contact";
        return view('common.contact', ['title' => $title]);
    }
    public function sendMessage(Request $request)
    {
        validator($request->all(), [
            'email' => 'required|email',
            'subject' => 'required',
            'image' => 'file|mimes:jpg,png,jpeg,jif',
            'message' => 'required'
        ])->validate();
        $destination = null;
        $fileName = null;
        if ($request->file('image') != "") {
            $fileName = str_replace(" ", "_", $request->file('image')->getClientOriginalName());
            $destination = "uploads/contact/";
            $request->file('image')->move(public_path($destination), $fileName);
        }
        DB::table('contact')->insert([
            'email' => $request->email,
            'subject' => $request->subject,
            'image' => $destination . $fileName,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        session()->flash('success', 'Successfully sent message');

        return redirect()->route('common.contact');
    }

    public function about()
    {
        $title = "About Us";
        return view('common.about', ['title' => $title]);
    }
}