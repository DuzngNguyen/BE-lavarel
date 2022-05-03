<form role="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="col-sm-9">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="name" placeholder="" autocomplete="off" value="{{ old('name', $permission->name ?? '') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Group <span class="text-red">(*)</span></label>
                    <select name="group_permission" class="form-control js-select2">
                        @foreach($groupPermission as $key => $group)
                        <option value="{{ $key }}" {{ ($permission->group_permission  ?? 0) == $key ? "selected" : "" }}>{{ $group }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Description <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="description" placeholder="" autocomplete="off" value="{{ old('description', $permission->description ?? '') }}">
                    @if ($errors->first('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Guard name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="guard_name" placeholder="" autocomplete="off" value="{{ old('guard_name', $permission->guard_name ?? 'admins') }}">
                    @if ($errors->first('guard_name'))
                        <span class="text-danger">{{ $errors->first('guard_name') }}</span>
                    @endif
                </div>
                <div class="box-footer text-center">
                    <a href="{{ route('get_admin.permission.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
                </div>
            </div>
        </div>
    </div>
</form>
