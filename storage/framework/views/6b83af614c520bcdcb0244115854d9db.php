<?php $__env->startPush('preloaderJs'); ?>
    <div class="z-[999] bg-white/30 w-full min-h-screen fixed top-0 left-0 opacity-1 grid place-content-center" style=""
        id="preloader">
        
    </div>

    <script>
        $(document).ready(function() {
            $("#preloader").css({
                opacity: "0",
                transition: "0.8s"

            })
            setTimeout(() => {
                $("#preloader").css({
                    display: "none"
                })
            }, 800);
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /media/komor/volume 2/projects/others/institute-project/resources/views/common/components/preloader.blade.php ENDPATH**/ ?>