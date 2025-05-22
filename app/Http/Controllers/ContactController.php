<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $message = DB::table('contact')->latest()->get();
        return view('admin.contact.index',[
            'message' => $message
        ]);
    }
}