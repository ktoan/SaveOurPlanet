@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <div class="mb-2">
                        <h4 class="sub-title">Xóa quyền S.U</h4>
                    </div>
                    <div class="table-responsive mb-2">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Lựa chọn</th>
                            </tr>
                            </thead>
                            <tbody id="listUser">
                            @if(count($users)==0)
                                <tr>
                                    <td>Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->fullname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->utype}}</td>
                                        <td><a href="{{asset('admin')}}/role/remove/{{$user->id}}" class="text-danger">Xóa quyền S.U</a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Hover table card end -->
        </div>
    </div>
@endsection
