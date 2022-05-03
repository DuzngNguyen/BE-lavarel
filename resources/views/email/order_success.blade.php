@extends('layouts.master_email')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi Admin,</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Đơn hàng <b>#DH{{ $transaction->id }}</b> có số tiền <b>{{ number_format($transaction->t_total_money) }}</b> vừa được khởi tạo</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Email trả lời tự động. Xin vui lòng không reply email này</p>
        </td>
    </tr>
@stop
