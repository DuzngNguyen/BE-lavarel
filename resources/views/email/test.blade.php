@extends('layouts.master_email')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;margin: 10px 0">
            <p style="font-family: sans-serif; font-size: 15px; font-weight: bold; margin: 0; margin-bottom: 5px;margin-top: 5px">Tổng hợp bộ tài liệu mới nhất từ
                <a href="https://tailieu247.net?utm_source=email">tailieu247.net</a>. Nhanh tay liên hệ Admin
            để có cho mình được những bộ đề, giáo án chuẩn mới chất lượng nhât</p>
        </td>
    </tr>

    @foreach(config('document') as $item)
    <tr bgcolor="white">
        <td style="padding:0;border: 1px solid #dedede;border-radius: 10px;margin: 10px 0">
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
                                <td colspan="1">
                                    <a style="text-decoration:none;color:#007bff!important" href="{{ $item['preview'] }}" target="_blank" >
                                        <img src="https://tailieu247.net/uploads/2021/11/17/2021-11-17__dai-so-toan-12.jpg" style="width: 140px;" alt="">
                                    </a>
                                </td>
                                <td colspan="4">
                                    <a style="text-decoration:none;color:#007bff!important" href="{{ $item['preview'] }}" target="_blank" >{{ $item['name'] }}</a>
                                    <p style="margin: 5px 0;font-size: 15px">Số đề : <b>50</b></p>
                                    <p style="margin: 0;font-size: 14px;color: #757575">- Bộ đề thi thử THPT quốc gia môn Vật Lý 2022 - bám sát cấu trúc giúp học sinh, giáo viên được tiếp cận gần hơn với kì thi THPT QG 2022</p>
                                    <p style="margin: 0;font-size: 14px;color: #757575">Giá:  <span style="color: red;font-weight: bold">{{ number_format($item['price'],0,',','.') }} đ</span>
                                        <a href="{{ $item['preview'] }}" style="font-weight: 400;margin-left: 20px;color: #fff; background-color: #007bff; border-color: #007bff;padding: 5px 20px;display: inline-block;border-radius: 30px;font-size: 14px">Xem thử</a></p>
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
