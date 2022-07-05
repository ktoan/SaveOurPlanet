@section('container')
@section('title', 'Sửa hình ảnh')

@extends('layouts.profile.layout')
    <div class="profile-wrap" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
          url('{{asset('front-end')}}/images/bg_7.jpg');
      " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class="back"><a href="{{route('myImage')}}"><i class="fas fa-long-arrow-alt-left"></i>&nbsp; Quay lại</a>
            </div>

            <div class="profile-avatar" style="text-align: center;">
                <img src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$userInfo->avatar}}"
                    class="avatar-previewer avatar" alt="">
            </div>
            <div class="profile-name mb-4" style="text-align: center;">
                <p class=" avttitle">Hình ảnh <br> {{$userInfo->fullname}}
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="evt" class="tab-content onstart">
            <div class="row block-9">
                <div class="col-md-12 mb-4">
                    <img class="w-50" src="{{asset('back-end')}}/assets/images/uploaded/images/{{$image->imageSource}}">
                </div>
                <div class="col-md-12">
                    <h4 class="mb-4">Đăng tải sửa</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <?php
                        use Illuminate\Support\Facades\Session;
                        ?>
                        <div class="form-group">
                            <input required accept="image/*" type='file' id="imgInp" name="imageSource" class="form-control" />
                        </div>
                        <div class="form-group">
                            <img id="blah" src="" class="w-50" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-primary py-3 px-5">Đăng hình ảnh</button>
                        </div>
                        <div class="form-group">
                            <?php
                            $message = Session::get('message');
                            ?>
                            @if(isset($message) && $message=='Thêm ảnh thành công - Chờ duyệt...')
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
@endsection