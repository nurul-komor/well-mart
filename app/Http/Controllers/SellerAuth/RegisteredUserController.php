<?php

namespace App\Http\Controllers\SellerAuth;

use App\Models\User;
use App\Models\Seller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Jobs\SendVerificationEmailToSeller;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('seller.auth.register');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Seller::class],
            'NidOrDrivingLicence' => 'required|mimes:jpg,png,pdf,jpeg',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required'],
            'shopName' => ['required'],

        ]);
        $destination = null;
        $fileName = null;
        if ($request->file('NidOrDrivingLicence') != "") {
            $fileName = str_replace(" ", "_", $request->file('NidOrDrivingLicence')->getClientOriginalName()) . '.' . str_replace(" ", "_", $request->file('NidOrDrivingLicence')->getClientOriginalExtension());
            $destination = "uploads/sellers/";
            $request->file('NidOrDrivingLicence')->move(public_path($destination), $fileName);
        }
        $sellerCode = time() . "-" . uniqid();
        $user = Seller::create([
            'sellerCode' => $sellerCode,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $destination . $fileName,
            'shop_name' => $request->shopName,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'shop_type' => $request->shopType
        ]);


        SendVerificationEmailToSeller::dispatch($user);


        Auth::guard('seller')->login($user);

        return redirect()->route('seller.verification.notice');
    }
}