<!-- Navbar -->
<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Pages</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                    aria-current="page">{{ $pageTitle ?? '' }}</li>
            </ol>
            <h6 class="mb-0 font-bold text-white capitalize">{{ $pageTitle ?? '' }}</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                    <span
                        class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text"
                        class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                        placeholder="Type here..." />
                </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <!-- online builder btn  -->
                <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
                <li class="flex items-center">
                    <form action="{{ route('admin.logout') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand flex">
                            <div class="text-sm"><span class="material-symbols-outlined">
                                    logout
                                </span></div>
                            <div class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </li>
                <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                        sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        </div>
                    </a>
                </li>
                <li class="flex items-center px-4">
                    <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
                        <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
                        <!-- fixed-plugin-button-nav  -->
                    </a>
                </li>

                <!-- notifications -->

                <li class="relative flex items-center pr-2">
                    @if (auth()->guard('admin')->user()->unreadNotifications->count() > 0)
                        <span
                            class="absolute top-[8px] right-1 bg-green-500 p-[6px] rounded-full text-white text-[5px]"></span>
                    @endif
                    <p class="hidden transform-dropdown-show"></p>
                    <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                        dropdown-trigger aria-expanded="false">
                        <i class="cursor-pointer fa fa-bell"></i>
                    </a>

                    <ul dropdown-menu
                        class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        <!-- add show class on dropdown open js -->
                        {{-- {{ auth()->guard('admin')->user()->notifications }} --}}
                        @foreach (auth()->guard('admin')->user()->unreadNotifications as $notification)
                            <li class="relative mb-2">
                                <a class=" ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                    href="{{ route('notification.asRead', [
                                        'id' => $notification->id,
                                        'url' => $notification['data']['url'],
                                    ]) }}">
                                    <div class="flex py-1">
                                        <div class="my-auto">
                                            <img src="https://www.citypng.com/public/uploads/preview/blue-notification-bell-icon-png-img-11638985034lcbypudcig.png"
                                                class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 text-sm font-medium leading-normal  ">
                                                {{ $notification['data']['message'] }}</h6>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                <i class="mr-1 fa fa-clock"></i>
                                                {{ getDiff($notification['created_at']) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
