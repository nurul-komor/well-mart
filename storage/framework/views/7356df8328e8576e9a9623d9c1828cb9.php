<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(env('APP_NAME')); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(env('APP_LOGO')); ?>">
    
    <meta name="app-url" content="<?php echo e(env('APP_URL')); ?>">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <meta name="app-url" content="<?php echo e(env('APP_URL')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(env('APP_LOGO')); ?>" />
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- owl carousel css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('common/css/rangebar.css')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    
    <link rel="stylesheet" href="<?php echo e(asset('common/css/custom.css')); ?>">
</head>

<body class="font-helvetica text-base text-[#252525] bg-white dark:bg-slate-750">
<?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/common/components/header.blade.php ENDPATH**/ ?>