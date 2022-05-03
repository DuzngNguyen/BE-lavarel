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
                    <input type="text" class="form-control" name="e_name" placeholder="" autocomplete="off" value="{{ old('e_name', $expenditure->e_name ?? '') }}">
                    @if ($errors->first('e_name'))
                        <span class="text-danger">{{ $errors->first('e_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Category <span class="text-danger">(*)</span></label>
                    <select name="e_category_id" class="form-control js-select2" id="">
                        @foreach($categories as $item)
                            <option value="{{ $item['id'] }}" {{ ($expenditure->e_category_id ?? 0) == $item['id'] ? "selected" : "" }}>{{ $item['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Money <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control js-money" name="e_price" placeholder=""
                           autocomplete="off" value="{{ number_format(($expenditure->e_price ?? 0),0,',',',') }}">
                </div>
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Type <span class="text-danger">(*)</span></label>
                                <select name="e_type" class="form-control js-select2" id="">
                                    @foreach($type as $key => $t)
                                        <option value="{{ $key  }}" {{ ($expenditure->e_type ?? 0) == $key ? "selected" : "" }}>{{ $t['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Ngày sử dụng <span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" name="e_date" value="{{ $expenditure->e_date ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
