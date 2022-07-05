@section('container')
@section('title', 'Sự kiện')
    @extends('layouts.front-end.layout')
    <div class="hero-wrap" style="
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url('{{asset('front-end')}}/images/bg-14.jpg');
        background-position: center;
        background-size: cover;
        " data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7  text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span> <span>Sự kiện</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Sự kiện</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="mb-3">Tìm sự kiện</h3>
                    <div>
                        <input
                            type="search"
                            class="form-control ds-input"
                            id="search-input"
                            placeholder="Từ khóa..."
                            aria-label="Search event for..."
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
            <div class="row mt-5" id="listEvent">
                @foreach($events as $event)
                    <div class="col-md-4 d-flex ">
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
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '#search-input', function () {
                var keyword = $('#search-input').val();
                $.ajax({
                    type: 'get',
                    url: '{{route('searchEvent')}}',
                    data: {
                        keyword: keyword,
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#listEvent').html(response);
                    }
                })
            })
        })
    </script>
@endsection
