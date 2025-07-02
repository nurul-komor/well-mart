  <?php if(config('app.env') === 'production'): ?>
      
      <link rel="stylesheet" href="<?php echo e(asset('build/assets/app-1dc50466.css')); ?>">
      <script src="<?php echo e(asset('build/assets/app-b5a11a08.js')); ?>"></script>
  <?php else: ?>
      <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  <?php endif; ?>
<?php /**PATH /home/komor/Documents/personal/well-mart/resources/views/common/components/build-assets.blade.php ENDPATH**/ ?>