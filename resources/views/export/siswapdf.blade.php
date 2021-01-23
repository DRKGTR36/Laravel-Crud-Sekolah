<table class="table" style="border:3px solid black">
    <thead>
        <tr>
            <th>ABSEN</th>
            <th>NAMA LENGKAP</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>RATA-RATA NILAI</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $s)
        <tr>
            <td>{{$s->absen}}</td>
            <td>{{$s->nama_lengkap()}}</td>
            <td>{{$s->jenis_kelamin}}</td>
            <td>{{$s->agama}}</td>
            <td>{{$s->rataRataNilai()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>