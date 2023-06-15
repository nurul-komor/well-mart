<?php

namespace App\Http\Controllers\SellerAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request)
    {

        return auth()->guard('seller')->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::SELLER_HOME)
            : view('seller.auth.verify-email');
    }
}