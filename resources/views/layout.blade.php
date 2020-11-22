<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Note App</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('/img/notes.svg') }}" type="image/x-icon">
    @yield('extra-css')
</head>
<body>
    {{-- Start Navbar --}}
    <nav class="navbar navbar-dark bg-dark d-flex justify-content-center">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/img/notes.svg') }}" width="30" height="30" class="d-inline-block align-top mr-1" loading="lazy">
            My Note App
        </a>
    </nav>
    {{-- End Navbar --}}
    
    {{-- Start Content Layout --}}
    <div class="row pt-3 pl-5 pr-5">
        <div class="col-12">
            @yield('content')
        </div>
    </div>
    {{-- End Content Layout --}}

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/all.js') }}"></script>
    <script>
        $(function () {
            $('[rel="tooltip"]').tooltip({trigger: "hover"});
        });
    </script>
    @yield('extra-script')
</body>
</html>