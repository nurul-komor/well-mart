<input type="checkbox" id="product-modal" class="modal-toggle" />
<label class="modal" for="">
    <div class="modal-box relative w-11/12 max-w-5xl">
        <label for="product-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <div class="flex flex-col items-center md:flex-row">
            <div class="basis-full md:basis-[50%] h-[70vh]">
                <div class="owl-carousel product-modal w-full max-w-[400px]">
                    <div class="item">
                        <img src="https://www.pngplay.com/wp-content/uploads/2/Perfume-Transparent-PNG.png"
                            class="object-cover max-h-[500px]" alt="">
                    </div>
                    <div class="item">
                        <img src="https://www.pngplay.com/wp-content/uploads/2/Perfume-Transparent-PNG.png"
                            class="object-cover max-h-[500px]" alt="">
                    </div>
                </div>
            </div>
            <div class="basis-full md:basis-[50%] font-montserrat">
                <h3 class="">Product Name</h3>
                <h4 class="  mt-3 mb-2 inline-block">$ 100.00 </h4>
                <h6><span class="text-red-500 line-through mb-2">$ 120.00</span></h6>
                <p class="text-sm text-gray-600 inline-block">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A perferendis, fuga autem, est impedit
                    illo veritatis ipsa blanditiis hic expedita iure sint sit modi praesentium cum veniam dolores
                    explicabo dignissimos velit minima repellendus cumque aut. Vitae illo maxime ab reprehenderit
                    explicabo? Dicta autem sed perferendis rem ipsam quisquam provident unde!
                </p>

                <h6>Options</h6>
                <div class="flex w-full space-x-2 py-2 border-b border-gray-200">
                    <div>
                        <label for="option1">
                            <p class="px-2 py-1 rounded-sm mr-2 ring-1 ring-slate-400 inline-block cursor-pointer">
                                XL</p>
                        </label>
                        <input type="radio" name="option" id="option1" class="hidden">
                    </div>
                    <div>
                        <label for="option2">
                            <p class="px-2 py-1 rounded-sm mr-2 ring-1 ring-slate-400 inline-block cursor-pointer">
                                L</p>
                        </label>
                        <input type="radio" name="option" id="option2" class="hidden">
                    </div>
                </div>
                <h6>Colors </h6>
                <div class="flex">
                    <div>
                        <label for="color1">
                            <p><span
                                    style="background: red;padding:5px;border-radius:50%;width:20px;height:20px;display:inline-block;margin-right:5px;"></span>
                            </p>
                        </label>
                        <input type="radio" name="color" id="color1">
                    </div>
                    <div>
                        <label for="color2">
                            <p><span
                                    style="background: blue;padding:5px;border-radius:50%;width:20px;height:20px;display:inline-block;margin-right:5px;"></span>
                            </p>
                        </label>
                        <input type="radio" name="color" id="color2">
                    </div>
                </div>
                <form action="#">
                    <div class="flex w-full flex-col md:flex-row mt-4">
                        <div class="basis-full md:basis-[50%] p-4">
                            <input type="number" name="" id="" class="w-full input ring-1"
                                value="1" max="5" min="1">
                        </div>
                        <div class="basis-full md:basis-[50%] p-4">
                            <button class="btn" type="button">Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</label>
<?php /**PATH /home/komor/Documents/personal/well-mart/resources/views/common/components/modal.blade.php ENDPATH**/ ?>