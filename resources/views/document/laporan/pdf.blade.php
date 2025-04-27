<h1 align="center">Data Laporan</h1>
<h3 align="center">Tanggal : {{ $tanggal }}</h3>
<h3 align="center">Pukul : {{ $jam }}</h3>
<hr>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th width="20" align="center">No</th>
      <th width="20" align="center">Nama Laporan</th>
      <th width="20" align="center">Jenis Laporan</th>
      <th width="20" align="center">Tahun</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($documents as $i => $laporan)
      <tr>
        <td align="center">{{ $i + 1 }}</td>
        <td>{{ $laporan->nama_laporan }}</td>
        <td>{{ $laporan->jenis_laporan }}</td>
        <td>{{ $laporan->tahun_laporan }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
