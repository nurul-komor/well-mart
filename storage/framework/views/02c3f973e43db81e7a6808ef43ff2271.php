<?php $__env->startSection('main'); ?>
    
    <?php echo $__env->make('common.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ----------------------------------------------------------------------- -->
    <!--                             carousel start                              -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="head owl-carousel  relative">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="border-2 h-[80vh]  " style="background:url('<?php echo e(asset($item->image)); ?>') center;background-size:cover">
                <div class="max-w-[1200px] mx-auto flex items-center px-4 border-black h-[80vh]">
                    <div class="text-gray-800">
                        <h1 class="font-rozha font-thin text-4xl md:text-7xl md:max-w-lg text-limit wow fadeInDownBig">
                            <?php echo e($item->title); ?>

                        </h1>
                        <h6 class="my-5 font-montserrat font-medium text-limit wow fadeInRightBig"><?php echo $item->content; ?>

                        </h6>
                        <a href="<?php echo e(route('common.products')); ?>"
                            class="bg-commonPrimary hover:bg-[#16ac43] px-6 md:px-10 py-4 inline-block text-white rounded-md shadow font-montserrat text-sm cursor-pointer wow fadeInUpBig">Shop
                            now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!--                             carousel ends                              -->
    <!-- ----------------------------------------------------------------------- -->

    <!-- offer -->

    <div
        class="grid grid-flows-col grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 relative justify-between   font-montserrat border-b-2 p-4 lg:px-10   mb-[30px]  lg:mb-[60px]">
        <div class="flex flex-col md:flex-row  items-center py-1">
            <p class="text-3xl text-commonPrimary font-medium text-center px-4 py-3">
                <ion-icon name="rocket-outline"></ion-icon>
            </p>
            <p class="text-sm"><span class="font-bold font-poppins uppercase leading-tight">Free Delivery</span>
                <br>
                For all orders over 100$
            </p>
        </div>
        <div class="flex flex-col md:flex-row  items-center py-1">
            <p class="text-3xl text-commonPrimary font-medium text-center px-4 py-3">
                <ion-icon name="time-outline"></ion-icon>
            </p>
            <p class="text-sm"><span class="font-bold font-poppins uppercase leading-tight">90 Days Return</span>
                <br>
                If good have Problems
            </p>

        </div>
        <div class="flex flex-col md:flex-row  items-center py-1">
            <p class="text-3xl text-commonPrimary font-medium text-center px-4 py-3">
                <ion-icon name="card-outline"></ion-icon>
            </p>
            <p class="text-sm"><span class="font-bold font-poppins uppercase leading-tight">Secure Payment</span>
                <br>
                100% Secure Payment
            </p>
        </div>
        <div class="flex flex-col md:flex-row  items-center py-1">
            <p class="text-3xl text-commonPrimary font-medium text-center px-4 py-3">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </p>
            <p class="text-sm"><span class="font-bold font-poppins uppercase leading-tight">24/7 Support</span>
                <br>
                Dedicated Support
            </p>
        </div>
    </div>
    <!-- Offer end -->

    <!-- category -->

    <section class="category p-4 lg:px-10  mb-[30px]  lg:mb-[60px]">

        <div class="heading relative text-center my-3">
            <h2 class="font-rozha text-black font-medium">Shop By Category</h2>
            <p class="font-montserrat text-sm text-slate-700 font-medium">Visit us to see creative products</p>
        </div>

        <div
            class="grid grid-flow-row  grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 align-middle gap-2 px-5 py-5">
            <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="text-center font-montserrat">
                    <a href="<?php echo e(route('common.productsByCategory', [
                        'category' => $category->categoryName,
                    ])); ?>"
                        class="flex items-center justify-center ring-1 ring-gray-200 h-[200px] overflow-hidden relative cursor-pointer"
                        id="single-category">
                        <div id="img">
                            <img loading="lazy" src="<?php echo e(asset($category->profile)); ?>"
                                class="object-cover h-fit max-h-[180px]" alt="">
                        </div>
                        <span class="absolute  py-4 px-4 bg-commonPrimary text-white w-full left-0 font-medium text-sm">
                            <?php echo e($category->getProducts->where('status', 1)->count()); ?> Products
                        </span>
                    </a>
                    <a href="" class="my-3 inline-block hover:text-commonPrimary">
                        <h6 class="text-limit"><?php echo e($category->categoryName); ?></h6>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    <!-- offer banner -->
    


    <!-- del of the day -->
    

    
    <section class="products p-4 lg:px-10 mb-[30px]  lg:mb-[60px]">
        <div class="heading relative text-center my-3">
            <h2 class="font-rozha text-black font-medium">Latest Products</h2>
            <p class="font-montserrat text-sm text-slate-700 font-medium">Visit our shop to see amazing products</p>
        </div>

        

        <div class="mb-4 my-auto ">
            <ul class="flex flex-wrap items-center justify-center -mb-px text-sm font-montserrat text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <?php if($productCategories != null): ?>
                <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($item->getProducts->count()): ?>
                            <li class="mr-2 font-bold" role="presentation">
                                <button class="inline-block p-4" id="profile-tab"
                                    data-tabs-target="#<?php echo e(get_slug($item->categoryName)); ?>" type="button"
                                    role="tab" aria-controls="profile"
                                    aria-selected="false"><?php echo e($item->categoryName); ?></button>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </ul>
        </div>
        

        <?php echo $__env->make('common.components.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div id="myTabContent" class="md:max-w-[1300px] mx-auto">
            <?php if($productCategories != null): ?>
                <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hidden p-4 " id="<?php echo e(get_slug($item->categoryName)); ?>" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div
                            class="grid gird-flow-rows grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                            
                            <?php
                                $i = 0;
                            ?>
                            <?php $__currentLoopData = $item->getProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($product->status == 1 && $product->quantity > 0): ?>
                                    <?php
                                        $price = $product->price;
                                        $price = $product->discount == null || $product->discount > 0 ? $price * (100 - $product->discount) : $price;
                                    ?>
                                    <?php if($i < 10): ?>
                                        <a class="product-item relative p-4 lg:p-6 flex flex-col items-center "
                                            href="<?php echo e(route('common.singleProduct', [
                                                'code' => $product->product_code,
                                            ])); ?>">
                                            <div
                                                class="h-[200px] inline-block w-full cursor-zoom-in  bg-cover   bg-center duration-125">
                                                <img loading="lazy" src="<?php echo e(get_image_url($product->productImage)); ?>"
                                                    class="max-h-[200px] w-full object-contain" alt=""
                                                    loading="lazy">

                                            </div>
                                            <div class="label flex flex-col items-center">
                                                <small
                                                    class="font-montserrat text-gray-700 text-xs font-medium"><?php echo e($product->getCategory->categoryName); ?></small>
                                                <label for="product-modal" class="cursor-pointer">
                                                    <b class="text-sm py-2 hover:text-commonPrimary text-limit"><?php echo e($product->productName); ?>

                                                    </b>
                                                </label>
                                                <b class="text-sm text-commonPrimary font-montserrat">BDT
                                                    <?php echo e($price); ?>

                                                </b>
                                            </div>
                                            <button class="btn btn-sm  mt-3 normal-case font-montserrat"
                                                data-id="${product.id}">
                                                Add To Cart
                                            </button>
                                            <div class="absolute -right-5 icon-group">
                                                <div
                                                    class="flex flex-col p-2 text-slate-900 hover:bg-slate-900 rounded-full hover:text-white font-bolder border-2 border-slate-900 mb-2 icon">
                                                    <ion-icon name="heart-outline"></ion-icon>
                                                </div>
                                                <div
                                                    class="flex flex-col p-2 text-slate-900 hover:bg-slate-900 rounded-full hover:text-white font-bolder border-2 border-slate-900 mb-2 icon">
                                                    <ion-icon name="shuffle-outline"></ion-icon>
                                                </div>
                                                <div
                                                    class="flex flex-col p-2 text-slate-900 hover:bg-slate-900 rounded-full hover:text-white font-bolder border-2 border-slate-900 mb-2 icon">
                                                    <ion-icon name="eye-outline"></ion-icon>
                                                </div>
                                            </div>
                                        </a>
                                        <?php
                                            $i++;
                                        ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            
    </section>
    
    
    <section
        class="lg:pb-40 lg:pt-20 bg-[url('https://www.lafz.com/media/wysiwyg/who-we-are/banner.jpg')] bg-cover bg-no-repeat relative z-[5] before:content-[''] before:absolute before:w-full before:h-full before:left-0 before:top-0 before:bg-slate-700 before:opacity-[0.1] before:z-[-3]">
        <div class="p-6 lg:p-8 text-center z-10">
            <h3 class="font-rozha text-3xl font-medium">Enjoy this Eid</h3>
            <h2 class="font-rozha text-6xl text-commonPrimary font-medium">Eid Offer</h2>
            <p class="text-limit font-montserrat text-dark max-w-2xl mx-auto">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
                Lorem
                Ipsum passage, and going through
            </p>
            <a href="#"
                class="inline-block p-4 rounded-md text-sm  hover:bg-commonPrimaryDark bg-commonPrimary text-white font-montserrat">Expore
                Products</a>
        </div>
    </section>
    
    
    <section class="p-4 lg:px-10  lg:mt-[-80px] lg:mb-[60px]">
        <div class="p-8  owl-carousel partners bg-white z-10 shadow shadow-xl shadow-gray-200 ">
            <div class="item p-2 grid place-content-center"><img loading="lazy"
                    class="h-[50px] w-full object-contain grayscale hover:grayscale-0"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png"
                    alt="" loading="lazy"></div>
            <div class="item p-2"><img loading="lazy" class="h-[50px] w-full object-contain grayscale hover:grayscale-0"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png"
                    alt="" loading="lazy"></div>
            <div class="item p-2 grid place-content-center"><img loading="lazy"
                    class="h-[50px] w-full object-contain grayscale hover:grayscale-0"
                    src="https://logos-world.net/wp-content/uploads/2020/05/Huawei-Logo.jpg" alt=""
                    loading="lazy">
            </div>

        </div>
    </section>
    
    
    <section class="news-container p-4 lg:px-10 small-scrollbar">
        <div class="heading relative text-center my-3">
            <h2 class="font-rozha text-black ">Latest news</h2>
            <p class="font-montserrat text-sm text-slate-700 font-medium">Don't miss our latest update</p>
        </div>
        <div
            class="grid grid-flow-cols overflow-x-scroll md:overflow-x-auto grid-rows-1 grid-cols-3 mt-8 p-4 gap-4 owl-carousel news ">
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('common.news.singleNews', ['newsTitle' => $item->title])); ?>" class="single-news">
                    <div class=" h-[250px] w-full overflow-hidden bg-gray-400">
                        <img loading="lazy" src="<?php echo e(asset($item->image)); ?>" alt=""
                            class="object-cover h-full  duration-200 w-full" loading="lazy">
                    </div>
                    <div class="flex text-xs font-montserrat mb-2 mt-4 gap-6">
                        <p class="font-montserrat text-commonPrimary "><?php echo e($item->getCategory->name); ?></p>
                        <p
                            class="relative before:content-[''] before:absolute before:left-[-15px] before:inline-block before:bg-slate-700 before:h-1 before:w-1 before:rounded-full before:bottom-[45%] ">
                            <?php echo e(getDiff($item->created_at)); ?></p>
                        <p
                            class="relative before:content-[''] before:absolute before:left-[-15px] before:inline-block before:bg-slate-700 before:h-1 before:w-1 before:rounded-full before:bottom-[45%] ">
                            by
                            admin</p>
                    </div>
                    <h6 class="font-bold hover:text-commonPrimary text-limit"><?php echo e($item->title); ?></h6>
                    <p class="text-sm text-slate-700 font-montserrat text-limit">
                        <?php echo e($item->content); ?>

                    </p>
                    <p
                        class="text-sm font-bold text-commonPrimary  border-b-2 border-commonPrimary p-[0.1px] inline-block hover:text-commonPrimaryLight">
                        Read more
                    </p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </section>
    
    <?php echo $__env->make('common.components.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.components.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/komor/Documents/personal/well-mart/resources/views/common/index.blade.php ENDPATH**/ ?>