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
                    <input type="text" class="form-control keypress-count" data-title-seo=".title_seo" data-slug=".slug" name="a_name" placeholder="" autocomplete="off" value="{{ old('a_name', $attribute->a_name ?? '') }}">
                    @if ($errors->first('a_name'))
                        <span class="text-danger">{{ $errors->first('a_name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Slug <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control slug" name="a_slug" placeholder="" autocomplete="off" value="{{ old('a_slug', $attribute->a_slug ?? '') }}">
                    @if ($errors->first('a_slug'))
                        <span class="text-danger">{{ $errors->first('a_slug') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Icon <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="a_icon" placeholder="" autocomplete="off" value="{{ old('a_icon', $attribute->a_icon ?? '') }}">
                    @if ($errors->first('a_icon'))
                        <span class="text-danger">{{ $errors->first('a_icon') }}</span>
                    @endif
                    <p><i>Xem class icon <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">tại đây</a></i></p>
                </div>
            </div>
        </div>
    </div>
</form>
