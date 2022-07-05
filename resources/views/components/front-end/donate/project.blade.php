@section('container')
@section('title', 'Ủng hộ dự án')
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
                    <h3>Ủng hộ dự án "{{$project->name}}"</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <form action="" method="post">
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
        </div>
    </section>
@endsection
