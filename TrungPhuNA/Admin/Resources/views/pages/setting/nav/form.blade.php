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
                    <input type="text" class="form-control"   name="sn_name" placeholder="" autocomplete="off" value="{{ old('sn_name', $nav->sn_name ?? '') }}">
                    @if ($errors->first('sn_name'))
                        <span class="text-danger">{{ $errors->first('sn_name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Parent <span class="text-red">(*)</span></label>
                    <select name="sn_parent_id" id="" class="form-control">
                        <option value="0">__ROOT__</option>

                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Type <span class="text-red">(*)</span></label>
                    <div class="form-group d-flex">
                        @foreach($types as $key => $type)
                        <label class="box-checkbox js-type-navbar" style="margin-right: 10px" data-url="{{ route('get_admin.nav.type', $key) }}">
                            <input type="radio" name="sn_type"  {{ ($nav->sn_type ?? ($key == 1 ? 1 : 0)) == $key ? 'checked' : '' }}  value="{{ $key }}"> {{ $type['name'] }}
                            <span class="checkmark"></span>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div id="dataType">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Url <span class="text-red">(*)</span></label>
                        <input type="text" class="form-control"   name="sn_url" placeholder="" autocomplete="off" value="{{ old('sn_url', $nav->sn_url ?? '') }}">
                        @if ($errors->first('sn_url'))
                            <span class="text-danger">{{ $errors->first('sn_url') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Sort <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control"   name="sn_sort" placeholder="" autocomplete="off" value="{{ old('sn_sort', $nav->sn_sort ?? 1) }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.nav.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>

