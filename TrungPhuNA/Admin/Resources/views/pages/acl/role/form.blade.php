<form role="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                            <input type="text" class="form-control" name="name" placeholder="" autocomplete="off"
                                   value="{{ old('name', $role->name ?? '') }}">
                            @if ($errors->first('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Description <span class="text-red">(*)</span></label>
                            <input type="text" class="form-control" name="description" placeholder="" autocomplete="off"
                                   value="{{ old('description', $role->description ?? '') }}">
                            @if ($errors->first('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Guard name <span class="text-red">(*)</span></label>
                            <input type="text" class="form-control" name="guard_name" placeholder="" autocomplete="off"
                                   value="{{ old('guard_name', $role->guard_name ?? 'admins') }}">
                            @if ($errors->first('guard_name'))
                                <span class="text-danger">{{ $errors->first('guard_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="box-title">Chọn quyền cho nhóm quyền</h3>
        <div class="box-body" id="load_permission">
            @include('admin::components._inc_loading_v2')
        </div>
    </div>
    <div class="box-footer text-center">
        <a href="{{ route('get_admin.role.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ
            bỏ</a>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu</button>
    </div>
    <input type="hidden" name="role_id" value="{{ $role->id ?? 0 }}" id="role_id">
</form>

<script>
    var URL_LOAD_PERMISSION = '{{ route("get_admin.permission.load_all") }}'
</script>
