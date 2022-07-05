<?php
Use Illuminate\Support\Facades\Session;
Use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
$user = Session::get('user');
if(!isset($user)) {
    return exit;
} else {
    if($user->utype==="User") {
        return exit;
    }
}
if(isset($user)&&$user->utype==="System User") {
    $role = DB::table('roles')->where('role', 'System User')->first();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet" />
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('back-end')}}/assets/css/bootstrap/css/bootstrap.min.css" />
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('back-end')}}/assets/icon/themify-icons/themify-icons.css" />
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('back-end')}}/assets/icon/icofont/css/icofont.css" />
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('back-end')}}/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('back-end')}}/assets/css/jquery.mCustomScrollbar.css" />
    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="{{asset('ijaboCropTool/ijaboCropTool.min.css')}}">
</head>

<body>
    @include('sweetalert::alert')
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class="contain">
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="{{route('dashboard')}}">
                            <img class="img-fluid" src="{{asset('back-end')}}/assets/images/logo.png"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle">
                                    <a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a>
                                    <img src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$user->avatar}}"
                                        class="img-radius avatar-previewer" alt="User-Profile-Image" />
                                    <span>{{$user->fullname}}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="{{asset('admin')}}/profile/{{$user->id}}"> <i class="ti-user"></i>
                                            Trang cá nhân </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                            <i class="ti-layout-sidebar-left"></i> Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle">
                            <a href="#"><i class="icon-close icons"></i></a>
                        </div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Trang chính
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="{{route('dashboard')}}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Bảng điều khiển</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Người dùng
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if($user->utype==="Admin")
                                <li class="">
                                    <a href="{{route('grantRole')}}">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Phân quyền S.U</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin")
                                <li class="">
                                    <a href="{{route('allowRole')}}">
                                        <span class="pcoded-micon"><i class="ti-star"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Trao quyền S.U</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin")
                                <li class="">
                                    <a href="{{route('removeRole')}}">
                                        <span class="pcoded-micon"><i class="ti-trash"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Xóa quyền S.U</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->searchInfo!==0)
                                <li class="">
                                    <a href="{{route('searchInfo')}}">
                                        <span class="pcoded-micon"><i class="ti-search"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Tìm kiếm thông tin</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->viewMess!==0)
                                <li class="">
                                    <a href="{{route('viewMess')}}">
                                        <span class="pcoded-micon"><i class="ti-comment"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Xem tin nhắn liên hệ</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->sendMail!==0)
                                <li class="">
                                    <a href="{{route('notification')}}">
                                        <span class="pcoded-micon"><i class="ti-email"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Gửi E-mail</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Slider
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->addSlider!==0)
                                <li class="">
                                    <a href="{{route('addSlider')}}">
                                        <span class="pcoded-micon"><i class="ti-plus"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Thêm slider</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->manageSlider!==0)
                                <li class="">
                                    <a href="{{route('manageSlider')}}">
                                        <span class="pcoded-micon"><i class="ti-menu"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý slider</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->browseSlider!==0)
                                <li class="">
                                    <a href="{{route('browseSlider')}}">
                                        <span class="pcoded-micon"><i class="ti-check-box"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Duyệt slider</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Hình ảnh
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->addImage!==0)
                                <li class="">
                                    <a href="{{route('addImage')}}">
                                        <span class="pcoded-micon"><i class="ti-plus"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Thêm hình ảnh</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->manageImage!==0)
                                <li class="">
                                    <a href="{{route('manageImage')}}">
                                        <span class="pcoded-micon"><i class="ti-menu"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý hình ảnh</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->browseImage!==0)
                                <li class="">
                                    <a href="{{route('browseImage')}}">
                                        <span class="pcoded-micon"><i class="ti-check-box"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Duyệt hình ảnh</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Sự kiện
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->addEvent!==0)
                                <li class="">
                                    <a href="{{route('addEvent')}}">
                                        <span class="pcoded-micon"><i class="ti-plus"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Thêm sự kiện</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->manageEvent!==0)
                                <li class="">
                                    <a href="{{route('manageEvent')}}">
                                        <span class="pcoded-micon"><i class="ti-menu"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý sự kiện</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->browseEvent!==0)
                                <li class="">
                                    <a href="{{route('browseEvent')}}">
                                        <span class="pcoded-micon"><i class="ti-check-box"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Duyệt sự kiện</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Bài viết
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->addBlog!==0)
                                <li class="">
                                    <a href="{{route('addBlog')}}">
                                        <span class="pcoded-micon"><i class="ti-plus"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Thêm bài viết</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->manageBlog!==0)
                                <li class="">
                                    <a href="{{route('manageBlog')}}">
                                        <span class="pcoded-micon"><i class="ti-menu"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý bài viết</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->browseBlog!==0)
                                <li class="">
                                    <a href="{{route('browseBlog')}}">
                                        <span class="pcoded-micon"><i class="ti-check-box"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Duyệt bài viết</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                            <div class="dropdown-divider"></div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">
                                Dự án
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                @if($user->utype==="Admin" || $user->utype==="System User"&&$role->addProject!==0)
                                <li class="">
                                    <a href="{{route('addProject')}}">
                                        <span class="pcoded-micon"><i class="ti-plus"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Thêm dự án</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin")
                                <li class="">
                                    <a href="{{route('manageProject')}}">
                                        <span class="pcoded-micon"><i class="ti-menu"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý dự án</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                                @if($user->utype==="Admin")
                                <li class="">
                                    <a href="{{route('browseProject')}}">
                                        <span class="pcoded-micon"><i class="ti-check-box"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Duyệt dự án</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @yield('container')
                                    </div>
                                </div>

                                <div id="styleSelector"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('back-end')}}/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('back-end')}}/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{asset('back-end')}}/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="{{asset('back-end')}}/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('back-end')}}/assets/js/jquery-slimscroll/jquery.slimscroll.js">
    </script>
    <!-- am chart -->
    <script src="{{asset('back-end')}}/assets/pages/widget/amchart/amcharts.min.js"></script>
    <script src="{{asset('back-end')}}/assets/pages/widget/amchart/serial.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{asset('back-end')}}/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="{{asset('back-end')}}/assets/js/script.js"></script>
    <script type="text/javascript " src="{{asset('back-end')}}/assets/js/SmoothScroll.js"></script>
    <script src="{{asset('back-end')}}/assets/js/pcoded.min.js"></script>
    <script src="{{asset('back-end')}}/assets/js/demo-12.js"></script>
    <script src="{{asset('back-end')}}/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
    var $window = $(window);
    var nav = $(".fixed-button");
    $window.scroll(function() {
        if ($window.scrollTop() >= 200) {
            nav.addClass("active");
        } else {
            nav.removeClass("active");
        }
    });

    $(document).ready(function() {
        $('.theme-loader').hide();
    })
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
    </script>
    <script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</body>

</html>