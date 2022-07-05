@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Sửa sự kiện</h4>
                    <form action="{{asset('/admin')}}/event/edit/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Tên sự kiện</label
                            >
                            <div class="col-sm-10">
                                <input required value="{{$data->name}}" type='text' name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Giới thiệu ngắn</label
                            >
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" name="introduction" >{{$data->introduction}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Nội dung</label
                            >
                            <div class="col-sm-10">
                                <textarea id="content" rows="5" cols="5" class="form-control" name="contentPost" placeholder="Mô tả...">{!! $data->content !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Thời gian</label
                            >
                            <div class="col-sm-10">
                                <input value="{{$data->time}}" required type='time' name="time" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ngày</label
                            >
                            <div class="col-sm-10">
                                <input value="{{$data->date}}" required type='date' name="date" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Địa điểm</label
                            >
                            <div class="col-sm-10">
                                <input required value="{{$data->location}}" type='text' name="location" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh cũ</label
                            >
                            <div class="col-sm-10">
                                <img class="w-50" src="{{asset('back-end')}}/assets/images/uploaded/events/{{$data->imageSource}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Ảnh muốn sửa</label
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
                                $message = Session::get('message');
                                ?>
                                @if(isset($message) && $message=='Không được để trống phần nội dung')
                                    <p class="text-danger">{{$message}}</p>
                                @endif
                                <?php
                                Session::put('message', NULL);
                                ?>
                            </div>
                        </div>
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-primary">Sửa</button>
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
