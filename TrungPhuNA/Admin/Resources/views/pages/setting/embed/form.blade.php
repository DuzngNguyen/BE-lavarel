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
                    <input type="text" class="form-control"   name="s_name" placeholder="" autocomplete="off" value="{{ old('s_name', $embed->s_name ?? '') }}">
                    @if ($errors->first('s_name'))
                        <span class="text-danger">{{ $errors->first('s_name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Type <span class="text-red">(*)</span></label>
                    <select name="s_type" class="form-control js-select2" id="">
                        <option value="1" {{ ($embed->s_type ?? 1) == 1 ? "selected" : "" }}>CSS</option>
                        <option value="2" {{ ($embed->s_type ?? 1) == 2 ? "selected" : "" }}>JS</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <textarea name="s_content" id="content" class="form-control textarea" cols="5"
                              rows="10">{{ old('s_content', $embed->s_content ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Position <span class="text-red">(*)</span></label>
                    <select name="s_position" class="form-control js-select2" id="">
                        <option value="1" {{ ($embed->s_position ?? 1) == 1 ? "selected" : "" }}>Head</option>
                        <option value="2" {{ ($embed->s_position ?? 1) == 2 ? "selected" : "" }}>Body</option>
                        <option value="3" {{ ($embed->s_position ?? 1) == 3 ? "selected" : "" }}>Footer</option>
                    </select>
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.embed.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
{{--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>--}}
{{--<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}

{{--<script>--}}
{{--    $(function () {--}}
{{--        CKEDITOR.replace('content')--}}
{{--    })--}}
{{--</script>--}}

