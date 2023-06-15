@push('preloaderJs')
    <div class="z-[999] bg-white/30 w-full min-h-screen fixed top-0 left-0 opacity-1 grid place-content-center" style=""
        id="preloader">
        {{-- <img src="https://cdn.dribbble.com/users/1787505/screenshots/7300251/media/a351d9e0236c03a539181b95faced9e0.gif"
            class="max-w-[400px]" alt=""> --}}
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
@endpush
