@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>{{ $title }}
  </h1>

  <div class="card">
    <div class="card-header bg-warning">
      <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-success">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
      </a>
    </div>
    <div class="card-body">
      <form action="{{ route('laporan.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-2">
          <div class="col-xl-6 mb-2">
            <label class="form-label">Nama Laporan</label>
            <select name="nama_laporan" class="form-control">
              @foreach(['Laporan Kegiatan','Laporan per Tiga Bulan','Laporan per Semester','Laporan Tahunan'] as $laporan)
                <option value="{{ $laporan }}" {{ $document->nama_laporan == $laporan ? 'selected' : '' }}>{{ $laporan }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-xl-3 mb-2">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun_laporan" class="form-control" value="{{ $document->tahun_laporan }}">
          </div>
          <div class="col-xl-3 mb-2">
            <label>Ganti Dokumen (opsional)</label>
            <input type="file" name="file_laporan" class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-warning">
          <i class="fas fa-edit mr-2"></i>Ubah
        </button>
      </form>
    </div>
  </div>
@endsection
