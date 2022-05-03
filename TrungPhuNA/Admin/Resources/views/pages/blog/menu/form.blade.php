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
                    <small class="char_counter" ><b class="current">{{ strlen($menu->m_name ?? "") }}</b> <b>/ 80</b></small>
                    <input type="text" class="form-control keypress-count" name="m_name" data-title-seo=".title_seo" data-slug=".slug" placeholder="" autocomplete="off" value="{{ old('m_name', $menu->m_name ?? '') }}">
                    @if ($errors->first('m_name'))
                        <span class="text-danger">{{ $errors->first('m_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <small class="char_counter" ><b class="current">{{ strlen($menu->m_description ?? "") }}</b> <b>/ 180</b></small>
                    <textarea name="m_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2" autocomplete="off">{{ old('m_description', $menu->m_description ?? '') }}</textarea>
                    @if ($errors->first('m_description'))
                        <span class="text-danger">{{ $errors->first('m_description') }}</span>
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
                    <input type="text" class="form-control title_seo" name="m_title_seo" placeholder="" autocomplete="off" value="{{ old('m_title_seo', $menu->m_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea
                        name="m_description_seo" class="form-control desc_seo" cols="5" rows="2"
                        autocomplete="off">{{ old('m_description_seo', $menu->m_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="m_slug" placeholder="" autocomplete="off" value="{{ old('m_slug', $menu->m_slug ?? '') }}">
                    @if ($errors->first('m_slug'))
                        <span class="text-danger">{{ $errors->first('m_slug') }}</span>
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
                    <img src="{{ pare_url_file($menu->m_avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="m_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.menu.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
