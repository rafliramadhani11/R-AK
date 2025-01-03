<table>
    <thead>
        <tr>
            <th>ID PHL</th>
            <th>NAMA KARYAWAN</th>
            <th>JABATAN</th>
            <th>NO. KONTRAK</th>
            <th>STATUS KONTRAK</th>
            <th>LOKASI KERJA</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id_phl }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->position->name }}</td>
                <td>{{ $user->contract->no_contract }}</td>
                <td>{{ $user->contract->status }}</td>
                <td>{{ $user->job_place }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
