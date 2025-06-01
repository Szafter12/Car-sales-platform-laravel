<div class="row">
    @foreach ($fuels as $fuel)
        <div class="col">
            <label class="inline-radio">
                <input type="radio" name="fuel_type_id" value="{{ $fuel->id }}" @checked($attributes->get('value') == $fuel->id) />
                {{ $fuel->name }}
            </label>
        </div>
    @endforeach

</div>
