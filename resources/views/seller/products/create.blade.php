<x-seller-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between flex-wrap">
                        <h5>
                            Create Products
                        </h5>
                        <a href="{{ route('seller.products.index') }}" class="btn btn-sm normal-case">All Product</a>
                    </div>
                    <form action="{{ route('seller.products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="p-4 py-6">
                            <div class=" flex flex-wrap">
                                <div class="basis-full md:basis-[50%] px-4">
                                    <div class="relative mb-4">
                                        <label for="product-name"
                                            class="block text-sm font-medium text-gray-900">Product
                                            Name</label>
                                        <input id="product-name"
                                            class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: blue t shirt" name="productName"
                                            value="{{ old('productName') }}" />

                                        <x-input-error :messages="$errors->get('productName')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="category"
                                            class="block  text-sm font-medium text-gray-900">Select an
                                            category</label>
                                        <select id="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5"
                                            name="category">
                                            <option selected value="">Choose a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ __($category->id) }}">
                                                    {{ __($category->categoryName) }}</option>
                                            @endforeach

                                        </select>


                                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="file_input1"
                                            class="block text-sm font-medium text-gray-900">Profile
                                            Photo 1
                                        </label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                            id="file_input1" type="file" name="profile">

                                        <x-input-error :messages="$errors->get('profile')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="file_input2"
                                            class="block text-sm font-medium text-gray-900">Profile
                                            Photo 2
                                            (Optional)
                                        </label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                            id="file_input2" type="file" name="profile2">
                                        <x-input-error :messages="$errors->get('profile2')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="var_image"
                                            class="block text-sm font-medium text-gray-900">VR Image
                                            (gtlf formate only)
                                        </label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                            id="var_image" type="file" name="vrImage">
                                        <x-input-error :messages="$errors->get('vrImage')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="product-brand"
                                            class="block text-sm font-medium text-gray-900">Brand
                                            (optional)</label>
                                        <input id="product-brand"
                                            class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: Bata" name="brand" value="{{ old('brand') }}" />

                                        <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                                    </div>


                                </div>
                                <div class="basis-full md:basis-[50%] px-4">
                                    <div class="relative mb-4">
                                        <label for="product-price"
                                            class="block text-sm font-medium text-gray-900">Product
                                            Price (৳)</label>
                                        <input id="product-price"
                                            class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: 99.99" name="productPrice"
                                            value="{{ old('productPrice') }}" />

                                        <x-input-error :messages="$errors->get('productPrice')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="quantity"
                                            class="block text-sm font-medium text-gray-900">Quantity
                                            (pcs)</label>
                                        <input id="quantity"
                                            class="peer h-full w-full border-1 border-gray-300 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: 999" name="quantity" type="number" min="0"
                                            value="{{ old('quantity') }}" />

                                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="options"
                                            class="block text-sm font-medium text-gray-900">Options
                                            (eg:"M" for
                                            Shirt, 28 from Pant etc.)
                                        </label>
                                        <select name="options[]" multiple="multiple"
                                            class="js-example-basic-multiple peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm">

                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <option value="XXXL">XXXL</option>


                                        </select>

                                        <x-input-error :messages="$errors->get('options')" class="mt-2" />
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="colorInput"
                                            class="block text-sm font-medium text-gray-900">Colors
                                        </label>
                                        <div id="colorContainer" class="opacity-0 "></div>
                                        <div id="colorPicker"></div>

                                        <label for="colorInput"
                                            class="block text-sm font-medium text-gray-900">Selected
                                            Colors
                                        </label>
                                        <div class="flex flex-wrap" id="selectedColors">
                                            {{-- <div
                                                class="p-[3px] bg-red-400 grid place-items-center rounded-full text-red-400 hover:text-white duration-150 cursor-pointer">
                                                <span class="material-symbols-outlined">
                                                    close
                                                </span>
                                            </div> --}}
                                        </div>

                                    </div>
                                    <div class="relative mb-4">
                                        <label for="discount"
                                            class="block text-sm font-medium text-gray-900">Discount
                                            (%)</label>
                                        <input id="discount"
                                            class="peer h-full w-full border-1 border-gray-300 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: 5" name="discount" type="number" min="0"
                                            max="100" value="{{ old('discount') }}" />

                                        <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                                    </div>


                                </div>

                            </div>
                            <div class="px-4">
                                <div class="relative mb-4">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-900">Description
                                    </label>
                                    <textarea
                                        class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-1 ring-slate-500 outline-none  placeholder:text-sm border-gray-200"
                                        placeholder="type about this product" name="description" id="description" rows="12">{{ old('description') }}</textarea>

                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                <div class="mt-4 float-right block mb-4">
                                    <button type="submit" class="btn normal-case">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('dataTable')
        {{-- select 2 js  --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(function() {
                $('table').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            })
            // select 2 js
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                    width: "100%",
                    tags: true,

                    placeholder: {
                        id: '-1', // the value of the option
                        text: "Write and click on that text for custom option"
                    }
                });
            });
            // Initialize the color picker
            const pickr = Pickr.create({
                el: '#colorPicker',
                theme: 'nano',
                swatches: [
                    '#ff0000', '#00ff00', '#0000ff', // Example swatch colors
                ],
                components: {
                    preview: true,
                    opacity: true,
                    hue: true,
                    interaction: {
                        hex: true,
                        rgba: true,
                        hsla: false,
                        hsva: false,
                        cmyk: true,
                        input: true,
                        clear: false,
                        save: true,
                    }
                }
            });
            let colorContainer = document.querySelector("#colorContainer");
            let selectedColors = document.querySelector("#selectedColors");
            let colors = [];

            let colorID = 0;
            pickr.on('save', (...args) => {
                colorID++;
                let color = args[0].toHEXA().toString();
                colors.push(color)

                selectedColors.innerHTML = colors.map((color) => {
                    return `
                        <div class="p-[3px] mr-5 grid place-items-center rounded-full  duration-150 cursor-pointer colorRemover hover:text-white" id="color${colorID}" style="background: ${color};"  data-id='${colorID}'>
                        <span class="material-symbols-outlined">
                            close
                         </span>
                    </div>
                    `;
                })
                colorContainer.innerHTML = colors.map((color) => {
                    return `<input type="hidden" id="colorInput${colorID}" value="${color}" name="colors[]">`
                })
                // remove colors
                let colorRemover = Array.from(document.querySelectorAll(".colorRemover"));

                colorRemover.map((remover) => {
                    remover.addEventListener("click", (e) => {
                        document.querySelector("#color" + remover.getAttribute("data-id")).style
                            .display = "none"
                        document.querySelector("#colorInput" + remover.getAttribute("data-id")).remove()
                    })
                })
            })
        </script>
    @endpush
</x-seller-app-layout>
