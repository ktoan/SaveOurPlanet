@section('container')
    @extends('layouts.back-end.layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="sub-title">Gửi mail tất cả người đã đăng ký</h4>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Tiêu đề</label
                            >
                            <div class="col-sm-10">
                                <input required placeholder="Tiêu đề..." type='text' name="title" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Mở đầu</label
                            >
                            <div class="col-sm-10">
                                <input required placeholder="Mở đầu..." type='text' name="header" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"
                            >Nội dung</label
                            >
                            <div class="col-sm-10">
                                <textarea id="content" rows="5" cols="5" class="form-control" name="message" placeholder="Nội dung"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        CKEDITOR.replace('content',{
            width: "100%",
            height: "200px"
        });

    </script>
    <script type="text/javascript">

        CKEDITOR.replace('content',{
            width: "100%",
            height: "200px"
        });

    </script>
@endsection
