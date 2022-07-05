<?php
    session_start();
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Redirect;
    $user = Session::get('user');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{asset('front-end')}}/images/logo.png" sizes="196x196" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/open-iconic-bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/animate.css" />

    <link rel="stylesheet" href="{{asset('front-end')}}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/magnific-popup.css" />

    <link rel="stylesheet" href="{{asset('front-end')}}/css/aos.css" />

    <link rel="stylesheet" href="{{asset('front-end')}}/css/ionicons.min.css" />

    <link rel="stylesheet" href="{{asset('front-end')}}/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/jquery.timepicker.css" />

    <link rel="stylesheet" href="{{asset('front-end')}}/css/flaticon.css" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/icomoon.css" />
    <link rel="stylesheet" href="{{asset('front-end')}}/css/style.css" />
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @yield('container')
    <!-- SCRIPT -->
    <script src="{{asset('front-end')}}/js/jquery.min.js"></script>
    <script src="{{asset('front-end')}}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{asset('front-end')}}/js/popper.min.js"></script>
    <script src="{{asset('front-end')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('front-end')}}/js/jquery.easing.1.3.js"></script>
    <script src="{{asset('front-end')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('front-end')}}/js/jquery.stellar.min.js"></script>
    <script src="{{asset('front-end')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('front-end')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('front-end')}}/js/aos.js"></script>
    <script src="{{asset('front-end')}}/js/jquery.animateNumber.min.js"></script>
    <script src="{{asset('front-end')}}/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('front-end')}}/js/jquery.timepicker.min.js"></script>
    <script src="{{asset('front-end')}}/js/scrollax.min.js"></script>
    <script src="{{asset('front-end')}}/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    </script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</body>

</html>
