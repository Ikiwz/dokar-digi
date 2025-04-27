{{-- Modal Delete Dokumen --}}
@foreach ($documents as $doc)
<div class="modal fade" id="modalDeleteDokumen{{ $doc->id }}" tabindex="-1"
  aria-labelledby="modalLabelDeleteDokumen{{ $doc->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalLabelDeleteDokumen{{ $doc->id }}">Hapus Data Dokumen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col-5 font-weight-bold">Nama Dokumen</div>
          <div class="col-7">: {{ $doc->nama_dokumen }}</div>
        </div>
        <div class="row mb-2">
          <div class="col-5 font-weight-bold">Jenis Dokumen</div>
          <div class="col-7">:
            <span class="badge badge-info">{{ $doc->jenis_dokumen }}</span>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-5 font-weight-bold">Tahun</div>
          <div class="col-7">: {{ $doc->tahun }}</div>
        </div>
        <div class="row mb-2">
          <div class="col-5 font-weight-bold">Revisi</div>
          <div class="col-7">:
            @if ($doc->revisi)
              <span class="badge badge-warning">{{ $doc->revisi }}</span>
            @else
              <span class="badge badge-secondary">-</span>
            @endif
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-5 font-weight-bold">Masa Berlaku</div>
          <div class="col-7">:
            @if ($doc->masa_berlaku)
              <span class="badge badge-success">{{ $doc->masa_berlaku }}</span>
            @else
              <span class="badge badge-secondary">-</span>
            @endif
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
          <i class="fas fa-times"></i> Tutup
        </button>
        <form action="{{ route('dokumen.destroy', $doc->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash"></i> Hapus
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
