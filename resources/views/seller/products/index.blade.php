<x-seller-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Products') }}
        </h2>
    </x-slot>
    <div class="fixed bottom-5 right-5 z-50">
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between flex-wrap">
                        <h5>
                            Products
                        </h5>
                        <a href="{{ route('seller.products.create') }}" class="btn btn-sm normal-case">Add Product</a>
                    </div>
                    <div class="p-4 py-6">

                        <div class="relative sm:rounded-lg">
                            <table class="w-full overflow-x-auto text-sm text-left text-gray-500">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Quantity left
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Category
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Discount
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Color
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Images
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Options
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Desciption
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr
                                            class="bg-white border-b-2 hover:bg-gray-50">
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $i++ }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap">
                                                @if ($product->status == 1)
                                                    <p
                                                        class="p-1 text-white text-sm font-medium bg-green-300 text-center rounded">
                                                        Active
                                                    </p>
                                                @elseif($product->status == 0)
                                                    <p
                                                        class="p-1 text-white text-sm font-medium bg-yellow-300 text-center rounded">
                                                        Inactive
                                                    </p>
                                                @else
                                                    <p
                                                        class="p-1 text-white text-sm font-medium bg-blue-300 text-center rounded">
                                                        Pending
                                                    </p>
                                                @endif
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $product->productName }}
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $product->quantity }}
                                            </th>

                                            <td class="px-6 py-8">
                                                {{ $product->getCategory->categoryName }}
                                            </td>
                                            <td class="px-6 py-8">
                                                ৳ {{ ($product->price / 100) * (100 - $product->discount) }}
                                                @if ($product->discount > 0)
                                                    <span
                                                        class="line-through text-red-400 text-sm mr-1">{{ $product->price }}</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-8">
                                                {{ $product->discount . '% off' }}
                                            </td>

                                            <td class="px-6 py-8 flex">
                                                @if ($product->colors != 'null')
                                                    @foreach (json_decode($product->colors) as $item)
                                                        <p><span
                                                                style="background: {{ str_replace('`', '', $item) }};padding:5px;border-radius:50%;width:20px;height:20px;display:inline-block;margin-right:5px;"></span>
                                                        </p>
                                                    @endforeach
                                                @else
                                                    nothing
                                                @endif
                                            </td>
                                            <td class="px-6 py-8">
                                                <div class="flex flex-wrap gap-5">
                                                    <img class="h-[120px] w-full"
                                                        src="{{ asset($product->productImage) }}"
                                                        alt="image not found">
                                                    <img class="h-[120px] w-full"
                                                        src="{{ asset($product->productImage2) }}"
                                                        alt="image not selected or not found">
                                                </div>
                                            </td>
                                            <td class="px-6 py-8 ">
                                                @if (json_decode($product->options) != null)
                                                    @foreach (json_decode($product->options) as $item)
                                                        <p
                                                            class="px-2 py-1 rounded-sm mr-2 ring-1 ring-slate-400 inline-block">
                                                            {{ $item }}</p>
                                                    @endforeach
                                                @else
                                                    Nothing to show
                                                @endif
                                            </td>
                                            <td class="px-6 py-8 min-w-[350px]">
                                                {!! $product->description !!}
                                            </td>
                                            <td class="px-6 py-8 text-right ">
                                                <div class="flex flex-wrap gap-3">
                                                    <a href="{{ route('seller.products.edit', [
                                                        'product' => $product->id,
                                                    ]) }}"
                                                        class="font-medium text-blue-600 hover:underline">Edit</a>

                                                    <form
                                                        action="{{ route('seller.products.destroy', [
                                                            'product' => $product->id,
                                                        ]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('do you want to delete this product?')"
                                                            class="font-medium text-blue-600 hover:underline">Delete</button>
                                                    </form>

                                                </div>
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
</x-seller-app-layout>
