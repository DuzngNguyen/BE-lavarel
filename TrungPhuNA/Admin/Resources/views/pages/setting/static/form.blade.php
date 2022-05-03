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
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo"  name="name" placeholder="" autocomplete="off" value="{{ old('name', $page->name ?? '') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control keypress-count" cols="5" rows="2" data-desc-seo=".desc_seo"  autocomplete="off">{{ old('description', $page->description ?? '') }}</textarea>
                    @if ($errors->first('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Page <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="url" placeholder="" autocomplete="off" value="{{ old('url', $page->url ?? '') }}">
                    @if ($errors->first('url'))
                        <span class="text-danger">{{ $errors->first('url') }}</span>
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
                    <textarea name="content" id="content" class="form-control textarea" cols="5"
                              rows="2">{{ old('content', $page->content ?? '') }}</textarea>
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
                    <input type="text" class="form-control title_seo" name="title_seo" placeholder="" autocomplete="off" value="{{ old('title_seo', $page->title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="description_seo" class="form-control  desc_seo" cols="5" rows="2"
                        autocomplete="off">{{ old('description_seo', $page->description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keyword</label> <textarea
                        name="keyword_seo" class="form-control" cols="5" rows="2"
                        autocomplete="off" placeholder="Từ khoá 1, từ khoá 2">{{ old('keyword_seo', $page->keyword_seo ?? '') }}</textarea>
                    <p><i>Các từ khoá cách nhau bởi dấu ','</i></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Index</label> <textarea
                        name="seo" class="form-control" cols="5" rows="2"
                        autocomplete="off" placeholder="INDEX, FOLLOW">{{ old('seo', $page->seo ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div>
                    <img src="{{ pare_url_file($page->avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="pro_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.page.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
        CKEDITOR.replace('content')
    })
</script>

