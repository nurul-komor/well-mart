<?php

namespace App\Http\Controllers\SellerAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Jobs\SendVerificationEmailToSeller;
use App\Notifications\SendEmailVerificationToSeller;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::SELLER_HOME);
        }


        // $user = $request->user();

        SendVerificationEmailToSeller::dispatch($request->user());


        return back()->with('status', 'verification-link-sent');
    }
}