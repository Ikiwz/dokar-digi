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
        <a href="{{ route('dokumen.create') }}" class="btn btn-sm btn-primary">
          <i class="fas fa-plus mr-2"></i> Tambah Dokumen Mutu
        </a>
      </div>

      <div>
        <a href="{{ route('dokumen.excel') }}" class="btn btn-sm btn-success">
          <i class="fas fa-file-excel mr-2"></i> Excel
        </a>
        <a href="{{ route('dokumen.pdf') }}" class="btn btn-sm btn-danger" target="_blank">
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
              <th>Nama Dokumen</th>
              <th>Jenis</th>
              <th>Tahun</th>
              <th>Revisi</th>
              <th>Masa Berlaku</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($documents as $i => $doc)
              <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td>{{ $doc->nama_dokumen }}</td>
                <td>{{ $doc->jenis_dokumen }}</td>
                <td>{{ $doc->tahun }}</td>
                <td>{{ $doc->revisi ?? '-' }}</td>
                <td>{{ $doc->masa_berlaku ?? '-' }}</td>
                <td class="text-center">
                  <a href="{{ route('dokumen.edit', $doc->id) }}" class="btn btn-sm btn-warning" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="{{ asset('storage/' . $doc->file_upload) }}" target="_blank" class="btn btn-sm btn-info"
                    title="Lihat">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ asset('storage/' . $doc->file_upload) }}" download class="btn btn-sm btn-secondary"
                    title="Unduh">
                    <i class="fas fa-download"></i>
                  </a>

                  <!-- Tombol untuk membuka Modal Delete -->
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                    data-target="#modalDeleteDokumen{{ $doc->id }}" title="Hapus">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('document.gugus.modal')
@endsection
