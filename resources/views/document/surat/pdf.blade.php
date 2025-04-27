<h1 align="center">Data Surat</h1>
<h3 align="center">Tanggal : {{ $tanggal }}</h3>
<h3 align="center">Pukul : {{ $jam }}</h3>
<hr>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th width="20" align="center">No</th>
      <th width="20" align="center">Jenis Surat</th>
      <th width="20" align="center">Perihal</th>
      <th width="20" align="center">No. Surat</th>
      <th width="20" align="center">Tanggal</th>
      <th width="20" align="center">Ditujukan</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($documents as $i => $surat)
      <tr>
        <td align="center">{{ $i + 1 }}</td>
        <td>{{ $surat->jenis_surat }}</td>
        <td>{{ $surat->perihal }}</td>
        <td>{{ $surat->no_surat }}</td>
        <td>{{ $surat->tanggal_surat }}</td>
        <td>{{ $surat->ditujukan }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
