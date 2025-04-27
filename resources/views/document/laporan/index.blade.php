@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-file-alt mr-2"></i>
    {{ $title }}
  </h1>

  <div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
      <div class="mb-1 mr-2">
        <a href="{{ route('laporan.create') }}" class="btn btn-sm btn-primary">
          <i class="fas fa-plus mr-2"></i> Tambah Laporan
        </a>
      </div>

      {{-- Excel dan PDF tampil untuk Admin & Pustakawan --}}
      <div>
        <a href="{{ route('laporan.excel') }}" class="btn btn-sm btn-success">
          <i class="fas fa-file-excel mr-2"></i> Excel
        </a>
        <a href="{{ route('laporan.pdf') }}" class="btn btn-sm btn-danger" target="_blank">
          <i class="fas fa-file-pdf mr-2"></i> PDF
        </a>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white text-center">
            <tr>
              <th>No</th>
              <th>Nama Laporan</th>
              <th>Jenis Laporan</th>
              <th>Tahun</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($documents as $i => $laporan)
              <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td>{{ $laporan->nama_laporan }}</td>
                <td>{{ $laporan->jenis_laporan }}</td>
                <td class="text-center">{{ $laporan->tahun_laporan }}</td>
                <td class="text-center">
                  <a href="{{ asset('storage/' . $laporan->file_laporan) }}" target="_blank" class="btn btn-sm btn-info"
                    title="Lihat">
                    <i class="fas fa-eye"></i>
                  </a>

                  @if (auth()->user()->jabatan == 'Admin')
                    <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-sm btn-warning" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ asset('storage/' . $laporan->file_laporan) }}" download class="btn btn-sm btn-secondary"
                      title="Unduh">
                      <i class="fas fa-download"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                      data-target="#modalDeleteLaporan{{ $laporan->id }}" title="Hapus">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Modal Hapus (hanya Admin) --}}
  @if (auth()->user()->jabatan == 'Admin')
    @include('document.laporan.modal')
  @endif
@endsection
