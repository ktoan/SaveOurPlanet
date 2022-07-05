@section('container')
@section('title', $data->name)
    @extends('layouts.front-end.layout')
    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('back-end')}}/assets/images/uploaded/projects/{{$data->imageSource}}');
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
                    class="col-md-7 ftco-animate text-center"
                    data-scrollax=" properties: { translateY: '70%' }"
                >
                    <p
                        class="breadcrumbs"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        <span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span>
                        <span class="mr-2"><a href="">Dự án</a></span>
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
                <div class="col-md-8 ftco-animate">
                    <h2 class="mb-3">Giới thiệu về dự án</h2>
                    <p>
                        {{$data->introduction}}
                    </p>
                    <h2 class="mb-3 mt-5">Mô tả dự án</h2>
                    <p>
                        {{$data->description}}
                    </p>
                    {!! $data->content !!}

                    <div class="about-author row p-5 bg-light">
                        <div class="bio col-md-6">
                            <img
                                src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$data->user->avatar}}"
                                alt="Image placeholder"
                                class = "img-fluid mb-4"
                            />
                        </div>
                        <div class="desc align-self-md-center col-md-6">
                            <h3 class="mb-3">Người tạo dự án</h3>
                            <p>{{$data->user->fullname}}</p>
                            <p>Liên hệ: {{$data->user->email}}</p>
                            <p>Vai trò: {{$data->user->utype}}</p>
                            <p>Ngày tạo: {{$data->dateCreate}}</p>
                        </div>
                    </div>

                    <div class="pt-5 mt-5">
                        <div class="comment-form-wrap">
                            <a href="{{asset('donate')}}/project/{{$data->id}}">
                                <button class="btn btn-primary px-5 py-3">Ủng hộ dự án</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3>Dự án mới nhất</h3>
                        @foreach($recent as $project)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/projects/{{$project->imageSource}})"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="{{asset('/project')}}/view/{{$project->id}}">{{$project->name}}</a>
                                    </h3>
                                    <div class="meta">
                                        <div>
                                            <a href="{{asset('/project')}}/view/{{$project->id}}"><span class="icon-calendar"></span> {{$project->dateCreate}}</a>
                                        </div>
                                        <div>
                                            <a href="{{asset('/project')}}/view/{{$project->id}}"><span class="icon-person"></span> {{$data->user->fullname}}</a>
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
