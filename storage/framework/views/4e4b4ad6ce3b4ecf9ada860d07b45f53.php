<section class="h-[100px] md:h-[200px] border-2 w-full bg-dark grid place-content-center text-center">
    <h3 class="font-montserrat text-white"><?php echo e($title); ?></h3>
    <small class="text-white font-montserrat">
        <ion-icon name="home-outline"></ion-icon> <?php echo e(' '); ?>

        <a href="/" class="underline hover:text-red-400 text-white">
            Home
        </a>
        <span class="text-gray-600"> > <?php echo e($title ?? ''); ?></span>
    </small>
</section>
<?php /**PATH /home/komor/Documents/personal/well-mart/resources/views/common/components/topbar.blade.php ENDPATH**/ ?>