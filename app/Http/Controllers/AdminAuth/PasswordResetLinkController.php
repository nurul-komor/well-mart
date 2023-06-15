<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use App\Notifications\AdminResetPasswordNotification;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('admin.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // return $request->only('email');
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $admin = Admin::where('email', $request->email)->first();

        if ($admin != null) {
            $token = Str::random(60);
            $admin->notify(new AdminResetPasswordNotification($admin->id, $token));
            $admin->forceFill([
                'remember_token' => $token
            ]);
            $admin->save();
            session()->flash('status', "Reset password email sent");
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['email' => "User not found"]);
        }
    }
}