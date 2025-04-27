<table>
  <thead>
    <tr>
      <th colspan="4" align="center">Data Laporan</th>
    </tr>
    <tr>
      <th colspan="4" align="center">
        Tanggal : {{ $tanggal }}
      </th>
    </tr>
    <tr>
      <th colspan="4" align="center">
        Pukul : {{ $jam }}
      </th>
    </tr>
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
