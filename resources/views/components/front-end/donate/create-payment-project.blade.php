@section('container')
@section('title', 'Xác nhận thanh toán')
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
                    <h3>Xác nhận thanh toán</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <form action="{{asset('donate')}}/confirm-payment/{{$project->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Tên người dùng</label>
                            <input
                                type="text"
                                class="form-control"
                                value="{{$user->fullname}}"
                                required
                                name="order_desc"
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Số tiền ủng hộ</label>
                            <div class="input_field">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"
                      >VND</span
                      >
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{$data['amout']}}"
                                        aria-label="Username"
                                        aria-describedby="basic-addon1"
                                        required
                                        name="Amount"
                                        readonly
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Ngân hàng</label>
                            <select required name="bank_code" id="bank_code" class="form-control">
                                <option value="">Không chọn</option>
                                <option value="NCB"> Ngân hàng NCB</option>
                                <option value="AGRIBANK"> Ngân hàng Agribank</option>
                                <option value="SCB"> Ngân hàng SCB</option>
                                <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                <option value="EXIMBANK"> Ngân hàng EximBank</option>
                                <option value="MSBANK"> Ngân hàng MSBANK</option>
                                <option value="NAMABANK"> Ngân hàng NamABank</option>
                                <option value="VNMART"> Ví điện tử VnMart</option>
                                <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                                <option value="HDBANK">Ngân hàng HDBank</option>
                                <option value="DONGABANK"> Ngân hàng Đông Á</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngân hàng VPBank</option>
                                <option value="MBBANK"> Ngân hàng MBBank</option>
                                <option value="ACB"> Ngân hàng ACB</option>
                                <option value="OCB"> Ngân hàng OCB</option>
                                <option value="IVB"> Ngân hàng IVB</option>
                                <option value="VISA"> Thanh toán qua VISA/MASTER</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Loại hàng hóa</label>
                            <input
                                type="text"
                                class="form-control"
                                required
                                name="ordertype"
                                value='Thanh toán hóa đơn - Ủng hộ dự án "{{$project->name}}"'
                                readonly
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Nội dung chuyển khoản</label>
                            <input
                                type="text"
                                class="form-control"
                                required
                                name="OrderDescription"
                                value="Thanh toán hóa đơn lúc {{$data['timeCheckout']}}"
                            />
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Ngôn ngữ</label>
                            <select required name="language" class="form-control">
                                <option value="VN">Tiếng Việt</option>
                                <option value="NCB">Tiếng Anh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">
                                Xác nhận
                            </button>
                            <button onclick="history.back()" class="btn btn-primary py-3 px-5">
                                Quay lại
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
