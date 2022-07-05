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
    @include('sweetalert::alert')
    <nav class="
        navbar navbar-expand-lg navbar-dark
        ftco_navbar
        bg-dark
        ftco-navbar-light
      " id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">SaveourPlanet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about')}}" class="nav-link">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('project')}}" class="nav-link">Dự án</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('donate')}}" class="nav-link">Ủng hộ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('blog')}}" class="nav-link">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('image')}}" class="nav-link">Thư viện</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('event')}}" class="nav-link">Sự kiện</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link">Liên hệ</a>
                    </li>
                    @if(isset($user) && $user->utype==="User")
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle">{{$user->fullname}}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('myProfile')}}">Trang cá nhân</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a href="{{route('join')}}" class="nav-link">Tham gia</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    @yield('container')
    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Thông tin</h2>
                        <p>
                            Website được thành tập vào tháng 8/2021 với ba thành viên.
                        </p>
                        <ul class="
                  ftco-footer-social
                  list-unstyled
                  float-md-left float-lft
                  mt-5
                ">
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="ftco-animate">
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Bài viết mới nhất</h2>
                        <?php
                            use App\Models\Blog;
                            $lastedBlog = Blog::where('status', '1')->orderBy('id', 'DESC')->take(3)->get();
                        ?>
                        @foreach ($lastedBlog as $blog)
                        <div class="block-21 mb-4 d-flex">
                            <a href="{{ asset('blog') }}/view/{{ $blog->id }}" class="blog-img mr-4" style="background-image: url({{ asset('back-end') }}/assets/images/uploaded/blogs/{{ $blog->imageSource }})"></a>
                            <div class="text">
                                <h3 class="heading"><a href="{{ asset('blog') }}/view/{{ $blog->id }}">{{ $blog->title }}</a></h3>
                                <div class="meta">
                                    <div><a href="{{ asset('blog') }}/view/{{ $blog->id }}"><span class="icon-calendar"></span> {{ $blog->dateUpload }}</a></div>
                                    <div><a href="{{ asset('blog') }}/view/{{ $blog->id }}"><span class="icon-person"></span> {{ $blog->user->fullname }}</a></div>
                                    <div><a href="{{ asset('blog') }}/view/{{ $blog->id }}"><span class="icon-eye"></span> {{ $blog->viewCount }}</a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Đường dẫn</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="py-2 d-block">Trang chủ</a></li>
                            <li><a href="{{ route('about') }}" class="py-2 d-block">Thông tin</a></li>
                            <li><a href="{{ route('project') }}" class="py-2 d-block">Dự án</a></li>
                            <li><a href="{{ route('donate') }}" class="py-2 d-block">Ủng hộ</a></li>
                            <li><a href="{{ route('image') }}" class="py-2 d-block">Thư viện</a></li>
                            <li><a href="{{ route('event') }}" class="py-2 d-block">Sự kiện</a></li>
                            <li><a href="{{ route('contact') }}" class="py-2 d-block">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Gửi câu hỏi cho chúng tôi?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span><span class="text">17 PHC, Vĩnh Linh,
                                        Quảng Trị</span>
                                </li>
                                <li>
                                    <span class="icon icon-phone"></span><span class="text">+84 868 319 857</span>
                                </li>
                                <li><span class="icon icon-envelope"></span><span
                                        class="text">nktoanwork@gmail.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
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
