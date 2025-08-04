@php
    $year = date('Y');
@endphp
<select name="year" id="carYear">
    <option value="">Year</option>
    @for ($i = $year; $i >= 1990; $i--)
        <option value="{{ $i }}" @selected($attributes->get('value') == $i)>{{ $i }}</option>
    @endfor
</select>
