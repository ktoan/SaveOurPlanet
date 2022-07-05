@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Duyệt</h4>
                    <div class="table-responsive mb-2">
                        <table id="project_table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người tạo</th>
                                <th>Tên dự án</th>
                                <th>Giới thiệu</th>
                                <th>Mô tả</th>
                                <th>Mục tiêu</th>
                                <th>Số người tham gia</th>
                                <th>Ảnh dự án</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$users[$value->creater-1]->fullname}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->introduction}}</td>
                                    <td>{{$value->description}}</td>
                                    <td>{{number_format($value->goal, 0,",",".")}} VND</td>
                                    <td>{{$value->noMembers}}</td>
                                    <td><img width="100px" src="{{asset('back-end/assets/images/uploaded/projects')}}/{{$value->imageSource}}"></td>
                                    <td>{{$value->dateCreate}}</td>
                                    <td>Đã duyệt</td>
                                    <td>
                                        <div class="row">
                                            <a onclick="return confirm('Are you sure?')" class="mr-4 text-success" href="{{asset('admin')}}/project/allow/{{$value->id}}"
                                            >Duyệt</a
                                            >
                                            <a class="text-danger" onclick="return confirm('Are you sure?')" href="{{asset('admin')}}/project/delete/{{$value->id}}">Xóa</a>
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
