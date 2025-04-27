@php
    $year = date('Y');
@endphp
<select>
    <option value="">Year</option>
    @for ($i = $year; $i >= 1990; $i--)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>
