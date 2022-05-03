<form role="form" action="" method="POST" class="target_submit" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="col-sm-9">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" data-slug=".slug" name="pt_name" placeholder="" autocomplete="off" value="{{ old('pt_name', $type->pt_name ?? '') }}">
                    @if ($errors->first('pt_name'))
                        <span class="text-danger">{{ $errors->first('pt_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <small class="char_counter" ><b class="current">{{ strlen($type->pt_description ?? "") }}</b> <b>/ 200</b></small>
                    <textarea name="pt_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2"
                              autocomplete="off">{{ old('pt_description', $type->pt_description ?? '') }}</textarea>
                    @if ($errors->first('pt_description'))
                        <span class="text-danger">{{ $errors->first('pt_description') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Icon <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="pt_icon" placeholder="" autocomplete="off" value="{{ old('pt_icon', $type->pt_icon ?? '') }}">
                    @if ($errors->first('pt_icon'))
                        <span class="text-danger">{{ $errors->first('pt_icon') }}</span>
                    @endif
                    <p><i>Xem class icon <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">tại đây</a></i></p>
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
                    <input type="text" class="form-control title_seo " name="pt_title_seo" placeholder="" autocomplete="off"
                           value="{{ old('pt_title_seo', $type->pt_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="pt_description_seo" class="form-control desc_seo" cols="5" rows="2"
                        autocomplete="off">{{ old('pt_description_seo', $type->pt_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="pt_slug" placeholder="" autocomplete="off"
                           value="{{ old('pt_slug', $type->pt_slug ?? '') }}">
                    @if ($errors->first('pt_slug'))
                        <span class="text-danger">{{ $errors->first('pt_slug') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
