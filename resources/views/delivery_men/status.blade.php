<x-delivery-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Change Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-center">
                    <form action="{{ route('delivery_men.status.update', ['id' => $id]) }}" method="post">
                        @csrf
                        <select name="status" id="" class="input ring-1">
                            <option value="Available">AVAILABLE</option>
                            <option value="Busy">BUSY</option>
                        </select>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-sm">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-delivery-app-layout>
