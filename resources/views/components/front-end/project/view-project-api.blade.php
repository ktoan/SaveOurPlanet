@section('container')
@section('title', $data->name)
    @extends('layouts.front-end.layout-api')
    <section class="ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
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
                </div>
            </div>
        </div>
    </section>
@endsection
