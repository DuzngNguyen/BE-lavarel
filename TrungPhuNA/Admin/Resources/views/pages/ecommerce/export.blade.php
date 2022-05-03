@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Xuất kho</h3>
                    </div>
                    @php $sum = 0 ; @endphp
                    <div class="box-body">
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã SP</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày mua</th>
                                </tr>

                                </tbody>
                                @if (isset($inventoryExport))
                                    @foreach($inventoryExport as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->product->pro_code ?? "[N\A]" }}</td>
                                            <td><a href="">{{ $item->product->pro_name ?? "[N\A]" }}</a></td>
                                            <td>{{ $item->o_qty }}</td>
                                            <td>{{ number_format($item->o_total_price,0,',','.') }} VNĐ</td>
                                            <td>{{ $item->created_at  }}</td>
                                        </tr>
                                        @php
                                            $sum += $item->o_total_price;
                                        @endphp
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        <p> Tổng tiền <b>{{ number_format($sum,0,',','.') }} VNĐ</b></p>
                    </div>
                </div>
                <div class="box-footer">
                    {!! $inventoryExport->appends($query ?? [])->links() !!}
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
