@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>{{ $title }}
  </h1>

  <div class="card">
    <div class="card-header bg-primary">
      <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-success">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
      </a>
    </div>
    <div class="card-body">
      <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-2">
          <!-- Nama Laporan -->
          <div class="col-xl-12 mb-2">
            <label>Nama Laporan <span class="text-danger">*</span></label>
            <input type="text" name="nama_laporan" class="form-control @error('nama_laporan') is-invalid @enderror"
              value="{{ old('nama_laporan') }}">
            @error('nama_laporan')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <!-- Jenis Laporan (Kategori) -->
          <div class="col-xl-6 mb-2">
            <label>Jenis Laporan <span class="text-danger">*</span></label>
            <select name="jenis_laporan" class="form-control @error('jenis_laporan') is-invalid @enderror">
              <option disabled selected>-- Pilih Jenis Laporan --</option>
              @foreach ($jenis_kategoris as $kategori)
                <option value="{{ $kategori->nama_kategori }}"
                  {{ old('jenis_laporan') == $kategori->nama_kategori ? 'selected' : '' }}>
                  {{ $kategori->nama_kategori }}
                </option>
              @endforeach
            </select>
            @error('jenis_laporan')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <!-- Tahun -->
          <div class="col-xl-3 mb-2">
            <label>Tahun <span class="text-danger">*</span></label>
            <input type="number" name="tahun_laporan" class="form-control @error('tahun_laporan') is-invalid @enderror"
              value="{{ old('tahun_laporan') }}">
            @error('tahun_laporan')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <!-- Upload File Laporan -->
          <div class="col-xl-3 mb-2">
            <label>Upload Dokumen <span class="text-danger">*</span></label>
            <input type="file" name="file_laporan" class="form-control @error('file_laporan') is-invalid @enderror">
            @error('file_laporan')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save mr-2"></i> Simpan
        </button>
      </form>
    </div>
  </div>
@endsection
