@extends('common.components.master')
@section('main')
    @include('common.components.navbar')
    @include('common.components.topbar')
    <div class="p-4 py-[60px] max-w-[1300px] mx-auto">
        <div class="flex font-montserrat gap-8">
            <div class="basis-[65%]">
                @foreach ($news as $item)
                    <div class="flex flex-col gap-y-4 mb-4">
                        <div class="image  ring-gray-200 w-full h-120">
                            <img src="{{ asset($item->image) }}" class="object-cover h-120 w-full" alt="new image">
                        </div>
                        <ul class="flex text-xs gap-3 items-center">
                            <li class="text-red-400">{{ $item->getCategory->name }}</li>
                            <li class="select-none">.</li>
                            <li>{{ date('M d, Y') }}</li>
                            <li class="select-none">.</li>
                            <li><span class="text-gray-400">by</span> admin</li>
                        </ul>
                        <h1 class="text-xl font-bold hover:text-red-500 duration-150 text-limit">{{ $item->title }}</h1>
                        <p class="text-sm font-medium text-slate-500 text-limit-4 inline-block">{{ $item->content }}</p>

                        <a href="{{ route('common.news.singleNews', [
                            'newsTitle' => $item->title,
                        ]) }}"
                            class="text-red-400 hover:text-red-500 underline font-bold inline-block">Read
                            more</a>
                    </div>
                @endforeach
                {{ $news->links() }}
            </div>
            <div class="basis-[35%] pl-8 py-4 ">
                <div class="flex flex-col gap-y-4 px-4">
                    <div>
                        <h5 class="font-bold border-b py-4">Latest News</h5>
                        <div class="flex flex-col gap-3  my-4">
                            @foreach ($latestNews as $item)
                                <a href="{{ route('common.news.singleNews', ['newsTitle' => $item->title]) }}"
                                    class="">
                                    <div class="grid grid-cols-3">
                                        <div class=" overflow-hidden"
                                            style="background:url({{ asset($item->image) }}) no-repeat;background-size:cover;background-position:center">

                                        </div>
                                        <div class="col-span-2 px-3">
                                            <h6 class="inline-block text-limit text-gray-600 hover:text-red-400 font-bold">
                                                {{ $item->title }}
                                            </h6>
                                            <small class="text-xs inline-block text-gray-500">
                                                {{ getDiff($item->created_at) }} - 3
                                                Comments</small>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4 px-4">
                        <div>
                            <h5 class="font-bold border-b py-4">News Catgoires</h5>
                            <ul>
                                @foreach ($categories as $item)
                                    <li class=" text-gray-500">
                                        <a href="#"
                                            class="text-gray-600 hover:text-red-400  text-sm flex items-center gap-2 font-medium">
                                            <span class="mt-1">
                                                <ion-icon name="folder-outline"></ion-icon>
                                            </span>{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        {{-- bottom  --}}
        @include('common.components.bottom')
    @endsection
