@extends('adminlte::page')
@section('title', 'Data Penerbit')
@section('content_header')
    <h1>Data Penerbit</h1>
@stop
@section('content')
    @php
        $ar_judul = ['No', 'Nama', 'Alamat', 'Email', 'Website', 'Telepon', 'CP', 'Action'];
        $no = 1;
    @endphp
    <a class="btn btn-primary btn-md" href="{{ route('penerbit.create') }}" role="button">Tambah</a>
    <a class="btn btn-secondary btn-md" href="{{ route('home') }}" role="button">Back</a>
    <a href="{{ url('penerbitpdf') }}" class="btn btn-info"><i class="fas fa-file-pdf"></i> </a>
    <a href="{{ url('penerbitcsv') }}" class="btn btn-warning"><i class="fas fa-file-csv"></i> </a>
    <form class="mt-3" action="{{ route('penerbit.index') }}">
        <div class="input-group">
            <input name="keyword" type="text" value="{{ Request::get('keyword') }}" class="form-control" />
            <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
    </form>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_penerbit as $pen)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pen->nama }}</td>
                    <td>{{ $pen->alamat }}</td>
                    <td>{{ $pen->email }}</td>
                    <td>{{ $pen->website }}</td>
                    <td>{{ $pen->telepon }}</td>
                    <td>{{ $pen->cp }}</td>
                    <td>
                        <form action="{{ route('penerbit.destroy', $pen->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('penerbit.show', $pen->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('penerbit.edit', $pen->id) }}" class="btn btn-success">Edit</a>
                            <button class="btn btn-danger"
                                onclick="return confirm('Anda Yakin Data di Hapus?')">Hapus</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mx-auto pb-10"></div>
    {{ $ar_penerbit->links() }}
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin.custom.css  ">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
