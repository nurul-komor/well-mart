@include('admin.layouts.header')
<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
@include('admin.layouts.sidebar')

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    @include('admin.layouts.navbar')
    <div class="w-full p-6 mx-auto">
        @yield('content')
        @include('admin.layouts.copyright')
    </div>
</main>
</div>
@include('admin.layouts.right-sidebar')
@include('admin.layouts.footer')
