@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <form action="" enctype="multipart/form-data" method="POST" class="col-md-12">
            @csrf
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Phân quyền S.U</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h5 class="font-italic font-weight-bold">Người dùng</h5>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Tìm kiếm thông tin</label
                                >
                                <div class="col-sm-8">
                                    <select name="searchInfo" class="form-control" required>
                                        @if($data->searchInfo==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->searchInfo==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Xem tin nhắn</label
                                >
                                <div class="col-sm-8">
                                    <select name="viewMess" class="form-control" required>
                                        @if($data->viewMess==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->viewMess==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Gửi E-mail</label
                                >
                                <div class="col-sm-8">
                                    <select name="sendMail" class="form-control" required>
                                        @if($data->sendMail==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->sendMail==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5 class="font-italic font-weight-bold">Slider</h5>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Thêm slider</label
                                >
                                <div class="col-sm-8">
                                    <select name="addSlider" class="form-control" required>
                                        @if($data->addSlider==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addSlider==1)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1" selected>Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addSlider==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Quản lý slider</label
                                >
                                <div class="col-sm-8">
                                    <select name="manageSlider" class="form-control" required>
                                        @if($data->manageSlider==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->manageSlider==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Duyệt slider</label
                                >
                                <div class="col-sm-8">
                                    <select name="browseSlider" class="form-control" required>
                                        @if($data->browseSlider==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->browseSlider==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5 class="font-italic font-weight-bold">Hình ảnh - Thư viện</h5>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Thêm hình ảnh</label
                                >
                                <div class="col-sm-8">
                                    <select name="addImage" class="form-control" required>
                                        @if($data->addImage==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addImage==1)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1" selected>Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addImage==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Quản lý hình ảnh</label
                                >
                                <div class="col-sm-8">
                                    <select name="manageImage" class="form-control" required>
                                        @if($data->manageImage==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->manageImage==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Duyệt hình ảnh</label
                                >
                                <div class="col-sm-8">
                                    <select name="browseImage" class="form-control" required>
                                        @if($data->browseImage==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->browseImage==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5 class="font-italic font-weight-bold">Sự kiện</h5>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Thêm sự kiện</label
                                >
                                <div class="col-sm-8">
                                    <select name="addEvent" class="form-control" required>
                                        @if($data->addEvent==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addEvent==1)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1" selected>Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addEvent==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Quản lý sự kiện</label
                                >
                                <div class="col-sm-8">
                                    <select name="manageEvent" class="form-control" required>
                                        @if($data->manageEvent==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->manageEvent==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Duyệt sự kiện</label
                                >
                                <div class="col-sm-8">
                                    <select name="browseEvent" class="form-control" required>
                                        @if($data->browseEvent==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->browseEvent==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5 class="font-italic font-weight-bold">Bài viết</h5>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Thêm bài viết</label
                                >
                                <div class="col-sm-8">
                                    <select name="addBlog" class="form-control" required>
                                        @if($data->addBlog==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addBlog==1)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1" selected>Cho phép qua kiểm duyệt</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->addBlog==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Quản lý bài viết</label
                                >
                                <div class="col-sm-8">
                                    <select name="manageBlog" class="form-control" required>
                                        @if($data->manageBlog==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->manageBlog==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Duyệt bài viết</label
                                >
                                <div class="col-sm-8">
                                    <select name="browseBlog" class="form-control" required>
                                        @if($data->browseBlog==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="2">Cho phép</option>
                                        @elseif($data->browseBlog==2)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="2" selected>Cho phép</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5 class="font-italic font-weight-bold">Dự án</h5>
                            <div class="dropdown-divider"></div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"
                                >Thêm dự án</label
                                >
                                <div class="col-sm-8">
                                    <select name="addProject" class="form-control" required>
                                        @if($data->addProject==0)
                                            <option value="0" selected>Không cấp quyền</option>
                                            <option value="1">Cho phép qua kiểm duyệt</option>
                                        @elseif($data->addProject==1)
                                            <option value="0">Không cấp quyền</option>
                                            <option value="1" selected>Cho phép qua kiểm duyệt</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection
