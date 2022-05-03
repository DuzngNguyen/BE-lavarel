<form role="form" action="" method="POST" enctype="multipart/form-data" class="target_submit" autocomplete="off">
    @csrf
    <div class="col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control " name="m_name" placeholder="" autocomplete="off" value="{{ old('m_name', $sidebar->m_name ?? '') }}">
                    @if ($errors->first('m_name'))
                        <span class="text-danger">{{ $errors->first('m_name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control "  name="m_icon" placeholder="" autocomplete="off" value="{{ old('m_icon', $sidebar->m_icon ?? '') }}">
                    <p><i>Xem class icon <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">tại đây</a></i></p>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Route <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control " name="m_route" placeholder="" autocomplete="off" value="{{ old('m_route', $sidebar->m_route ?? '') }}">
                    @if ($errors->first('m_route'))
                        <span class="text-danger">{{ $errors->first('m_route') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Permission <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control " name="m_permission" placeholder="" autocomplete="off" value="{{ old('m_permission', $sidebar->m_permission ?? '') }}">
                    @if ($errors->first('m_permission'))
                        <span class="text-danger">{{ $errors->first('m_permission') }}</span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Trạng thái <span class="text-red">(*)</span></label>
                    <select name="m_status" id="" class="form-control">
                        <option value="2" {{ ($sidebar->m_status ?? 2) == 2  ? "selected" : "" }}>Hiện</option>
                        <option value="1" {{ ($sidebar->m_status ?? 1) == 1  ? "selected" : "" }}>Ẩn</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Prefix <span class="text-red">(*)</span></label>
                    <input type="text" class="form-control " name="m_prefix" placeholder="" autocomplete="off" value="{{ old('m_prefix', $sidebar->m_prefix ?? '') }}">
                    @if ($errors->first('m_prefix'))
                        <span class="text-danger">{{ $errors->first('m_prefix') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Sub menu</h3>
            </div>
            <div class="box-body">
                <div id="wrap-row-menu">
                    @if(isset($sidebar) && $menus = json_decode($sidebar->m_sub_menu, true) ?? [])
                        @foreach($menus['name'] as $key => $item)
                            <div class="row row-menu {{ $key == 0 ? 'row-menu-temple' : '' }}">
                                <div class="col-sm-2">
                                    <div class="form-group mlr-10">
                                        <input type="text" class="form-control" name="m_sub_menu[name][]"
                                               value="{{ $item }}" placeholder="Tên menu"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mlr-10">
                                        <input type="text" class="form-control" name="m_sub_menu[route][]"
                                               value="{{ $menus['route'][$key] ?? '' }} "
                                               placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mlr-10">
                                        <input type="text" class="form-control" name="m_sub_menu[params][]"
                                               value="{{ $menus['params'][$key] ?? '' }}"
                                               placeholder="?param=1&param2=2"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mlr-10">
                                        <input type="text" class="form-control" name="m_sub_menu[prefix][]"
                                               value="{{ $menus['prefix'][$key] ?? '' }}"
                                               placeholder="Prefix"/>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group mlr-10">
                                        <input type="text" class="form-control" name="m_sub_menu[permission][]"
                                               value="{{ $menus['permission'][$key] ?? '' }}"
                                               placeholder="Permission"/>
                                    </div>
                                </div>
                                <div class="col-md-2 action-row-menu {{ $key == 0 ? 'hide' : '' }}">
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
                            <div class="col-sm-2">
                                <div class="form-group mlr-10">
                                    <input type="text" class="form-control" name="m_sub_menu[name][]"
                                           value="" placeholder="Tên menu"/>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group mlr-10">
                                    <input type="text" class="form-control" name="m_sub_menu[route][]"
                                           value=""
                                           placeholder="Route"/>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group mlr-10">
                                    <input type="text" class="form-control" name="m_sub_menu[params][]"
                                           value=""
                                           placeholder="?param=1&param2=2"/>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group mlr-10">
                                    <input type="text" class="form-control" name="m_sub_menu[prefix][]"
                                           value=""
                                           placeholder="Prefix"/>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group mlr-10">
                                    <input type="text" class="form-control" name="m_sub_menu[permission][]"
                                           value=""
                                           placeholder="Permission"/>
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
                        <a id="copy_menu" class="col-sm-12" href="javascript:void(0)"><i class="fa fa-plus"></i> Thêm menu</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
