@section('container')
@section('title', 'Thư viện')
    @extends('layouts.front-end.layout')
    <div class="hero-wrap" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),url('{{asset('front-end')}}/images/bg-13.jpg');
        background-position: center;
        background-size: cover;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{route('home')}}">Trang chủ</a></span> <span>Thư viện</span></p>
                    <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Thư viện</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{{route('uploadImage')}}"><button class="btn btn-primary px-5 py-3">Đăng ảnh</button></a>
                </div>
            </div>
            <div class="row mt-5">
                @foreach($images as $value)
                    <a href="{{asset('back-end')}}/assets/images/uploaded/images/{{$value->imageSource}}" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/images/{{$value->imageSource}});">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search"></span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
