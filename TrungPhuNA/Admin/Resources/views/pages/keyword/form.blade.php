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
                    <input type="text" class="form-control keypress-count" name="k_name" placeholder="" data-title-seo=".title_seo" data-slug=".slug"  autocomplete="off" value="{{ old('k_name', $keyword->k_name ?? '') }}">
                    @if ($errors->first('k_name'))
                        <span class="text-danger">{{ $errors->first('k_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="k_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2" autocomplete="off">{{ old('k_description', $keyword->k_description ?? '') }}</textarea>
                    @if ($errors->first('k_description'))
                        <span class="text-danger">{{ $errors->first('k_description') }}</span>
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
                    <input type="text" class="form-control title_seo" name="k_title_seo" placeholder="" autocomplete="off" value="{{ old('k_title_seo', $keyword->k_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="k_description_seo" class="form-control desc_seo" cols="5" rows="2"
                        autocomplete="off">{{ old('k_description_seo', $keyword->k_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="k_slug" placeholder="" autocomplete="off" value="{{ old('k_slug', $keyword->k_slug ?? '') }}">
                    @if ($errors->first('k_slug'))
                        <span class="text-danger">{{ $errors->first('k_slug') }}</span>
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
                    <img src="{{ pare_url_file($keyword->k_avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="k_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.keyword.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
