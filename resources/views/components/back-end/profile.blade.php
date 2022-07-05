@section('container')
    @extends('layouts.back-end.layout')

    <div class="row">
        <div class="col">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5 mb-3 avatar-previewer" width="150px" src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$data->avatar}}"><span class="font-weight-bold">{{$data->fullname}}</span><span class="text-black-50 mt-2">{{$data->email}}</span><span class="mt-2">
{{--                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-primary btn">Thay đổi ảnh đại diện</button>--}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Thay đổi ảnh đại diện</button>
                            </span></div>
                    </div>
                    <div class="col-md-6 border-right-0">
                        <form action="{{asset('admin')}}/profile/save-profile/{{$data->id}}" method="POST" class="p-3 py-5" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Thông tin cá nhân</h4>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tên</label>
                                <div class="col-sm-8">
                                    <input name="fullname" type="text" class="form-control"
                                           value="{{$data->fullname}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="text" class="form-control"
                                           value="{{$data->email}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Địa chỉ</label>
                                <div class="col-sm-8">
                                    @if(asset($data->address) && $data->address!="")
                                        <input name="address" type="text" class="form-control"
                                               value="{{$data->address}}" >
                                    @else
                                        <input name="address" type="text" class="form-control"
                                               placeholder="Chưa cập nhật" >
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Số điện thoại</label>
                                <div class="col-sm-8">
                                    @if(asset($data->phone) && $data->phone!="")
                                        <input name="phone" type="text" class="form-control"
                                               value="{{$data->phone}}" >
                                    @else
                                        <input name="phone" type="text" class="form-control"
                                               placeholder="Chưa cập nhật" >
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Giới tính</label>
                                <div class="col-sm-8">
                                    @if($data->sex=="")
                                        <select name="sex" class="form-control">
                                            <option selected>Chưa cập nhật</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                    @else
                                        @if($data->sex=="Nam")
                                            <select name="sex" class="form-control">
                                                <option selected value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                        @elseif($data->sex=="Nữ")
                                            <select name="sex" class="form-control">
                                                <option value="Nam">Nam</option>
                                                <option selected value="Nữ">Nữ</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                        @elseif($data->sex=="Khác")
                                            <select name="sex" class="form-control">
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option selected value="Khác">Khác</option>
                                            </select>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Vai trò</label>
                                <div class="col-sm-8">
                                    @if(asset($data->utype) && $data->utype!="")
                                        <input type="text" class="form-control"
                                               value="{{$data->utype}}" readonly>
                                    @else
                                        <input type="text" class="form-control"
                                               placeholder="Chưa cập nhật" >
                                    @endif
                                </div>
                            </div>
                            <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            ?>
                            @if(isset($message)&&$message=='Cập nhật thông tin thành công!')
                                <p class="text-success">{{$message}}</p>
                            @endif
                            <?php Session::put('message', NULL); ?>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button></div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience"><span><strong>Quản lý mật khẩu</strong></span></div><br>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    Thay đổi mật khẩu
                                </div>
                                <div class="col-md-12">
                                    <form action="{{asset('admin')}}/profile/change-password/{{$data->id}}" method="POST" class="w-100">
                                        @csrf
                                        <input class="form-control mb-1" name="oldPassword" placeholder="Mật khẩu cũ" type="password">
                                        <input class="form-control mb-1" name="newPassword" placeholder="Mật khẩu mới" type="password">
                                        <input class="form-control mb-1" name="cnewPassword" placeholder="Xác nhận mật khẩu mới" type="password">
                                        <button type="submit" class="form-control mb-1 btn btn-success">Thay đổi</button>
                                        <?php
                                        $messageP = Session::get('messageP');
                                        $err = Session::get('err');
                                        ?>
                                        @if(isset($messageP)&&$messageP=="Cập nhật mật khẩu thành công!")
                                            <p class="text-success">{{$messageP}}</p>
                                        @elseif(isset($err))
                                            @foreach($err as $value)
                                                <p class="text-danger">{{$value}}</p>
                                            @endforeach
                                        @endif
                                        <?php
                                        Session::put('err', NULL);
                                        Session::put('messageP', NULL);
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="col-md-3">--}}
                    {{--                        <div class="p-3 py-5">--}}
                    {{--                            <div class="d-flex justify-content-between align-items-center experience"><span><strong>Xác nhận email</strong></span></div><br>--}}
                    {{--                            <div class="row">--}}
                    {{--                                    <div class="col-md-12 mb-2">--}}
                    {{--                                        <span class="text-success">Email của bạn đã xác nhận</span>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-md-12">--}}
                    {{--                                        <form action="" class="w-100">--}}
                    {{--                                            <button type="submit" class="form-control mb-1 btn btn-primary">Xác nhận</button>--}}
                    {{--                                        </form>--}}
                    {{--                                    </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay đổi ảnh đại diện</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <input type="file" name="avatar" id="avatar" class="form-control mb-2">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#avatar').ijaboCropTool({
                preview : '.avatar-previewer',
                setRatio:1,
                type: 'POST',
                processUrl:'{{asset('admin')}}/profile/avatar/change/{{$data->id}}',
                withCSRF: ['_token', '{{csrf_token()}}'],
                allowedExtensions: ['jpg', 'jpeg','png'],
                buttonsText:['LƯU','HỦY'],
                buttonsColor:['#30bf7d','#ee5155', -15],
                onSuccess:function(message, element, status){
                    swal("Thành công", message, 'success', {
                        button: "OK",
                    });
                },
                onError:function(message, element, status){
                    swal("Opps", message, 'error', {
                        button: "OK",
                    });
                }
            });
        })
    </script>
@endsection
