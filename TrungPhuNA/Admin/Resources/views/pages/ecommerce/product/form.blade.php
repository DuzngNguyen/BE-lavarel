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
                    <small class="char_counter" ><b class="current">{{ strlen($product->pro_name ?? "") }}</b> <b>/ 80</b></small>
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" data-slug=".slug" name="pro_name" placeholder="" autocomplete="off"
                           value="{{ old('pro_name', $product->pro_name ?? '') }}">
                    @if ($errors->first('pro_name'))
                        <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <small class="char_counter" ><b class="current">{{ strlen($product->pro_description ?? "") }}</b> <b>/ 200</b></small>
                    <textarea name="pro_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2"
                              autocomplete="off">{{ old('pro_description', $product->pro_description ?? '') }}</textarea>
                    @if ($errors->first('pro_description'))
                        <span class="text-danger">{{ $errors->first('pro_description') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Category <span class="text-red">(*)</span></label>
                    <select name="categories[]" class="form-control js-select2" multiple>
                        <option value="">__ Chọn danh mục __</option>
                        @foreach($categories as $item)
                            <option
                                value="{{ $item->id }}" {{ in_array($item->id, $categoryActive ?? []) ? "selected" : "" }}>{{ $item->c_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('categories'))
                        <span class="text-danger">{{ $errors->first('categories') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Number <span class="text-red">(*)</span></label>
                            <input type="number" class="form-control" name="pro_number" value="{{ $product->pro_number ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Giá mặc định <span class="text-red">(*)</span></label>
                        <input type="text" class="form-control js-money" name="pro_price" id="price-default"
                               placeholder="" autocomplete="off"
                               value="{{ old('pro_price', number_format($product->pro_price ?? 0,0,',',',')) }}">
                        @if ($errors->first('pro_price'))
                            <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="box box-warning">--}}
{{--            <div class="box-header with-border">--}}
{{--                <h3 class="box-title">Album ảnh</h3>--}}
{{--            </div>--}}
{{--            <div class="box-body">--}}
{{--                @if (isset($images))--}}
{{--                    <div class="row" style="margin-bottom: 15px;">--}}
{{--                        @foreach($images as $item)--}}
{{--                            <div class="col-sm-2">--}}
{{--                                <a href="{{ route('get_admin.product.delete_image', $item->id) }}" class="js-image-delete" style="display: block;">--}}
{{--                                    <img src="{{ pare_url_file($item->pi_path) }}" style="width: 100%;height: 200px;object-fit: cover">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <div class="form-group">--}}
{{--                    <div class="file-loading">--}}
{{--                        <input id="images" type="file" name="albums[]" multiple class="file"--}}
{{--                               data-overwrite-initial="false" data-min-file-count="0">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <textarea name="pro_content" id="content" class="form-control textarea" cols="5"
                              rows="2">{{ old('pro_content', $product->pro_content ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Tối ưu SEO</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control title_seo " name="pro_title_seo" placeholder="" autocomplete="off"
                           value="{{ old('pro_title_seo', $product->pro_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="pro_description_seo" class="form-control desc_seo" cols="5" rows="3"
                        autocomplete="off">{{ old('pro_description_seo', $product->pro_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keyword</label> <textarea
                        name="pro_keyword_seo" class="form-control" cols="5" rows="2"
                        autocomplete="off" placeholder="Từ khoá 1, từ khoá 2">{{ old('pro_keyword_seo', $product->pro_keyword_seo ?? '') }}</textarea>
                    <p><i>Các từ khoá cách nhau bởi dấu ','</i></p>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="pro_slug" placeholder="" autocomplete="off"
                           value="{{ old('pro_slug', $product->pro_slug ?? '') }}">
                    @if ($errors->first('pro_slug'))
                        <span class="text-danger">{{ $errors->first('pro_slug') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div>
                    <img src="{{ pare_url_file($product->pro_avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="pro_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<style>
    .fileinput-upload-button {
        display: none !important;
    }
    .js-image-delete {
        margin-bottom: 25px;
    }
</style>
<script>

    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    $(function () {
        CKEDITOR.replace('content', options)
    })

    $(function () {
        CKEDITOR.replace('regulations', options)
    })
</script>
