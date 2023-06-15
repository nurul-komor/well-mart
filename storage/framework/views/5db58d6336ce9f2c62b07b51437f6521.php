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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between flex-wrap">
                        <h5>
                            Create Products
                        </h5>
                        <a href="<?php echo e(route('seller.products.index')); ?>" class="btn btn-sm normal-case">All Product</a>
                    </div>
                    <form
                        action="<?php echo e(route('seller.products.update', [
                            'product' => $product->id,
                        ])); ?>"
                        method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="p-4 py-6">
                            <div class=" flex flex-wrap">
                                <div class="basis-full md:basis-[50%] px-4">
                                    <div class="relative mb-4">
                                        <label for="product-name"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Product
                                            Name</label>
                                        <input id="product-name"
                                            class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: blue t shirt" name="productName"
                                            value="<?php echo e($product->productName); ?>" />

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('productName'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('productName')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="category"
                                            class="block  text-sm font-medium text-gray-900 dark:text-white">Select an
                                            category</label>
                                        <select id="category"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-slate-500 focus:border-slate-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-slate-500 dark:focus:border-slate-500"
                                            name="category">
                                            <option selected value="">Choose a category</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($product->getCategory->id == $category->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e(__($category->id)); ?>">
                                                    <?php echo e(__($category->categoryName)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>


                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('category'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('category')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="file_input1"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Profile
                                            Photo 1
                                        </label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="file_input1" type="file" name="profile">

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('profile'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('profile')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="file_input2"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Profile
                                            Photo 2
                                            (Optional)
                                        </label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="file_input2" type="file" name="profile2">
                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('profile2'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('profile2')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="product-brand"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Brand
                                            (optional)</label>
                                        <input id="product-brand"
                                            class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: Bata" name="brand" value="<?php echo e($product->brands); ?>" />

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('brand'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('brand')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>


                                </div>
                                <div class="basis-full md:basis-[50%] px-4">
                                    <div class="relative mb-4">
                                        <label for="product-price"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Product
                                            Price ($)</label>
                                        <input id="product-price"
                                            class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: 99.99" name="productPrice" value="<?php echo e($product->price); ?>" />

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('productPrice'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('productPrice')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="quantity"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Quantity
                                            (pcs)</label>
                                        <input id="quantity"
                                            class="peer h-full w-full border-1 border-gray-300 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: 999" name="quantity" type="number" min="0"
                                            value="<?php echo e($product->quantity); ?>" />

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('quantity'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('quantity')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="options"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Options
                                            (eg:"M" for
                                            Shirt, 28 from Pant etc.)
                                        </label>
                                        <select name="options[]" multiple="multiple"
                                            class="js-example-basic-multiple peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm">

                                            <option value="" disabled>For cloths</option>
                                            <option
                                                <?php echo e(in_array('XS', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="XS">XS
                                            </option>
                                            <option
                                                <?php echo e(in_array('S', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="S">S</option>
                                            <option
                                                <?php echo e(in_array('M', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="M">M</option>
                                            <option
                                                <?php echo e(in_array('L', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="L">L</option>
                                            <option
                                                <?php echo e(in_array('XL', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="XL">XL</option>
                                            <option
                                                <?php echo e(in_array('XXL', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="XXL">XXL</option>
                                            <option
                                                <?php echo e(in_array('XXXL', json_decode($product->options)) ? 'selected' : ''); ?>

                                                value="XXXL">XXXL</option>

                                            <?php $__currentLoopData = json_decode($product->options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(
                                                    !(
                                                        $item == 'XS' ||
                                                        $item == 'S' ||
                                                        $item == 'M' ||
                                                        $item == 'L' ||
                                                        $item == 'XL' ||
                                                        $item == 'XXL' ||
                                                        $item == 'XXXL'
                                                    )): ?>
                                                    <option value="<?php echo e($item); ?>" selected><?php echo e($item); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('options'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('options')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>
                                    <div class="relative mb-4">
                                        <label for="colorInput"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Colors
                                        </label>
                                        <div id="colorContainer" class="opacity-0 "></div>
                                        <div id="colorPicker"></div>

                                        <label for="colorInput"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Selected
                                            Colors
                                        </label>
                                        <div class="flex flex-wrap" id="selectedColors">
                                            <?php
                                                $num = 0;
                                            ?>

                                            <?php if(json_decode($product->colors) != null): ?>
                                                <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="p-[3px] mr-5 grid place-items-center rounded-full  duration-150 cursor-pointer colorRemover hover:text-white"
                                                        id="color<?php echo e($num); ?>"
                                                        style="background: <?php echo e($color); ?>;"
                                                        data-id='<?php echo e($num); ?>'>
                                                        <span class="material-symbols-outlined">
                                                            close
                                                        </span>
                                                    </div>
                                                    <input type="hidden" id="colorInput<?php echo e($num++); ?>"
                                                        value="<?php echo e($color); ?>" name="colors[]">
                                                    <?php
                                                        $num++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                No color
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <div class="relative mb-4">
                                        <label for="discount"
                                            class="block text-sm font-medium text-gray-900 dark:text-white">Discount
                                            (%)</label>
                                        <input id="discount"
                                            class="peer h-full w-full border-1 border-gray-300 py-2 px-2 mt-1 rounded-md focus:ring-2 ring-slate-500 outline-none  placeholder:text-sm"
                                            placeholder="eg: 5" name="discount" type="number" min="0"
                                            max="100" value="<?php echo e($product->discount); ?>" />

                                        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('discount'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('discount')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                    </div>


                                </div>

                            </div>
                            <div class="px-4">
                                <div class="relative mb-4">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-900 dark:text-white">Description
                                    </label>
                                    <textarea
                                        class="peer h-full w-full border-2 py-2 px-2 mt-1 rounded-md focus:ring-1 ring-slate-500 outline-none  placeholder:text-sm border-gray-200"
                                        placeholder="type about this product" name="description" id="description" rows="12"><?php echo e(str_replace('<br />', '', $product->description)); ?></textarea>

                                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('description'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('description')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                </div>
                                <div class="mt-4 float-right block mb-4">
                                    <button type="submit" class="btn normal-case">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('dataTable'); ?>
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script>
            $(function() {
                $('table').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            })
            // select 2 js
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                    width: "100%",
                    tags: true,

                    placeholder: {
                        id: '-1', // the value of the option
                        text: "Write and click on that text for custom option"
                    }
                });
            });
            // Initialize the color picker
            const pickr = Pickr.create({
                el: '#colorPicker',
                theme: 'nano',
                swatches: [
                    '#ff0000', '#00ff00', '#0000ff', // Example swatch colors
                ],
                components: {
                    preview: true,
                    opacity: true,
                    hue: true,
                    interaction: {
                        hex: true,
                        rgba: true,
                        hsla: false,
                        hsva: false,
                        cmyk: true,
                        input: true,
                        clear: false,
                        save: true,
                    }
                }
            });
            let colorContainer = document.querySelector("#colorContainer");
            let selectedColors = document.querySelector("#selectedColors");
            let colors = [];

            let colorID = 0;
            let removeClass = () => {
                // remove colors
                let colorRemover = Array.from(document.querySelectorAll(".colorRemover"));

                colorRemover.map((remover) => {
                    remover.addEventListener("click", (e) => {

                        document.querySelector("#color" + remover.getAttribute("data-id")).style
                            .display = "none"
                        document.querySelector("#colorInput" + remover.getAttribute("data-id")).remove()
                    })
                })
            }
            removeClass()
            pickr.on('save', (...args) => {
                colorID++;
                let color = args[0].toHEXA().toString();
                colors.push(color)

                selectedColors.innerHTML = colors.map((color) => {
                    return `
                        <div class="p-[3px] mr-5 grid place-items-center rounded-full  duration-150 cursor-pointer colorRemover hover:text-white" id="color${colorID}" style="background: ${color};"  data-id='${colorID}'>
                        <span class="material-symbols-outlined">
                            close
                         </span>
                    </div>
                    `;
                })
                colorContainer.innerHTML = colors.map((color) => {
                    return `<input type="hidden" class="hidden" id="colorInput${colorID}" value="${color}" name="colors[]">`
                })
                removeClass()
            })
        </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035)): ?>
<?php $component = $__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035; ?>
<?php unset($__componentOriginal976d5c6377dcf4a1faf49ff9b4ac5035); ?>
<?php endif; ?>
<?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/seller/products/edit.blade.php ENDPATH**/ ?>