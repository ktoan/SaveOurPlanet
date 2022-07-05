@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Thêm dự án</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Tiêu đề</label
                            >
                            <div class="col-sm-10">
                                <input required placeholder="Tên dự án..." type='text' name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Giới thiệu</label
                            >
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" name="introduction" placeholder="Giới thiệu..."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Mô tả</label
                            >
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Mô tả..."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Nội dung</label
                            >
                            <div class="col-sm-10">
                                <textarea id="content" rows="5" cols="5" class="form-control" name="contentPost" placeholder="Mô tả..."></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Mục tiêu dự án</label
                            >
                            <div class="col-sm-10">
                                <input required type='number' placeholder="Số tiền cần ủng hộ..." name="goal" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh dự án</label
                            >
                            <div class="col-sm-10">
                                <input required accept="image/*" type='file' id="imgInp" name="imageSource" class="form-control" />
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
                                $message = Session::get('message');
                                ?>
                                @if(isset($message) && $message=='Không được để trống phần nội dung')
                                    <p class="text-danger">{{$message}}</p>
                                @elseif(isset($message) && $message=='Thêm thành công rồi nè !!!')
                                    <p class="text-success">{{$message}}</p>
                                @endif
                                <?php
                                Session::put('message', NULL);
                                ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
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
