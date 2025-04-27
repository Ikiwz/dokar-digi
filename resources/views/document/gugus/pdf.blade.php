<h1 align="center">Data Gugus Mutu</h1>
<h3 align="center">Tanggal : {{ $tanggal }}</h3>
<h3 align="center">Pukul : {{ $jam }}</h3>
<hr>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
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
        <td align="center">{{ $i + 1 }}</td>
        <td>{{ $doc->nama_dokumen }}</td>
        <td>{{ $doc->jenis_dokumen }}</td>
        <td>{{ $doc->tahun }}</td>
        <td>{{ $doc->revisi ?? '-' }}</td>
        <td>{{ $doc->masa_berlaku ?? '-' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
