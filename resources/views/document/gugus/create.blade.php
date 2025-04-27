@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>{{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('dokumen.index') }}" class="btn btn-sm btn-success">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2">
                <div class="col-xl-12 mb-2">
                    <label>Nama Dokumen <span class="text-danger">*</span></label>
                    <input type="text" name="nama_dokumen" class="form-control @error('nama_dokumen') is-invalid @enderror" value="{{ old('nama_dokumen') }}">
                    @error('nama_dokumen')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-xl-6 mb-2">
                    <label>Jenis Dokumen <span class="text-danger">*</span></label>
                    <select name="jenis_dokumen" class="form-control @error('jenis_dokumen') is-invalid @enderror">
                        <option disabled selected>-- Pilih Jenis --</option>
                        @foreach ($jenis_kategoris as $kategori)
                            <option value="{{ $kategori->nama_kategori }}" {{ old('jenis_dokumen') == $kategori->nama_kategori ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>

                    @error('jenis_dokumen')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-xl-3 mb-2">
                    <label>Tahun <span class="text-danger">*</span></label>
                    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
                    @error('tahun')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-xl-3 mb-2">
                    <label>Revisi</label>
                    <input type="text" name="revisi" class="form-control" value="{{ old('revisi') }}">
                </div>

                <div class="col-xl-6 mb-2">
                    <label>Masa Berlaku</label>
                    <input type="date" name="masa_berlaku" class="form-control">
                </div>

                <div class="col-xl-6 mb-2">
                    <label>Upload Dokumen <span class="text-danger">*</span></label>
                    <input type="file" name="file_upload" class="form-control @error('file_upload') is-invalid @enderror">
                    @error('file_upload')
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
