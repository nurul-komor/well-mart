<!-- jquery cdn -->
<script loading="lazy" src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<?php echo $__env->yieldPushContent('algoliaJS'); ?>
<?php echo $__env->yieldPushContent('common-navbar'); ?>

<?php echo $__env->yieldPushContent('preloaderJs'); ?>

<script loading="lazy" src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

<?php echo $__env->yieldPushContent('rangejs'); ?>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>



<script loading="lazy" src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
<script>
    $(document).ready(function() {
        new WOW().init();
    })
</script>

<?php echo $__env->yieldPushContent('productsAjax'); ?>


<?php echo $__env->yieldPushContent('cartJs'); ?>
<!-- owl carousel js  -->
<script loading="lazy" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel.product-modal").owlCarousel({
            autoHeight: true,
            autoWidth: false,
            nav: false,
            dots: true,
            loop: false,
            items: 1,
            mouseDrag: false
        });

        $(".owl-carousel.head").owlCarousel({
            items: 1,
            autoHeight: false,
            autoWidth: false,
            nav: false,
            dots: true,
            animateOut: "fadeOut",
            loop: true,
            // autoplay: true,
            autoplayTimeout: 10000,
            // autoplayHoverPause:true
        });
        $(".owl-carousel.partners").owlCarousel({
            items: 5,
            autoHeight: false,
            autoWidth: false,
            nav: false,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 1500,
            // autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        });

        $(".owl-carousel.news").owlCarousel({
            items: 1,
            autoHeight: false,
            autoWidth: false,
            nav: false,
            dots: false,
            loop: false,
            autoplay: false,
            margin: 10,
            //  autoplayTimeout: 1500,
            // autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
                778: {
                    items: 2
                },
                992: {
                    items: 3,
                    mouseDrag: false
                }
            }
        });


    });
</script>
</body>

</html>
<?php /**PATH /home/komor/Documents/personal/well-mart/resources/views/common/components/footer.blade.php ENDPATH**/ ?>