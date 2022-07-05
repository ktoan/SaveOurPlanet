@section('container')
@extends('layouts.back-end.layout')
<div class="row">
    <div class="col-md-12">
        <!-- Hover table card start -->
        <div class="card">
            <div class="card-block">
                <h4 class="sub-title">Duyệt bài viết</h4>
                <div class="table-responsive mb-2">
                    <table id="project_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người tạo</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh bài viết</th>
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
                                <td>{{$value->title}}</td>
                                <td><img width="100px"
                                        src="{{asset('back-end/assets/images/uploaded/blogs')}}/{{$value->imageSource}}">
                                </td>
                                <td>{{$value->dateUpload}}</td>
                                <td>Chưa duyệt</td>
                                <td>
                                    <div class="row">
                                        <a class="mr-4 text-primary"
                                            href="{{asset('admin')}}/blog/preview/{{$value->id}}">Xem</a>
                                        <a class="mr-4 text-success" onclick="return confirm('Are you sure?')"
                                            href="{{asset('admin')}}/blog/allow/{{$value->id}}">Duyệt</a>
                                        <a class="text-danger" onclick="return confirm('Are you sure?')"
                                            href="{{asset('admin')}}/blog/delete/{{$value->id}}">Xóa</a>
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
