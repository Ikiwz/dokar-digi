{{-- Modal Delete Laporan --}}
@foreach ($documents as $laporan)
  <div class="modal fade" id="modalDeleteLaporan{{ $laporan->id }}" tabindex="-1"
    aria-labelledby="modalLabelDeleteLaporan{{ $laporan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="modalLabelDeleteLaporan{{ $laporan->id }}">Hapus Data Laporan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">Nama Laporan</div>
            <div class="col-7">: {{ $laporan->nama_laporan }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">Tahun</div>
            <div class="col-7">: {{ $laporan->tahun_laporan }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">File</div>
            <div class="col-7">:
              <a href="{{ asset('storage/' . $laporan->file_laporan) }}" target="_blank" class="badge badge-info">
                Lihat File
              </a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
          </button>
          <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i> Hapus
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
