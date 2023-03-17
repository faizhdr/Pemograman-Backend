@extends('adminlte::page')
@section('title', 'Form Penerbit')
@section('content_header')
    <h1>Data Penerbit</h1>
@stop
@section('content')
    {{-- Panggil master data pengarang, penerbit dan kategori untuk
ditampilkan di element form --}}
    @php
        $rs1 = App\Models\Pengarang::all();
        $rs2 = App\Models\Penerbit::all();
        $rs3 = App\Models\Kategori::all();
    @endphp
    <form method="POST" action="{{ route('penerbit.store') }}">
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" />
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Website</label>
            <input type="text" name="website" class="form-control" />
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" />
        </div>
        <div class="form-group">
            <label>CP</label>
            <input type="text" name="cp" class="form-control" />
        </div>
        
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    @stop
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
