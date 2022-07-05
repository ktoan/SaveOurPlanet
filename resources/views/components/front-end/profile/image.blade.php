@section('container')
@section('title', 'Thư viện của tôi')

@extends('layouts.profile.layout')
    <div class="profile-wrap" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
          url('{{asset('front-end')}}/images/bg_7.jpg');
      " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class="back"><a href="{{route('myProfile')}}"><i class="fas fa-long-arrow-alt-left"></i>&nbsp; Quay lại</a>
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
            <div class="row">
            	<div class="col-md-12 text-dark">
            		<div class="table-responsive">
					  <table class="table table-hover">
					    <thead>
					    	<tr>
						      <th>
						        Id
						      </th>
						      <th>
						        Người đăng
						      </th>
						      <th>
						        Thời gian
						      </th>
						      <th>
						       	Xem
						      </th>
						      <th>
						        Trạng thái
						      </th>
						      <th>
						        Lựa chọn
						      </th>
					    	</tr>
					    </thead>
					    <tbody>
					      @if(isset($images))
						      @foreach($images as $image)
						      <tr>
						        <td>{{$image->id}}</td>
						        <td>{{$image->user->fullname}}</td>
						        <td>{{$image->dateUpload}}</td>
						        <td><img src="{{asset('back-end')}}/assets/images/uploaded/images/{{$image->imageSource}}" width="100px"></td>
						        <td>
						        	@if($image->status==0)
						        		<span class="text-danger">Chưa duyệt</span>
						        	@elseif($image->status==1)
						        		<span class="text-success">Đã duyệt</span>
						        	@endif
						        </td>
						        <td>
						        	<a class="text-warning mr-4" href="{{asset('profile')}}/my-image/edit/{{$image->id}}">Sửa</a>
						        	<a class="text-danger" href="{{asset('profile')}}/my-image/delete/{{$image->id}}" onclick="return confirm('Are you sure?')">Xóa</a>
						        </td>
						      </tr>
						      @endforeach
					      @endif
					    </tbody>
					  </table>
					</div>
            	</div>
            </div>
		</div>
    </div>
@endsection
