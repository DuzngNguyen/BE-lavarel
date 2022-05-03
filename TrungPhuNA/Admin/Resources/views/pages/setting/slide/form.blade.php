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
                    <input type="text" class="form-control" name="s_name" placeholder="" autocomplete="off" value="{{ old('s_name', $slide->s_name ?? '') }}">
                    @if ($errors->first('s_name'))
                        <span class="text-danger">{{ $errors->first('s_name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Link <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="s_link" placeholder="" autocomplete="off" value="{{ old('s_link', $slide->s_link ?? '') }}">
                    @if ($errors->first('s_link'))
                        <span class="text-danger">{{ $errors->first('s_link') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Sort <span class="text-red">(*)</span></label>
                    <input type="number" class="form-control" name="s_sort" placeholder="" autocomplete="off" value="{{ old('s_sort', $slide->s_sort ?? 0) }}">
                    @if ($errors->first('s_sort'))
                        <span class="text-danger">{{ $errors->first('s_sort') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="name">Target </label>
                    <select class="form-control" name="s_target">
                        <option value="1" {{ $slide->s_target ?? 1 == 1 ? "selected='selected'" : "" }}>_blank</option>
                        <option value="2" {{ $slide->s_target ?? 1 == 2 ? "selected='selected'" : "" }}>_self</option>
                        <option value="3" {{ $slide->s_target ?? 1 == 3 ? "selected='selected'" : "" }}>_parent</option>
                        <option value="4" {{ $slide->s_target ?? 1 == 4 ? "selected='selected'" : "" }}>_top</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div>
                    <img src="{{ pare_url_file($slide->s_banner ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="s_banner" id="fileInput" class="js-upload">
                </span>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.slide.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
