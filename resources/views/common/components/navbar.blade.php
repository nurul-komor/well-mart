 @php
     
 @endphp
 {{-- drawer  --}}

 <header>
     <div id="welcome"
         class="hidden md:flex flex-col gap-2 md:flex-row justify-between items-center  py-1 border-b-2 px-5 z-50">
         <div id="welcome-text" class="text-gray-600 border-r-2 border-l-2 px-2 text-sm">
             Welcome to our shop
         </div>
         <div class="flex gap-6 flex-col md:flex-row items-center">
             <div>

                 @if (auth()->guard('delivery_men')->user() == null)
                     <a href="{{ route('delivery_men.login') }}"
                         class="hover:underline text-sm uppercase inline-block">Login as delivery man</a>
                 @else
                     <a href="{{ route('delivery_men.dashboard') }}"
                         class="hover:underline text-sm uppercase inline-block">Delivery Men Dashboard</a>
                 @endif
                 @if (auth()->guard('seller')->user() == null)
                     <a href="{{ route('seller.register') }}" class="hover:underline text-sm uppercase inline-block">Be a
                         seller</a>
                 @else
                     <a href="{{ route('seller.dashboard') }}"
                         class="hover:underline text-sm uppercase inline-block">Seller Dashboard</a>
                 @endif
                 @if (auth()->user() == null)
                     <a href="{{ route('login') }}" class="hover:underline text-sm uppercase inline-block ml-3">Sign
                         in</a>
                 @else
                     <form action="{{ route('logout') }}" method="post" class="inline-block">
                         @csrf<button type="sumbit" class="hover:underline text-sm uppercase  ml-3">Logout</button>
                     </form>
                 @endif

             </div>
             <div id=" " class="text-gray-600 border-r-2 border-l-2 px-2 flex items-center">

                 <a href="#" class="text-md px-2 hover:text-blue-400">
                     <ion-icon name="logo-facebook"></ion-icon>
                 </a>


                 <a href="#" class="text-md px-2 hover:text-blue-400">
                     <ion-icon name="logo-twitter"></ion-icon>
                 </a>


                 <a href="#" class="text-md px-2 hover:text-purple-500">
                     <ion-icon name="logo-instagram"></ion-icon>
                 </a>


                 <a href="#" class="text-md px-2 hover:text-red-500">
                     <ion-icon name="logo-pinterest"></ion-icon>
                 </a>

                 <a href="#" class="text-md px-2 hover:text-red-500">
                     <ion-icon name="logo-youtube"></ion-icon>
                 </a>

             </div>
         </div>
     </div>



     <div class="flex flex-col md:flex-row justify-between items-center py-1 px-5 border-b-2  ">
         <div class="flex items-center gap-2 ">
             <div href="#" class="text-4xl text-commonPrimary">
                 <ion-icon name="headset-outline"></ion-icon>
             </div>
             <div class="text-sm font-montserrat pl-2 pt-2">
                 <p>Call Us <br>
                     <span class="font-bold">01845785996</span>
                 </p>
             </div>
         </div>
         <div class="text-center ">
             <a href="{{ route('home') }}">
                 <h1 class="text-2xl md:text-3xl  font-logo">W-MART</h1>
             </a>
         </div>

         <div class="flex items-center gap-2 pt-2  right-0 pr-5">

             <a id
                 class="search-btn btn bg-white hover:bg-white text-slate-750 border-0 text-3xl font-bold px-2 hover:text-commonPrimary duration-75">
                 <ion-icon name="search-outline"></ion-icon>
                 <!--outline-->
             </a>
             <a href="{{ route('cart.index') }}" class="text-3xl font-bold px-2 hover:text-commonPrimary duration-75">
                 <div class="relative">
                     <ion-icon name="bag-handle-outline"></ion-icon>
                     <small
                         class="top-0 left-5 absolute  px-1 bg-green-400 border-2 border-white rounded-full text-xs text-white font-poppins">{{ collect(session('cart'))->count() }}</small>
                 </div>
             </a>
             {{-- <a href="" class="text-3xl font-bold px-2 hover:text-commonPrimary duration-75">
                 <ion-icon name="heart-outline"></ion-icon>
                 <!--outline-->
             </a> --}}

             <a href="{{ route('profile.edit') }}" class="text-3xl font-bold px-2 hover:text-commonPrimary duration-75">
                 <ion-icon name="person-circle-outline"></ion-icon>
             </a>
         </div>
     </div>
     <div id="common-navbar" data-wow-duration="2s">
         <div class="relative min-h-10 ">
             {{-- mobile nav starts  --}}

             <!-- drawer init and toggle -->
             <div class="absolute left-5 top-0 lg:hidden">
                 @if (Route::is('common.products') || Route::is('common.productsByCategory'))
                     <button
                         class="text-slate-400 text-2xl font-bold focus:ring-1 focus:ring-slate-300  rounded-lg px-5 py-2.5   focus:outline-none inline-block"
                         type="button" data-drawer-target="drawer-range" data-drawer-show="drawer-range"
                         aria-controls="drawer-range">
                         <ion-icon name="menu-outline"></ion-icon>
                     </button>
                     @include('common.components.drawer')
                 @endif
             </div>
             <div class="absolute right-5 top-0 md:hidden">
                 <div class="dropdown dropdown-end">
                     <label tabindex="0"
                         class=" text-slate-400 text-2xl font-bold focus:ring-1 focus:ring-slate-300  rounded-lg px-5 py-2.5   focus:outline-none inline-block ">
                         <ion-icon name="menu-outline"></ion-icon>
                     </label>
                     <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                         <li
                             class="py-3 px-3 md:px-4 hover:bg-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('home') ? 'bg-commonPrimary text-white' : '' }}">
                             <a href="{{ route('home') }}">Home</a>
                         </li>

                         <li
                             class="py-3 px-3 md:px-4 hover:bg-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.about') ? 'bg-commonPrimary text-white' : '' }}">
                             <a href="{{ route('common.about') }}">About</a>
                         </li>
                         <li
                             class="py-3 px-3 md:px-4 hover:bg-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.products') ? 'bg-commonPrimary text-white' : '' }}">
                             <a href="{{ route('common.products') }}">Products</a>
                         </li>
                         <li
                             class="py-3 px-3 md:px-4 hover:bg-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.news.index') ? 'bg-commonPrimary text-white' : '' }}">
                             <a href="{{ route('common.news.index') }}">News</a>
                         </li>
                         <li
                             class="py-3 px-3 md:px-4 hover:bg-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.contact') ? 'bg-commonPrimary text-white' : '' }}">
                             <a href="{{ route('common.contact') }}">Contact</a>
                         </li>

                         {{-- <li class="py-3 px-3 md:px-4 hover:bg-commonPrimary duration-150 font-[600] font-montserrat">
                             <a href="#">Pages</a>
                         </li> --}}

                     </ul>
                 </div>

             </div>
             {{-- mobile nav ends --}}
             <ul class="hidden md:grid grid-flow-col grid-rows-1 gap-2 place-content-center border-b-2 shadow-xl  ">
                 <li
                     class="py-3 md:px-4 hover:text-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('home') ? 'text-commonPrimary' : '' }}">
                     <a class="p-3" href="{{ route('home') }}">Home</a>
                 </li>

                 <li
                     class="py-3 md:px-4 hover:text-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.about') ? 'text-commonPrimary' : '' }}">
                     <a class="p-3" href="{{ route('common.about') }}">About</a>
                 </li>
                 <li
                     class="py-3 md:px-4 hover:text-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.products') ? 'text-commonPrimary' : '' }}">
                     <a class="p-3" href="{{ route('common.products') }}">Products</a>
                 </li>
                 <li
                     class="py-3 md:px-4 hover:text-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.news.index') ? 'text-commonPrimary' : '' }}">
                     <a class="p-3" href="{{ route('common.news.index') }}">News</a>
                 </li>
                 <li
                     class="py-3 md:px-4 hover:text-commonPrimary duration-150 font-[600] font-montserrat {{ Route::is('common.contact') ? 'text-commonPrimary' : '' }}">
                     <a class="p-3" href="{{ route('common.contact') }}">Contact</a>
                 </li>

                 {{-- <li class="py-3 px-3 md:px-4 hover:text-commonPrimary duration-150 font-[600] font-montserrat">
                 <a href="#">Pages</a>
             </li> --}}

             </ul>
         </div>
     </div>
 </header>


 @push('common-navbar')
     <script>
         const nav = document.querySelector("#common-navbar")

         function stickyNav() {
             if (window.pageYOffset > 320 || window.scrollY > 320) {
                 nav.classList.add("fixed", 'top-0', 'w-full', 'left-0', 'z-100', 'bg-white', 'duration-125')
             } else {
                 nav.classList.remove("fixed", 'top-0', 'w-full', 'left-0', 'z-100', 'bg-white', 'duration-125')
             }
         }

         window.addEventListener('scroll', function() {
             stickyNav()
         })

         stickyNav()
     </script>
 @endpush
