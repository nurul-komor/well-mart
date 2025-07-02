<div class="absolute w-full bg-blue-500 min-h-75"></div>
<!-- sidenav  -->
<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-[880] xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false" id="sidebar">

    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
            href="<?php echo e(route('admin.dashboard')); ?>" target="_blank">
            <img src="<?php echo e(config('app.logo')); ?>"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                alt="main_logo" />
            <img src="<?php echo e(config('app.logo')); ?>"
                class="hidden h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand"><?php echo e(config('app.name')); ?></span>
        </a>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen min-h-screen overflow-auto  grow basis-full" id="sidebar">


        <ul class="flex flex-col pl-0 mb-0">


            <li class="mt-0.5 w-full">
                <a class="py-2.7 <?php echo e(Route::is('admin.dashboard') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4  text-slate-700 transition-colors "
                    href="<?php echo e(route('admin.dashboard')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <span class="text-blue-500">
                            <span class="material-symbols-outlined">
                                computer
                            </span>
                        </span>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.orders.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.orders.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-orange-500">
                        <span class="">
                            <span class="material-symbols-outlined">
                                shopping_cart
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Orders</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.contact.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.contact.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-orange-500">
                        <span class="">
                            <span class="material-symbols-outlined">
                                forum
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Message</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.customer.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.customer.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-amber-500">
                        <span class="">
                            <span class="material-symbols-outlined">
                                groups
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Customers</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.delivery_men.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.delivery_men.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-amber-500">
                        <span class="">
                            <span class="material-symbols-outlined">
                                local_shipping
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Delivery Men</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.seller.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.seller.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-purple-500">
                        <span class="text-md">
                            <span class="material-symbols-outlined">
                                badge
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sellers</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.product_categories.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.product_categories.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-orange-500">
                        <span class="text-md">
                            <span class="material-symbols-outlined">
                                inventory_2
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Product Categories</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.products.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.products.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-orange-500">
                        <span class="text-md">
                            <span class="material-symbols-outlined">
                                apps
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Proudcts</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.news_category.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.news_category.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-orange-500">
                        <span class="text-md">
                            <span class="material-symbols-outlined">
                                feed
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">News Categories</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="<?php echo e(Route::is('admin.news.index') == true ? 'bg-blue-500/13 font-semibold' : ''); ?> py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg"
                    href="<?php echo e(route('admin.news.index')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 text-orange-500">
                        <span class="text-md">
                            <span class="material-symbols-outlined">
                                newspaper
                            </span>
                        </span>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">News</span>
                </a>
            </li>

            

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account pages
                </h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="<?php echo e(route('admin.profile.edit')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                        </i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>

            

            <li class="mt-0.5 w-full">
                <a class=" py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="<?php echo e(route('admin.register')); ?>">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500"><span
                                class="material-symbols-outlined">
                                person_add
                            </span></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Create admin</span>
                </a>
            </li>
        </ul>
    </div>


</aside>
<?php /**PATH /home/komor/Documents/personal/well-mart/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>