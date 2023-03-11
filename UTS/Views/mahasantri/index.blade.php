@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
    <h1>Data Mahasantri</h1>
@stop
@section('content') 
    @php
        $ar_judul = ['No', 'NIM', 'Nama', 'Jurusan', 'Alamat', 'Kota', 'Provinsi', 'Email'];
        $no = 1;
    @endphp 
    <a class="btn btn-primary btn-md"
    href="{{ route('mahasantri.create') }}" role="button">Tambah Mahasantri</a>
    <a class="btn btn-secondary btn-md"
    href="{{ route('home') }}" role="button">Back</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($ar_mahasantri as $mah)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $mah->nim }}</td>
                    <td>{{ $mah->nama }}</td>
                    <td>{{ $mah->jurusan }}</td>
                    <td>{{ $mah->alamat }}</td>
                    <td>{{ $mah->kota }}</td>
                    <td>{{ $mah->provinsi }}</td>
                    <td>{{ $mah->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
