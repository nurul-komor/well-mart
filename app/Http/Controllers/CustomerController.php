<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::latest()->get();
        return view('admin.customers.index', ['customers' => $customers, 'pageTitle' => "Customers"]);
    }
    public function destroy(User $customer)
    {
        // return $customer;
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('success', 'Customer deleted');
    }
}