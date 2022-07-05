@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Quản lý</h4>
                    <div class="table-responsive mb-2">
                        <table id="project_table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người tạo</th>
                                <th>Tên sự kiện</th>
                                <th>Giới thiệu</th>
                                <th>Thời gian</th>
                                <th>Địa điểm</th>
                                <th>Địa chỉ</th>
                                <th>Số người tham gia</th>
                                <th>Ảnh sự kiện</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->user->fullname}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->introduction}}</td>
                                        <td>{{$value->time}}</td>
                                        <td>{{$value->date}}</td>
                                        <td>{{$value->location}}</td>
                                        <td>{{$value->noMembers}}</td>
                                        <td><img width="100px" src="{{asset('back-end/assets/images/uploaded/events')}}/{{$value->imageSource}}"></td>
                                        <td>{{$value->dateCreate}}</td>
                                        <td>Đã duyệt</td>
                                        <td>
                                            <div class="row">
                                                <a class="mr-4 text-primary" href="{{asset('admin')}}/event/edit/{{$value->id}}"
                                                >Sửa</a
                                                >
                                                <a class="text-danger" onclick="return confirm('Are you sure?')" href="{{asset('admin')}}/event/delete/{{$value->id}}">Xóa</a>
                                            </div>
                                        </td>
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
