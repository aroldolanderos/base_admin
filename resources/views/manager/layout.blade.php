<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sete Base</title>

<link href="{{ asset('css/app.css') }} " rel="stylesheet">
</head>
<body>
<div id="app">
    @include('manager.navbar')
    <div class="main-container container">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>