<div class="modal fade modal-add-user" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('get_admin.user.create') }}" method="POST" id="form-user"
                  autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thêm mới khách hàng</h4>
                </div>
                <div class="modal-body">
{{--                    <div id="user-info" style="margin-top: 30px;position: relative;padding: 20px 15px">--}}
{{--                        <h4>Thông tin khách hàng</h4>--}}
{{--                        <div class="spinner" style="top: 55px !important;">--}}
{{--                            <span class="spinner-inner-1"></span>--}}
{{--                            <span class="spinner-inner-2"></span>--}}
{{--                            <span class="spinner-inner-3"></span>--}}
{{--                        </div>--}}
{{--                        <div id="js-user-info"></div>--}}
{{--                    </div>--}}
                    <div class="">
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Tên khách hàng</label>
                            <input type="text" required name="name" value="{{ $transaction->t_name ?? '' }}" class="form-control"
                                   placeholder="Tên khách hàng">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" required name="phone" value="{{ $transaction->t_phone ?? '' }}" class="form-control"
                                   placeholder="Số điện thoại">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" required name="email" value="{{ $transaction->t_email ?? '' }}" class="form-control"
                                   placeholder="Email">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" required name="address" value="{{ $transaction->t_address ?? '' }}" class="form-control"
                                   placeholder="Địa chỉ">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="exampleInputEmail1" style="display:block">Nhóm</label>
                            <select name="meta[options][type]" id="" class="form-control js-select2 col-sm-12" style="width: 100% !important;">
                                <option value="1" {{ ($meta['options']['type'] ?? 1) == 1 ? "selected" : "" }}>Không khác định</option>
                                <option value="2" {{ ($meta['options']['type'] ?? 1) == 2 ? "selected" : "" }}>Giáo viên</option>
                                <option value="3" {{ ($meta['options']['type'] ?? 1) == 3 ? "selected" : "" }}>Học Sinh</option>
                                <option value="4" {{ ($meta['options']['type'] ?? 1) == 4 ? "selected" : "" }}>Phụ huynh</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="exampleInputEmail1" style="display:block">Cấp</label>
                            <select name="meta[options][level]" id="" class="form-control js-select2 col-sm-12" style="width: 100% !important;">
                                <option value="1" {{ ($meta['options']['level'] ?? 1) == 1 ? "selected" : "" }}>Không xác định</option>
                                <option value="2" {{ ($meta['options']['level'] ?? 1) == 2 ? "selected" : "" }}>Cấp 1</option>
                                <option value="3" {{ ($meta['options']['level'] ?? 1) == 3 ? "selected" : "" }}>Cấp 2</option>
                                <option value="4" {{ ($meta['options']['level'] ?? 1) == 4 ? "selected" : "" }}>Cấp 3</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="exampleInputEmail1" style="display:block">Môn</label>
                            <input type="text" required name="t_meta[options][document]" value="{{ $meta['options']['document'] ?? '' }}" class="form-control"
                                   placeholder="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="clear: both">
                    <button type="button" class="btn btn-danger js-close-modal" data-action="transaction" data-dismiss="modal">Huỷ bỏ</button>
                    <button type="button" class="btn btn-primary js-submit-save-user">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
