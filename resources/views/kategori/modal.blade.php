{{-- Modal konfirmasi hapus kategori --}}
<div class="modal fade" id="modalDeleteKategori{{ $kategori->id }}" tabindex="-1"
  aria-labelledby="modalLabelDeleteKategori{{ $kategori->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalLabelDeleteKategori{{ $kategori->id }}">
          Hapus Kategori
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus kategori
        <strong>{{ $kategori->nama_kategori }}</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fas fa-times mr-1"></i> Batal
        </button>
        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash mr-1"></i> Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
