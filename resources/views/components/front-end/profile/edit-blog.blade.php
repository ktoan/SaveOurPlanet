@section('container')
@section('title', 'Sửa bài viết')
@extends('layouts.profile.layout')
    <div class="profile-wrap" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
          url('{{asset('front-end')}}/images/bg_7.jpg');
      " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class="back"><a href="{{route('myBlog')}}"><i class="fas fa-long-arrow-alt-left"></i>&nbsp; Quay lại</a>
            </div>

            <div class="profile-avatar" style="text-align: center;">
                <img src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$userInfo->avatar}}"
                    class="avatar-previewer avatar" alt="">
            </div>
            <div class="profile-name mb-4" style="text-align: center;">
                <p class=" avttitle">Bài viết <br> {{$userInfo->fullname}}
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="evt" class="tab-content onstart">
            <div class="row block-9">
                <div class="col-md-12">
                    <h4 class="mb-4">Sửa bài viết "{{$blog->title}}"</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input required type='text' value="{{$blog->title}}" name="title" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input required type='text' value="{{$blog->introduction}}" name="introduction" class="form-control" />
                        </div>
                        <div class="form-group">
                            <textarea id="content" rows="5" cols="5" class="form-control" name="contentPost" placeholder="Mô tả...">
                                {!!$blog->content!!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <img src="{{asset('back-end')}}/assets/images/uploaded/blogs/{{$blog->imageSource}}" class="w-50">
                        </div>
                        <div class="form-group">
                            <input accept="image/*" type='file' id="imgInp" name="imageSource" class="form-control" />
                        </div>
                        <div class="form-group">
                            <img id="blah" src="" class="w-50" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure?')">Sửa bài viết</button>
                        </div>
                        <div class="form-group">
                            <?php
                            $message = Session::get('message');
                            ?>
                            @if(isset($message) && $message=='Không được để trống phần nội dung')
                                <p class="text-danger">{{$message}}</p>
                            @elseif(isset($message)&&$message=="Cập nhật thành công!")
                                <p class="text-success">{{$message}}</p>
                            @endif
                            <?php
                            Session::put('message', NULL);
                            ?>
                        </div>
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