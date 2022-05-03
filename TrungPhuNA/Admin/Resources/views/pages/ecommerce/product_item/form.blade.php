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
                    <small class="char_counter" ><b class="current">{{ strlen($product->pi_name ?? "") }}</b> <b>/ 80</b></small>
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" data-slug=".slug" name="pi_name" placeholder="" autocomplete="off"
                           value="{{ old('pi_name', $product->pi_name ?? '') }}">
                    @if ($errors->first('pi_name'))
                        <span class="text-danger">{{ $errors->first('pi_name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Thứ tự </label>
                    <input type="number" class="form-control" name="pi_sort" placeholder=""  autocomplete="off"
                           value="{{ old('pi_sort', $product->pi_sort ?? 0) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="pi_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2"
                              autocomplete="off">{{ old('pi_description', $product->pi_description ?? '') }}</textarea>
                    @if ($errors->first('pi_description'))
                        <span class="text-danger">{{ $errors->first('pi_description') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Product <span class="text-red">(*)</span></label>
                    <select name="pi_product_id" class="form-control js-product-search">
                        <option value="0">__ Map sản phẩm __</option>
                        @foreach($productsSelect ?? [] as $item)
                            <option value="{{ $item->id }}" selected>{{ $item->pro_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('pi_product_id'))
                        <span class="text-danger">{{ $errors->first('pi_product_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <textarea name="pi_content" id="content" class="form-control textarea" cols="5"
                              rows="2">{{ old('pi_content', $product->pi_content ?? '') }}</textarea>
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
                    <input type="text" class="form-control title_seo " name="pi_title_seo" placeholder="" autocomplete="off"
                           value="{{ old('pi_title_seo', $product->pi_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="pi_description_seo" class="form-control desc_seo" cols="5" rows="2"
                        autocomplete="off">{{ old('pi_description_seo', $product->pi_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="pi_slug" placeholder="" autocomplete="off"
                           value="{{ old('pi_slug', $product->pi_slug ?? '') }}">
                    @if ($errors->first('pi_slug'))
                        <span class="text-danger">{{ $errors->first('pi_slug') }}</span>
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
                    <img src="{{ pare_url_file($product->pi_avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="pi_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    var URL_SEARCH_PRODUCT = '{{ route("get_ajax_admin.product.list") }}'
    $(function () {
        CKEDITOR.replace('content')
    })
</script>
