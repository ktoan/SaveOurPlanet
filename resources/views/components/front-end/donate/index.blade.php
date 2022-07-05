@section('container')
@section('title', 'Ủng hộ')
    @extends('layouts.front-end.layout')
    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('front-end')}}/images/bg_111.jpg');
            background-position: center;
            background-size: cover;
            "
        data-stellar-background-ratio="0.5"
    >
        <div class="overlay"></div>
        <div class="container">
            <div
                class="
            row
            no-gutters
            slider-text
            align-items-center
            justify-content-center
          "
                data-scrollax-parent="true"
            >
                <div
                    class="col-md-7  text-center"
                    data-scrollax=" properties: { translateY: '70%' }"
                >
                    <p
                        class="breadcrumbs"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        <span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span>
                        <span>Ủng hộ</span>
                    </p>
                    <h1
                        class="mb-3 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        Ủng hộ
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Ủng hộ phát triển trang web</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <form action="{{route('donateWebsite')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Số tiền bạn muốn ủng hộ</label>
                            <div class="input_field">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"
                      >VND</span
                      >
                                    </div>
                                    <input
                                        type="number"
                                        class="form-control"
                                        placeholder="50.000"
                                        aria-label="Username"
                                        aria-describedby="basic-addon1"
                                        required
                                        name="amout"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">
                                Gửi yêu cầu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div
                class="
            row
            mt-5
            w-100
            text-center
            align-content-center
            justify-content-center
          "
            >
                <h3>Hoặc</h3>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h3 class="mb-5">Chọn một dự án</h3>
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-3 font-italic">Tìm dự án</h3>
                            <div>
                                <input
                                    type="search"
                                    class="form-control ds-input"
                                    id="search-input"
                                    placeholder="Từ khóa..."
                                    aria-label="Search project for..."
                                    autocomplete="off"
                                    data-bd-docs-version="5.0"
                                    spellcheck="false"
                                    role="combobox"
                                    aria-autocomplete="list"
                                    aria-expanded="false"
                                    aria-owns="algolia-autocomplete-listbox-0"
                                    dir="auto"
                                    style="position: relative; vertical-align: top"
                                    name="keyword"
                                />
                                <button
                                    style="
                  position: absolute;
                  right: 20px;
                  top: 53%;
                  border: none;
                  padding: 8px 15px;
                  background: transparent;
                "
                                    type="submit"
                                >
                                    <i class="icon-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 d-flex" id="listProject">
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
                                            <div><a href="#">{{$project->dateCreate}}</a></div>
                                            <div><a href="#">{{$project->user->fullname}}</a></div>
                                        </div>
                                        <h3 class="heading mt-3">
                                            <a href="#">{{$project->name}}</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '#search-input', function () {
                var keyword = $('#search-input').val();
                $.ajax({
                    type: 'get',
                    url: '{{route('searchProject')}}',
                    data: {
                        keyword: keyword,
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#listProject').html(response);
                    }
                })
            })
        })
    </script>
@endsection
