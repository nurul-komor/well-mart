<?php $__env->startSection('main'); ?>
    <?php echo $__env->make('common.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('common.components.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-5 flex p-4 md:p-10 mx-auto justify-center">
        <section class="  min-h-screen basis-[25%] p-4 font-montserrat hidden lg:block">
            <?php echo $__env->make('common.components.md-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
        <div class="basis-full lg:basis-[75%] p-4">
            <div class="flex justify-between items-center mb-4">
                
                <select class="p-2 ring-1 ring-slate-500 bg-white w-full max-w-[180px] " id="sortingOptions">
                    <option selected value="">Defult Sorting</option>
                    <option value="popularity">Polularity</option>
                    <option value="priceLowToHigh">Price low to high</option>
                    <option value="priceHighToLow">Price high to low</option>
                </select>
            </div>
            <div class="grid gird-flow-rows grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5"
                id="productsContainer">
                
                <?php for($i = 0; $i <= 10; $i++): ?>
                    
                    <a class="product-item relative p-4 lg:p-6 flex flex-col items-center "
                        href="<?php echo e(route('common.singleProduct', [
                            'code' => 'test',
                        ])); ?>">
                        <img src="https://icon-library.com/images/ajax-loading-icon/ajax-loading-icon-17.jpg" alt=""
                            class="object-cover opacity-[0.5]">
                    </a>
                    
                <?php endfor; ?>

            </div>
        </div>
    </section>
    
    <?php echo $__env->make('common.components.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('rangejs'); ?>
    <script src="<?php echo e(asset('common/js/rangebar.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('productsAjax'); ?>
    <script>
        let appUrl = $("meta[name='app-url']").attr('content');

        let productContainer = $("#productsContainer")

        function getProducts(selctor, min, max) {
            $.ajax({
                url: "/api/products/" + selctor + "/" + min + "/" + max + "/<?php echo e($category); ?>",
                method: "GET",
                dataType: "json",
                success: function(data, index) {

                    let products = [];

                    $.each(data.data, function(index, product) {
                        let productName = product.productName
                        let price = product.price
                        if (product.discount != "") {
                            price = product.price * (100 - product.discount) / 100;
                        }
                        products += `
                         <a class="product-item relative p-4 lg:p-6 flex flex-col items-center "
                        href="/products/singleProduct/${product.product_code}">
                        <div
                            class="h-[200px] inline-block w-full cursor-zoom-in  bg-cover   bg-center duration-125">
                             <img src="${appUrl}/${product.productImage}"
                          class="max-h-[200px] w-full object-contain" alt="" loading="lazy">

                        </div>
                        <div class="label flex flex-col items-center">
                            <small class="font-montserrat text-gray-700 text-xs font-medium">${product.get_category
.categoryName}</small>
                            <label for="product-modal" class="cursor-pointer">
                                <b class="text-sm py-2 hover:text-commonPrimary text-limit">${product.productName}</b>
                            </label>
                            <b class="text-sm text-commonPrimary font-montserrat">BDT ${price} </b>
                        </div>
                        <button class="btn btn-sm  mt-3 normal-case font-montserrat" data-id="${product.id}">
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

                        `
                    })
                    productContainer.html(products)
                },
                error: function(res, err) {
                    console.log(res)
                }
            })
        }
        let min = localStorage.minPrice;
        let max = localStorage.maxPrice;
        getProducts(null, min, max)
        let shortingValue = $("#sortingOptions")
        shortingValue.on("change", function() {
            let min = localStorage.minPrice;
            let max = localStorage.maxPrice;
            getProducts($(this).val(), min, max)

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('common.components.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/common/productsByCategory.blade.php ENDPATH**/ ?>