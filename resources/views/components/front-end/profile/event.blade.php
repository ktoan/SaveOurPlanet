@section('container')
@section('title', 'Sự kiện của tôi')

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
                <p class=" avttitle">Sự kiện <br> {{$userInfo->fullname}}
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
						        Tên sự kiện
						      </th>
						      <th>
						        Thời gian
						      </th>
						      <th>
						        Địa điểm
						      </th>
						      <th>
						        Trạng thái
						      </th>
						      <th>
						        Diễn ra
						      </th>
						      <th>
						        Lựa chọn
						      </th>
					    	</tr>
					    </thead>
					    <tbody>
					    	<?php 
					    		use Carbon\Carbon;
					    		$now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
					    		$now = new DateTime($now);
					    	?>
					      @if(isset($events))
						      @foreach($events as $event)
						      <tr>
						        <td>{{$event->id}}</td>
						        <td>{{$event->name}}</td>
						        <td>{{$event->time}} ngày {{$event->date}}</td>
						        <td>{{$event->location}}</td>
						        <td class="text-success">Đã tham gia</td>
						        <td>
						        	@if(new DateTime($event->date)<$now)
						        		<span>Đã diễn ra</span>
						        	@elseif(new DateTime($event->date)==$now)
						        		<span>Đang diễn ra</span>
						        	@elseif(new DateTime($event->date)>$now)
						        		<span>Sắp diễn ra</span>
						        	@endif
						        </td>
						        <td><a class="text-danger" href="{{asset('event')}}/quit/{{$event->id}}" onclick="return confirm('Are you sure?')">Thoát</a></td>
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