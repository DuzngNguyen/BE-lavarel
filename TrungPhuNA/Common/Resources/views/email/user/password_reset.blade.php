@extends('common::layouts.app_email_master')
@section('content')
    <tr>
        <td style="color:#fc205b;font-size:20px;font-weight:bold">
            Xin chào {{ ucfirst($user->name ?? 'Trung phú NA') }}
        </td>
    </tr>
    <tr>
        <td style="color:#5b5b5c;padding-top:15px" width="98%">
            <p> 123code.net thông báo, tài khoản <b>{{$user->email ?? 'codethe94@gmail.com'}}</b> của quý khách đang thực hiện yêu cầu đổi mật khẩu.
            </p>
            <p> Click vào button phía dưới để cập nhật lại mật khẩu</p>
        </td>
    </tr>
    <tr>
        <td style="padding:25px;font-size:16px;text-align:center">
            <a style="padding:10px 50px;background-color:#fc205b;text-decoration:none;color:#fff;border-radius:5px" href="{{ $link  ?? '#' }}" target="_blank">Đổi mật khẩu</a>
        </td>
    </tr>
    <tr>
        <td style="color:#5b5b5c;padding-bottom: 10px;" width="98%">
            <p>Trân trọng cảm ơn!</p>
        </td>
    </tr>
@endsection
