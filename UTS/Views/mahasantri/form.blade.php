@extends('adminlte::page')
@section('title', 'Data Mahasantri')
@section('content_header')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Form Mahasantri</h1>
@stop
@section('content')
<form action="{{ route('mahasantri.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">NIM</label>
        <input type="text" name="nim" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Jurusan</label>
        <input type="text" name="jurusan" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <textarea  name="alamat" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Kota</label>
        <input type="text" name="kota" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Provinsi</label>
        <input type="text" name="provinsi" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        consol.log('Hi')
    </script>
@stop
