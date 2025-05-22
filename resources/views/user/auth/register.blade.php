<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex  md:min-w-[700px] flex-col md:flex-row">
            <div class="md:basis-[50%] p-2">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="data" :value="__('Date of birth')" />
                    <input
                        class='border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full'
                        type="date" name="dob">
                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                </div>
            </div>
            <div class="md:basis-[50%]  p-2">
                <!-- Gender -->

                <div class="mt-4 md:mt-[2.1px]">
                    <x-input-label for="gender" :value="__('Gender')" />
                    <select id="gender" name="gender"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Prefer not to say</option>

                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        id="image" type="file" name="image">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>

        </div>
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />

            <textarea id="address" rows="4" name="address"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Your address here"></textarea>

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
