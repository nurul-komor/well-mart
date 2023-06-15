<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('admin.auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        /**
         *
         * Finding admin using token
         */

        $admin = Admin::where('remember_token', $request->token)->first();
        if ($admin == null) {
            abort(404);
        }

        /**
         *
         * updating password with inputs
         *
         */

        $admin->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        /**
         *
         *  Attepting admin and redirecting into dashboard
         *
         */

        if (Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            return redirect()->route('admin.dashboard');
        }


    }
}