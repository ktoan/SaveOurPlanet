@section('container')
@section('title', $data->title)
    @extends('layouts.front-end.layout-api')
    <section class="ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    {!! $data->content !!}
                    <div class="about-author row p-5 bg-light">
                        <div class="bio col-md-6">
                            <img
                                src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$data->user->avatar}}"
                                alt="Image placeholder"
                                class="img-fluid mb-4"
                            />
                        </div>
                        <div class="desc align-self-md-center col-md-6">
                            <h3 class="mb-3">Người tạo bài viết</h3>
                            <p>{{$data->user->fullname}}</p>
                            <p>Liên hệ: {{$data->user->email}}</p>
                            <p>Vai trò: {{$data->user->utype}}</p>
                            <p>Ngày đăng: {{$data->dateUpload}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
