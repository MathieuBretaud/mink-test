@php
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $datas ??= [];
    $placeholder ??= 'Sélectionnez une option';
@endphp
<div class="flex flex-col gap-2">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="select select-bordered" name="{{ $name }}" id="{{ $name }}">
        <option value="">{{ $placeholder }}</option>
        @foreach($datas as $k => $v)
            <option value="{{ $v->id }}" @selected($v->id == $value) >{{ $v->name }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="text-red-500">
        {{ $message }}
    </div>
    @enderror
</div>
