@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Quản lý file</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.file.create') }}" class="btn btn-xs btn-primary">Thêm mới <i
                                    class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên tài liệu</th>
                                <th>Product</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($files as $item)
                                <tr>
                                    <td>
                                        <a href="">{{ $item->f_name }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $item->product->pro_name ?? "[N\A]" }}</a><br>
                                        <a href="{{ pare_url_file($item->f_path,'files') }}" download>{{ $item->f_path }}</a>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.file.update', $item->id) }}"
                                           class="btn btn-sm btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.file.delete', $item->id) }}"
                                           class="btn btn-sm btn-danger"> Xoá</a>
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
