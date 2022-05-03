<div class="modal fade modal-setting-email" id="modal-default" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('get_admin.setting.email.store') }}" method="POST" id="form-setting-email" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Cập nhật cấu hình</h4>
                </div>
                <div class="modal-body">
                    <div class="callout callout-success js-alter hidden">
                        <h4>Thành công!</h4>
                        <p>Cập nhật dữ liệu thành công</p>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Loại</label>
                        <input type="text" required name="mail_driver" value="{{ $email->mail_driver ?? "" }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Cổng</label>
                        <input type="text"  name="mail_port" value="{{ $email->mail_port ?? "" }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Máy chủ</label>
                        <input type="text"  name="mail_host" value="{{ $email->mail_host ?? "" }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text"  name="mail_username" value="{{ $email->mail_username ?? "" }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="text"  name="mail_password" value="{{ $email->mail_password ?? "" }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Tên miền</label>
                        <input type="text"  name="mail_domain" value="{{ $email->mail_domain ?? "" }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Người gửi</label>
                        <input type="text"  name="mail_from_address" value="{{ $email->mail_from_address ?? "" }}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer" style="clear: both">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ bỏ</button>
                    <button type="button" class="btn btn-primary js-submit-setting-email">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
