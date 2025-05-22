<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Algolia\AlgoliaSearch\SearchClient;

class AlgoliaApiController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $client = SearchClient::create(
            env('ALGOLIA_APP_ID'),
            env('ALGOLIA_SECRET')
        );
        $list1 = News::search($query)->get()->toArray();
        $list2 = Products::search($query)->get()->toArray();
        $results = array_merge($list1, $list2);

        return response()->json([
            'results' => $results,
            'total' => count($results),
            'status' => 1
        ], 200);
    }
}