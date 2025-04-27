{{-- Modal konfirmasi hapus user --}}
<div class="modal fade" id="modalDeleteUser{{ $user->id }}" tabindex="-1"
  aria-labelledby="modalDeleteUserLabel{{ $user->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalDeleteUserLabel{{ $user->id }}">
          Hapus User
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus user
        <strong>{{ $user->nama }}</strong>?
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fas fa-times mr-1"></i>Batal
        </button>
        <form action="{{ route('userDestroy', $user->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash mr-1"></i>Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
