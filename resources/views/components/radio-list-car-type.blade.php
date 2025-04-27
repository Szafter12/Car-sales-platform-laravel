<div class="row">
    @foreach ($carTypes as $carType)
        <div class="col">
            <label class="inline-radio">
                <input type="radio" name="car_type" value="{{ $carType->id }}" />
                {{ $carType->name }}
            </label>
        </div>
    @endforeach
</div>
