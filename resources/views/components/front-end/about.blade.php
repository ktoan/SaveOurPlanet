@section('container')
@section('title', 'Thông tin')
@extends('layouts.front-end.layout')

<div class="hero-wrap" style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('front-end')}}/images/bg-10.jpg');
            background-position: center;
            background-size: cover;
            " data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="
            row
            no-gutters
            slider-text
            align-items-center
            justify-content-center
          " data-scrollax-parent="true">
            <div class="col-md-7  text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    <span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span>
                    <span>Thông tin</span>
                </p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    Thông tin
                </h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 d-flex ">
                <div class="img img-about align-self-stretch"
                    style="background-image: url({{asset('front-end')}}/images/bg_3.jpg); width: 100%"></div>
            </div>
            <div class="col-md-6 pl-md-5 ">
                <h2 class="mb-4">Chào mừng đến với SaveOurPlanet được thành lập vào tháng 8/2021</h2>
                <p>
                    Ô nhiễm môi trường bao giờ cũng là nỗi lo của nhiều người. Đặc biệt trong thời buổi kinh tế phát triển như hiện nay thì tình trạng này lại càng đáng báo động. Chúng ta có thể dễ dàng bắt gặp được những hình ảnh, những thông tin về việc môi trường bị ô nhiễm ngay trên các phương tiện truyền thông đại chúng. Điều này khiến ta phải suy nghĩ… Ô nhiễm môi trường được chia thành nhiều dạng khác nhau. Mỗi dạng sẽ có một tình trạng ô nhiễm riêng ảnh hưởng trực tiếp đến sức khỏe của con người và sinh vật. Môi trường bị ô nhiễm sẽ gây thiệt hại lớn về kinh tế cho chúng ta. 
                </p>
                <p>
                    Chính vì vậy, chúng tôi đã thành lập ra một website có tên là Save Our Planet với khẩu hiệu “Nâng cao ý thức bảo vệ môi trường” để góp phần giảm thiểu được vấn nạn kể trên.
                </p>
                <p>
                    Thông qua website, chúng tôi có thể truyền tải cho mọi người tác hại của ô nhiễm môi trường, hậu quả và cách khắc phục bằng các bài viết, sự kiện, dự án,… ở trên website.
                </p>
            </div>
        </div>
    </div>
</section>


    <section class="ftco-counter ftco-intro" id="section-counter">
        <div class="container">
            <div class="row no-gutters">
                <div
                    class="
              col-md-5
              d-flex
              justify-content-center
              counter-wrap
              
            "
                >
                    <div class="block-18 color-1 align-items-stretch">
                        <div class="text">
                            <span>Bảo vệ, giải cứu</span>
                            <strong class="number" data-number="1432805">0</strong>
                            <span>Động thực vật trên hành tinh của chúng ta</span>
                        </div>
                    </div>
                </div>
                <div
                    class="
              col-md
              d-flex
              justify-content-center
              counter-wrap
              
            "
                >
                    <div class="block-18 color-2 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Ủng hộ quỹ</h3>
                            <p>
                                Quyên góp cho quỹ các dự án được tạo để bảo vệ động thực vật .
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="
              col-md
              d-flex
              justify-content-center
              counter-wrap
              
            "
                >
                    <div class="block-18 color-3 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Tham gia tình nguyện</h3>
                            <p>
                                Các tình nguyện viên sẽ tham gia vào các dự án, thực hiện các
                                dự án.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex align-self-stretch ">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3">
                            <span class="flaticon-donation-1"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Sự quyên góp</h3>
                            <p>
                                "Đối xử" tốt với môi trường - Mẹ thiên nhiên sẽ "đối xử" tốt lại với bạn.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3">
                            <span class="flaticon-charity"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Sự tình nguyện</h3>
                            <p>
                                Mọi người chung tay vào các dự án, sự kiện để có một hành tinh xanh.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ">
                    <div class="media block-6 d-flex services p-3 py-4 d-block">
                        <div class="icon d-flex mb-3">
                            <span class="flaticon-donation"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Sự tài trợ</h3>
                            <p>
                                Mọi sự tài trợ, ủng hộ chính là kinh phí giúp chúng tôi duy trì các sự kiện và dự án!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection