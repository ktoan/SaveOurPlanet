@section('container')
@section('title', 'Bài viết')
    @extends('layouts.front-end.layout')

    <div class="hero-wrap" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url('{{asset('front-end')}}/images/bg-12.jpg');
        background-size: cover; background-position: center;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7  text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span> <span>Bài viết</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Bài viết</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">

            <div class="row">
                <div class="col">
                    <h3 class="mb-3">Tìm bài viết</h3>
                    <div>
                        <input
                            type="search"
                            class="form-control ds-input"
                            id="search-input"
                            placeholder="Từ khóa..."
                            aria-label="Search post for..."
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
            <div class="row mt-5" id="listBlog">
                @foreach($blogs as $blog)
                    <div class="col-md-4 d-flex ">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{asset('/blog')}}/view/{{$blog->id}}" class="block-20" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/blogs/{{$blog->imageSource}});">
                            </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    <div><a href="{{asset('/post')}}/view/{{$blog->id}}">{{$blog->dateUpload}}</a></div>
                                    <div><a href="{{asset('/post')}}/view/{{$blog->id}}">{{$blog->user->fullname}}</a></div>
                                    <div><span><i class="icon-eye"></i> {{$blog->viewCount}}</span></div>
                                </div>
                                <h3 class="heading mt-3"><a href="#">{{$blog->title}}</a></h3>
                                <p>{{$blog->introduction}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-md-12 justify-content-center text-center"><a href="{{route('upBlog')}}"><button class="btn btn-primary px-5 py-3">Đăng tải bài viết</button></a></div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $(document).on('keyup', '#search-input', function () {
                var keyword = $('#search-input').val();
                $.ajax({
                    type: 'get',
                    url: '{{route('searchBlog')}}',
                    data: {
                        keyword: keyword,
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#listBlog').html(response);
                    }
                })
            })
        })
    </script>
@endsection
