@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <!-- Hover table card start -->
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Duyệt</h4>
                    <div class="table-responsive mb-2">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả ngắn</th>
                                <th>Xem</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>{{$value->description}}</td>
                                    <td><img width="100px" src="{{asset('back-end/assets/images/uploaded/sliders')}}/{{$value->imageSource}}"></td>
                                    <td>Chưa duyệt</td>
                                    <td>
                                        <div class="row">
                                            <a class="mr-4 text-success" onclick="return confirm('Are you sure?')" href="{{asset('admin')}}/slider/allow/{{$value->id}}"
                                            >Duyệt</a
                                            >
                                            <a class="text-danger" onclick="return confirm('Are you sure?')" href="{{asset('admin')}}/slider/delete/{{$value->id}}">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav>{!! $data->links() !!}</nav>
                </div>
            </div>
            <!-- Hover table card end -->
        </div>
    </div>
@endsection
