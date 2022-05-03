@extends('layouts.master_email')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi {{ $admin->name }},</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Tài khoản của bạn đã được tạo thành công. Thông tin đăng nhập</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                <b>Tài khoản</b> <span><b>{{ $admin->username }}</b> hoạc <b>{{ $admin->email }}</b></span>
            </p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                <b>Mật khẩu</b> <span><b>123456789</b></span>
            </p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Đây là email tự động. Xin vui lòng không reply email này</p>
        </td>
    </tr>
@stop
