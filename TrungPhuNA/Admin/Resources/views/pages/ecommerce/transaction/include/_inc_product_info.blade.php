<!-- Table row -->
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 40%">Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products ?? [] as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pro_name ?? "[N\A]" }}</td>
                    <td>
                        <input style="width: 100px;" name="qtys[]" type="number" class="form-control"
                               value="{{ \Illuminate\Support\Arr::get($orders ?? [], $item->id, 1) }}">
                        <input style="width: 100px;" name="ids[]" type="hidden" class="form-control" value="{{ $item->id }}">
                        <input type="hidden" name="orders[]" value="{{ $item->id }}">
                    </td>
                    <td>{{ number_format($item->pro_price,0,',','.') }}đ</td>
                    <td>{{ number_format($item->pro_price,0,',','.') }}đ</td>
                    <td>
                        <a href="" class="btn btn-xs btn-danger js-delete-cart" data-id="{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

{{--<div class="row">--}}
{{--    <!-- accepted payments column -->--}}
{{--    <div class="col-xs-6">--}}
{{--        <p class="lead">Hình thức thanh toán:</p>--}}
{{--    </div>--}}
{{--    <!-- /.col -->--}}
{{--    <div class="col-xs-6">--}}
{{--        <p class="lead">Thành tiền</p>--}}

{{--        <div class="table-responsive">--}}
{{--            <table class="table">--}}
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <th style="width:50%">Tổng tiền:</th>--}}
{{--                    <td>$250.30</td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- /.col -->--}}
{{--</div>--}}
