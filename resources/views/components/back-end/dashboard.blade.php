@section('container')
@extends('layouts.back-end.layout')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="
                    icofont icofont-users-alt-2
                    bg-c-blue
                    card1-icon
                "></i>
                <span class="text-c-blue f-w-600">Tổng số người dùng</span>
                <h4>{{count($users)}}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="
                                      text-c-blue
                                      f-16
                                      icofont icofont-ui-clock
                                      m-r-10
                                    "></i> Cập nhật cuối {{ $users[count($users)-1]->dateCreated }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="
                                  icofont icofont-money
                                  bg-c-pink
                                  card1-icon
                                "></i>
                <span class="text-c-pink f-w-600">Tổng tiền dự án</span>
                <h4>{{$total}}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="
                                      text-c-pink
                                      f-16
                                      icofont icofont-database
                                      m-r-10
                                    "></i>Trên tổng số {{count($projects)}} dự án
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="
                                  icofont icofont-eye-alt
                                  bg-c-green
                                  card1-icon
                                "></i>
                <span class="text-c-green f-w-600">
                    Lượt đọc bài viết
                </span>
                <h4>{{$totalViews}}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="
                                      text-c-green
                                      f-16
                                      icofont icofont-notebook
                                      m-r-10
                                    "></i>Trên tổng số {{count($blogs)}} bài viết
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="
                                  icofont icofont-check-alt
                                  bg-c-yellow
                                  card1-icon
                                "></i>
                <span class="text-c-yellow f-w-600">Mục cần duyệt</span>
                <h4>{{$totalBrowses}}</h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="
                                      text-c-yellow
                                      f-16
                                      icofont icofont-location-arrow
                                      m-r-10
                                    "></i>Đến mục duyệt để xem thêm
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Thống kê tạo tài khoản</h5>
                <div class="card-header-right">
                    <select id="userFilter" class="form-control">
                        <option value="">Chọn</option>
                        <option value="7days">Một tuần</option>
                        <option value="1month">Một tháng</option>
                        <option value="6months">Sáu tháng</option>
                        <option value="1year">Một năm</option>
                    </select>
                </div>
            </div>
            <div class="card-block">
                <div class="container">
                    <div id="user-chart" style="height: auto; width: 100%"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Thống kê các phần tử trên website</h5>
            </div>
            <div class="card-block">
                <div class="container">
                    <div id="element-chart" style="height: auto; width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5>Lịch sử hoạt động sự kiện</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>Thời gian</th>
                            <th>Người dùng</th>
                            <th>Hoạt động</th>
                        </thead>
                        <tbody>
                        @foreach($eventActivities as $value)
                            <tr>
                                <td>{{$value->time}} {{$value->date}}</td>
                                <td>{{$value->user->fullname}}</td>
                                <td>
                                    @if ($value->status == 0)
                                        Tham gia
                                    @elseif($value->status == 1)
                                        Thoát
                                    @endif
                                    sự kiện "{{$value->event->name}}"
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var elementChart = new Morris.Bar({
            element: 'element-chart',
            xkey: 'label',
            ykeys: ['value'],
            behaveLikeLine: true,
            labels: ['Số lượng']
        });
        elementDonut(elementChart);
        var userChart = new Morris.Line({
            element: 'user-chart',
            xkey: 'dateCreated',
            ykeys: ['count'],
            behaveLikeLine: true,
            labels: ['Số lượng']
        });
        userFilterDefault(userChart);
        $('#userFilter').change(function() {
            var value = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('userFilter')}}",
                method: 'POST',
                dataType: 'JSON',
                data: {
                    value: value, _token: _token
                },
                success:function (data) {
                    userChart.setData(data);
                }
            });
        })
    })
    function userFilterDefault(userChart) {
        var value = "6months";
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{route('userFilter')}}",
            method: 'POST',
            dataType: 'JSON',
            data: {
                value: value, _token: _token
            },
            success:function (data) {
                userChart.setData(data);
            }
        });
    }

    function elementDonut(elementChart) {
        var value = "element";
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{route('elementDonut')}}",
            method: 'POST',
            dataType: 'JSON',
            data: {
                value: value, _token: _token
            },
            success:function (data) {
                elementChart.setData(data);
            }
        });
    }
</script>
@endsection
