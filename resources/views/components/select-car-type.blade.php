<select name="car_type_id">
    <option value="">Type</option>
    @foreach ($carTypes as $carType)
        <option value="{{ $carType->id }}" @selected($attributes->get('value') == $carType->id)>{{ $carType->name }}</option>
    @endforeach
</select>
