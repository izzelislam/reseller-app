@props([
	'label',
	'name',
	'value',
	'options',
	'default',
	'disabled',
	'readonly', 
]) {{-- options format: [id => 'name'] (created using pluck) --}}


<div class="mb-3">
  <label for="select{{ $name }}">{{ $label }}</label>
  <select
			style="border: 1px solid rgb(227, 227, 228);"
			class=" form-select	@error($name)	is-invalid @enderror"
			id	 ="select{{ $name }}"
			name ={{ $name }}
			{{ $attributes }}
			{{ $readonly ?? '' }}
			{{ $disabled ?? '' }}
		>
		@isset($default)
    	    <option value="{{ $default['value'] }}" class="d-none" selected>{{ $default['label'] }}</option>
		@endisset
		@foreach ($options as $optionId => $optionName)
			<option
				value="{{ $optionId }}"
				@if((string)$optionId === (string)old($name, $value ?? null))
					selected
				@endif
			>
        {{ $optionName }}
			</option>
		@endforeach
  </select>

  <small class="form-text text-muted">Pilih salah satu.</small>
	@error($name)
		<span class="invalid-feedback">
			{{ $message }}
		</span>
	@enderror
</div>
