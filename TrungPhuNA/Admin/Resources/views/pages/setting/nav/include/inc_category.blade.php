<div class="form-group">
    <label for="exampleInputEmail1"> Menu <span>(*)</span></label>
    <select name="nb_id" class="form-control js-select2" tabindex="-1">
        @foreach($categories as $item)
            <option value="{{ $item->id }}">{{ $item->c_name }}</option>
        @endforeach
    </select>
</div>