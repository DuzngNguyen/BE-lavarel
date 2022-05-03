@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách đơn hàng</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.transaction.create') }}"  class="btn btn-xs btn-primary js-add-transaction">Thêm mới <i
                                    class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline" method="GET"  autocomplete="off" enctype="multipart/form-data">
                                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="DH123">
                                <input type="text" class="form-control" value="{{ Request::get('e') }}" name="e" placeholder="Email ...">
                                <input type="text" class="form-control" value="{{ Request::get('p') }}" name="p" placeholder="Phone ...">
                                <select name="sale_id" class="form-control js-select2">
                                    <option value="">__ Chọn Sale __</option>
                                    @foreach($admins as $item)
                                        <option
                                            value="{{ $item->id }}" {{ Request::get('sale_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <select name="status" class="form-control js-select2">
                                    <option value="">__ Chọn Sale __</option>
                                    @foreach($status as $key => $item)
                                        <option
                                            value="{{ $key }}" {{ Request::get('status') == $key ? "selected" : "" }}>{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="time" value="{{ Request::get('time') ? Request::get('time') : '' }}" class="form-control pull-right" id="reservation">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Lọc</button>
                            </form>
                        </div>
                        <div class="box-content js-hide action-transaction hide js-action-transaction">
                            <label class="label-checkbox" style="position: relative">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false">
                                    <input type="checkbox" name="ids[]"  value="" class="flat-red">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                            </label>
                            <span style="padding: 0 5px">đã chọn <b class="js-total-transaction"></b> đơn hàng trên trang </span>
                            <div class="btn-group" style="display: flex">
                                <button type="button" class="btn btn-default btn-flat">Chọn thao tác</button>
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" class="js-delete-transactions">Xoá đơn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="transaction_list">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pull-left">
                                    &nbsp; Hiển thị: {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} /
                                    Tổng {{ $transactions->total() }} record &nbsp;
                                </div>
                                <p>Tổng tiền <b>{{ number_format($transactionTotalMoney ?? 0,0,',','.') }}</b></p>
                            </div>
                        </div>
                        @include('admin::pages.ecommerce.transaction.include._inc_list',['transactions' => $transactions ?? [],'status' => $status,'query' => $query ?? []])
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<script>
    var URL_SEARCH_PRODUCT = '{{ route("get_ajax_admin.product.list") }}'
    var URL_GET_TRANSACTION = '{{ route("get_admin.transaction.index") }}'
    var URL_GET_FORM_ADD_USER = '{{ route("get_admin.user.create_modal") }}'
    var URL_DELETE_TRANSACTIONS = '{{ route('get_admin.transaction.deletes') }}'
</script>
