<select name="country" class="selectpicker with-border">
    @foreach ($countries as $country )
        <option value="{{$code}}" @if ($code == $selected) selected @endif>{{$country}}</option>
    @endforeach
</select>