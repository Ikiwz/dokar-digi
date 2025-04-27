@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-primary">
            <a href="{{ route('documents') }}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('documentsStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-12 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Judul :
                        </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}">
                        @error('title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kategori :
                        </label>
                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                            <option selected disabled>-- Pilih Kategori</option>
                            <option value="Admin" {{ old('category') == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Karyawan" {{ old('category') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                        </select>
                        @error('category')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Sub Kategori :
                        </label>
                        <select name="sub_category" class="form-control @error('sub_category') is-invalid @enderror">
                            <option selected disabled>-- Pilih Sub Kategori</option>
                            <option value="Laporan" {{ old('sub_category') == 'Laporan' ? 'selected' : '' }}>Laporan</option>
                            <option value="Slip Gaji" {{ old('sub_category') == 'Slip Gaji' ? 'selected' : '' }}>Slip Gaji</option>
                            <option value="Kontrak" {{ old('sub_category') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        </select>
                        @error('sub_category')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Dokumen :
                        </label>
                        <input type="file" name="document" class="form-control @error('document') is-invalid @enderror">
                        @error('document')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
