@extends('common.components.master')
@section('main')
    <section>
        <h1 class="sr-only">Checkout</h1>

        <div class="mx-auto grid max-w-screen-2xl grid-cols-1 lg:grid-cols-2 font-montserrat">
            <div class="bg-gray-50 py-12 md:py-24">
                <div class="mx-auto  space-y-8 px-4 lg:px-8">
                    <div class="flex items-center gap-4">
                        <span class="h-10 w-10 rounded-full bg-blue-700"></span>

                        <h2 class=" text-gray-900 font-bold font-montserrat leading-0">Checkout</h2>
                    </div>

                    <div>
                        <p class="text-2xl font-medium tracking-tight text-gray-900" id="total-price">
                            $99.99
                        </p>

                        <p class="mt-1 text-sm  text-white">For the purchase of</p>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-warning shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Cart is empty</span>
                            </div>
                        </div>
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="cartProducts" class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Image</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- Product --}}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- Qty --}}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- Price --}}
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        {{-- Action --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>

                    </div>


                </div>
            </div>

            <div class="bg-white py-12 md:py-24">
                <div class="mx-auto max-w-lg px-4 lg:px-8">
                    <form class="grid grid-cols-6 gap-4" action="/pay" method="post">
                        @csrf
                        <div class="col-span-6">
                            <label for="name" class="block text-xs font-medium text-gray-700">
                                Name
                            </label>

                            <input type="text" id="name"
                                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" name="name"
                                value="{{ auth()->user()->name }}" />
                            @error('name')
                                <small class="font-montserrat text-red-500 px-3">{{ $message }}</small>
                            @enderror
                        </div>



                        <div class="col-span-6">
                            <label for="Email" class="block text-xs font-medium text-gray-700">
                                Email
                            </label>

                            <input type="email" id="Email" name="email"
                                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                value="{{ auth()->user()->email }}" />
                            @error('email')
                                <small class="font-montserrat text-red-500 px-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="Phone" class="block text-xs font-medium text-gray-700">
                                Phone
                            </label>

                            <input type="tel" id="Phone" name="phone"
                                class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                value="{{ auth()->user()->phone }}" />
                            @error('phone')
                                <small class="font-montserrat text-red-500 px-3">{{ $message }}</small>
                            @enderror
                        </div>



                        <fieldset class="col-span-6">
                            <legend class="block text-sm font-medium text-gray-700">
                                Billing Address
                            </legend>

                            <div class="mt-1 -space-y-px rounded-md bg-white shadow-sm">
                                <div>
                                    <label for="Country" class="sr-only">Country</label>

                                    <select id="Country" name="country"
                                        class="relative w-full rounded-t-md border-gray-200 focus:z-10 sm:text-sm">
                                        <option selected>Bangladesh</option>
                                        <option>England</option>
                                        <option>Wales</option>
                                        <option>Scotland</option>
                                        <option>France</option>
                                        <option>Belgium</option>
                                        <option>Japan</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="sr-only" for="PostalCode"> Full Address </label>

                                    <textarea type="text" id="PostalCode" placeholder="full address"
                                        class="relative w-full rounded-b-md border-gray-200 focus:z-10 sm:text-sm" rows="5" name="address"> {{ auth()->user()->address }}</textarea>
                                </div>
                                @error('address')
                                    <small class="font-montserrat text-red-500 px-3">{{ $message }}</small>
                                @enderror
                            </div>



                        </fieldset>
                        <fieldset class="col-span-6">
                            <legend for="payment" class="block text-sm font-medium text-gray-700">
                                Select Payment Method
                            </legend>
                            <div class="mt-1">
                                <div class="flex gap-2">
                                    <input id="COD" type="radio" name="payment" value="cash-on-delivery"
                                        class="radio text-sm" />
                                    <label for="COD" class=" text-sm font-medium text-gray-700">Cash on Delivery
                                    </label>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <input id="OLP" type="radio" name="payment" value="online-payment"
                                        class="radio text-sm" checked />
                                    <label for="OLP" class=" text-sm font-medium text-gray-700">Online Payment
                                    </label>
                                    <img src="https://sslcommerz.com/wp-content/uploads/2019/11/footer_logo.png"
                                        class="h-5" alt="SSL-Commerze logo">
                                </div>
                            </div>
                            @error('payment')
                                <small class="my-2 inline-block text-red-500 text-sm font-medium">{{ $message }}</small>
                            @enderror
                        </fieldset>

                        <div class="col-span-6">
                            <button type="submit"
                                class="block w-full rounded-md bg-black p-2.5 text-sm text-white transition hover:shadow-lg">
                                Submit
                            </button>

                            <a href="{{ route('common.products') }}"
                                class="text-sm underline mt-3 w-full text-center inline-block hover:text-blue-500">Countinue
                                Shoppping</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('cartJs')
    <script>
        $(document).ready(function() {
            let appUrl = $("meta[name='app-url']").attr('content')

            function getCart() {
                $.ajax({
                    url: "/getProductsFromCart",
                    method: "get",
                    dataType: "json",
                    success: function(response) {

                        if (response.total != 0) {
                            var html = "";
                            var totalPrice = 0;
                            $.each(response.products, function(i, item) {

                                html += `
                                <tr class=" border-b hover:bg-gray-50">
                                            <td class="w-32 p-4">
                                                <div class="flex justify-center">
                                                    <img src="${appUrl}/${item.image}"
                                                        alt="Apple Watch" class="object-cover max-h-[79px] max-w-[79px]">
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 font-semibold text-gray-900">
                                                ${item.name}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center space-x-3">
                                                    <button data-id="${item.code}"
                                                        class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 decrementer"
                                                        type="button">
                                                        <span class="sr-only">Quantity button</span>
                                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                    <div>
                                                        <input type="number" id="quantity"${item.code}"
                                                            class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1"
                                                            placeholder="1" min="1" max="5" readonly required
                                                            value="${item.quantity}">

                                                    </div>
                                                    <button data-id="${item.code}"
                                                        class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200  incrementer"
                                                        type="button">
                                                        <span class="sr-only">Quantity button</span>
                                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td id=""
                                                class="px-2 py-4 font-semibold text-gray-900 ">

                                                 BDT ${(item.price * item.quantity).toFixed(2)} +  50
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="/cart/${item.code}"
                                                    class="font-medium text-red-600 hover:underline">Remove</a>
                                            </td>
                                        </tr>
                                `
                                totalPrice += item.price * item.quantity
                            })

                        } else {
                            html = "<tr><td>no data yet</td></tr>";
                            totalPrice = 0;
                        }
                        $("#cartProducts tbody").html(html)

                        console.log(parseInt(totalPrice * 100))
                        $("#total-price").html(" ৳ " + (
                                totalPrice)
                            .toFixed(2));
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
            getCart();

            $(document).on('click', '.incrementer', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'cartItemIncrement/' + id,
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            getCart()
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })

            })
            $(document).on('click', '.decrementer', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: 'cartItemDecrement/' + id,
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            getCart()
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })

            })
        })
    </script>
@endpush
