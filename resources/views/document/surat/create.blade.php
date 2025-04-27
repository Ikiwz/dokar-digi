@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>{{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('surat.index') }}" class="btn btn-sm btn-success">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2">
                <div class="col-xl-6 mb-2">
                    <label>Jenis Surat <span class="text-danger">*</span></label>
                    <input type="text" name="jenis_surat" class="form-control @error('jenis_surat') is-invalid @enderror" value="{{ old('jenis_surat') }}">
                    @error('jenis_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-2">
                    <label>Perihal <span class="text-danger">*</span></label>
                    <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror" value="{{ old('perihal') }}">
                    @error('perihal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-2">
                    <label>No. Surat <span class="text-danger">*</span></label>
                    <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" value="{{ old('no_surat') }}">
                    @error('no_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-2">
                    <label>Tanggal Surat <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat') }}">
                    @error('tanggal_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-xl-12 mb-2">
                    <label>Ditujukan <span class="text-danger">*</span></label>
                    <input type="text" name="ditujukan" class="form-control @error('ditujukan') is-invalid @enderror" value="{{ old('ditujukan') }}">
                    @error('ditujukan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-xl-12 mb-2">
                    <label>Upload Dokumen <span class="text-danger">*</span></label>
                    <input type="file" name="file_surat" class="form-control @error('file_surat') is-invalid @enderror">
                    @error('file_surat')
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
