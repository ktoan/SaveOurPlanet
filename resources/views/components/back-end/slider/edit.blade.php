@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Sửa Slider</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Tiêu đề</label
                            >
                            <div class="col-sm-10">
                                <input type='text' value="{{$data->title}}" required name="title" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Mô tả ngắn</label
                            >
                            <div class="col-sm-10">
                                <input type='text' value="{{$data->description}}" required name="description" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh cũ</label
                            >
                            <div class="col-sm-10">
                                <img src="{{asset('back-end/assets/images/uploaded/sliders')}}/{{$data->imageSource}}" class="w-50" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >File ảnh</label
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
                                <p class="text-success">
                                    <?php
                                    $message = Session::get('message');
                                    if(isset($message)) {
                                        echo $message;
                                    }
                                    Session::put('message', NULL);
                                    ?>
                                </p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
