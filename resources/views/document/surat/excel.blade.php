<table>
    <thead>
      <tr>
        <th colspan="6" align="center">Data Surat</th>
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
