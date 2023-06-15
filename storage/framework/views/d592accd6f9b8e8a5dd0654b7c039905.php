<?php if (isset($component)) { $__componentOriginal604a4049b5e683e9a575ce9068154a98 = $component; } ?>
<?php $component = App\View\Components\DeliveryAppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delivery-app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DeliveryAppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('All Task')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        <span class=""> # SL</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Address</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Products</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Order status</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 ">
                                            <?php echo e($i++); ?>

                                        </td>
                                        <td class="px-6 py-4 ">
                                            <?php echo e($order->address); ?>

                                        </td>
                                        <td class="px-6 py-4 ">

                                            <div class="flex flex-wrap gap-3">
                                                <?php if(json_decode($order->products) != null): ?>
                                                    <?php $__currentLoopData = json_decode($order->products); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="ring-1 rounded  p-1"><?php echo e($item->quantity); ?>

                                                            (pcs)
                                                            <?php echo e($item->name); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <?php echo e($order->status); ?>

                                        </td>
                                        <td class="px-6 py-4 ">
                                            <a href="<?php echo e(route('delivery_men.task.edit', ['orderId' => $order->id])); ?>"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
<?php if (isset($__componentOriginal604a4049b5e683e9a575ce9068154a98)): ?>
<?php $component = $__componentOriginal604a4049b5e683e9a575ce9068154a98; ?>
<?php unset($__componentOriginal604a4049b5e683e9a575ce9068154a98); ?>
<?php endif; ?>
<?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/delivery_men/dashboard.blade.php ENDPATH**/ ?>