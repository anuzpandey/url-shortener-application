@props([
    'label' => NULL,
    'name' => NULL,
    'required' => FALSE,
    'checked' => false,
])

<div class="form-control">
    <label class="label cursor-pointer justify-start gap-4 w-fit">
        <input
            name="{{ $name }}"
            type="checkbox"
            @if($checked || old($name)) checked @endif
            class="checkbox checkbox-xs checkbox-primary"
        />
        @if($label)
            <span class="label-text">{{ $label }}</span>
        @endif
    </label>
</div>
