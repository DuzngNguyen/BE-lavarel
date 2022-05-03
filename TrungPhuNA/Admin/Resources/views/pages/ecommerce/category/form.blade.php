<form role="form" action="" method="POST" enctype="multipart/form-data" class="target_submit" autocomplete="off">
    @csrf
    <div class="col-sm-9">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Code <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control keypress-count"  name="c_code" placeholder="" autocomplete="off" value="{{ old('c_code', $category->c_code ?? '') }}">
                    @if ($errors->first('c_code'))
                        <span class="text-danger">{{ $errors->first('c_code') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" data-slug=".slug" name="c_name" placeholder="" autocomplete="off" value="{{ old('c_name', $category->c_name ?? '') }}">
                    @if ($errors->first('c_name'))
                        <span class="text-danger">{{ $errors->first('c_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Parent <span class="text-danger">(*)</span></label>
                    <select name="c_parent_id" class="form-control" id="">
                        <option value="0">__ROOT__</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ ($category->c_parent_id ?? 0) == $item->id ? "selected" : "" }}>
                                <?php $str = '' ;for($i = 0; $i < $item->level; $i ++){ echo $str; $str .= '-- '; }?>
                                {{ $item->c_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="c_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2" autocomplete="off">{{ old('c_description', $category->c_description ?? '') }}</textarea>
                    @if ($errors->first('c_description'))
                        <span class="text-danger">{{ $errors->first('c_description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control "  name="c_icon" placeholder="" autocomplete="off" value="{{ old('c_icon', $category->c_icon ?? '') }}">
                    <p><i>Xem class icon <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">tại đây</a></i></p>
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Content</label>
                    <textarea name="a_content" id="content" class="form-control textarea" cols="5" rows="2"
                              style="visibility: hidden; display: none;">{{ old('a_content', $category->a_content ?? '') }}</textarea>
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
                    <input type="text" class="form-control title_seo" name="c_title_seo" placeholder="" autocomplete="off" value="{{ old('c_title_seo', $category->c_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea
                        name="c_description_seo" class="form-control desc_seo" cols="5" rows="2"
                        autocomplete="off">{{ old('c_description_seo', $category->c_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="c_slug" placeholder="" autocomplete="off" value="{{ old('c_slug', $category->c_slug ?? '') }}">
                    @if ($errors->first('c_slug'))
                        <span class="text-danger">{{ $errors->first('c_slug') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">

            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Nổi bật <span class="text-red">(*)</span></label>
                    <select name="c_hot" id="" class="form-control js-select2">
                        <option value="0" {{ $category->c_hot ?? 0 == 1 ? "selected" : "" }}>__Mặc đinh__</option>
                        <option value="1" {{ $category->c_hot ?? 1 == 1 ? "selected" : "" }}>__Nổi bật__</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div>
                    <img src="{{ pare_url_file($category->c_avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="c_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
        </div>
    </div>
</form>
