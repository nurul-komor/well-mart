@extends('admin.layouts.app-master')
@section('content')
    <!-- table 1 -->

    <div class="fixed top-5 right-10">
        @if (session('success'))
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8"
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
        @endif
    </div>
    {{-- modal  --}}
    @include('admin.products.modal')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div
                    class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between">
                    <h6 class="">product table</h6>


                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-3 overflow-x-auto ">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse text-slate-500 mdl-data-table"
                            datatable>
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-center">
                                        sl
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        product Code</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        product name</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        product Category</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Image 1 </th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Image 2</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Brands</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Price</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Discount</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Options</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Colors</th>
                                    {{-- <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Colors</th> --}}
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Description</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Created at</th>

                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Publish</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center ">
                                            {{ $i++ }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            @if ($product->status == '1')
                                                <p class="chips bg-green-400">Active</p>
                                            @elseif ($product->status == '2')
                                                <p class="chips bg-yellow-400">Pending</p>
                                            @else
                                                <p class="chips bg-blue-400">Inctive</p>
                                            @endif
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            #{{ $product->product_code }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $product->productName }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $product->getCategory->categoryName }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent ">
                                            <div class="flex  justify-center">

                                                <a href="{{ asset($product->productImage) }}">
                                                    <img src="{{ asset($product->productImage) }}" alt=""
                                                        class="max-h-[150px]  flex">
                                                </a>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent ">
                                            <div class="flex justify-center">
                                                <a href="{{ asset($product->productImage2) }}">
                                                    <img src="{{ asset($product->productImage2) }}" alt="Not selected"
                                                        class="max-h-[150px]  flex">
                                                </a>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $product->brands }}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p>
                                                {{ $product->discount == null || $product->discount > 0 ? ($product->price * (100 - $product->discount)) / 100 . ' BDT' : $product->price . 'BDT' }}
                                            </p>
                                            @if ($product->discount != null || $product->discount < 1)
                                                <small class="text-red-400 line-through">{{ $product->price . ' BDT' }}
                                                </small>
                                            @endif
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $product->discount }} %
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @if (json_decode($product->options) != null)
                                                @foreach (json_decode($product->options) as $item)
                                                    <p class="px-2 py-1 rounded-sm mr-2 ring-1 ring-slate-400 inline-block">
                                                        {{ $item }}</p>
                                                @endforeach
                                            @else
                                                Nothing to show
                                            @endif
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex">
                                                @if ($product->colors != 'null')
                                                    @foreach (json_decode($product->colors) as $item)
                                                        <p><span
                                                                style="background: {{ str_replace('`', '', $item) }};padding:5px;border-radius:50%;width:20px;height:20px;display:inline-block;margin-right:5px;"></span>
                                                        </p>
                                                    @endforeach
                                                @else
                                                    nothing
                                                @endif
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {!! $product->description !!}
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            {{ $product->created_at }}
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent flex">
                                            {{-- modal  --}}
                                            <button id="openModalBtn"
                                                class="bg-slate-700 focus:ring-1 ring-slate-700 ring-offset-2 rounded-full py-2 px-4 text-base font-medium text-white"
                                                data-id="{{ $product->product_code }}">
                                                Publish or hide
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('outletcss')
    <style>
        input[type="search"] {
            border: 1px solid;
            margin-right: 10px;
            padding: 3px;
        }
    </style>
@endpush
@push('outletjs')
    <script>
        $(function() {
            $('table').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        })
        $("#statusModal").hide()

        $(document).on('click', "#openModalBtn", function() {

            $("#statusModal").toggle()
            let productCode = $(this).attr('data-id')
            $("#productCode").val(productCode)
        })
        $(document).on('change', "#statusChanger", function() {
            let status = $(this).val()
            if (status == 0) {
                $(".reason-box").show()
            } else {
                $(".reason-box").hide()

            }
        })
    </script>
@endpush
