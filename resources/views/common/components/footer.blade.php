<!-- jquery cdn -->
<script loading="lazy" src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
@stack('algoliaJS')
@stack('common-navbar')
{{-- preloader js  --}}
@stack('preloaderJs')
{{-- flowbit js  --}}
<script loading="lazy" src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
{{-- rangbar js  --}}
@stack('rangejs')
{{-- ajax setup  --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


{{-- wow js cnd  --}}
<script loading="lazy" src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
<script>
    $(document).ready(function() {
        new WOW().init();
    })
</script>
{{-- products ajax  js  --}}
@stack('productsAjax')

{{-- cart js  --}}
@stack('cartJs')
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
