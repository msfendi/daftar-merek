<table>
    <thead>
        <tr>
            <th>Nama Usaha</th>
            <th>Alamat Usaha</th>
            <th>Pemilik Usaha</th>
            <th>Logo Usaha</th>
            <th>UMK</th>
            <th>Status Usaha</th>
            <th>Keterangan</th>
            <th>TTD</th>
            <th>Created At</th>
            <th>Update At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permohonans as $permohonan)
        <tr>
            <td>{{ $permohonan->nama_usaha }}</td>
            <td>{{ $permohonan->alamat_usaha }}</td>
            <td>{{ $permohonan->pemilik_usaha }}</td>
            <td>{{ $permohonan->logo }}</td>
            <td>{{ $permohonan->umk }}</td>
            <td>{{ $permohonan->status }}</td>
            <td>{{ $permohonan->keterangan }}</td>
            <td>{{ $permohonan->ttd }}</td>
            <td>{{ $permohonan->created_at }}</td>
            <td>{{ $permohonan->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>