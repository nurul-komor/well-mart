<?php if (isset($component)) { $__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035 = $component; } ?>
<?php $component = App\View\Components\SellerAppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('seller-app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SellerAppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__(' Products')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="fixed bottom-5 right-5 z-50">
        <?php if(session('success')): ?>
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal"><?php echo e(session('success')); ?></div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
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
        <?php endif; ?>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between flex-wrap">
                        <h5>
                            Products
                        </h5>
                        <a href="<?php echo e(route('seller.products.create')); ?>" class="btn btn-sm normal-case">Add Product</a>
                    </div>
                    <div class="p-4 py-6">

                        <div class="relative sm:rounded-lg">
                            <table class="w-full overflow-x-auto text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    <?php
                                        $i = 1;
                                    ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr
                                            class="bg-white border-b-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($i++); ?>

                                            </th>
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php if($product->status == 1): ?>
                                                    <p
                                                        class="p-1 text-white text-sm font-medium bg-green-300 text-center rounded">
                                                        Active
                                                    </p>
                                                <?php elseif($product->status == 0): ?>
                                                    <p
                                                        class="p-1 text-white text-sm font-medium bg-yellow-300 text-center rounded">
                                                        Inactive
                                                    </p>
                                                <?php else: ?>
                                                    <p
                                                        class="p-1 text-white text-sm font-medium bg-blue-300 text-center rounded">
                                                        Pending
                                                    </p>
                                                <?php endif; ?>
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($product->productName); ?>

                                            </th>
                                            <th scope="row"
                                                class="px-6 py-8 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php echo e($product->quantity); ?>

                                            </th>

                                            <td class="px-6 py-8">
                                                <?php echo e($product->getCategory->categoryName); ?>

                                            </td>
                                            <td class="px-6 py-8">
                                                ৳ <?php echo e(($product->price / 100) * (100 - $product->discount)); ?>

                                                <?php if($product->discount > 0): ?>
                                                    <span
                                                        class="line-through text-red-400 text-sm mr-1"><?php echo e($product->price); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-8">
                                                <?php echo e($product->discount . '% off'); ?>

                                            </td>

                                            <td class="px-6 py-8 flex">
                                                <?php if($product->colors != 'null'): ?>
                                                    <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p><span
                                                                style="background: <?php echo e(str_replace('`', '', $item)); ?>;padding:5px;border-radius:50%;width:20px;height:20px;display:inline-block;margin-right:5px;"></span>
                                                        </p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    nothing
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-8">
                                                <div class="flex flex-wrap gap-5">
                                                    <img class="h-[120px] w-full"
                                                        src="<?php echo e(asset($product->productImage)); ?>"
                                                        alt="image not found">
                                                    <img class="h-[120px] w-full"
                                                        src="<?php echo e(asset($product->productImage2)); ?>"
                                                        alt="image not selected or not found">
                                                </div>
                                            </td>
                                            <td class="px-6 py-8 ">
                                                <?php if(json_decode($product->options) != null): ?>
                                                    <?php $__currentLoopData = json_decode($product->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p
                                                            class="px-2 py-1 rounded-sm mr-2 ring-1 ring-slate-400 inline-block">
                                                            <?php echo e($item); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    Nothing to show
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-8 min-w-[350px]">
                                                <?php echo $product->description; ?>

                                            </td>
                                            <td class="px-6 py-8 text-right ">
                                                <div class="flex flex-wrap gap-3">
                                                    <a href="<?php echo e(route('seller.products.edit', [
                                                        'product' => $product->id,
                                                    ])); ?>"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                                                    <form
                                                        action="<?php echo e(route('seller.products.destroy', [
                                                            'product' => $product->id,
                                                        ])); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            onclick="return confirm('do you want to delete this product?')"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('dataTable'); ?>
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
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035)): ?>
<?php $component = $__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035; ?>
<?php unset($__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035); ?>
<?php endif; ?>
<?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/seller/products/index.blade.php ENDPATH**/ ?>