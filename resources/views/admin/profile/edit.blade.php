@extends('admin.layouts.app-master')
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        <p class="mb-0">Edit Profile</p>
                        <button type="button"
                            class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Settings</button>
                    </div>
                </div>
                <div class="flex-auto p-6">
                    <p class="leading-normal uppercase text-sm">User Information</p>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="username"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Username</label>
                                <input type="text" name="username" value="{{ $user->name }}"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="email"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Email
                                    address</label>
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="first name"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">First
                                    name</label>
                                <input type="text" name="first name" value="{{ $user->name }}"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        {{-- <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label for="last name"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Last
                                    name</label>
                                <input type="text" name="last name" value="Lucky"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div> --}}
                    </div>
                    <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent " />

                    <p class="leading-normal uppercase text-sm">Contact Information</p>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="address"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Address</label>
                                <input type="text" name="address" value="{{ $user->address }}"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        {{-- <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label for="city"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">City</label>
                                <input type="text" name="city" value="New York"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label for="country"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Country</label>
                                <input type="text" name="country" value="United States"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label for="postal code"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Postal
                                    code</label>
                                <input type="text" name="postal code" value="437300"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div> --}}
                    </div>
                    {{-- <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent " />

                    <p class="leading-normal uppercase text-sm">About me</p>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                            <div class="mb-4">
                                <label for="about me"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">About
                                    me</label>
                                <input type="text" name="about me"
                                    value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source."
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                <img class="w-full rounded-t-2xl" src="https://picsum.photos/seed/picsum/200/80?blue=1"
                    alt="random cover image">
                <div class="flex flex-wrap justify-center -mx-3">
                    <div class="w-4/12 max-w-full px-3 flex-0 ">
                        <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                            <a href="javascript:;">
                                <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                    src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}"
                                    alt="profile image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-2 pt-2 pb-3">
                    <form action="{{ route('admin.password.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <h6 class="text-slate-500">Update password</h6>

                        <div class="w-full">

                            <div class="mb-4">
                                <label for="first name"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Current
                                    Password</label>
                                <input type="text" name="current_password"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <label for="first name"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">New
                                    Password</label>
                                <input type="text" name="password"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <label for="first name"
                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Confirm
                                    Password</label>
                                <input type="text" name="password_confirmation"
                                    class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <button type="submit" class="p-1 bg-blue-400 rounded text-white text-sm font-bold">Change
                            password</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
