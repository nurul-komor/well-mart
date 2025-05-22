@extends('admin.layouts.app-master')
@section('content')
    <!-- table 1 -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between">
                    <h6 class="">Edit Category</h6>

                    <div>
                        <a class="py-2 px-3 text-white rounded bg-blue-500"
                            href="{{ route('admin.news_category.index') }}">Edit Category</a>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-3 overflow-x-auto ">
                        <form action="{{ route('admin.news_category.update', ['news_category' => $category->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6 px-4">
                                <div class="basis-full ">
                                    <div class="w-72 mb-2">
                                        <div class="relative h-10 w-full min-w-[200px]">
                                            <input
                                                class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                placeholder=" " name="name" value="{{ $category->name }}" />

                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Category name
                                            </label>

                                        </div>
                                        @error('name')
                                            <p class="text-red-400 my-3 py-3 ">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-7 px-4 ">
                                        <div class="inline-flex items-center">
                                            <div class="relative inline-block h-4 w-8 cursor-pointer rounded-full">
                                                <input id="switch-3" type="checkbox" name="status"
                                                    class="peer absolute h-4 w-8 cursor-pointer appearance-none rounded-full bg-gray-200 transition-colors duration-300 checked:bg-green-500 peer-checked:border-green-500 peer-checked:before:bg-green-500"
                                                    @if ($category->status == 1) {{ 'checked' }} @endif />
                                                <label for="switch-3"
                                                    class="before:content[''] absolute top-2/4 -left-1 h-5 w-5 -translate-y-2/4 cursor-pointer rounded-full border border-blue-gray-100 bg-white shadow-md transition-all duration-300 before:absolute before:top-2/4 before:left-2/4 before:block before:h-10 before:w-10 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 peer-checked:translate-x-full peer-checked:border-green-500 peer-checked:before:bg-green-500">
                                                    <div class="top-2/4 left-2/4 inline-block -translate-x-2/4 -translate-y-2/4 rounded-full p-5"
                                                        data-ripple-dark="true"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class=" middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        data-ripple-light="true">
                                        Update
                                    </button>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
