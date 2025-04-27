@extends('layouts.app')

@section('content')
  <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama_kategori">Nama Kategori</label>
          <input type="text" name="nama_kategori" id="nama_kategori"
            class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori') }}" required>
          @error('nama_kategori')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <input type="hidden" name="jenis_dokumen" value="mutu">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save mr-2"></i> Simpan
        </button>
      </form>
    </div>
  </div>

  <hr>

  <div class="card mt-3">
    <div class="card-body">
      <h5>Daftar Kategori</h5>
      <ul class="list-group list-group-flush">
        @forelse($kategoris as $kategori)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $kategori->nama_kategori }}
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
              data-target="#modalDeleteKategori{{ $kategori->id }}">
              <i class="fas fa-trash"></i>
            </button>
          </li>
        @empty
          <li class="list-group-item text-muted">Belum ada kategori</li>
        @endforelse
      </ul>
    </div>
  </div>

  {{-- Modal konfirmasi hapus --}}
  @foreach ($kategoris as $kategori)
    @include('kategori.modal', ['kategori' => $kategori])
  @endforeach
@endsection
