<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ env('APP_LOGO') }}">
    {{-- app url  --}}
    <meta name="app-url" content="{{ env('APP_URL') }}">
    {{-- ajax setup  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- app url  --}}
    <meta name="app-url" content="{{ env('APP_URL') }}">
    <link rel="icon" type="image/png" href="{{ env('APP_LOGO') }}" />
    {{-- ion icons js  --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- owl carousel css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- animate css  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css">
    {{-- rangbar css  --}}
    <link rel="stylesheet" href="{{ asset('common/css/rangebar.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-0cca5b92.css') }}"> --}}
    {{-- <script src="{{ asset('build/assets/app-b5a11a08.js') }}"></script> --}}

    {{-- custom css  --}}
    <link rel="stylesheet" href="{{ asset('common/css/custom.css') }}">
</head>

<body class="font-helvetica text-base text-[#252525] bg-white">
