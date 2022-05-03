@extends('layouts.master_email')
@section('table')
    @foreach($transactions as $item)
        @php
            $meta = json_decode($item->t_meta, true) ?? [];
        @endphp
        <tr>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;border-bottom: 1px solid #dedede;margin: 10px 0">
                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 5px;margin-top: 5px">Khách hàng <b>{{ $item->t_name }}</b></p>
                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 5px;">Số tiền : <b>{{ number_format($item->t_total_money,0,',','.') }} đ</b></p>
                @if (isset($meta['options']['bank']))
                    @php
                        $bank = get_banks_item($meta['options']['bank']);
                    @endphp
                    @if ($bank)
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 5px;margin-top: 5px">Ngân hàng <b>{{ $bank['vn_name'] }} - {{ $bank['shortName'] }}</b></p>
                    @endif
                @endif
                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 5px;margin-top: 5px">Trạng thái <b>{{ $item->getStatus($item->t_status)['name'] ?? "[N\A]" }}</b></p>
            </td>
        </tr>
    @endforeach
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;border-bottom: 1px solid #dedede;margin: 10px 0">
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 5px;margin-top: 5px">Tổng tiền <b style="color: red">{{ number_format($transactions->sum('t_total_money'),0,',','.') }}</b></p>
        </td>
    </tr>
@stop
