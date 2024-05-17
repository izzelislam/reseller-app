@props([
  'label', 
  'name', 
  'value', 
  'readonly', 
  'type'        => 'text', 
  'placeholder' => '',
  'timepicker'  => null,
  'id'          => null,
  'is_optional' => false
])

<div class="mb-3">
  <label for="{{ $name.($id ?? '') }}" class="form-label">{{ $label }}
    @if ($is_optional)
      <span class="mx-1"><b><small><i>opsional</i></small></b></span>
    @else
      <span class="text-danger mx-1"><b><small><i>*wajib diisi</i></small></b></span>
    @endif
  </label>
  <input 
    style="border: 1px solid rgb(227, 227, 228);"
    id              ="{{ $name.($id ?? '') }}" 
    class           ="form-control @error($name) is-invalid @enderror {{ $timepicker ?? '' }}" 
    aria-describedby="{{ $name }}"
    placeholder     ="{{ $placeholder }}"
    type            ="{{ $type }}" 
    name            ="{{ $name }}"
    value           ="{{ old($name, $value ?? null) }}"
    {{ $readonly ?? '' }} {{ $attributes }}
  >
  <div id="{{ $name }}" class="form-text">{{ $slot }}</div>
  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
