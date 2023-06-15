<div class="w-full">
    <h5 class="border-b-2 py-4 font-bold">Product categoires</h5>
    <ul class="text-sm text-gray-600 font-medium px-2">
        <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($cat->status == 1): ?>
                <li class="hover:text-red-400"><a
                        href="<?php echo e(route('common.productsByCategory', [
                            'category' => $cat->categoryName,
                        ])); ?>"><?php echo e($cat->categoryName); ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
    <h5 class="border-b-2 py-4 font-bold mt-4">Filter by price</h5>
    <div class="mt-5">
        <div class="range-slider">
            <span class="range-selected"></span>
        </div>
        <div class="range-input">
            <input type="range" class="min" min="0" max="300000" value="0" step="20">
            <input type="range" class="max" min="0" max="300000" value="300000" step="20">
        </div>
        <div class="range-price">
            <label for="min">Min</label>
            <input type="number" name="min" max="300000" min="0" value="0" class="min">
            <label for="max">Max</label>
            <input type="number" name="max" max="300000" min="0" value="300000" class="max">
        </div>

        <button
            class="py-2 px-3 mt-2 text-red-400 focus:ring-1 focus:ring-offset-2 border-2 border-red-400 ring-red-400 hover:bg-red-400 duration-250 hover:text-white font-medium font-montserrat  text-sm rounded-md rangeClear">Clear
            range</button>
    </div>
</div>
<?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/common/components/md-sidebar.blade.php ENDPATH**/ ?>