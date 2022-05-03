<form role="form" action="" class="target_submit" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="col-sm-9">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <small class="char_counter" ><b class="current">{{ strlen($document->a_name ?? "") }}</b> <b>/ 80</b></small>
                    <input type="text" class="form-control keypress-count" name="name"  data-title-seo=".title_seo" data-slug=".slug" placeholder="" autocomplete="off" value="{{ old('name', $document->name ?? '') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <small class="char_counter" ><b class="current">{{ strlen($document->description ?? "") }}</b> <b>/ 180</b></small>
                    <textarea name="a_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2" autocomplete="off">{{ old('description', $document->description ?? '') }}</textarea>
                    @if ($errors->first('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" required name="price" value="{{ old('price', number_format($document->price ?? 0,0,',',',')) }}" class="form-control js-money"
                           placeholder="">
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Category <span class="text-red">(*)</span></label>
                    <select name="category_id" class="form-control js-select2" id="">
                        <option value="">__ Chọn danh mục __</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ ($document->category_id ?? 0) == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Link xem thử</label>
                    <small class="char_counter" ><b class="current">{{ strlen($document->preview_url ?? "") }}</b> <b>/ 180</b></small>
                    <textarea name="a_preview_url" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2" autocomplete="off">{{ old('preview_url', $document->preview_url ?? '') }}</textarea>
                    @if ($errors->first('preview_url'))
                        <span class="text-danger">{{ $errors->first('preview_url') }}</span>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Tối ưu SEO</h3>
            </div>
{{--            <div class="box-body">--}}
{{--                <div class="form-group ">--}}
{{--                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>--}}
{{--                    <input type="text" class="form-control title_seo" name="a_title_seo" placeholder="" autocomplete="off" value="{{ old('a_title_seo', $article->a_title_seo ?? '') }}">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Description</label> <textarea--}}
{{--                        name="meta_description" class="form-control desc_seo" cols="5" rows="3"--}}
{{--                        autocomplete="off">{{ old('meta_description', $article->meta_description ?? '') }}</textarea>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleInputEmail1">Keyword</label> <textarea--}}
{{--                        name="a_keyword_seo" class="form-control" cols="5" rows="2"--}}
{{--                        autocomplete="off" placeholder="Từ khoá 1, từ khoá 2">{{ old('a_keyword_seo', $article->a_keyword_seo ?? '') }}</textarea>--}}
{{--                    <p><i>Các từ khoá cách nhau bởi dấu ','</i></p>--}}
{{--                </div>--}}
{{--                <div class="form-group ">--}}
{{--                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>--}}
{{--                    <input type="text" class="form-control slug" name="a_slug" placeholder="" autocomplete="off" value="{{ old('a_slug', $article->a_slug ?? '') }}">--}}
{{--                    @if ($errors->first('a_slug'))--}}
{{--                        <span class="text-danger">{{ $errors->first('a_slug') }}</span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
{{--        <div class="box box-warning">--}}
{{--            <div class="box-header with-border">--}}
{{--                <h3 class="box-title">Ảnh đại diện</h3>--}}
{{--            </div>--}}
{{--            <div class="box-body block-images">--}}
{{--                <div>--}}
{{--                    <img src="{{ pare_url_file($article->a_avatar ?? '') }}" alt="" class="img-thumbnail">--}}
{{--                </div>--}}
{{--                <span class="control-fileupload">--}}
{{--                  <label for="fileInput">Chọn file từ máy tính ... </label>--}}
{{--                  <input type="file" name="a_avatar" id="fileInput" class="js-upload">--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
</script>

