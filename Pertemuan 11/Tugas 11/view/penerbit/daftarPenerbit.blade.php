
    @php
        $ar_judul = ['No', 'Nama', 'Alamat', 'Email', 'Website', 'Telepon', 'CP'];
        $no = 1;
    @endphp
    <h3 align="center">Daftar Penerbit</h3>

    <table border="1" align="center" cellpadding="5">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_penerbit as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->website }}</td>
                    <td>{{ $p->telepon }}</td>
                    <td>{{ $p->cp }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

