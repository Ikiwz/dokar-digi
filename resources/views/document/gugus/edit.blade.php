@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>{{ $title }}
  </h1>

  <div class="card">
    <div class="card-header bg-warning">
      <a href="{{ route('dokumen.index') }}" class="btn btn-sm btn-success">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
      </a>
    </div>
    <div class="card-body">
      <form action="{{ route('dokumen.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-2">
          <div class="col-xl-6 mb-2">
            <label class="form-label">Nama Dokumen <span class="text-danger">*</span></label>
            <input type="text" name="nama_dokumen" class="form-control" value="{{ $document->nama_dokumen }}">
          </div>
          <div class="col-xl-6 mb-2">
            <label class="form-label">Jenis Dokumen <span class="text-danger">*</span></label>
            <select name="jenis_dokumen" class="form-control">
              <option selected disabled>-- Pilih Jenis --</option>
              @foreach(['Pedoman','SOP','Alur Kerja','Instruksi Kerja','Manual Mutu','Dokumen Hasil','Rekaman Mutu'] as $jenis)
                <option value="{{ $jenis }}" {{ $document->jenis_dokumen == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-xl-4 mb-2">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ $document->tahun }}">
          </div>
          <div class="col-xl-4 mb-2">
            <label class="form-label">Revisi</label>
            <input type="text" name="revisi" class="form-control" value="{{ $document->revisi }}">
          </div>
          <div class="col-xl-4 mb-2">
            <label class="form-label">Masa Berlaku</label>
            <input type="date" name="masa_berlaku" class="form-control" value="{{ $document->masa_berlaku }}">
          </div>
        </div>
        <div class="mb-3">
          <label>Ganti Dokumen (jika perlu)</label>
          <input type="file" name="file_upload" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">
          <i class="fas fa-edit mr-2"></i>Ubah
        </button>
      </form>
    </div>
  </div>
@endsection
