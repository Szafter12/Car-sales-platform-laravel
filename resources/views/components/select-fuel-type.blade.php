<select name="fuel_type_id">
    <option value="">Fuel Type</option>
    @foreach ($fuels as $fuel)
        <option value="{{$fuel->id}}">{{$fuel->name}}</option>
    @endforeach
</select>
