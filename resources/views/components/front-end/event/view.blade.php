@section('container')
@section('title', $data->name)
    @extends('layouts.front-end.layout')

    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('back-end')}}/assets/images/uploaded/events/{{$data->imageSource}}');
            background-size: cover; background-position: center;
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
                        <span class="mr-2"><a href="{{route('event')}}">Sự kiện</a></span>
                        <span>{{$data->name}}</span>
                    </p>
                    <h1
                        class="mb-3 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        {{$data->name}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    {!! $data->content !!}
                    <h3>Thời gian và địa điểm</h3>
                    <p>Thời gian: {{$data->time}}</p>
                    <p>Ngày: {{$data->date}}</p>
                    <p>Địa điểm: {{$data->location}}</p>
                    <h3 class="mb-5">Hiện tại có <strong>{{$data->noMembers}}</strong> người tham gia</h3>
                    <div>
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $user = Session::get('user');
                        ?>
                        @if (!isset($user))
                            <a href="{{asset('event')}}/join/{{$data->id}}"><button class="btn btn-primary px-5 py-3">Tham gia</button></a>
                            @else
                                @if(isset($check))
                                    @if($check>0)
                                        <a href="{{asset('event')}}/quit/{{$data->id}}"><button class="btn btn-light px-5 py-3">Thoát sự kiện</button></a>
                                    @else
                                        <a href="{{asset('event')}}/join/{{$data->id}}"><button class="btn btn-primary px-5 py-3">Tham gia</button></a>
                                    @endif
                                @endif
                        @endif
                    </div>
                    <div class="about-author row mt-5 p-5 bg-light">
                        <div class="bio col-md-6">
                            <img
                                src="{{asset('back-end')}}/assets/images/uploaded/avatar/avatarDefault.jpeg"
                                alt="Image placeholder"
                                class="img-fluid mb-4"
                            />
                        </div>
                        <div class="desc align-self-md-center col-md-6">
                            <h3 class="mb-3">Người tạo sự kiện</h3>
                            <p>{{$data->user->fullname}}</p>
                            <p>Liên hệ: {{$data->user->email}}</p>
                            <p>Vai trò: {{$data->user->utype}}</p>
                            <p>Thời gian: {{$data->dateCreate}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="sidebar-box  fadeInUp d">
                        <h3>Sự kiện gần đến</h3>
                        @foreach($upComing as $event)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/events/{{$event->imageSource}})"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="{{asset('/event')}}/view/{{$event->id}}">{{$event->name}}</a>
                                    </h3>
                                    <div class="meta">
                                        <div>
                                            <a href="{{asset('/event')}}/view/{{$event->id}}"><span class="icon-calendar"></span> {{$event->date}}</a>
                                        </div>
                                        <div>
                                            <a href="{{asset('/event')}}/view/{{$event->id}}"><span class="icon-person"></span> {{$event->user->fullname}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sidebar-box  fadeInUp d">
                        <h3>Sự kiện đã qua</h3>
                        @foreach($pass as $event)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/events/{{$event->imageSource}})"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="{{asset('/event')}}/view/{{$event->id}}">{{$event->name}}</a>
                                    </h3>
                                    <div class="meta">
                                        <div>
                                            <a href="{{asset('/event')}}/view/{{$event->id}}"><span class="icon-calendar"></span> {{$event->date}}</a>
                                        </div>
                                        <div>
                                            <a href="{{asset('/event')}}/view/{{$event->id}}"><span class="icon-person"></span> {{$event->user->fullname}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
