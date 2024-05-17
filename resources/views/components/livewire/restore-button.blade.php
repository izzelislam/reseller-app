@php
  $path = explode("/",parse_url($restore)["path"]);
  $id   = end($path);
@endphp

<button type="button" class="btn btn-info btn-circle btn-sm"  data-bs-toggle="modal" data-bs-target="#confirmRestore{{ $id }}Center">
  <i class="fas fa-recycle me-1"></i>
</button>

<div class="modal fade" id="confirmRestore{{ $id }}Center" tabindex="-1" aria-labelledby="confirmRestore{{ $id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="w-100 text-center">
          <h5 class="modal-title" id="confirmRestore{{ $id }}CenterTitle"><i class="fas fa-exclamation-triangle"></i> Konfirmasi restore data</h5>
        </div>
      </div>
      <div class="modal-body">

        <form  class="d-inline" action="{{ $restore }}" method="POST">
          @csrf @method('PUT')
          <div class="text-center">
            <img width="80%" src="/assets/ilustration/restore-data.png" alt="">
          </div>
          <div class="text-center">
            Apakah anda yakin ingin mengembalikan data ini?
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times  me-2"></i>Batal</button>
          <button class="btn btn-success"> <i class="fas fa-recycle me-2"></i> Restore</button>
        </form>
      </div>
    </div>
  </div>
</div>
