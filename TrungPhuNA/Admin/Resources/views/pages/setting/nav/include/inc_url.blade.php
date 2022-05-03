<div class="form-group">
    <label for="url" class="required">Url <span>(*)</span></label>
    <input type="text" class="form-control"  value="{{ old('sn_url', $nav->sn_url ?? '') }}" name="sn_url" >
    @if($errors->first('sn_url'))
        <span class="text-danger">{{ $errors->first('sn_url') }}</span>
    @endif
</div>
