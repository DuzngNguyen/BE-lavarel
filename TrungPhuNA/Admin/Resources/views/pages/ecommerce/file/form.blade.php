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
                    <small class="char_counter"><b class="current">{{ strlen($file->f_name ?? "") }}</b> <b>/
                            80</b></small>
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" data-slug=".slug"
                           name="f_name" placeholder="" autocomplete="off"
                           value="{{ old('f_name', $file->f_name ?? '') }}">
                    @if ($errors->first('f_name'))
                        <span class="text-danger">{{ $errors->first('f_name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Link <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="f_link" placeholder="" autocomplete="off"
                           value="{{ old('f_link', $file->f_link ?? '') }}">
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Product <span class="text-red">(*)</span></label>
                    <select name="f_product_id" class="form-control js-product-search">
                        <option value="0">__ Map sản phẩm __</option>
                        @foreach($filesSelect ?? [] as $item)
                            <option value="{{ $item->id }}" selected>{{ $item->pro_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">File tài liệu</h3>
            </div>
            <div class="box-body block-images">
                <span class="control-fileupload">
                    <label for="fileInput">Chọn file từ máy tính ... </label>
                    <input type="file" name="f_path" id="fileInput">
                </span>
               <div style="overflow: hidden;margin-top: 10px;">
                   <pre>{!! $file->f_meta ?? '' !!} </pre>

               </div>
            </div>
        </div>
    </div>
</form>

<script>
    var URL_SEARCH_PRODUCT = '{{ route("get_ajax_admin.product.list") }}'
</script>
