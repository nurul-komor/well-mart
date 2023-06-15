<?php

namespace App\Http\Controllers\DeliveryMenAuth;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('delivery_men.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // return $request->address;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'email:rfc,dns', 'unique:' . DeliveryMan::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required'],
            'dob' => ['required'],
            'gender' => ['required'],
        ]);
        $destination = null;
        $fileName = null;
        if ($request->file('image') != "") {
            $fileName = str_replace(" ", "_", $request->file('image')->getClientOriginalName()) . '.' . str_replace(" ", "_", $request->file('image')->getClientOriginalExtension());
            $destination = "uploads/customers/";
            $request->file('image')->move(public_path($destination), $fileName);
        }
        $user = DeliveryMan::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $destination . $fileName,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::guard('delivery_men')->login($user);

        return redirect(RouteServiceProvider::DELIVERY_MAN_HOME);
    }
}