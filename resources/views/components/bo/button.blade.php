@props([
  'type' => 'submit', 
  'color' => 'primary', 
  'icon' => 'user', 
  'title' => '', 
  'as' => 'button', 
  'url' => ''
])

@if ($as == 'button')
  <button {{ $attributes }} type="{{ $type }}" class="btn btn-{{ $color }}">
    <i class="fa fa-{{ $icon }} me-2"></i> {{ $title }}
  </button>
@endif

@if ($as == 'link')
<a {{ $attributes }} href="{{ $url }}" class="btn btn-{{ $color }}">
  <i class="fa fa-{{ $icon }} me-2"></i> {{ $title }}
</a>
@endif
