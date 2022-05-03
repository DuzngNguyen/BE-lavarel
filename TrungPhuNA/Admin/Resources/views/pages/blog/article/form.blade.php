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
                    <small class="char_counter" ><b class="current">{{ strlen($article->a_name ?? "") }}</b> <b>/ 80</b></small>
                    <input type="text" class="form-control keypress-count" name="a_name"  data-title-seo=".title_seo" data-slug=".slug" placeholder="" autocomplete="off" value="{{ old('a_name', $article->a_name ?? '') }}">
                    @if ($errors->first('a_name'))
                        <span class="text-danger">{{ $errors->first('a_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <small class="char_counter" ><b class="current">{{ strlen($article->a_description ?? "") }}</b> <b>/ 180</b></small>
                    <textarea name="a_description" class="form-control keypress-count" data-desc-seo=".desc_seo" cols="5" rows="2" autocomplete="off">{{ old('a_description', $article->a_description ?? '') }}</textarea>
                    @if ($errors->first('a_description'))
                        <span class="text-danger">{{ $errors->first('a_description') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Menu <span class="text-red">(*)</span></label>
                    <select name="a_menu_id" class="form-control js-select2" id="">
                        <option value="">__ Chọn danh mục __</option>
                        @foreach($menus as $item)
                            <option value="{{ $item->id }}" {{ ($article->a_menu_id ?? 0) == $item->id ? "selected" : "" }}>{{ $item->m_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('a_menu_id'))
                        <span class="text-danger">{{ $errors->first('a_menu_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Bài viết liên quan</h3>
            </div>
            <div class="box-body">
                <div id="wrap-row-menu">
                    @if(isset($articlesRelate) && !$articlesRelate->isEmpty())
                        @foreach($articlesRelate as $key => $item)
                        <div class="row row-menu {{ $key == 0 ? 'row-menu-temple' : '' }}">
                            <div class="col-sm-8">
                                <div class="form-group mlr-10">
                                    <select name="article_relate[]"  class="js-select2-article form-control" style="width: 100% !important;">
                                        <option value="{{ $item->id }}" selected>{{ $item->a_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 action-row-menu hide">
                                <div class="form-group">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-remove"><i class="fa fa-trash"></i>  </a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-up"><i class="fa fa-arrow-up"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-down"><i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="row row-menu row-menu-temple">
                            <div class="col-sm-8">
                                <div class="form-group mlr-10">
                                    <select name="article_relate[]"  class="js-select2-article form-control" style="width: 100% !important;"></select>
                                </div>
                            </div>
                            <div class="col-md-2 action-row-menu hide">
                                <div class="form-group">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-remove"><i class="fa fa-trash"></i>  </a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-up"><i class="fa fa-arrow-up"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-move-down"><i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="form-group">
                        <a id="add-article" class="col-sm-12" href="javascript:void(0)"><i class="fa fa-plus"></i> Thêm mới bài viết</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <textarea name="a_content" id="content" class="form-control textarea" cols="5" rows="2">{{ old('a_content', $article->a_content ?? '') }}</textarea>
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
                    <input type="text" class="form-control title_seo" name="a_title_seo" placeholder="" autocomplete="off" value="{{ old('a_title_seo', $article->a_title_seo ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label> <textarea
                        name="a_description_seo" class="form-control desc_seo" cols="5" rows="3"
                        autocomplete="off">{{ old('a_description_seo', $article->a_description_seo ?? '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keyword</label> <textarea
                        name="a_keyword_seo" class="form-control" cols="5" rows="2"
                        autocomplete="off" placeholder="Từ khoá 1, từ khoá 2">{{ old('a_keyword_seo', $article->a_keyword_seo ?? '') }}</textarea>
                    <p><i>Các từ khoá cách nhau bởi dấu ','</i></p>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Đường dẫn <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="a_slug" placeholder="" autocomplete="off" value="{{ old('a_slug', $article->a_slug ?? '') }}">
                    @if ($errors->first('a_slug'))
                        <span class="text-danger">{{ $errors->first('a_slug') }}</span>
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
                    <img src="{{ pare_url_file($article->a_avatar ?? '') }}" alt="" class="img-thumbnail">
                </div>
                <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="a_avatar" id="fileInput" class="js-upload">
                </span>
            </div>
        </div>
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

