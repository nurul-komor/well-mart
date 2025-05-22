<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {

        $sellers = Seller::latest()->get();
        return view('admin.sellers.index', ['sellers' => $sellers, 'pageTitle' => 'Sellers']);
    }
    public function destroy(Seller $seller)
    {
        // return $customer;
        $seller->delete();
        return redirect()->route('admin.seller.index')->with('success', 'Seller deleted');
    }
}