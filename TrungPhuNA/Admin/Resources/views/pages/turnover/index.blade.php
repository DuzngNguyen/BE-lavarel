@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Doanh thu</h3>

{{--                        <div class="box-tools">--}}
{{--                            <a href="{{ route('get_admin.revenues.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>--}}
{{--                        </div>--}}
                    </div>
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline" method="GET"  autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="time" value="{{ Request::get('time') }}" class="form-control pull-right" id="reservation">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Lọc</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box-body table-responsive no-padding">
                                <div class="col-xs-12 table-responsive">
                                    <p class="lead">Danh sách chi tiêu</p>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Money</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($expenditures as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ number_format($item->e_price,0,',','.') }}đ</td>
                                            <td>{{ $item->e_date }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box-body table-responsive no-padding">
                                <div class="col-xs-12 table-responsive">
                                    <p class="lead">Danh sách thu</p>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Money</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ number_format($item->t_total_money, 0,',','.') }} đ</td>
                                                <td>{{ $item->t_time_process }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="lead">Thống kê</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody><tr>
                                        <th style="width:50%">Thu:</th>
                                        <td>{{ number_format(($transactions ? $transactions->sum('t_total_money') : 0),0,',','.') }}đ</td>
                                    </tr>
                                    <tr>
                                        <th>Chi</th>
                                        <td>{{ number_format(($expenditures ? $expenditures->sum('e_price') : 0),0,',','.') }}đ</td>
                                    </tr>
                                    <tr>
                                        <th>Dư:</th>
                                        <td>{{ number_format(($transactions ? $transactions->sum('t_total_money') : 0 )
                            -  ($expenditures ? $expenditures->sum('e_price') : 0),0,',','.') }}đ</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
