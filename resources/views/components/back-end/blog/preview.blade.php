@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Duyệt bài viết</h4>
                    <div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Tiêu đề</label
                            >
                            <div class="col-sm-10">
                                <input readonly required type='text' value="{{$data->title}}" name="title" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Giới thiệu ngắn</label
                            >
                            <div class="col-sm-10">
                                <input readonly required type='text' value="{{$data->introduction}}" name="introduction" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Nội dung</label
                            >
                            <div class="col-sm-10">
                                <textarea readonly id="content" rows="5" cols="5" class="form-control" name="contentPost">
                                    {!! $data->content !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh bài viết</label
                            >
                            <div class="col-sm-10">
                                <img class="w-50" src="{{asset('back-end')}}/assets/images/uploaded/blogs/{{$data->imageSource}}">
                            </div>
                        </div>
                        <a><button onclick="return window.history.back();" class="btn btn-success">Trở lại</button></a>
                        <a href="{{asset('admin')}}/blog/delete/{{$data->id}}"><button class="btn btn-danger">Xóa</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        CKEDITOR.replace('content',{
            width: "100%",
            height: "200px"
        });

    </script>
@endsection
