@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-file-alt mr-2"></i> {{ $title }}
  </h1>

  <div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
      <div class="mb-1 mr-2">
        <a href="{{ route('surat.create') }}" class="btn btn-sm btn-primary">
          <i class="fas fa-plus mr-2"></i> Tambah Surat
        </a>
      </div>

      <div>
        <a href="{{ route('surat.excel') }}" class="btn btn-sm btn-success">
          <i class="fas fa-file-excel mr-2"></i> Excel
        </a>
        <a href="{{ route('surat.pdf') }}" class="btn btn-sm btn-danger" target="_blank">
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
              <th>Jenis Surat</th>
              <th>Perihal</th>
              <th>No Surat</th>
              <th>Tanggal Surat</th>
              <th>Ditujukan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($documents as $i => $surat)
              <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td>{{ $surat->jenis_surat }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>{{ $surat->no_surat }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d-m-Y') }}</td>
                <td>{{ $surat->ditujukan }}</td>
                <td class="text-center">
                  <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank" class="btn btn-sm btn-info"
                    title="Lihat">
                    <i class="fas fa-eye"></i>
                  </a>

                  @if (auth()->user()->jabatan === 'Admin')
                    <a href="{{ asset('storage/' . $surat->file_surat) }}" download class="btn btn-sm btn-secondary"
                      title="Unduh">
                      <i class="fas fa-download"></i>
                    </a>

                    <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-sm btn-warning" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>

                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                      data-target="#modalDeleteSurat{{ $surat->id }}" title="Hapus">
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

  {{-- Modal Hapus hanya untuk Admin --}}
  @if (auth()->user()->jabatan === 'Admin')
    @include('document.surat.modal')
  @endif
@endsection
