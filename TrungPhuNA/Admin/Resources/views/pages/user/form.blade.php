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
                    <input type="text" class="form-control" name="name" placeholder="" autocomplete="off" value="{{ old('name', $user->name ?? '') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Email <span class="text-red">(*)</span></label>
                    <input type="email" class="form-control" name="email" placeholder="" autocomplete="off" value="{{ old('email', $user->email ?? '') }}">
                    @if ($errors->first('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Phone <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="" autocomplete="off" value="{{ old('phone', $user->phone ?? '') }}">
                    @if ($errors->first('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="" autocomplete="off" value="{{ old('address', $user->address ?? '') }}">
                    @if ($errors->first('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box box-warning">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ảnh đại diện</h3>
                </div>
                <div class="box-body block-images">
                    <div>
                        <img src="{{ pare_url_file($user->avatar ?? '') }}" alt="" class="img-thumbnail">
                    </div>
                    <span class="control-fileupload">
                  <label for="fileInput">Chọn file từ máy tính ... </label>
                  <input type="file" name="avatar" id="fileInput" class="js-upload">
                </span>
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('get_admin.user.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Huỷ bỏ</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu </button>
            </div>
        </div>
    </div>
</form>
