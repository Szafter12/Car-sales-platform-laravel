<select id="makerSelect" name="maker_id">
    <option value="">Maker</option>
    @foreach ($makers as $maker)
        <option value="{{ $maker->id }}">{{ $maker->name }}</option>
    @endforeach
</select>
