<select id="modelSelect" name="model_id">
    <option value="">Model</option>
    @foreach ($models as $model)
        <option value="{{ $model->id }}" data-parent="{{ $model->maker_id }}" style="display: block">{{ $model->name }}
        </option>
    @endforeach
</select>
