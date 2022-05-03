@if (isset($permissions))
    @foreach($permissions as $key => $permission)
        <h4 class="title-heading-4" style="">{{ $groupPermission[$key] }}</h4>
        <div class="row">
            @foreach($permission as $item)
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="label-checkbox">
                            <div class="icheckbox_flat-green {{ in_array($item->id, $permissions_active) ? "checked" : "" }}" aria-checked="false" aria-disabled="false">
                                <input type="checkbox" name="permissions[]" {{ in_array($item->id, $permissions_active) ? "checked" : "" }} value="{{ $item->id }}" class="flat-red">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            <span class="span-desc">{{ $item->description }}</span>
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
        <hr style="margin-top: 0">
    @endforeach
@endif
