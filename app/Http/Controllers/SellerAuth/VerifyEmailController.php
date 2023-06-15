<?php

namespace App\Http\Controllers\SellerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        if (auth()->guard('seller')->user()->hasVerifiedEmail()) {
            return redirect()->route('seller.dashboard');
        }

        if (auth()->guard('seller')->user()->markEmailAsVerified()) {
            event(new Verified(auth()->guard('seller')->user()));
        }

        return redirect()->route('seller.dashboard');
    }
}