<table>
  <thead>
    <tr>
      <th colspan="6" align="center">Data User</th>
    </tr>
    <tr>
      <th colspan="6" align="center">
        Tanggal : {{ $tanggal }}
      </th>
    </tr>
    <tr>
      <th colspan="6" align="center">
        Pukul : {{ $jam }}
      </th>
    </tr>
    <tr>
      <th width="20" align="center">No</th>
      <th width="20" align="center">Nama Dokumen</th>
      <th width="20" align="center">Jenis</th>
      <th width="20" align="center">Tahun</th>
      <th width="20" align="center">Revisi</th>
      <th width="20" align="center">Masa Berlaku</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($documents as $i => $doc)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $doc->nama_dokumen }}</td>
        <td>{{ $doc->jenis_dokumen }}</td>
        <td>{{ $doc->tahun }}</td>
        <td>{{ $doc->revisi ?? '-' }}</td>
        <td>{{ $doc->masa_berlaku ?? '-' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
