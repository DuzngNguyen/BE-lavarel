@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách bài viết</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.article.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline">
                                <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name ...">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Lọc</button>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 100px">Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($articles as $item)
                                <tr>
                                    <td>
                                        <a href="" class="a-img-thumbnail">
                                            <img src="{{ pare_url_file($item->a_avatar) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">{{ $item->a_name }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $item->menu->m_name ?? "[N\A]" }}</a>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.article.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.article.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! $articles->links('vendor.pagination.default',['query' => $query ?? []]) !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
