@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $datas ??= [];
    $placeholder ??= 'Sélectionnez une option';
@endphp
<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="select select-bordered" name="{{ $name }}" id="{{ $name }}">
        <option value="">{{ $placeholder }}</option>
        @foreach($datas as $data)
            <option value="{{ $data->id }}">{{ $data->name }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="text-red-500">
        {{ $message }}
    </div>
    @enderror
</div>
