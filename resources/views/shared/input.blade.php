@php
    $type ??= 'text';
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div class="">
    <label for="{{ $name }}">{{ $label }}</label>
    @if($type === 'textarea')
        <textarea class="input input-bordered form-control @error($name) input-error @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="input input-bordered form-control @error($name) input-error @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
    <div class="text-red-500">
        {{ $message }}
    </div>
    @enderror
</div>
