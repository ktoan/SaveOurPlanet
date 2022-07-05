@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Đăng ký nhận thông báo</h4>
                    <div class="table-responsive mb-2">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->email}}</td>
                                    <td><a href="{{asset('admin')}}/user/notification/send-private/{{$value->id}}" class="text-primary">Gửi email</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav class="mb-4">{{$data->links()}}</nav>
                    <a href="{{route('sendNotificationAll')}}" class="text-primary">Gửi tới tất cả</a>
                </div>
            </div>
            <!-- Hover table card end -->
        </div>
    </div>
@endsection
