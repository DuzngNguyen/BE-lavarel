@extends('admin::layouts.master')

@section('content')
    <style>
        .info-box {
            padding: 10px;
        }
        .info-box-icon i {
            color: white;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thống kê</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user-circle-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng thành viên</span>
                        <span class="info-box-number">{{ $totalUser ?? 0 }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-shopping-bag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Đơn hàng</span>
                        <span class="info-box-number">{{ $totalTransaction ?? 0 }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-database"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng sản phẩm</span>
                        <span class="info-box-number">{{ $totalProducts ?? 0 }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline"  autocomplete="off">
                                <select name="status" class="form-control js-select2 js-change-status">
                                    <option value="">__ Trạng thái đơn hàng __</option>
                                    @foreach($status ?? [] as $key => $item)
                                        <option value="{{ $key }}" {{ ($transaction->t_status ?? 1) == $key ? "selected" : "" }}> {{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="time" value="{{ Request::get('time') }}" class="form-control pull-right" id="reservation">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-bottom: 10px;">Thống kê năm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="body-chart-year" style="min-height: 140px;">
                        <div class="loader">Loading...</div>
                        <figure class="highcharts-figure">
                            <div id="container-body-chart-year"></div>
                        </figure>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-3">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-bottom: 10px;">Sale</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="box-sale" style="min-height: 140px;">
                        <div class="loader">Loading...</div>
                        <figure class="highcharts-figure">
                            <div id="sale-dashboard"></div>
                        </figure>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-bottom: 10px;">Thống kê tháng theo năm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body"  style="min-height: 140px;">
                        <figure class="highcharts-figure">
                            <div id="month-dashboard"><div class="loader">Loading...</div></div>
                        </figure>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-bottom: 10px;">Thống kê doanh thu các ngày trong tháng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="body-line-chart" style="min-height: 140px;">
                        <div class="loader">Loading...</div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    <script>
        var URL_GET_CHAR_REVENUE = '{{ route("get_admin.dashboard.revenue") }}';
    </script>
    <script>

    </script>
@endsection
