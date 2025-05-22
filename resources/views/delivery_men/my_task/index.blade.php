<x-delivery-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <span class=""> # SL</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Invoice Id</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Address</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">task status</span>
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
                                @foreach ($tasks as $task)
                                    <tr
                                        class="bg-white btask-b dark:bg-gray-800 dark:btask-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 ">
                                            {{ $i++ }}
                                        </td>
                                        <td class="px-6 py-4 ">
                                            #{{ $task->order->invoice }}
                                        </td>
                                        <td class="px-6 py-4 ">
                                            {{ $task->order->address }}
                                        </td>

                                        <td class="px-6 py-4 ">
                                            @if ($task->status == 1)
                                                <p>In Process</p>
                                            @elseif ($task->status == 2)
                                                <p>Completed</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <a href="{{ route('delivery_men.my_task.edit', ['id' => $task->id]) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
