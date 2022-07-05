@section('container')
@section('title', $data->name)
    @extends('layouts.front-end.layout-api')
    <section class="ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $data->content !!}
                    <h3 class="mb-5">Hiện tại có <strong>{{$data->noMembers}}</strong> người tham gia</h3>
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
            </div>
        </div>
    </section>
@endsection
