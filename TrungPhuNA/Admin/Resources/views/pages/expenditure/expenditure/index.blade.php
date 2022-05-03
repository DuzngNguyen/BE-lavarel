@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thu chi</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.revenues.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline" method="GET"  autocomplete="off" enctype="multipart/form-data">
{{--                                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="DH123">--}}
{{--                                <input type="text" class="form-control" value="{{ Request::get('e') }}" name="e" placeholder="Email ...">--}}
{{--                                <input type="text" class="form-control" value="{{ Request::get('p') }}" name="p" placeholder="Phone ...">--}}
                                <select name="type" class="form-control js-select2">
                                    <option value="">__ Chọn Sale __</option>
                                    @foreach($types as $key => $item)
                                        <option
                                            value="{{ $key }}" {{ Request::get('type') == $key ? "selected" : "" }}>{{ $item['name'] }}</option>
                                    @endforeach
                                </select>

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
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pull-left">
                                &nbsp; Hiển thị: {{ $expenditures->firstItem() }} to {{ $expenditures->lastItem() }} /
                                Tổng {{ $expenditures->total() }} record &nbsp;
                            </div>
                            <p>Tổng tiền <b>{{ number_format($expendituresTotalMoney ?? 0,0,',','.') }}</b></p>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 50px;">STT</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Money</th>
                                <th>Date</th>
                                <th>Admin</th>
                                <th>Created</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($expenditures ?? [] as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="">{{ $item->e_name }}</a>
                                    </td>
                                    <td ><span class="{{ detect_category_expenditure($item->e_category_id)['class'] ?? '' }}">{{ detect_category_expenditure($item->e_category_id)['name'] ?? '' }}</span></td>
                                    <td>{{ $item->getNameType($item->e_type)['name'] ?? ""  }}</td>
                                    <td>{{ number_format($item->e_price,0,',','.') }}đ</td>
                                    <td>{{ $item->e_date }}</td>
                                    <td><a href="">{{ $item->admin->name ?? "[N\A]" }}</a></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.revenues.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.revenues.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        {!! $expenditures->links('vendor.pagination.default',['query' => $query ?? []]) !!}
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
