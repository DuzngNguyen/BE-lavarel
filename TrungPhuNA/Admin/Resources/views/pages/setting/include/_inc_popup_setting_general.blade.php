<div class="modal fade modal-setting-general"  id="modal-default" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('get_admin.general.store') }}" class="form-horizontal" method="POST"
                  id="form-setting-general" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Cập nhật cấu hình chung</h4>
                </div>
                <div class="box box-default">
                    <div class="callout callout-success js-alter hidden">
                        <h4>Thành công!</h4>
                        <p>Cập nhật dữ liệu thành công</p>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin website</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tên website</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="sg_name"
                                       value="{{ $setting->sg_name ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tài khoản Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" placeholder="" name="sg_email"
                                       value="{{ $setting->sg_email ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="" name="sg_logo">
                                @if($meta['logo'])
                                    <img src="{{ pare_url_file($meta['logo']) }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Favicon</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" placeholder="" name="sg_favicon">
                                @if($meta['favicon'])
                                    <img src="{{ pare_url_file($meta['favicon']) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Địa chỉ website</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Giấy phép kinh doanh</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="sg_name_business"
                                       value="{{ $setting->sg_name_business ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="sg_address"
                                       value="{{ $setting->sg_address ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="phone" class="form-control" placeholder="" name="sg_phone"
                                       value="{{ $setting->sg_phone ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="clear: both">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                    <button type="button" class="btn btn-primary js-submit-setting-general">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
