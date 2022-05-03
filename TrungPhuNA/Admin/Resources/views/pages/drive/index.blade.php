@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Folder</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Path</th>
                                <th>Parent</th>
                                <th>Type</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($drives ?? [] as $key => $item)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td>
                                        <a href="#">{{ $item->name }}</a>
                                    </td>
                                    <td>{{ $item->path }}</td>
                                    <td>{{ $item->parent->name ?? "[N\A]"  }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="?folder_id={{ $item->path }}" class="btn btn-xs btn-info"> Cập nhật</a>
                                        @if ($item->type === 'dir')
                                            <a target="_blank" href="https://drive.google.com/drive/folders/{{ $item->basename }}" class="btn btn-xs btn-danger"> View</a>
                                        @else
                                            <a href="{{ route('get_admin.drive.index',['share' => 'file','file' => $item->basename]) }}" class="btn btn-xs btn-danger"> File</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! $drives->links('vendor.pagination.default',['query' => $query ?? []]) !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
