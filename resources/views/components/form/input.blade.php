@props(['name', 'label', 'value', 'type' => 'text'])

<label for="{{ $name }}">{{ $label }}</label>
<input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
       {{ $attributes->class(['form-control' ,  'is-invalid' => $errors->has($name)])}} />

@error($name)
    <p class="invalid-feedback"> {{ $message }} </p>
@enderror
