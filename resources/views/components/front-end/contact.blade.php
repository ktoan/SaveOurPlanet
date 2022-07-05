@section('container')
@section('title', 'Liên hệ')
    @extends('layouts.front-end.layout')

    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('front-end')}}/images/bg-9.jpg');
            background-position: center;
            background-size: cover;
            "
        data-stellar-background-ratio="0.5"
    >
        <div class="overlay"></div>
        <div class="container">
            <div
                class="
            row
            no-gutters
            slider-text
            align-items-center
            justify-content-center
          "
                data-scrollax-parent="true"
            >
                <div
                    class="col-md-7  text-center"
                    data-scrollax=" properties: { translateY: '70%' }"
                >
                    <p
                        class="breadcrumbs"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        <span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span>
                        <span>Liên hệ</span>
                    </p>
                    <h1
                        class="mb-3 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        Liên hệ
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">Thông tin liên hệ</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-3">
                    <p><span>Địa chỉ:</span> 17 PHC, Vĩnh Linh, Quảng Trị
                    </p>
                </div>
                <div class="col-md-3">
                    <p><span>Số điện thoại:</span> <a href="">+84 868 319 857</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Email:</span> <a href="mailto:nktoanwork@gmail.com">nktoanwork@gmail.com</a></p>
                </div>
                <div class="col-md-3">
                    <p><span>Website</span> <a href="#">saveourplannet.com</a></p>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 pr-md-5">
                    <h4 class="mb-4">Bạn có câu hỏi nào không?</h4>
                    <form action="" method="POST">
                        @csrf
                        <?php
                        use Illuminate\Support\Facades\Session;
                        $user = Session::get('user');
                        ?>
                        @if(isset($user)&&$user->utype==="User")
                            <div class="form-group">
                                <input style="display: none" type="text" value="{{$user->fullname}}" name="name" class="form-control" placeholder="Tên của bạn">
                            </div>
                            <div class="form-group">
                                <input style="display: none" type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Email của bạn">
                            </div>
                        @else
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Tên của bạn">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email của bạn">
                            </div>
                        @endif
                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Tin nhắn"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-primary py-3 px-5">Gửi tin nhắn</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6" id="map"></div>
            </div>
        </div>
    </section>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{asset('front-end')}}/js/google-map.js"></script>
@endsection
