{{-- Modal Delete Surat --}}
@foreach ($documents as $surat)
  <div class="modal fade" id="modalDeleteSurat{{ $surat->id }}" tabindex="-1"
    aria-labelledby="modalLabelDeleteSurat{{ $surat->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="modalLabelDeleteSurat{{ $surat->id }}">Hapus Data Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">Jenis Surat</div>
            <div class="col-7">: {{ $surat->jenis_surat }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">Perihal</div>
            <div class="col-7">: {{ $surat->perihal }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">No. Surat</div>
            <div class="col-7">: {{ $surat->no_surat }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">Tanggal Surat</div>
            <div class="col-7">: {{ $surat->tanggal_surat }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">Ditujukan</div>
            <div class="col-7">: {{ $surat->ditujukan }}</div>
          </div>
          <div class="row mb-2">
            <div class="col-5 font-weight-bold">File</div>
            <div class="col-7">:
              <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank" class="badge badge-info">
                Lihat File
              </a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i> Tutup
          </button>
          <form action="{{ route('surat.destroy', $surat->id) }}" method="POST">
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
