@extends('layouts.master_email')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi {{ $admin->name }},</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Tài khoản của bạn yêu cầu cấp lại mật khẩu. Hãy click vào
                <a href="{{ $link }}" target="_blank"><b>link</b></a> để đổi mật khẩu mới. Link chỉ tồn tại 3p</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Đây là email tự động. Xin vui lòng không reply email này</p>
        </td>
    </tr>
@stop
