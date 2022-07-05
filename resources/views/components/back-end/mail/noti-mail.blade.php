<!DOCTYPE html>
<html lang="en">
<head>
    <title>Saveourplanet</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
        href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700"
        rel="stylesheet"
    />

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<div class="container">
    <h1>Thông báo từ SaveOurPlanet</h1>
    <h3>{{$mailDetails['header']}}</h3>
    <p>{!! $mailDetails['message'] !!}</p>
    <p>Mọi thông tin chi tiết liên hệ qua gmail <a href="mailto:nktoanwork@gmail.com">nktoanwork@gmail.com</a> hoặc số điện thoại +84 868 319 857</p>
</div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('front-end')}}/js/google-map.js"></script>

<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

<script type="text/javascript">

    CKEDITOR.replace('content',{
        width: "100%",
        height: "200px"
    });

</script>
</body>
</html>
