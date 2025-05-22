<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'phone' => ['required'],
            // 'dob' => ['required'],
            // 'gender' => ['required'],
        ]);
        $destination = null;
        $fileName = null;
        if ($request->file('image') != "") {
            $fileName = str_replace(" ", "_", $request->file('image')->getClientOriginalName()) . '.' . str_replace(" ", "_", $request->file('image')->getClientOriginalExtension());
            $destination = "uploads/customers/";
            $request->file('image')->move(public_path($destination), $fileName);
        }
        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            // 'image' => $destination . $fileName,
            // 'dob' => $request->dob,
            // 'gender' => $request->gender,
            // 'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);


        // event(new Registered($user));

        // Auth::guard('admin')->login($user);

        return redirect(RouteServiceProvider::ADMIN_HOME);
    }
}