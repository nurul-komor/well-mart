{{-- jquery cdn  --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
{{-- select 2  --}}
{{-- select 2 js  --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@stack('select2')
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
{{-- <script src="{{ asset('admin/assets/css/customDataTable.css') }}"></script> --}}
@stack('outletjs')
{{-- status changer js  --}}
@stack('statusChanger')
{{-- flowbite js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('admin/assets/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}" type="module" async></script>

{{-- tailwind element  --}}
<script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>

{{-- dropdown js  --}}
<script src="{{ asset('admin/assets/js/dropdown.js') }}"></script>

<script src="{{ asset('admin/assets/js/fixed-plugin.js') }}"></script>

<script src="{{ asset('admin/assets/js/nav-pills.js') }}"></script>

<script src="{{ asset('admin/assets/js/navbar-collapse.js') }}"></script>

<script src="{{ asset('admin/assets/js/navbar-sticky.js') }}"></script>

<script src="{{ asset('admin/assets/js/sidenav-burger.js') }}"></script>

<script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>




<!-- main script file  -->
<script src="{{ asset('admin/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</body>

</html>
