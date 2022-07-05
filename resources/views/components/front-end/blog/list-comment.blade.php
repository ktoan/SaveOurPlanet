@if(isset($allComment))
	@if(count($allComment)==0)
	Chưa có bình luận nào
	@else
		<ul class="comment-list">
		<h3 class="mb-4">Bài viết này có {{count($allComment)}} bình luận</h3>
		@foreach($allComment as $comment)
			<li class="comment mt-4">
                <div class="vcard bio">
                    <img src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$comment->user->avatar}}" alt="Image placeholder">
                </div>
                <div class="comment-body">
                    <h3>{{$comment->user->fullname}}</h3>
                    <div class="meta">{{$comment->time}} ngày {{$comment->date}}</div>
                    <p>{{$comment->comment}}</p>
                </div>
            </li>
		@endforeach
        </ul>
	@endif
@endif
