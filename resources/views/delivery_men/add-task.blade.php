<x-delivery-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Accept Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center flex-col">
                    @if (session()->has('message'))
                        <div class="my-2 text-green-400">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div>
                        <form action="{{ route('delivery_men.task.update', ['orderId' => $order_id]) }}" method="post">
                            @csrf
                            <select name="status" id="" class="input ring-1">
                                <option value="Accept">Accept</option>
                            </select>
                            <br>
                            <br>

                            <button type="submit" class="btn btn-sm">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-delivery-app-layout>
