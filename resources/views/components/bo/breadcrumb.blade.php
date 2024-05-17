@props(['links' => [], 'is_multiple' => true, 'menus' => []])

<div class="mb-3">
  <h6>
    <i class="fa fa-link me-2"></i>
    @foreach ( $links as $index => $link)
      <a href="{{ $link['url'] }}"
        @if ($index == 0)
          @if ($is_multiple)
            data-bs-toggle="modal" data-bs-target="#menu"
          @endif
        @endif
      >
        <span class="
          @if(count($links) == $index + 1)
            text-primary
          @endif
          @if (count($links) != $index +1)
            text-muted
          @endif
        ">
          {{ $link['label'] }}
          @if (count($links) != $index +1)
            > 
          @endif
        </span>
      </a>
    @endforeach
  </h6>
</div>

<div class="modal fade" id="menu" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="w-100 text-center">
          <h5 class="modal-title" id="menuTitle"><i class="fas fa-box"></i> Pintasan</h5>
        </div>
      </div>
      <div class="modal-body">

        @foreach ($menus as $menu)
          <a href="{{ $menu['url'] }}">
            <div class="border p-2 my-2" style="border-radius: 12px;">
              <h6>
              <i class="fa fa-link me-2"></i>
                <span class="text-muted">
                  {{ $menu['label'] }}
                </span>
              </h6>
            </div>
          </a>
        @endforeach
          
          
      </div>
      <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times  me-2"></i>Batal</button> --}}
          {{-- <button class="btn btn-danger"> <i class="fas fa-trash me-2"></i> Hapus</button> --}}
      </div>
    </div>
  </div>
</div>
