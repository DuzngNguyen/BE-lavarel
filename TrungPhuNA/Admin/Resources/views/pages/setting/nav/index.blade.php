@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách menu</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.nav.create') }}" class="btn btn-xs btn-primary">Thêm mới <i
                                    class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding" id="listMenu">
                        @include('admin::components._inc_loading_v2')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-xs-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sắp xếp thư tự bằng cách kéo thả</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <ul id="sortable">
                            @foreach($navs as $item)
                                <li class="ui-state-default js-item-menu" data-id="{{ $item->id }}">
                                    <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $item->sn_name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="box-footer text-center" style="width: 60%">
                            <a href="" class="js-update-sort-nav btn btn-xs btn-info" style="margin-left: 7px">Cập
                                nhật</a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<script>
    var URL_LIST_NAV = '{{ route("get_admin.nav.index") }}'
    var URL_UPDATE_SORT_NAV = '{{ route("get_admin.nav.update_sort") }}'
</script>
