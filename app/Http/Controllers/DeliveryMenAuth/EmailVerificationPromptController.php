<?php

namespace App\Http\Controllers\DeliveryMenAuth;

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
    public function __invoke(Request $request): RedirectResponse|View
    {

        if ($request->user() == "") {
            return redirect('delivery_men.login');
        }
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::DELIVERY_MAN_HOME)
            : view('delivery_men.auth.verify-email');

    }
}