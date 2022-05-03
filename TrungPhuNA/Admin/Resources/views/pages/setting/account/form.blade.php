<form role="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off" class="target_submit">
    @csrf
    <div class="col-sm-9">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="name" placeholder="" autocomplete="off" value="{{ old('name', $admin->name ?? '') }}">
                    @if ($errors->first('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Account <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="account" placeholder="" autocomplete="off" value="{{ old('account', $admin->account ?? '') }}">
                    @if ($errors->first('account'))
                        <span class="text-danger">{{ $errors->first('account') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Email <span class="text-red">(*)</span></label>
                    <input type="email" class="form-control" name="email" placeholder="" autocomplete="off" value="{{ old('email', $admin->email ?? '') }}">
                    @if ($errors->first('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Password <span class="text-red">(*)</span></label>
                    <input type="password" class="form-control" name="password" {{ isset($admin) ? '' : 'required' }} placeholder="" autocomplete="off" value="">
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Phone <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="" autocomplete="off" value="{{ old('phone', $admin->phone ?? '') }}">
                    @if ($errors->first('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Address <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control" name="address" placeholder="" autocomplete="off" value="{{ old('address', $admin->address ?? '') }}">
                    @if ($errors->first('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Chọn quyền</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach($roles as $item)
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="label-checkbox">
                                    <div class="icheckbox_flat-green {{ in_array($item->id, $rolesActive ?? []) ? "checked" : "" }}" aria-checked="false" aria-disabled="false">
                                        <input type="checkbox" name="roles[]" {{ in_array($item->id, $rolesActive ?? []) ? "checked" : "" }} value="{{ $item->id }}" class="flat-red">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                    <span class="span-desc">{{ $item->name }}</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>
