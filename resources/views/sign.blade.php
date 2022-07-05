<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('sign')}}/style.css" />
    <title>Đăng nhập - Đăng kí</title>
    <style type="text/css">
        .row {
            display: flex;
            align-items: center;
        }
        .col {
            flex-basis: 50%;
            margin: 5px
        }

        .col button {
            height: 50px;
            padding: 5px;
            background: transparent;
            outline: none;
            border: 0;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{route('checkLogin')}}" method="POST" enctype="multipart/form-data" class="sign-in-form">
                @csrf
                <h2 class="title">Đăng nhập</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input required name="email" type="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input required name="password" type="password" placeholder="Mật khẩu" />
                </div>
                <button type="submit" name="login" class="btn solid" style="margin-bottom: 20px">Đăng nhập</button>
                <a style="margin-bottom: 20px" href="{{route('forgotPassword')}}">Quên mật khẩu</a>
                <!-- <div class="row">
                    <div class="col">
                        <button style="background: #3b5998;">Đăng nhập với Facebook</button>
                    </div>
                    <div class="col">
                        <button style="background:  #dd4b39">Đăng nhập với Google Plus</button>
                    </div>
                </div> -->
            </form>
            <form action="{{route('checkRegister')}}" method="POST" enctype="multipart/form-data" class="sign-up-form">
                @csrf
                <h2 class="title">Đăng ký</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input required name="email" type="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input required name="fullname" type="text" placeholder="Họ tên" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input required name="password" type="password" placeholder="Mật khẩu" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input required name="cpassword" type="password" placeholder="Xác nhận mật khẩu" />
                </div>
                <button type="submit" class="btn" name="signup">Đăng ký</button>
            </form>

        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Bạn chưa có tài khoản?</h3>
                <p>
                    Tham gia ngay với Save Our Plannet để chung tay bảo vệ địa cầu của
                    chúng ta. Bạn có thể tham gia sự kiện, đọc bài viết và quyên góp
                    cho chúng tôi.
                </p>
                <button class="btn transparent" id="sign-up-btn">Đăng ký</button>
            </div>
            <img src="{{asset('sign')}}/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Bạn đã có tài khoản?</h3>
                <p>
                    Đăng nhập ngay để tiếp tục trải nghiệm website Save Our Plannet
                    của chúng tôi. Hi vọng bạn sẽ thấy trang web này bổ ích.
                </p>
                <button class="btn transparent" id="sign-in-btn">Đăng nhập</button>
            </div>
            <img src="{{asset('sign')}}/img/register.svg" class="image" alt="" />
        </div>
    </div>
</div>

<script src="{{asset('sign')}}/app.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</body>
</html>
