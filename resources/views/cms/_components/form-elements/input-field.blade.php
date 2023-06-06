@props([
    'label' => NULL,
    'name' => NULL,
    'type' => 'text',
    'required' => FALSE,
    'value' => NULL,
    'placeholder' => NULL,
])

<div class="form-control w-full">
    @if($label)
        <label for="{{ $name }}" class="label">
            <span class="label-text">{{ $label }}</span>
        </label>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @if($required) required @endif
        @if($value) value="{{ old($name) }}" @endif
        placeholder="{{ $placeholder ?? 'Enter ' . \Illuminate\Support\Str::title($name) . ' here' }}"
        class="input input-bordered w-full {{ $errors->has($name) ? 'input-error' : '' }}"
    />
    @error($name)
    <label class="label mb-0 pb-0">
        <span class="label-text-alt text-error">{{ $message }}</span>
    </label>
    @enderror
</div>
