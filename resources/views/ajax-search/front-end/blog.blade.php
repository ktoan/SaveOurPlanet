@if(count($blogs)==0)
    <div class="col">
        <h3>Không tìm thấy bài viết phù hợp</h3>
    </div>
@else
    @foreach($blogs as $blog)
        <div class="col-md-4 d-flex">
            <div class="blog-entry align-self-stretch">
                <a href="{{asset('/blog')}}/view/{{$blog->id}}" class="block-20" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/blogs/{{$blog->imageSource}});">
                </a>
                <div class="text p-4 d-block">
                    <div class="meta mb-3">
                        <div><a href="{{asset('/blog')}}/view/{{$blog->id}}">{{$blog->dateUpload}}</a></div>
                        <div><a href="{{asset('/blog')}}/view/{{$blog->id}}">{{$blog->user->fullname}}</a></div>
                        <div><span><i class="icon-eye"></i> {{$blog->viewCount}}</span></div>
                    </div>
                    <h3 class="heading mt-3"><a href="{{asset('/blog')}}/view/{{$blog->id}}">{{$blog->title}}</a></h3>
                    <p>{{$blog->introduction}}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
