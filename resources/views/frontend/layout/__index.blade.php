<!DOCTYPE html>

<html lang="en">

<head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font css  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">

    <link rel="stylesheet" href="./frontend/fonts/fonts.css">

    <!-- Fontawesome css      -->
    <link rel="stylesheet" href="./frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="./frontend/css/normalize.css">

    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="./frontend/css/bootstrap.css">

    <!-- Owncarousel css      -->
    <link rel="stylesheet" href="./frontend/css/owl.carousel.css">

    <!-- image zoom -->
    <link rel="stylesheet" href="./frontend/css/glasscase.css">
    {{-- <link rel="stylesheet" href="./frontend/css/glasscase.minf195.css"> --}}

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="./frontend/css/style.css" media="screen" />

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="./frontend/css/extralayers.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./frontend/plugin/css/settings.css" media="screen" />

    <!-- Main css   -->
    <link rel="stylesheet" href="./frontend/style_frontend.css">
    <link rel="stylesheet" href="./frontend/css/responsive.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" href="./frontend/images/apple-touch-icon-precomposed.png">
    <link rel="shortcut icon" type="image/png" href="./frontend/images/favicon.png"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     @yield('css')
</head>

<body >
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--  HEADER-AREA  -->
    @include('frontend.layout.__header')
<!-- Header-AREA END -->

    @yield('content')

<!-- Entire FOOTER START -->
@include('frontend.layout.__footer')
<!-- Entire FOOTER END -->


<!-- jQuery latest -->
<script type="text/javascript" src="./frontend/js/jQuery.2.1.4.js"></script>

<!-- js Modernizr -->
<script src="./frontend/js/modernizr-2.6.2.min.js"></script>

<!-- js Modernizr -->
<script src="./frontend/js/waypoints.min.js"></script>
<script src="./frontend/js/jquery.counterup.min.js"></script>

<!-- Revolution slider -->
<script type="text/javascript" src="./frontend/plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="./frontend/plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Bootsrap js -->
<script src="./frontend/js/bootstrap.min.js"></script>

<!-- Plugins js -->
<script src="./frontend/js/plugins.js"></script>

<!-- Owl js -->
<script src="./frontend/js/owl.carousel.min.js"></script>

<!-- Custom js -->
<script src="./frontend/js/main.js"></script>

<script src="./frontend/js/search.js"></script>
@yield('js')
<script type="text/javascript" src="./js/loading.overlay.js"></script>

<script>
    $('form').submit(function () {
        $.LoadingOverlay("show");
    });

    $("#btn-logout").click(function (event) {

        if (!confirm("Bạn có chắc muốn đăng xuất không ??? ")){
            event.preventDefault();
            return;
        }

    });

</script>
</body>


<!-- Mirrored from premiumlayers.com/html/ecom/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 May 2021 12:08:00 GMT -->
</html>
