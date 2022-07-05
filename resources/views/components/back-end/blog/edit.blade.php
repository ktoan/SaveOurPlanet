@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Sửa bài viết <span class="font-italic">{{$data->title}}</span></h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Tiêu đề</label
                            >
                            <div class="col-sm-10">
                                <input required value="{{$data->title}}" type='text' name="title" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Giới thiệu ngắn</label
                            >
                            <div class="col-sm-10">
                                <input required value="{{$data->introduction}}" type='text' name="introduction" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Nội dung</label
                            >
                            <div class="col-sm-10">
                                <textarea id="content" rows="5" cols="5" class="form-control" name="contentPost" placeholder="Mô tả...">
                                    {!! $data->content !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh bài viết</label
                            >
                            <div class="col-sm-10">
                                <img src="{{asset('back-end/assets/images/uploaded/blogs')}}/{{$data->imageSource}}" class="w-50">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh mới (*)</label
                            >
                            <div class="col-sm-10">
                                <input accept="image/*" type='file' id="imgInp" name="imageSource" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            ></label
                            >
                            <div class="col-sm-10">
                                <img id="blah" src="" class="w-50" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            ></label
                            >
                            <div class="col-sm-10">
                                <?php
                                use Illuminate\Support\Facades\Session;
                                $message = Session::get('message');
                                ?>
                                @if(isset($message))
                                    <p class="text-success">{{$message}}</p>
                                @endif
                                <?php Session::put('message', NULL); ?>
                            </div>
                        </div>
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">Sửa</button>
                    </form>
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
