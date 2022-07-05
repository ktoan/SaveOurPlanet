@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Tin nhắn hệ thống</h4>
                    <div class="table-responsive mb-2">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Tin nhắn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value->fullname}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->message}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav>{{$data->links()}}</nav>
                </div>
            </div>
            <!-- Hover table card end -->
        </div>
    </div>
@endsection
