@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <div class="mb-2">
                        <h4 class="sub-title">Tìm kiếm thông tin người dùng</h4>
                        <input name="keyword" type="text" id="search-input">
                    </div>
                    <div class="table-responsive mb-2">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Quyền</th>
                            </tr>
                            </thead>
                            <tbody id="listUser">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->sex}}</td>
                                    <td>{{$user->utype}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Hover table card end -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '#search-input', function () {
                var keyword = $('#search-input').val();
                $.ajax({
                    type: 'get',
                    url: '{{route('searchUserInfo')}}',
                    data: {
                        keyword: keyword,
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#listUser').html(response);
                    }
                })
            })
        })
    </script>
    
@endsection
