<div class="modal fade modal-add-transaction" id="modal-default" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{  isset($products) ? route('get_admin.transaction.update', $transaction->id) :  route('get_admin.transaction.create')}}" method="POST" id="form-transaction"
                  autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thêm mới đơn hàng</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1" class="" style="display: flex;justify-content: space-between">Lấy dữ liệu khách hàng từ hệ
                            thống <a href="" class="js-add-user">Thêm mới khách hàng</a></label>
                        <select name="t_user_id" id="" data-url="{{ route('get_admin.user.info') }}"
                                class="form-control js-select2 js-select-user" style="width: 100% !important;">
                            <option value="0">__Chọn khách hàng__</option>
                            @foreach($users ?? [] as $item)
                                <option value="{{ $item->id }}" {{ $transaction->t_user_id ?? 0 == $item->id ? "selected" : "" }}>{{ $item->email }} - {{ $item->phone }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="height: 30px;"></div>
                    <div id="user-info" style="margin-top: 30px;position: relative;padding: 20px 15px">
                        <h4>Thông tin khách hàng</h4>
                        <div class="spinner" style="top: 55px !important;">
                            <span class="spinner-inner-1"></span>
                            <span class="spinner-inner-2"></span>
                            <span class="spinner-inner-3"></span>
                        </div>
                        <div id="js-user-info"></div>
                    </div>
                    <div class="">
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" required name="t_name" value="{{ $transaction->t_name ?? '' }}" class="form-control"
                                   placeholder="Tên khách hàng">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" required name="t_phone" value="{{ $transaction->t_phone ?? '' }}" class="form-control"
                                   placeholder="Số điện thoại">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" required name="t_email" value="{{ $transaction->t_email ?? '' }}" class="form-control"
                                   placeholder="Email">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" required name="t_address" value="{{ $transaction->t_address ?? '' }}" class="form-control"
                                   placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-sm-3">
                            <label for="exampleInputEmail1">Giá đơn hàng</label>
                            <input type="text" required name="t_total_money" value="{{ old('t_total_money', number_format($transaction->t_total_money ?? 0,0,',',',')) }}" class="form-control js-money"
                                   placeholder="">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="exampleInputEmail1" style="display:block">Trạng thái đơn hàng</label>
                            <select name="t_status" id="" class="form-control js-select2 col-sm-12" style="width: 100% !important;">
                                @foreach($status ?? [] as $key => $item)
                                <option value="{{ $key }}" {{ ($transaction->t_status ?? 1) == $key ? "selected" : "" }}> {{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="exampleInputEmail1" style="display:block">Ngày thanh toán</label>
                            <input type="date" name="t_time_process" class="form-control" value="{{ $transaction->t_time_process ?? date('Y-m-d') }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="exampleInputEmail1" style="display:block">Nguồn</label>
                            <select name="t_channel" id="" class="form-control js-select2 col-sm-12" style="width: 100% !important;">
                                @foreach($changes ?? [] as $key => $item)
                                    <option value="{{ $item }}" {{ ($transaction->t_channel ?? '') == $item ? "selected" : "" }}> {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div  style="margin-top: 30px;padding: 20px 15px">
                        <h4>Thông tin khác</h4>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label for="exampleInputEmail1" style="display:block">Nhóm</label>
                                <select name="t_meta[options][type]" id="" class="form-control js-select2 col-sm-12" style="width: 100% !important;">
                                    <option value="1" {{ ($meta['options']['document'] ?? 1) == 1 ? "selected" : "" }}>Tiểu Học</option>
                                    <option value="2" {{ ($meta['options']['document'] ?? 2) == 2 ? "selected" : "" }}>TH cơ sở</option>
                                    <option value="3" {{ ($meta['options']['document'] ?? 3) == 3 ? "selected" : "" }}>TH phổ thông</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="exampleInputEmail1">Ngân hàng thanh toán</label>
                                <select name="t_meta[options][bank]" id="" class="form-control js-select2 col-sm-12" style="width: 100% !important;">
                                    <option value="">Chọn ngân hàng</option>
                                    @foreach(config('transaction.banks') as $key => $value)
                                        <option value="{{ $value['bankCode'] }}" {{  $value['bankCode'] == ($meta['options']['bank'] ?? null) ? "selected" : "" }}>{{ $value['vn_name'] }} - {{ $value['shortName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="exampleInputEmail1">Môn học</label>
                                <select name="t_meta[options][subjects][]" id="" class="form-control js-select2 col-sm-12" multiple style="width: 100% !important;">
                                    <option value="">Chọn môn học</option>
                                    @foreach($getSubjects as $key => $value)
                                        <option value="{{ $key }}" {{  in_array($key, ($meta['options']['subjects'] ?? [])) ? "selected" : "" }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="exampleInputEmail1" style="display:block">Tài liệu</label>
                                <textarea type="text" rows="3" name="t_meta[options][document]" class="form-control"
                                          placeholder="">{{ $meta['options']['document'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-sm-12">
                            <label for="exampleInputEmail1">Ghi chú</label>
                            <textarea name="t_note" id="" cols="30" class="form-control" rows="3" placeholder="Mô tả">{{ $transaction->t_note ?? '' }}</textarea>
                        </div>
                    </div>
{{--                    @if(!isset($id))--}}
{{--                    <div>--}}
{{--                        <div class="form-group col-sm-12">--}}
{{--                            <label for="exampleInputEmail1" class="" style="display: block">Sản phẩm</label>--}}
{{--                            <select name="products[]" id="" data-url="{{ route('get_admin.product.info') }}" multiple--}}
{{--                                    class="form-control js-select2 js-product-search col-sm-12 js-select-product"--}}
{{--                                    style="width: 100% !important;">--}}
{{--                                <option value="">__Chọn sản phẩm</option>--}}
{{--                                @foreach($products ?? [] as $item)--}}
{{--                                    <option value="{{ $item->id }}" selected>{{ $item->pro_name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endif--}}
                </div>
                <div class="modal-footer" style="clear: both">
                    <button type="button" class="btn btn-danger js-close-modal" data-dismiss="modal">Huỷ bỏ</button>
                    <button type="button" class="btn btn-primary js-submit-save-transaction">Lưu</button>
                </div>
{{--                <section class="invoice">--}}
{{--                    <!-- title row -->--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12">--}}
{{--                            <h2 class="page-header">--}}
{{--                                <i class="fa fa-globe"></i>  Danh sách sản phẩm--}}
{{--                                <small class="pull-right">Date: {{ date('d/m/Y') }}</small>--}}
{{--                            </h2>--}}
{{--                        </div>--}}
{{--                        <!-- /.col -->--}}
{{--                    </div>--}}
{{--                    <div id="product_info">--}}
{{--                        @include('admin::pages.ecommerce.transaction.include._inc_product_info',['orders' => $orders ?? []])--}}
{{--                    </div>--}}
{{--                </section>--}}
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
