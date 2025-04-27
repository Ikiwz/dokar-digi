@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
  <i class="fas fa-edit mr-2"></i>{{ $title }}
</h1>

<div class="card">
  <div class="card-header bg-warning">
    <a href="{{ route('user') }}" class="btn btn-sm btn-success">
      <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
  </div>
  <div class="card-body">
    <form action="{{ route('userUpdate', $user->id) }}" method="POST">
      @csrf
      <div class="row mb-2">
        <div class="col-md-6 mb-2">
          <label><span class="text-danger">*</span>Nama</label>
          <input type="text" name="nama" value="{{ old('nama',$user->nama) }}"
            class="form-control @error('nama') is-invalid @enderror">
          @error('nama') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">
          <label><span class="text-danger">*</span>Email</label>
          <input type="email" name="email" value="{{ old('email',$user->email) }}"
            class="form-control @error('email') is-invalid @enderror">
          @error('email') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-12">
          <label><span class="text-danger">*</span>Jabatan</label>
          <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
            <option disabled>-- Pilih Jabatan --</option>
            @foreach(['Admin','Kepala Perpustakaan','Gugus Mutu','Pustakawan'] as $role)
              <option value="{{ $role }}" {{ (old('jabatan',$user->jabatan)==$role)?'selected':'' }}>
                {{ $role }}
              </option>
            @endforeach
          </select>
          @error('jabatan') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6 mb-2">
          <label>Password <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
          <input type="password" name="password"
            class="form-control @error('password') is-invalid @enderror">
          @error('password') <small class="text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="col-md-6">
          <label>Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control">
        </div>
      </div>

      <button type="submit" class="btn btn-warning">
        <i class="fas fa-edit mr-2"></i>Ubah
      </button>
    </form>
  </div>
</div>
@endsection
