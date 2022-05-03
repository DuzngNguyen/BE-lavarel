@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách slide</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.slide.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 100px">Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Thứ tự</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($slides as $item)
                            <tr>
                                <td>
                                    <a href="" class="a-img-thumbnail">
                                        <img src="{{ pare_url_file($item->s_banner) }}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="">{{ $item->s_name }}</a>
                                </td>
                                <td>
                                    <span>{{ $item->s_sort }}</span>
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('get_admin.slide.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                    <a href="{{ route('get_admin.slide.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
