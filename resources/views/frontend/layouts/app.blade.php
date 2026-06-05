<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>ProtoCut - Modern Manufacturing Service</title> --}}
    <title>@yield('title', 'ProtoCut')</title>
    <meta name="description"
        content="Precision CNC & 3D Printing Prototype Service. Get an instant quote for your manufacturing needs.">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    

    {{-- Header --}}
    @include('frontend.partials.header')

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('frontend.partials.footer')

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };
    </script>

    <script>
        var base_url = '{{url('/')}}';
    </script>

    @if(session('success'))
        <script type="module">
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script type="module">
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    @if($errors->any())
       <script type="module">
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        </script>
    @endif

    
    @stack('scripts')
</body>
</html>