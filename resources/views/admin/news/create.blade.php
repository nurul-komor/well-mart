@extends('admin.layouts.app-master')
@section('content')
    <!-- table 1 -->

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between">
                    <h6 class="dark:text-white">Create News</h6>

                    <div>
                        <a class="py-2 px-3 text-white rounded bg-blue-500" href="{{ route('admin.news.index') }}">All
                            Categoies</a>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-3 overflow-x-auto ">
                        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex  -mx-3 mb-6 px-4 gap-8">
                                <div class="basis-full md:basis-[50%]">
                                    <div class="relative mb-3" data-te-input-wrapper-init>
                                        {{-- <div class="w-72"> --}}
                                        <div class="relative h-10 w-full min-w-[200px]">
                                            <input
                                                class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                                placeholder=" " name="title" />
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-pink-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Title
                                            </label>

                                        </div>
                                        {{-- </div> --}}
                                        @error('title')
                                            <p class="text-red-400 my-3 py-3 text-sm">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class=" mb-3">
                                        <label for="newsCat" class="text-sm">Select categroy</label>
                                        <select data-te-select-init id="newsCat"
                                            class="w-full rounded-md outline-none border-white ring-1 ring-gray-200"
                                            name="category">
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class=" mb-3">
                                        <label for="newCat" class="text-sm">Tags</label>
                                        <select class="js-example-basic-multiple " name="tags[]" multiple="multiple">

                                        </select>
                                        @error('tags')
                                            <p class="text-red-400 my-3 py-3 text-sm">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>




                                    <div class="w-72 mb-3 mt-6">
                                        <label for="profileImage" class="text-sm">Select Image</label><br>
                                        <label for="profileImage"
                                            class="inline-block select-none items-center gap-3 rounded-full bg-blue-500 p-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer"
                                            type="button" data-ripple-light="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                                                </path>
                                            </svg>

                                        </label>

                                        <input type="file" name="image" id="profileImage" class="hidden">

                                        @error('image')
                                            <p class="text-red-400 my-3 py-3 text-sm">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="basis-full md:basis-[50%]">
                                    <div class="relative mb-3" data-te-input-wrapper-init>
                                        <div class=" w-full min-w-[200px]">
                                            <textarea
                                                class="peer h-full min-h-[100px] w-full  rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"
                                                name="description" placeholder=" "></textarea>
                                            <label
                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-pink-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                                Description
                                            </label>
                                        </div>
                                        @error('description')
                                            <p class="text-red-400 my-3 py-3 text-sm">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-7 px-4 ">
                                        <div class="inline-flex items-center">
                                            <div class="relative inline-block h-4 w-8 cursor-pointer rounded-full">
                                                <input id="switch-3" type="checkbox" name="status"
                                                    class="peer absolute h-4 w-8 cursor-pointer appearance-none rounded-full bg-gray-200 transition-colors duration-300 checked:bg-green-500 peer-checked:border-green-500 peer-checked:before:bg-green-500" />
                                                <label for="switch-3"
                                                    class="before:content[''] absolute top-2/4 -left-1 h-5 w-5 -translate-y-2/4 cursor-pointer rounded-full border border-blue-gray-100 bg-white shadow-md transition-all duration-300 before:absolute before:top-2/4 before:left-2/4 before:block before:h-10 before:w-10 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity hover:before:opacity-10 peer-checked:translate-x-full peer-checked:border-green-500 peer-checked:before:bg-green-500">
                                                    <div class="top-2/4 left-2/4 inline-block -translate-x-2/4 -translate-y-2/4 rounded-full p-5"
                                                        data-ripple-dark="true"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class=" middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none float-right"
                                        data-ripple-light="true">
                                        Create
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


@push('select2')
    <script>
        // select 2 js
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                width: "100%",
                height: "70px",
                tags: true,
                style: {
                    border: "1px solid red"
                },
                placeholder: {
                    id: '-1', // the value of the option
                    text: "Write and click on that text for custom option"
                }
            });
        });
    </script>
@endpush
