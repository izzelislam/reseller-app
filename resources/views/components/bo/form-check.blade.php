
@props([
  'label',
  'name',
  'value',
  'default'
])

<div class="form-check mb-3">
    <input
        class="form-check-input"
        type="checkbox"
        name="{{ $name }}"
        value="1"
        id="check-form{{ $name }}"
        {{ $attributes }}
        @if($default == 1)
            checked
        @endif
    >
    <label class="form-check-label" for="check-form{{ $name }}">
        {{ $label }}
    </label>

    @error($name)
        <span class="invalid-feedback">
          <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>









