@section('container')
@section('title', 'Đăng tải bài viết')
    @extends('layouts.front-end.layout')
    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('front-end')}}/images/bgr-12.jpg');
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
                        <span>Bài viết</span>
                        <span>Đăng tải bài viết</span>
                    </p>
                    <h1
                        class="mb-3 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        Đăng tải bài viết
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-12">
                    <h4 class="mb-4">Đăng tải bài viết</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <?php
                        use Illuminate\Support\Facades\Session;
                        ?>
                        <div class="form-group">
                            <input required type='text' placeholder="Tiêu đề..." name="title" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input required type='text' placeholder="Giới thiệu ngắn..." name="introduction" class="form-control" />
                        </div>
                        <div class="form-group">
                            <textarea id="content" rows="5" cols="5" class="form-control" name="contentPost" placeholder="Mô tả..."></textarea>
                        </div>
                        <div class="form-group">
                            <input required accept="image/*" type='file' id="imgInp" name="imageSource" class="form-control" />
                        </div>
                        <div class="form-group">
                            <img id="blah" src="" class="w-50" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" class="btn btn-primary py-3 px-5">Đăng bài viết</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        CKEDITOR.replace('content',{
            width: "100%",
            height: "200px"
        });

    </script>
@endsection
