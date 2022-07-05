@if(count($events)==0)
    <div class="col">
        <h3>Không tìm thấy bài viết phù hợp</h3>
    </div>
@else
    @foreach($events as $event)
        <div class="col-md-4 d-flex">
            <div class="blog-entry align-self-stretch">
                <a href="{{asset('/event')}}/view/{{$event->id}}" class="block-20" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/events/{{$event->imageSource}});">
                </a>
                <div class="text p-4 d-block">
                    <div class="meta mb-3">
                        <div><a href="{{asset('/event')}}/view/{{$event->id}}">{{$event->dateCreate}}</a></div>
                        <div><a href="{{asset('/event')}}/view/{{$event->id}}">{{$event->user->fullname}}</a></div>
                        <div><a href="{{asset('/event')}}/view/{{$event->id}}" class="meta-chat"><span class="icon-user"></span> {{$event->noMembers}}</a></div>
                    </div>
                    <h3 class="heading mb-4"><a href="{{asset('/event')}}/view/{{$event->id}}">{{$event->name}}</a></h3>
                    <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> {{$event->time}} - {{$event->date}}</span> <br> <span><i class="icon-map-marker"></i> {{$event->location}}</span></p>
                    <p>{{$event->introduction}}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
