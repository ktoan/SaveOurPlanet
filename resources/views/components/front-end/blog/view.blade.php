@section('container')
@section('title', $data->title)
    @extends('layouts.front-end.layout')
    <?php
        use App\Models\Blog;
        $post = Blog::findOrFail($data->id);
        $post->increment('viewCount');
    ?>
    <div
        class="hero-wrap"
        style="
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{asset('back-end')}}/assets/images/uploaded/blogs/{{$data->imageSource}}');
            background-size: cover; background-position: center;
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
                        <span class="mr-2"><a href="">Bài viết</a></span>
                        <span>{{$data->title}}</span>
                    </p>
                    <h1
                        class="mb-3 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
                    >
                        {{$data->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    {!! $data->content !!}
                    <div class="about-author row p-5 bg-light">
                        <div class="bio col-md-6">
                            <img
                                src="{{asset('back-end')}}/assets/images/uploaded/avatar/{{$data->user->avatar}}"
                                alt="Image placeholder"
                                class="img-fluid mb-4"
                            />
                        </div>
                        <div class="desc align-self-md-center col-md-6">
                            <h3 class="mb-3">Người tạo bài viết</h3>
                            <p>{{$data->user->fullname}}</p>
                            <p>Liên hệ: {{$data->user->email}}</p>
                            <p>Vai trò: {{$data->user->utype}}</p>
                            <p>Ngày đăng: {{$data->dateUpload}}</p>
                        </div>
                    </div>
                    <div class="pt-5 mt-5">
                        <?php
                            $user = Session::get('user');
                        ?>
                        @if (!isset($user))
                        <p>Chưa đăng nhập. <a href="{{route('join')}}">Đăng nhập ngay!</a></p>
                        @else
                        <form action="{{route('sendComment')}}" id="formComment" method="POST" class="w-100 row align-items-center mb-4">
                            @csrf
                            <input type="hidden" id="idBlog" name="id" value="{{$data->id}}">
                            <div class="col-md-9 mb-4">
                                <input type="text" id="commentContent" class="form-control" name="comment">
                            </div>
                            <div class="col-md-3 mb-4">
                                <button type="submit" id="sendComment" class="btn btn-primary form-control">Đăng</button>
                            </div>
                        </form>
                        @endif

                        <div id="ListComment">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="sidebar-box  fadeInUp d">
                        <h3>Bài viết gần nhất</h3>
                        @foreach($recent as $blog)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url({{asset('back-end')}}/assets/images/uploaded/blogs/{{$blog->imageSource}})"></a>
                                <div class="text">
                                    <h3 class="heading">
                                        <a href="{{asset('/blog')}}/view/{{$blog->id}}">{{$blog->title}}</a>
                                    </h3>
                                    <div class="meta">
                                        <div>
                                            <a href="{{asset('/blog')}}/view/{{$blog->id}}"><span class="icon-calendar"></span> {{$blog->dateUpload}}</a>
                                        </div>
                                        <div>
                                            <a href="{{asset('/blog')}}/view/{{$blog->id}}"><span class="icon-person"></span> {{$blog->user->fullname}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            loadComment();
            function loadComment() {
                var idBlog = $('#idBlog').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: 'post',
                    url: '{{route("allComment")}}',
                    data:{
                        id: idBlog, _token: _token
                    },
                    success: function (response) {
                        $('#ListComment').html(response);
                    }
                })
            }

            $('#formComment').on('submit',function(ev) {
                ev.preventDefault();
                var idBlog = $('#idBlog').val();
                var _token = $('input[name="_token"]').val();
                var content = $('#commentContent').val();
                $.ajax({
                    type: "post",
                    url: "{{route('sendComment')}}",
                    data:{ id: idBlog, comment: content, _token:_token},
                    success: function(response){
                        loadComment();
                        $('#commentContent').val('');
                    }
                });
            })

        })
    </script>
@endsection
