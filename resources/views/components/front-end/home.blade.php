@section('container')
@section('title', 'Trang chủ')
    @extends('layouts.front-end.layout')
    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('front-end')}}/images/bg_7.jpg');
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
                    <h1
                        class="mb-4"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        Bảo vệ thiên nhiên là trách nhiệm của chúng ta
                    </h1>

                    <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        <a
                            href="https://vimeo.com/45830194https://www.youtube.com/watch?v=X2YgM1Zw4_E"
                            class="
                  btn btn-white btn-outline-white
                  popupvideo
                  px-4
                  py-3
                  popup-vimeo
                "
                        ><span class="icon-play mr-2"></span>Xem video</a
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>

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

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="carousel-cause owl-carousel">
                        @if(isset($sliders))
                            @foreach($sliders as $slider)
                                <div class="item">
                                    <div class="cause-entry">
                                        <a
                                            href=""
                                            class="img"
                                            style="background-image: url({{asset('back-end')}}/assets/images/uploaded/sliders/{{$slider->imageSource}})"
                                        ></a>
                                        <div class="text p-3 p-md-4">
                                            <h3><a href="#">{{$slider->title}}</a></h3>
                                            <p>
                                                {{$slider->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section  text-center">
                    <h2 class="mb-4">Người ủng hộ mới nhất</h2>
                    <p>
                        Ủng hộ để duy trì trang web của chúng tôi. Chung tay bảo vệ môi trường sống xanh sạch đẹp.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($lastestDonation as $item)
                <div class="col-lg-4 d-flex mb-sm-4 ">
                    <div class="staff">
                        <div class="d-flex mb-4">
                            <div
                                class="img"
                                style="background-image: url({{asset('back-end')}}/assets/images/uploaded/avatar/{{$item->user->avatar}})"
                            ></div>
                            <div class="info ml-4">
                                <h3><a>{{$item->user->fullname}}</a></h3>
                                <span class="position">{{$item->time}} ngày {{$item->date}}</span>
                                <div class="text">
                                    @if ($item->projectId!="")
                                        <p>Ủng hộ <span>{{$item->amout}} VND</span> cho {{$item->project->name}}</p>
                                    @else
                                        <p>Ủng hộ <span>{{$item->amout}} VND</span> cho quỹ phát triển website</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="d-md-flex">
            @if(isset($images))
                @foreach($images as $imageItem)
                    <a
                        href="{{asset('back-end')}}/assets/images/uploaded/images/{{$imageItem->imageSource}}"
                        class="
            gallery
            image-popup
            d-flex
            justify-content-center
            align-items-center
            img
          "
                        style="background-image: url({{asset('back-end')}}/assets/images/uploaded/images/{{$imageItem->imageSource}})"
                    >
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section  text-center">
                    <h2 class="mb-4">Bài viết mới nhất</h2>
                    <p>
                        Các bài viết được cập nhật mới nhất dành cho bạn...
                    </p>
                </div>
            </div>
            <div class="row d-flex">
                @if(isset($blogs))
                    @foreach($blogs as $blog)
                        <div class="col-md-4 d-flex ">
                            <div class="blog-entry align-self-stretch">
                                <a
                                    href="{{asset('blog')}}/view/{{$blog->id}}"
                                    class="block-20"
                                    style="background-image: url('{{asset('back-end')}}/assets/images/uploaded/blogs/{{$blog->imageSource}}')"
                                >
                                </a>
                                <div class="text p-4 d-block">
                                    <div class="meta mb-3">
                                        <div><a href="{{asset('blog')}}/view/{{$blog->id}}">{{$blog->dateUpload}}</a></div>
                                        <div><a href="{{asset('blog')}}/view/{{$blog->id}}">{{$blog->user->fullname}}</a></div>
                                        <div><span><i class="icon-eye"></i> {{$blog->viewCount}}</span></div>
                                    </div>
                                    <h3 class="heading mt-3">
                                        <a href="{{asset('blog')}}/view/{{$blog->id}}">{{$blog->title}}</a>
                                    </h3>
                                    <p>
                                        {{$blog->introduction}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section  text-center">
                    <h2 class="mb-4">Các dự án mới nhất</h2>
                    <p>
                        Các dự án được thành lập gần đây. Ủng hộ dự án để góp phần bảo vệ môi trường xanh - sạch - đẹp.
                    </p>
                </div>
            </div>
            <div class="row d-flex">
                @if(isset($projects))
                    @foreach($projects as $project)
                        <div class="col-md-4 d-flex ">
                            <div class="blog-entry align-self-stretch">
                                <a
                                    href="{{asset('project')}}/view/{{$project->id}}"
                                    class="block-20"
                                    style="background-image: url('{{asset('back-end')}}/assets/images/uploaded/projects/{{$project->imageSource}}')"
                                >
                                </a>
                                <div class="text p-4 d-block">
                                    <div class="meta mb-3">
                                        <div><a href="{{asset('project')}}/view/{{$project->id}}">{{$project->dateCreate}}</a></div>
                                        <div><a href="{{asset('project')}}/view/{{$project->id}}">{{$project->user->fullname}}</a></div>
                                    </div>
                                    <h3 class="heading mt-3">
                                        <a href="{{asset('project')}}/view/{{$project->id}}">{{$project->name}}</a>
                                    </h3>
                                    <p>
                                        {{$project->introduction}}
                                    </p>
                                    <div class="progress custom-progress-success">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$project->now/$project->goal*100}}%" aria-valuenow="0" aria-valuemin="{{$project->now}}" aria-valuemax="{{$project->goal}}"></div>
                                    </div>
                                    <span class="fund-raised d-block">{{number_format($project->now, 0,",",".")}} / {{number_format($project->goal, 0,",",".")}}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="ftco-section ">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section  text-center">
                    <h2 class="mb-4">Các sự kiện sắp diễn ra</h2>
                    <p>Các sự kiện sắp diễn ra. Tham gia ngay...</p>
                </div>
            </div>
            <div class="row">
                @if(isset($events))
                    @foreach($events as $event)
                        <div class="col-md-4 d-flex ">
                            <div class="blog-entry align-self-stretch">
                                <a
                                    href="{{asset('event')}}/view/{{$event->id}}"
                                    class="block-20"
                                    style="background-image: url('{{asset('back-end')}}/assets/images/uploaded/events/{{$event->imageSource}}')"
                                >
                                </a>
                                <div class="text p-4 d-block">
                                    <div class="meta mb-3">
                                        <div><a href="{{asset('event')}}/view/{{$event->id}}">{{$event->dateCreate}}</a></div>
                                        <div><a href="{{asset('event')}}/view/{{$event->id}}">{{$event->user->fullname}}</a></div>
                                        <div>
                                            <a href="{{asset('event')}}/view/{{$event->id}}" class="meta-chat"
                                            ><span class="icon-user-circle"></span> {{$event->noMembers}}</a
                                            >
                                        </div>
                                    </div>
                                    <h3 class="heading mb-4">
                                        <a href="{{asset('event')}}/view/{{$event->id}}">{{$event->name}}</a>
                                    </h3>
                                    <p class="time-loc">
                  <span class="mr-2"
                  ><i class="icon-clock-o"></i> {{$event->time}}</span
                  > <br>
                                        <span class="mr-2"
                                        ><i class="icon-view_day"></i> {{$event->date}}</span
                                        > <br>

                                        <span><i class="icon-map-o"></i> {{$event->location}}</span>
                                    </p>
                                    <p>
                                        {{$event->introduction}}
                                    </p>
                                    <p>
                                        <a href="{{asset('event')}}/view/{{$event->id}}"
                                        >Tham gia <i class="ion-ios-arrow-forward"></i
                                            ></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section
        class="ftco-section-3 img"
        style="background-image: url({{asset('front-end')}}/images/bg_3.jpg)"
        id="regisNoti"
    >
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-md-6 d-flex ">
                    <div
                        class="img img-2 align-self-stretch"
                        style="background-image: url({{asset('front-end')}}/images/bg_4.jpg)"
                    ></div>
                </div>
                <div class="col-md-6 volunteer pl-md-5 ">
                    <h3 class="mb-3">Đăng ký nhận thông báo</h3>
                    <form action="" method="POST" enctype="multipart/form-data" class="volunter-form">
                        @csrf
                        <div class="form-group">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email của bạn"
                                name="email"
                                required
                            />
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <button
                                type="submit"
                                class="btn btn-white py-3 px-5"
                            >Đăng ký</button>
                        </div>
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                        ?>
                        @if (isset($message) && $message == "Đăng ký thành công!")
                            <p class="text-success">{{$message}}</p>
                        @elseif ((isset($message) && $message == "Email đã đăng ký."))
                            <p class="text-danger">{{$message}}</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
