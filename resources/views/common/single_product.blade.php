@extends('common.components.master')
@section('main')
    @include('common.components.navbar')
    @include('common.components.topbar')
    @if (session('success'))
        <div class="fixed top-[250px] right-5">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">Added to cart</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="fixed top-[250px] right-5">

            <div id="toast-warning"
                class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Warning icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('error') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <form action="{{ route('common.cart.add') }}" method="post">
        <section class="mt-5 flex px-4 md:px-10 bg-gray-50">
            @csrf
            <div class="basis-full p-4 md:max-w-[1200px] bg-white mx-auto">
                <div class="flex flex-col items-center md:items-start md:flex-row">
                    <div class="basis-full md:basis-[40%] lg:basis-[50%] h-[70vh]">

                        <div class="owl-carousel product-modal max-w-[auto]  md:max-w-[300px] lg:max-w-[400px]  ">
                            <div class="item mb-5  cursor-grab ">
                                <img src="{{ asset($product->productImage) }}" class="object-contain max-h-[600px]"
                                    alt="product image">
                            </div>
                            @if ($product->productImage2 != '')
                                <div class="item mb-5  cursor-grab ">
                                    <img src="{{ asset($product->productImage2) }}" class="object-contain max-h-[600px]"
                                        alt="product image">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="basis-full md:basis-[60%] lg:basis-[50%] font-montserrat p-4 md:p-0">
                        <h3 class="">{{ $product->productName }}</h3>

                        <h4 class="  mt-3 mb-2 inline-block">BDT
                            {{ $product->discount == null || $product->discount < 1 ? $product->price : ($product->price * (100 - $product->discount)) / 100 }}
                        </h4>
                        @if ($product->discount == null || $product->discount > 0)
                            <h6><span class="text-red-500 line-through mb-2">BDT {{ $product->price }}</span></h6>
                        @endif

                        <p>+ 50 BDT (Delivery Charge)</p>
                        <p class="text-sm text-gray-600 inline-block">
                            {!! $product->description !!}
                        </p>
                        @php
                            $num = 1;
                            $num2 = 0;
                        @endphp
                        @if (json_decode($product->colors) != null)
                            <h6>Colors </h6>
                            <ul class="flex w-full optionList gap-3">
                                @foreach (json_decode($product->colors) as $color)
                                    <li class="">
                                        <label for="color-{{ $num }}"
                                            class="cursor-pointer flex flex-col items-center justify-center">
                                            <p><span
                                                    style="background: {{ $color }};padding:5px;border-radius:50%;width:20px;height:20px;display:inline-block;margin-right:5px;"></span>
                                            </p>
                                            <input type="radio" name="color" id="color-{{ $num }}"
                                                class="hidden" value="{{ $color }}">
                                        </label>

                                    </li>
                                    @php
                                        $num++;
                                    @endphp
                                @endforeach

                            </ul>
                        @endif
                        @if (json_decode($product->options) != null)
                            <h6>Options</h6>
                            <ul class="flex w-full gap-3 space-x-2 py-2 border-b border-gray-200 optionList">

                                @foreach (json_decode($product->options) as $option)
                                    <li class="">
                                        <label for="option-{{ $num2 }}">
                                            <p
                                                class="px-2 py-1 rounded-sm mr-2 ring-1 ring-slate-400 inline-block cursor-pointer ">
                                                {{ $option }} </p>
                                        </label>
                                        <input value="{{ $option }}" type="radio" name="option"
                                            id="option-{{ $num2 }}" class="hidden">

                                    </li>
                                    @php
                                        $num2++;
                                    @endphp
                                @endforeach
                            </ul>
                        @endif
                        @if ($product->product_code != null)
                            <div class="py-4">
                                <a class="font-body underline "
                                    href="{{ route('common.product.vr', ['code' => $product->product_code]) }}">3D view</a>
                            </div>
                        @endif
                        <div class="flex w-full flex-col md:flex-row mt-4">
                            <div class="basis-full md:basis-[50%] p-4">
                                @if ($product->quantity > 4)
                                    <input type="number" name="quantity" id="" class="w-full input ring-1"
                                        value="1" max="5" min="1">
                                @else
                                    <input type="number" name="quantity" id="" class="w-full input ring-1"
                                        value="1" max="{{ $product->quantity }}" min="1">
                                @endif
                            </div>

                            <div class="basis-full md:basis-[50%] p-4">
                                <input type="hidden" name="product_code" value="{{ $product->product_code }}">
                                <button class="btn" type="submit">Add To Cart</button>
                            </div>
                        </div>
                        @if ($product->quantity < 6)
                            <p class="text-gray-600 text-sm">
                                Only {{ $product->quantity }} items left
                            </p>
                        @endif
                    </div>
                </div>
            </div>

        </section>
    </form>
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <h2 class="text-xl font-bold sm:text-2xl">Customer Reviews</h2>

            <div class="mt-4 flex items-center gap-4">
                <p class="text-3xl font-medium">
                    3.8
                    <span class="sr-only"> Average review score </span>
                </p>

                <div>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>

                    <p class="mt-0.5 text-xs text-gray-500">Based on 48 reviews</p>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-x-16 gap-y-12 lg:grid-cols-2">
                <blockquote>
                    <header class="sm:flex sm:items-center sm:gap-4">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>

                        <p class="mt-2 font-medium sm:mt-0">The best thing money can buy!</p>
                    </header>

                    <p class="mt-2 text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam
                        possimus fuga dolor rerum dicta, ipsum laboriosam est totam iusto
                        alias incidunt cum tempore aliquid aliquam error quisquam ipsam
                        asperiores! Iste?
                    </p>

                    <footer class="mt-4">
                        <p class="text-xs text-gray-500">John Doe - 12th January, 2024</p>
                    </footer>
                </blockquote>


            </div>
        </div>
    </section>
    <section class="p-4 md:p-10">
        <h6>Realted Products</h6>
        <div class="grid gird-flow-rows grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
            id="productsContainer">
            {{-- related item  --}}
            @foreach ($relatedProducts as $item)
                {{-- {{ $item }} --}}
                @php
                    $price = $item->price;
                    if ($item->discount != null || $item->discount > 0) {
                        $price = ($price * (100 - $product->discount)) / 100;
                    }
                @endphp

                {{-- product item  --}}
                <a class="product-item relative p-4 lg:p-6 flex flex-col items-center "
                    href="/products/singleProduct/{{ $item->product_code }}">
                    <div class="h-[200px] inline-block w-full cursor-zoom-in  bg-cover   bg-center duration-125">
                        <img src="{{ asset($item->productImage) }}" class="max-h-[200px] w-full object-contain"
                            alt="" loading="lazy">

                    </div>
                    <div class="label flex flex-col items-center">
                        <small
                            class="font-montserrat text-gray-700 text-xs font-medium">{{ $item->getCategory->categoryName }}</small>
                        <label for="product-modal" class="cursor-pointer">
                            <b class="text-sm py-2 hover:text-commonPrimary text-limit">{{ $item->productName }}</b>
                        </label>
                        <b class="text-sm text-commonPrimary font-montserrat">BDT {{ $price }} </b>
                    </div>
                    <button class="btn btn-sm  mt-3 normal-case font-montserrat" data-id="${$product->id}">
                        Add To Cart
                    </button>
                    <div class="absolute -right-5 icon-group">

                        <div
                            class="flex flex-col p-2 text-slate-900 hover:bg-slate-900 rounded-full hover:text-white font-bolder border-2 border-slate-900 mb-2 icon">
                            <ion-icon name="heart-outline"></ion-icon>
                        </div>
                        <div
                            class="flex flex-col p-2 text-slate-900 hover:bg-slate-900 rounded-full hover:text-white font-bolder border-2 border-slate-900 mb-2 icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                        <div
                            class="flex flex-col p-2 text-slate-900 hover:bg-slate-900 rounded-full hover:text-white font-bolder border-2 border-slate-900 mb-2 icon">
                            <ion-icon name="shuffle-outline"></ion-icon>
                        </div>

                    </div>
                </a>
                {{-- product item  --}}
            @endforeach

        </div>
    </section>
    {{-- bottom  --}}
    @include('common.components.bottom')
@endsection
@push('rangejs')
    <script src="{{ asset('common/js/rangebar.js') }}"></script>
@endpush
{{-- just pushing to footer anyhow  --}}
@push('productsAjax')
    <script>
        // cheking input type radio dynamically

        $.each($(".optionList"), function(index, item) {
            ($(item).find('li').first().addClass('active'))
            $(item).find('input').first().attr('checked', '')
        })

        // adding active class on click
        $('.optionList li').on('click', function() {
            $(this).addClass('active')
            $(this).siblings().removeClass('active')
        })
    </script>
@endpush
