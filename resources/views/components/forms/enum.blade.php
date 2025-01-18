<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="select select-bordered" name="{{ $name }}" id="{{ $name }}">
        @foreach($datas as $data)
            <option
                    value="{{ $data->value }}"
                    @selected(old($name, $value) == $data->value)
            >
                {{ __('status.' . $data->value) }}
            </option>
        @endforeach
    </select>
    @error($name)
    <div class="text-red-500">
        {{ $message }}
    </div>
    @enderror
</div>
