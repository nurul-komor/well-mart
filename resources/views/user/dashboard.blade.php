<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only"> # SL</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only"> Products</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Order status</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only"> Payment Method</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only"> Price</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr
                                        class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            @foreach (json_decode($order->products) as $item)
                                                <div class="capitalize flex items-center gap-3">
                                                    <img src="{{ asset($item->image ?? "") }}" alt=""
                                                        class="max-h-[100px] w-full object-contain">
                                                        {{ ($item->quantity ?? 0) . ' pcs ' . ($item->name ?? 'n/a') }}

                                                </div>
                                            @endforeach
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $order->status }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $order->payment }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="max-w-[400px]">
                                                {{ $order->address }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="font-bold">BDT </span>{{ $order->amount }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <div class="float-right">
                                {{ $orders->links() }}
                            </div>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
