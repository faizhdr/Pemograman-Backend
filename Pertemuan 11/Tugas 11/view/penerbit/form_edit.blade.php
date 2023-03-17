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
    @foreach ($data as $rs)
        <form method="POST" action="{{ route('penerbit.update', $rs->id) }}">
            @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
            @method('put') {{-- method put digunakan untuk meletakkan data yang akan diubah disetiap element form edit buku --}}

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $rs->nama }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $rs->alamat }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ $rs->email }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" value="{{ $rs->website }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" value="{{ $rs->telepon }}" class="form-control" />
            </div>
            <div class="form-group">
                <label>CP</label>
                <input type="text" name="cp" value="{{ $rs->cp }}" class="form-control" />
            </div>
            {{-- Lanjutan ke element-element form berikutnya --}}
            
            <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
            <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
        </form>
    @endforeach
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
