@extends('adminlte::page')
@section('title', 'Form Penerbit')
@section('content_header')
    <h1>Data Penerbit</h1>
@stop
@section('content')
    @foreach ($ar_penerbit as $b)
        <div class="media">
        @php
        if(!empty($b->cover)){
        @endphp
        <img src="{{ asset('images') }}/{{ $b -> cover }}" width="10%" class="mr-3">
        @php
        }else {
        @endphp
        <img src="{{ asset('images') }}/nocover.gif" width="10%" class="mr-3">
        @php
        }
        @endphp

            <div class="media-body">
                <p>
                    Nama : {{ $b->nama }}
                    <br>Alamat : {{ $b->alamat }}
                    <br>Email : {{ $b->email }}
                    <br>Website : {{ $b->website }}
                    <br>Telepon : {{ $b->telepon }}
                    <br>CP : {{ $b->cp }}
                </p>
                <hr>
                <a href="{{ url('penerbit') }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
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
