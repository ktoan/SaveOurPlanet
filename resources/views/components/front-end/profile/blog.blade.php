@section('container')
@section('title', 'Bài viết của tôi')
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
                <p class=" avttitle">Bài viết <br> {{$userInfo->fullname}}
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
						        Tiêu đề
						      </th>
						      <th>
						        Ngày đăng
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
					      @if(isset($blogs))
						      @foreach($blogs as $blog)
						      <tr>
						        <td>{{$blog->id}}</td>
						        <td>{{$blog->user->fullname}}</td>
						        <td>{{$blog->title}}</td>
						        <td>{{$blog->dateUpload}}</td>
						        <td>
						        	@if($blog->status==1)
						        		<span class="text-success">Đã duyệt</span>
						        	@elseif($blog->status==0)
						        		<span class="text-danger">Chưa duyệt</span>
						        	@endif
						        </td>
								<td>
									<a href="{{asset('profile')}}/my-blog/edit/{{$blog->id}}" class="text-warning mr-4">Sửa</a>
									<a href="{{asset('profile')}}/my-blog/delete/{{$blog->id}}" onclick="return confirm('Are you sure?')" class="text-danger">Xóa</a>
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
