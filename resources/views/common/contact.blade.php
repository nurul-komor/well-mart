@extends('common.components.master')
@section('main')
    @include('common.components.navbar')
    @include('common.components.topbar')
    <section class="bg-white">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Contact Us</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl font-montserrat">Got a
                <span class="font-bold">technical
                    issue</span>? Want a <span class="font-bold">product</span> that's not exist ? Want to send feedback
                about a beta
                feature? Need details
                about our
                Business plan? Let us know.
            </p>
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 rounded-lg bg-green-200"
                    role="alert">
                    <span class="font-bold">Success alert!</span> {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('common.message.send') }}" method="POST" class="space-y-8" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                        email</label>
                    <input type="email" id="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-commonPrimary focus:border-commonPrimary block w-full p-2.5"
                        placeholder="name@example.com" name="email">
                    @error('email')
                        <small class="text-red-400">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="subject"
                        class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-commonPrimary focus:border-commonPrimary"
                        placeholder="Let us know how we can help you">
                    @error('subject')
                        <small class="text-red-400">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="image"
                        class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                    <input type="file" id="image" name="image"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-commonPrimary focus:border-commonPrimary block w-full p-2.5">
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your
                        message</label>
                    <textarea id="message" rows="6" name="message"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-commonPrimary focus:border-commonPrimary"
                        placeholder="Leave a comment..."></textarea>
                    @error('message')
                        <small class="text-red-400">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit"
                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-commonPrimary sm:w-fit hover:bg-commonPrimary focus:ring-4 focus:outline-none focus:ring-commonPrimary">Send
                    message</button>
            </form>
        </div>
    </section>



    {{-- bottom  --}}
    @include('common.components.bottom')
@endsection
