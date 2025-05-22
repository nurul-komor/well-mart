<x-delivery-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Task') }}
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
                                        <span class=""> # SL</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Address</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Products</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Order status</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($orders as $order)
                                    <tr
                                        class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 ">
                                            {{ $i++ }}
                                        </td>
                                        <td class="px-6 py-4 ">
                                            {{ $order->address }}
                                        </td>
                                        <td class="px-6 py-4 ">

                                            <div class="flex flex-wrap gap-3">
                                                @if (json_decode($order->products) != null)
                                                    @foreach (json_decode($order->products) as $item)
                                                        <p class="ring-1 rounded  p-1">{{ $item->quantity }}
                                                            (pcs)
                                                            {{ $item->name }}</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            {{ $order->status }}
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <a href="{{ route('delivery_men.task.edit', ['orderId' => $order->id]) }}"
                                                class="font-medium text-blue-600 hover:underline">Edit</a>
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
    @push('dataTable')
        <script>
            $(function() {
                $('table').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            })
            $('table tr th').addClass("ring-1 ring-gray-50")
            $('table tr td').addClass("ring-1 ring-gray-50")
        </script>
    @endpush
</x-delivery-app-layout>
