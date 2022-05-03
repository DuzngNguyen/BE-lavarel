@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Log request</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 350px;">Url</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Auth</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($logs as $item)
                                <tr>
                                    <td>
                                        <div style="width: 350px;overflow: hidden">
                                            <a href="">{{ $item->url }}</a>
                                        </div>
                                    </td>
                                    <td><span class="{{ $item->getMethod($item->method)['class'] }}">{{ $item->method }}</span></td>
                                    <td><span class="{{ $item->getStatus($item->status)['class'] }}">{{ $item->status }}</span></td>
                                    <td>{{ $item->duration }} ms</td>
                                    <td>{{ $item->auth }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.log_request.show', $item->id) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye-slash"></i></a>
                                        <a href="{{ route('get_admin.keyword.delete', $item->id) }}" class="btn btn-sm btn-danger"> <i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! $logs->links('vendor.pagination.default',['query' => $query ?? []]) !!}
                    </div>
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
