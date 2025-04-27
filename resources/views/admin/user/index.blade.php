@extends('layouts.app')

@section('content')
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $title }}
  </h1>

  <div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
      <div class="mb-1 mr-2">
        <a href="{{ route('userCreate') }}" class="btn btn-sm btn-primary">
          <i class="fas fa-plus mr-2"></i>
          Tambah User
        </a>
      </div>

      <div>
        <a href="{{ route('userExcel') }}" class="btn btn-sm btn-success">
          <i class="fas fa-file-excel mr-2"></i>
          Excel
        </a>
        <a href="{{ route('userPdf') }}" class="btn btn-sm btn-danger" target="_blank">
          <i class="fas fa-file-pdf mr-2"></i>
          PDF
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-primary text-white text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Jabatan</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $item)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td class="text-center">
                  <span class="badge badge-info">
                    {{ $item->email }}
                  </span>
                </td>
                <td class="text-center">
                  @if ($item->jabatan === 'Admin')
                    <span class="badge badge-dark">{{ $item->jabatan }}</span>
                  @elseif ($item->jabatan === 'Kepala Perpustakaan')
                    <span class="badge badge-primary">{{ $item->jabatan }}</span>
                  @elseif ($item->jabatan === 'Gugus Mutu')
                    <span class="badge badge-success">{{ $item->jabatan }}</span>
                  @elseif ($item->jabatan === 'Pustakawan')
                    <span class="badge badge-warning">{{ $item->jabatan }}</span>
                  @else
                    <span class="badge badge-info">{{ $item->jabatan }}</span>
                  @endif
                </td>
                <td class="text-center">
                  <a href="{{ route('userEdit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <button class="btn btn-sm btn-danger" data-toggle="modal"
                    data-target="#modalDeleteUser{{ $item->id }}" title="Hapus">
                    <i class="fas fa-trash"></i>
                  </button>

                  {{-- Modal Delete --}}
                  @include('admin/user/modal', ['user' => $item])
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
