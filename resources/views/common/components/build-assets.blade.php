  @if (config('app.env') === 'production')
      {{-- production assets  --}}
      <link rel="stylesheet" href="{{ asset('build/assets/app-1dc50466.css') }}">
      <script src="{{ asset('build/assets/app-b5a11a08.js') }}"></script>
  @else
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
