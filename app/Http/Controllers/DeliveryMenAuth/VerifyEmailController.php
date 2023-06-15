<?php

namespace App\Http\Controllers\DeliveryMenAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {

        if ($request->user() == "") {
            abort(403);
        }
        if (auth()->guard('delivery_men')->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }

        if (auth()->guard('delivery_men')->user()->markEmailAsVerified()) {
            event(new Verified(auth()->guard('delivery_men')->user()));
        }

        return redirect()->intended(RouteServiceProvider::DELIVERY_MAN_HOME . '?verified=1');


    }
}