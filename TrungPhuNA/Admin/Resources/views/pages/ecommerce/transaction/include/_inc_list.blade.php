<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table class="table table-hover table-bordered">
        <tbody>
        <tr>
            <td style="width: 20px"></td>
            <th style="width: 50px">
                <label class="label-checkbox" style="position: relative">
                    <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false">
                        <input type="checkbox" name="checkAll"  value="" class="flat-red js-check-all">
                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                    </div>
                </label>
            </th>
            <th style="width: 100px;">Mã đơn</th>
            <th>Khách hàng</th>
            <th>Ngày thanh toán</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Sale</th>
            <th>Nguồn</th>
{{--            <th style="width: 150px;">Thao tác</th>--}}
        </tr>
        @foreach($transactions ?? [] as $item)
            @php
                $meta = json_decode($item->t_meta, true) ?? [];
            @endphp
            <tr>
                <td>
                    <a href="" class="js-show-order-item" data-id=".order-item-{{ $item->id }}"><span class="fa fa-angle-double-right"></span></a>
                </td>
                <td>
                    <label class="label-checkbox " style="position: relative">
                        <div class="icheckbox_flat-green js-ids" aria-checked="false" aria-disabled="false">
                            <input type="checkbox" name="ids[]"  value="{{ $item->id }}" class="flat-red">
                            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                        </div>
                    </label>
                </td>
                <td><a href="{{ route('get_admin.transaction.update', $item->id) }}" class="js-update-transaction" title="Cập nhật">DH{{ $item->id }}</a></td>
                <td>
                    {{ $item->t_name }} <br>
                    {{ $item->t_email }} <br>
                    {{ $item->t_phone }} <br>
                    @if (isset($meta['options']['bank']))
                        @php
                            $bank = get_banks_item($meta['options']['bank']);
                        @endphp
                        @if ($bank)
                            <b>{{ $bank['vn_name'] }} - {{ $bank['shortName'] }}</b>
                        @endif
                    @endif
                </td>
                <td>
                    {{ $item->t_time_process }}
                </td>
                <td>
                    <span class="{{ $item->getStatus($item->t_status)['class'] ?? "" }}">{{ $item->getStatus($item->t_status)['name'] ?? "[N\A]" }}</span>
                </td>
                <td>
                    {{ number_format($item->t_total_money,0,',','.') }} đ
                </td>
                <td>{{ $item->admin->name ?? "[N\A]" }}</td>
                <td>{{ $item->t_channel }}</td>
            </tr>
            <tr class="order-item order-item-{{ $item->id }}">
                <td colspan="9" class="order-detail">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-user"></i> Khách hàng {{ $item->t_name }}
                                    <small class="pull-right">Date: {{ $item->created_at }}</small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row">
                            <div class="col-xs-4">
                                <p class="lead">Thông tin khách hàng</p>
                                <address>
                                    <strong>{{ $item->t_name }}</strong><br>
                                    <span style="display: block;margin-bottom: 5px"><i style="width: 10px;margin-right: 4px;" class="fa fa-envelope-open-o"></i> {{ $item->t_email }}</span>
                                    <span style="display: block;margin-bottom: 5px"><i style="width: 10px;margin-right: 4px;" class="fa fa-phone"></i> {{ $item->t_phone }}</span>
                                </address>
                            </div>
                            <div class="col-xs-4">
                                <p class="lead">Thông tin khác</p>

                            </div>
                            <div class="col-xs-4">
                                <p class="lead">Thanh toán {{ $item->t_time_process }}</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody><tr>
                                            <th style="width:50%">Tổng tiền:</th>
                                            <td><b class="text-danger">{{ number_format($item->t_total_money,0,',','.') }} vnđ</b></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        @if (isset($meta['options']['document']))
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-xs-12">
                                    <p class="lead" style="margin-bottom: 0">Tài liệu</p>
                                    <b class="text-danger"><i>{!! $meta['options']['document'] ?? '' !!}</i></b>
                                </div>
                            </div>
                        @endif
                        @if ($item->t_note)
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="lead" style="margin-bottom: 0">Ghi chú</p>
                                    <b class="text-yellow"><i>{!! $item->t_note !!}</i></b>
                                </div>
                            </div>
                        @endif
                        <!-- /.row -->
                    </section>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="box-footer">
    {!! $transactions->appends($query ?? [])->links('vendor.pagination.default') !!}
</div>
