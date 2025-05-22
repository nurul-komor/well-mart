<?php $__env->startSection('main'); ?>
    <?php echo $__env->make('common.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('common.components.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="p-4 py-[60px] max-w-[1300px] mx-auto">
        <div class="flex font-montserrat gap-8">
            <div class="basis-[65%]">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col gap-y-4 mb-4">
                        <div class="image  ring-gray-200 w-full h-120">
                            <img src="<?php echo e(asset($item->image)); ?>" class="object-cover h-120 w-full" alt="new image">
                        </div>
                        <ul class="flex text-xs gap-3 items-center">
                            <li class="text-red-400"><?php echo e($item->getCategory->name); ?></li>
                            <li class="select-none">.</li>
                            <li><?php echo e(date('M d, Y')); ?></li>
                            <li class="select-none">.</li>
                            <li><span class="text-gray-400">by</span> admin</li>
                        </ul>
                        <h1 class="text-xl font-bold hover:text-red-500 duration-150 text-limit"><?php echo e($item->title); ?></h1>
                        <p class="text-sm font-medium text-slate-500 text-limit-4 inline-block"><?php echo e($item->content); ?></p>

                        <a href="<?php echo e(route('common.news.singleNews', [
                            'newsTitle' => $item->title,
                        ])); ?>"
                            class="text-red-400 hover:text-red-500 underline font-bold inline-block">Read
                            more</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($news->links()); ?>

            </div>
            <div class="basis-[35%] pl-8 py-4 ">
                <div class="flex flex-col gap-y-4 px-4">
                    <div>
                        <h5 class="font-bold border-b py-4">Latest News</h5>
                        <div class="flex flex-col gap-3  my-4">
                            <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('common.news.singleNews', ['newsTitle' => $item->title])); ?>"
                                    class="">
                                    <div class="grid grid-cols-3">
                                        <div class=" overflow-hidden"
                                            style="background:url(<?php echo e(asset($item->image)); ?>) no-repeat;background-size:cover;background-position:center">

                                        </div>
                                        <div class="col-span-2 px-3">
                                            <h6 class="inline-block text-limit text-gray-600 hover:text-red-400 font-bold">
                                                <?php echo e($item->title); ?>

                                            </h6>
                                            <small class="text-xs inline-block text-gray-500">
                                                <?php echo e(getDiff($item->created_at)); ?> - 3
                                                Comments</small>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="flex flex-col gap-y-4 px-4">
                        <div>
                            <h5 class="font-bold border-b py-4">News Catgoires</h5>
                            <ul>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class=" text-gray-500">
                                        <a href="#"
                                            class="text-gray-600 hover:text-red-400  text-sm flex items-center gap-2 font-medium">
                                            <span class="mt-1">
                                                <ion-icon name="folder-outline"></ion-icon>
                                            </span><?php echo e($item->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        
        <?php echo $__env->make('common.components.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('common.components.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ljyvglni/multiple-vendor.nurulkomor.xyz/resources/views/common/news/index.blade.php ENDPATH**/ ?>