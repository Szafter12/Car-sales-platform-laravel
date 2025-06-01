@php
    $features = [
        'air_conditioning' => 'Air Conditioning',
        'power_windows' => 'Power Windows',
        'power_door_locks' => 'Power Door Locks',
        'abs' => 'ABS',
        'cruise_control' => 'Cruise Control',
        'bluetooth_connectivity' => 'Bluetooth Connectivity',
        'remote_start' => 'Remote Start',
        'gps_navigation' => 'GPS Navigation System',
        'heated_seats' => 'Heated Seats',
        'climate_control' => 'Climate Control',
        'rear_parking_sensors' => 'Rear Parking Sensors',
        'leather_seats' => 'Leather Seats',
    ];

@endphp
<div class="form-group @error('features')
    has-error
@enderror">
    <div class="row">
        <div class="col">
            @foreach ($features as $key => $value)
                <label class="checkbox">
                    <input type="checkbox" name="features[{{ $key }}]" value="1" />
                    {{ $value }}
                </label>
                @if ($loop->iteration % 6 == 0 && !$loop->last)
        </div>
        <div class="col">
            @endif
            @endforeach
        </div>
    </div>
    <p class="error-message"> {{ $errors->first('features') }}</p>
</div>
