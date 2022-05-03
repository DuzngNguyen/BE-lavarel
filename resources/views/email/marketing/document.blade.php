@extends('layouts.master_email')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;border-bottom: 1px solid #dedede;margin: 10px 0">
            <p style="font-family: sans-serif; font-size: 15px; font-weight: bold; margin: 0; margin-bottom: 5px;margin-top: 5px">Tổng hợp bộ tài liệu mới nhất từ
                <a href="https://tailieu247.net?utm_source=email">tailieu247.net</a>. Nhanh tay liên hệ Admin
                để có cho mình được những bộ đề, giáo án chuẩn mới chất lượng nhât</p>
        </td>
    </tr>

    @foreach(config('document') as $item)
        <tr bgcolor="white">
            <td style="padding:0">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <table style="table-layout:fixed" width="100%">
                                <colgroup>
                                    <col width="200">
                                    <col>
                                </colgroup>
                                <tbody>
                                <tr style="font-size:17px">
                                    <td colspan="3">
                                        <a style="text-decoration:none;color:#007bff!important" href="{{ $item['preview'] }}" target="_blank" >{{ $item['name'] }}</a>
                                    </td>
                                </tr>
                                <tr style="font-size:13px;color:#757575;">
                                    <td colspan="2">
                                        <div style="overflow:hidden" valign="top">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                <tr style="font-size:13px;color:#757575">
                                                    <td style="color:red;font-weight: bold;font-size: 18px">
                                                        <span>{{ number_format($item['price'],0,',','.') }} đ</span>
                                                        <a href="{{ $item['preview'] }}" style="font-weight: 400;margin-left: 20px;color: #fff; background-color: #007bff; border-color: #007bff;padding: 5px 20px;display: inline-block;border-radius: 30px;font-size: 14px">Xem thử</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    @endforeach
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;border-bottom: 1px solid #dedede;margin: 10px 0">
            <p style="font-family: sans-serif; font-size: 15px; font-weight: bold; margin: 0; margin-bottom: 5px;margin-top: 5px">Liên hệ</p>
            <p style="font-family: sans-serif; font-size: 15px; font-weight: bold; margin: 0; margin-bottom: 5px;margin-top: 5px">Mrs. Bình
                <a href="tel:0385888247">0385.888.247</a></p>
            <p style="font-family: sans-serif; font-size: 15px; font-weight: bold; margin: 0; margin-bottom: 5px;margin-top: 5px">Ms. Thanh
                <a href="tel:0879888247">0879.888.247</a></p>
        </td>
    </tr>
@stop
