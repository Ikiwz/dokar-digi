<h1 align="center">Data User</h1>
<h3 align="center">Tanggal : {{ $tanggal }}</h3>
<h3 align="center">Pukul : {{ $jam }}</h3>
<hr>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th width="20" align="center">No</th>
      <th width="20" align="center">Nama</th>
      <th width="20" align="center">Email</th>
      <th width="20" align="center">Jabatan</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($user as $item)
      <tr>
        <td align="center">{{ $loop->iteration }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->email }}</td>
        <td align="center">{{ $item->jabatan }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
