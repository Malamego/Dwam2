<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Smart Agriculture</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/core-img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/style.rtl.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    @include('frontend.includes.header')
    <!-- ***** Header Area End ***** -->

    @yield('content')

    <!-- ***** Footer Area Start ***** -->
    @include('frontend.includes.footer')
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- All js -->
    <script src="{{ asset('frontend/js/uza.bundle.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('frontend/js/default-assets/active.js') }}"></script>

</body>

</html>
