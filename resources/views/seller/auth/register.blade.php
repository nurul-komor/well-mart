<x-seller-guest-layout>
    <form method="POST" action="{{ route('seller.register') }}" enctype="multipart/form-data">
        @csrf
        <h6 class="pl-1">Account Informations</h6>
        <div class="flex  md:min-w-[700px] flex-col md:flex-row">
            <div class="md:basis-[50%] p-2">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone (Bikash No) Note: For money transaction')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone')" autocomplete="username" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

            </div>
            <div class="md:basis-[50%]  p-2">
                <!-- Gender -->

                <div class="mt-4 md:mt-[2.1px]">
                    <x-input-label for="NidOrDrivingLicence" :value="__('Nid / Driving License')" />
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="NidOrDrivingLicence" type="file" name="NidOrDrivingLicence">
                    <x-input-error :messages="$errors->get('NidOrDrivingLicence')" class="mt-2" />
                </div>


                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>

        </div>
        <h6 class="pl-1 mt-1">Shop Informations</h6>
        <div class="flex  md:min-w-[700px] flex-col md:flex-row">
            <div class="basis-[50%]">
                <div class="px-2">
                    <x-input-label for="data" :value="__('Name of shop')" />
                    <input
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full'
                        type="text" name="shopName">
                    <x-input-error :messages="$errors->get('shopName')" class="mt-2" />
                </div>
            </div>
            <div class="basis-[50%]">

                <div class="px-2">
                    <x-input-label for="companyType" :value="__('Shop Type')" />
                    <input
                        class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full'
                        type="text" name="shopType">
                    <x-input-error :messages="$errors->get('shopType')" class="mt-2" />

                    <x-input-error :messages="$errors->get('shopType')" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="mt-2">
            <x-input-label for="address" :value="__('Address')" />

            <textarea id="address" rows="4" name="address"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Location of shop"></textarea>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('seller.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</x-seller-guest-layout>
