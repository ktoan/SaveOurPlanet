@if(count($projects)==0)
    <div class="col">
        <h3>Không tìm thấy dự án phù hợp</h3>
    </div>
@else
        @foreach($projects as $project)
            <div class="col-md-4 d-flex">
                <div class="blog-entry align-self-stretch">
                    <a
                        href="{{asset('project')}}/view/{{$project->id}}"
                        class="block-20"
                        style="background-image: url('{{asset('back-end')}}/assets/images/uploaded/projects/{{$project->imageSource}}')"
                    >
                    </a>
                    <div class="text p-4 d-block">
                        <div class="meta mb-3">
                            <div><a href="{{asset('project')}}/view/{{$project->id}}">{{$project->dateCreate}}</a></div>
                            <div><a href="{{asset('project')}}/view/{{$project->id}}">{{$project->user->fullname}}</a></div>
                        </div>
                        <h3 class="heading mt-3">
                            <a href="{{asset('project')}}/view/{{$project->id}}">{{$project->name}}</a>
                        </h3>
                        <p>
                            {{$project->introduction}}
                        </p>
                        <div class="progress custom-progress-success">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$project->now/$project->goal*100}}%" aria-valuenow="0" aria-valuemin="{{$project->now}}" aria-valuemax="{{$project->goal}}"></div>
                        </div>
                        <span class="fund-raised d-block">{{number_format($project->now, 0,",",".")}} / {{number_format($project->goal, 0,",",".")}}</span>

                    </div>
                </div>
            </div>
        @endforeach
@endif
