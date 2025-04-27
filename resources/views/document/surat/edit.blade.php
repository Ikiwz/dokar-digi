@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>{{ $title }}
  </h1>

  <div class="card">
    <div class="card-header bg-warning">
      <a href="{{ route('surat.index') }}" class="btn btn-sm btn-success">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
      </a>
    </div>
    <div class="card-body">
      <form action="{{ route('surat.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-2">
          <div class="col-xl-6 mb-2">
            <label class="form-label">Jenis Surat</label>
            <input type="text" name="jenis_surat" class="form-control" value="{{ $document->jenis_surat }}">
          </div>
          <div class="col-xl-6 mb-2">
            <label class="form-label">Perihal</label>
            <input type="text" name="perihal" class="form-control" value="{{ $document->perihal }}">
          </div>
          <div class="col-xl-4 mb-2">
            <label class="form-label">No. Surat</label>
            <input type="text" name="no_surat" class="form-control" value="{{ $document->no_surat }}">
          </div>
          <div class="col-xl-4 mb-2">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal_surat" class="form-control" value="{{ $document->tanggal_surat }}">
          </div>
          <div class="col-xl-4 mb-2">
            <label class="form-label">Ditujukan</label>
            <input type="text" name="ditujukan" class="form-control" value="{{ $document->ditujukan }}">
          </div>
          <div class="col-xl-12 mb-2">
            <label class="form-label">Ganti Dokumen (opsional)</label>
            <input type="file" name="file_surat" class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-warning">
          <i class="fas fa-edit mr-2"></i>Ubah
        </button>
      </form>
    </div>
  </div>
@endsection
