@section('container')
@section('title', 'Trang cá nhân')
@extends('layouts.profile.layout')
    <div class="profile-wrap" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
          url('{{asset('front-end')}}/images/bg_7.jpg');
      " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class="back"><a href="{{route('home')}}"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;Về trang
                    chủ</a>
            </div>

            <div class="profile-avatar" style="text-align: center;">
                <img src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$userInfo->avatar}}"
                    class="avatar-previewer avatar" alt="">
            </div>
            <div class="profile-name" style="text-align: center;">
                <p class=" avttitle">Hello, <span style="font-size:40px;color:#fd7e14">{{$userInfo->fullname}}</span>
                </p>
            </div>
            <div class="tabs-pack">
                <button class=" tab-link activebtn" onclick="openfunc(event, 'inf')">Thông tin cá nhân</button>
                <button class="tab-link" onclick="openfunc(event, 'dnt')">Lịch sử hoạt động</button>
                <button class="tab-link" onclick="openfunc(event, 'prj')">Tường của tôi</button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="inf" class="tab-content onstart">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                            class="rounded-circle mt-5 avatar-previewer" width="150px"
                            src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$userInfo->avatar}}"><span
                            class="font-weight-bold">{{$userInfo->fullname}}</span><span
                            class="text-black-50">{{$userInfo->email}}</span><span> </span></div>
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <button type="button" class="btn btn-primary px-5 py-3 mb-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Thay đổi ảnh đại diện</button>

                        <button id="modalinput" class="btn btn-primary px-5 py-3 mb-4" type="button"
                            data-bs-toggle="modal" data-bs-target="#changepwmodal">Đổi mật khẩu</button>
                        @if (!isset($userInfo->token) || $userInfo->token=="")
                            <p class="text-danger">Tài khoản chưa đăng ký bảo mật <a href="{{route('regisRecover')}}">Đăng ký ngay</a></p>
                        @else
                            <p class="text-success">Đã đăng ký bảo mật</p>
                        @endif
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thông tin cá nhân</h4>
                        </div>

                        <form action="{{route('saveProfile')}}" method="POST" class="w-100"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input name="fullname" type="text" class="form-control"
                                        value="{{$userInfo->fullname}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input name="email" type="text" class="form-control" value="{{$userInfo->email}}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if(asset($userInfo->address) && $userInfo->address!="")
                                    <input name="address" type="text" class="form-control"
                                        value="{{$userInfo->address}}">
                                    @else
                                    <input name="address" type="text" class="form-control"
                                        placeholder="Chưa cập nhật địa chỉ">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if(asset($userInfo->phone) && $userInfo->phone!="")
                                    <input name="phone" type="text" class="form-control" value="{{$userInfo->phone}}">
                                    @else
                                    <input name="phone" type="text" class="form-control"
                                        placeholder="Chưa cập nhật số điện thoại">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    @if($userInfo->sex=="")
                                    <select name="sex" class="form-control">
                                        <option selected>Chưa cập nhật</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                    @else
                                    @if($userInfo->sex=="Nam")
                                    <select name="sex" class="form-control">
                                        <option selected value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                    @elseif($userInfo->sex=="Nữ")
                                    <select name="sex" class="form-control">
                                        <option value="Nam">Nam</option>
                                        <option selected value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                    @elseif($userInfo->sex=="Khác")
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
                                <div class="col-sm-12">
                                    @if(asset($userInfo->utype) && $userInfo->utype!="")
                                    <input type="text" class="form-control" value="{{$userInfo->utype}}" readonly>
                                    @else
                                    <input type="text" class="form-control" placeholder="Chưa cập nhật">
                                    @endif
                                </div>
                            </div>
                            <div class="mt-5 text-center"><button class="px-5 py-3 btn btn-primary profile-button"
                                    type="submit">Lưu thông tin</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="dnt" class="tab-content">
        <div class="container big">
            <div class="row d-flex justify-content-center mt-100 mb-100">
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Lịch sử hoạt động:</h5>
                            <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                @if(isset($activities))
                                @foreach($activities as $activity)
                                <div class="vertical-timeline-item vertical-timeline-element">
                                    <div> <span class="vertical-timeline-element-icon bounce-in"> <i
                                                class="badge badge-dot badge-dot-xl badge-success"></i> </span>
                                        <div class="vertical-timeline-element-content bounce-in">
                                            <h4 class="timeline-title">Meeting with client</h4>
                                            <p><span class="text-primary">{{$activity->user->fullname}}</span> {{$activity->descActivity}}</p> <span
                                                class="vertical-timeline-element-date"> {{$activity->time}} <br> {{$activity->date}}</span>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="prj" class="tab-content">
        <div class="container border-bottom">
            <div class="row text-center justify-content-center w-100">
                <h4>Sự kiện đã tham gia</h4>
            </div>

                <div class="row mt-5 justify-content-center">
                    @if(isset($eventJoined))
                        @if(count($eventJoined)==0)
                            <p class="text-center">Bạn chưa tham gia sự kiện nào hết ...<a href="{{route('event')}}">Tham gia ngay</a></p>
                        @else
                            @if(count($eventJoined)>3)
                            @for($i=0; $i<=2; $i++)
                                <div class="col-md-4 d-flex">
                                    <div class="blog-entry align-self-stretch">
                                        <a href="{{asset('/event')}}/view/{{$eventJoined[$i]->id}}" class="block-20" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/events/{{$eventJoined[$i]->imageSource}});">
                                        </a>
                                        <div class="text p-4 d-block">
                                            <div class="meta mb-3">
                                                <div><a href="#">{{$eventJoined[$i]->dateCreate}}</a></div>
                                                <div><a href="#">{{$eventJoined[$i]->user->fullname}}</a></div>
                                                <div><a href="#" class="meta-chat"><span class="icon-user"></span> {{$eventJoined[$i]->noMembers}}</a></div>
                                            </div>
                                            <h3 class="heading mb-4"><a href="#">{{$eventJoined[$i]->name}}</a></h3>
                                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> {{$eventJoined[$i]->time}} - {{$eventJoined[$i]->date}}</span> <br> <span><i class="icon-map-marker"></i> {{$eventJoined[$i]->location}}</span></p>
                                            <p>{{$eventJoined[$i]->introduction}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @elseif(count($eventJoined)<=3)
                                @foreach($eventJoined as $event)
                                <div class="col-md-4 d-flex">
                                    <div class="blog-entry align-self-stretch">
                                        <a href="{{asset('/event')}}/view/{{$event->id}}" class="block-20" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/events/{{$event->imageSource}});">
                                        </a>
                                        <div class="text p-4 d-block">
                                            <div class="meta mb-3">
                                                <div><a href="#">{{$event->dateCreate}}</a></div>
                                                <div><a href="#">{{$event->user->fullname}}</a></div>
                                                <div><a href="#" class="meta-chat"><span class="icon-user"></span> {{$event->noMembers}}</a></div>
                                            </div>
                                            <h3 class="heading mb-4"><a href="#">{{$event->name}}</a></h3>
                                            <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> {{$event->time}} - {{$event->date}}</span> <br> <span><i class="icon-map-marker"></i> {{$event->location}}</span></p>
                                            <p>{{$event->introduction}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        @endif
                    @endif
                </div>@if (isset($eventJoined))
        @if(count($eventJoined)==0)
        @else
        <div class="row mt-5 mb-5 text-center justify-content-center">
            <a href="{{route('myEvent')}}">
                <button class="btn btn-primary px-5 py-3">Xem sự kiện</button>
            </a>
        </div>
        @endif
        @endif
    </div>
    <div class="container border-bottom">
        <div class="row mt-5 text-center justify-content-center w-100">
            <h4>Hình ảnh bạn đã tải lên</h4>
        </div>
        <section class="mt-5 ftco-gallery">
            <div class="d-md-flex justify-content-center">
                @if(isset($images))
                @if(count($images)==0)
                <p class="text-center">Bạn chưa đăng tải hình ảnh nào hết ...<a href="{{route('uploadImage')}}">Đăng tải
                        ngay</a></p>
                @else
                @foreach($images as $imageItem)
                <a class="
                                gallery
                                d-flex
                                justify-content-center
                                align-items-center
                                img
                              "
                    style="background-image: url({{asset('back-end')}}/assets/images/uploaded/images/{{$imageItem->imageSource}})">
                </a>
                @endforeach
                @endif
                @endif
            </div>
        </section>
        @if (isset($images))
        @if(count($images)==0)
        @else
        <div class="row mt-5 mb-5 text-center justify-content-center">
            <a href="{{route('myImage')}}">
                <button class="btn btn-primary px-5 py-3">Xem hình ảnh</button>
            </a>
        </div>
        @endif
        @endif
    </div>
    <div class="container border-bottom">
        <div class="row mt-5 text-center justify-content-center w-100">
            <h4>Bài viết đã đăng</h4>
        </div>
        <div class="row mt-5 justify-content-center">
            @if(isset($blogs))
            @if(count($blogs)==0)
            <p class="text-center">Bạn chưa đăng tải bài viết nào hết ...<a href="{{route('upBlog')}}">Đăng tải ngay</a>
            </p>
            @else
            @foreach($blogs as $blog)
            <div class="col-md-4 d-flex">
                <div class="blog-entry align-self-stretch">
                    <a href="{{asset('blog')}}/view/{{$blog->id}}" class="block-20"
                        style="background-image: url('{{asset('back-end')}}/assets/images/uploaded/blogs/{{$blog->imageSource}}')">
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="#">{{$blog->dateUpload}}</a></div>
                            <div><a href="#">{{$blog->user->fullname}}</a></div>
                            <div><span><i class="icon-eye"></i> {{$blog->viewCount}}</span></div>
                        </div>
                        <div class="mb-3">
                            @if($blog->status==0)
                            <p class="text-danger">Chưa duyệt</p>
                            @else
                            <p class="text-success">Đã duyệt</p>
                            @endif
                        </div>
                        <h3 class="heading mt-3">
                            <a href="#">{{$blog->title}}</a>
                        </h3>
                        <p>
                            {{$blog->introduction}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            @endif
        </div>
        @if (isset($blogs))
        @if(count($blogs)==0)
        @else
        <div class="row mt-5 mb-5 text-center justify-content-center">
            <a href="{{route('myBlog')}}">
                <button class="btn btn-primary px-5 py-3">Xem bài viết</button>
            </a>
        </div>
        @endif
        @endif
    </div>
    </div>
    </div>
    <!--Modal-->
    <form action="{{route('changePassword')}}" method="POST" class="modal fade" id="changepwmodal" tabindex="-1"
        aria-labelledby="changepwmodal" aria-hidden="true">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12"><label class="labels big">Mật khẩu cũ</label><input name="oldPassword"
                            type="password" class="form-control"></div>
                    <div class="col-md-12"><label class="labels big ">Mật khẩu mới</label><input name="newPassword"
                            type="password" class="form-control"></div>
                    <div class="col-md-12"><label class="labels big">Xác nhận mật khẩu mới</label><input
                            name="cnewPassword" type="password" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary btn-block ml-1" data-bs-dismiss="modal">Xác
                        nhận</button>
                </div>
            </div>
        </div>
    </form>
    <!--Modal-->
    <!--Modal-->
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
    <!--Modal-->
@endsection
