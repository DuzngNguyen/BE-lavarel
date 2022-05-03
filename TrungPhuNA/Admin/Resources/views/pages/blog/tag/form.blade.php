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
                    <input type="text" class="form-control" name="t_name" placeholder="" autocomplete="off" value="{{ old('t_name', $tag->t_name ?? '') }}">
                    @if ($errors->first('t_name'))
                        <span class="text-danger">{{ $errors->first('t_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="t_description" class="form-control" cols="5" rows="2" autocomplete="off">{{ old('t_description', $tag->t_description ?? '') }}</textarea>
                    @if ($errors->first('t_description'))
                        <span class="text-danger">{{ $errors->first('t_description') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Tối ưu SEO</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="t_title_seo" placeholder="" autocomplete="off" value="{{ old('t_title_seo', $tag->t_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="t_description_seo" class="form-control" cols="5" rows="2"
                        autocomplete="off">{{ old('t_description_seo', $tag->t_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="t_slug" placeholder="" autocomplete="off" value="{{ old('t_slug', $tag->t_slug ?? '') }}">
                    @if ($errors->first('t_slug'))
                        <span class="text-danger">{{ $errors->first('t_slug') }}</span>
                    @endif
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
                    <img src="/images/preloader.png" alt="" class="img-thumbnail">
                </div>
                <div class="box-input-upload" style="position:relative;">
                    <a class="btn btn-primary" href="javascript:;"> Choose
                        Chọn file từ máy tính ... <input type="file" name="t_avatar" size="40" class="js-upload"> </a>
                    <span class="label label-info" id="upload-file-info"></span>
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.tag.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
