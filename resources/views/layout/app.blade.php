<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/fastkart/front-end/index-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Apr 2023 06:53:53 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="{{ asset('assets/images/favicon/7.png') }}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <title>Shop Bay</title>
    @section('style')
        @include('layout.style')
    @show
</head>

<body class="theme-color-5">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    <div class="bg-overlay"></div>
    @section('script')
        @include('layout.script')
    @show
</body>

</html>
