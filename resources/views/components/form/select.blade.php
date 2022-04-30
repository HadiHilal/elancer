@props([
    'name' , 'label' , 'array' , 'selected'
])


<label for="{{$name}}">{{$label}}</label>
<select id="{{$name}}" name="{{$name}} "
{{ $attributes->class(['form-control' ,  'is-invalid' => $errors->has($name)])}} >

    <option value="">{{$label}}</option>
    @foreach ($array as $key => $item )
        <option {{ $key ==  old($name ,$selected )  ? 'selected' : '' }}  value="{{ $key }}">{{$item}}</option>
    @endforeach
</select>
@error($name)
    <p class="invalid-feedback"> {{ $message }} </p>
@enderror