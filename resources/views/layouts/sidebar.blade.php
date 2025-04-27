<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
    <div class="sidebar-brand-icon">
      <img src="{{ asset('admin/img/logo.png') }}" alt="Logo" class="img-fluid normal-logo" style="max-width: 35px;">
      <i class="fas fa-laugh-wink toggled-logo d-none"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Dokar Digi</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ $menuDashboard ?? '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  {{-- Cek jabatan --}}
  @php
    $jabatan = auth()->user()->jabatan;
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
  @endphp

  @if ($jabatan == 'Admin')
    <!-- Menu Admin -->
    <div class="sidebar-heading">Menu Admin</div>

    <!-- Data User -->
    <li class="nav-item {{ $menuAdminUser ?? '' }}">
      <a class="nav-link" href="{{ route('user') }}">
        <i class="fas fa-user"></i>
        <span>Data User</span>
      </a>
    </li>

    {{-- Collapse Dokumen --}}
    @php
      $isDokumen = $segment1 === 'documents' && in_array($segment2, ['dokumen-mutu', 'laporan', 'surat']);
    @endphp
    <li class="nav-item {{ $isDokumen ? 'active' : '' }}">
      <a class="nav-link {{ $isDokumen ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
        data-target="#collapseDokumen" aria-expanded="{{ $isDokumen ? 'true' : 'false' }}"
        aria-controls="collapseDokumen">
        <i class="fas fa-file-alt"></i>
        <span>Dokumen</span>
      </a>
      <div id="collapseDokumen" class="collapse {{ $isDokumen ? 'show' : '' }}" aria-labelledby="headingDokumen"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Jenis Dokumen:</h6>
          <a class="collapse-item {{ $segment2 == 'dokumen-mutu' ? 'active' : '' }}"
            href="{{ route('dokumen.index') }}">Gugus Mutu</a>
          <a class="collapse-item {{ $segment2 == 'laporan' ? 'active' : '' }}"
            href="{{ route('laporan.index') }}">Laporan-Laporan</a>
          <a class="collapse-item {{ $segment2 == 'surat' ? 'active' : '' }}"
            href="{{ route('surat.index') }}">Surat-Menyurat</a>
        </div>
      </div>
    </li>

    {{-- Collapse Kategori --}}
    @php
      $isKategori = $segment1 === 'kategori' && in_array($segment2, ['mutu', 'laporan']);
    @endphp
    <li class="nav-item {{ $isKategori ? 'active' : '' }}">
      <a class="nav-link {{ $isKategori ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
        data-target="#collapseKategori" aria-expanded="{{ $isKategori ? 'true' : 'false' }}"
        aria-controls="collapseKategori">
        <i class="fas fa-tags"></i>
        <span>Kategori</span>
      </a>
      <div id="collapseKategori" class="collapse {{ $isKategori ? 'show' : '' }}" aria-labelledby="headingKategori"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Jenis Kategori:</h6>
          <a class="collapse-item {{ $segment2 == 'mutu' ? 'active' : '' }}" href="{{ route('kategori.mutu') }}">Jenis
            Mutu</a>
          <a class="collapse-item {{ $segment2 == 'laporan' ? 'active' : '' }}"
            href="{{ route('kategori.laporan') }}">Jenis Laporan</a>
        </div>
      </div>
    </li>
  @elseif ($jabatan == 'Pustakawan')
    <!-- Menu Pustakawan -->
    <div class="sidebar-heading">Menu Pustakawan</div>

    {{-- Collapse Dokumen untuk Pustakawan --}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDokumenPustakawan"
        aria-expanded="false" aria-controls="collapseDokumenPustakawan">
        <i class="fas fa-file-alt"></i>
        <span>Dokumen</span>
      </a>
      <div id="collapseDokumenPustakawan" class="collapse" aria-labelledby="headingDokumenPustakawan"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Jenis Dokumen:</h6>
          <a class="collapse-item" href="{{ route('laporan.index') }}">Laporan-Laporan</a>
          <a class="collapse-item" href="{{ route('surat.index') }}">Surat-Menyurat</a>
        </div>
      </div>
    </li>
  @elseif ($jabatan == 'Kepala Perpustakaan')
    <!-- Menu Kepala Perpustakaan -->
    <div class="sidebar-heading">Menu Kepala Perpustakaan</div>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('laporan.index') }}">
        <i class="fas fa-file-alt"></i>
        <span>Dokumen Laporan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('dokumen.index') }}">
        <i class="fas fa-file"></i>
        <span>Dokumen Mutu</span>
      </a>
    </li>
  @elseif ($jabatan == 'Gugus Mutu')
    <!-- Menu Gugus Mutu -->
    <div class="sidebar-heading">Menu Gugus Mutu</div>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('dokumen.index') }}">
        <i class="fas fa-file-alt"></i>
        <span>Dokumen Mutu</span>
      </a>
    </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
