<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet" />

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('ijaboCropTool/ijaboCropTool.min.css')}}">
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <style>
    .body {
        font-family: 
    }
    .btn-style {
        background: none;
        color: white;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back {
        padding: 40px 30px;
    }

    .back a {
        font-size: 20px;
        color: white;
    }

    .back a:hover {
        color: #fd7e14;
        cursor: pointer
    }


    .labels {
        color: black;
        font-size: 11px
    }

    .big {
        font-size: 20px;
    }

    .is-centered {

        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }

    .profile-wrap {
        width: 100%;
        min-height: 500px;

        position: relative;
    }

    .avatar {
        vertical-align: middle;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-top: 10%;
    }

    .profile-name {
        color: white;
        font-size: 40px;
        margin-top: 1%;
    }

    .tabs-pack {
        display: flex;
    }

    .tab-link {
        font-size: 25px;
        padding: 4%;
        background: none;
        color: white;
        border: none;
        flex-basis: calc(100%/3);
        transition: 0.5s ease;
        outline: none;
        cursor: pointer;
    }

    .tab-link:hover {
        translate: scale(1, 2);
        border-top: 5px solid var(--orange);
    }

    .tab-link:focus {
        outline: 0;
    }

    .tab-content {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }

    .tab-content p {
        color: black;
    }

    .onstart {
        display: block;
    }

    .activebtn {
        border-top: 5px solid var(--orange);
    }

    @media (max-width: 767.98px) {
        .sidebar-wrap .fields .icon {
            right: 10px;
        }

        .tabs-pack {
            display: block;
        }

        .tab-link {
            width: 90vw;
            text-align: center;
        }

        .back {
            display: none;
        }
    }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @yield('container')
</body>

<script>
function openfunc(evt, func) {
    // Declare all variables
    var i, tabcontent, tabbtn;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tabbtn = document.getElementsByClassName("tab-link");
    for (i = 0; i < tabbtn.length; i++) {
        tabbtn[i].className = tabbtn[i].className.replace(" activebtn", "");
        tabbtn[i].className = tabbtn[i].className.replace(" onstart", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(func).style.display = "block";
    evt.currentTarget.className += " activebtn";
}
</script>
<script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#avatar').ijaboCropTool({
        preview: '.avatar-previewer',
        setRatio: 1,
        type: 'POST',
        processUrl: '{{route('changeAvatar')}}',
        withCSRF: ['_token', '{{csrf_token()}}'],
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['LƯU', 'HỦY'],
        buttonsColor: ['#30bf7d', '#ee5155', -15],
        onSuccess: function(message, element, status) {
            swal("Thành công", message, "success", {
                button: "OK",
            });
        },
        onError: function(message, element, status) {
            alert(message);
        }
    });
})
</script>

    <script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    </script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</html>