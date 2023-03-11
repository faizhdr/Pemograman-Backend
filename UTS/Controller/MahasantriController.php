<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ar_mahasantri = DB::table('mahasantri')->get();
        
        return view('mahasantri.index', compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasantri.form');
    }

    public function jurusan()
    {
        return view('mahasantri.jurusan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. proses validasi data
        $validasi = $request->validate(
            [
                'nim' => 'required|unique:mahasantri|numeric',
                'nama' => 'required|max:50',
                'alamat' => 'required',
                'email' => 'required|max:50|regex:/(.+)@(.+)\.(.+)/i',
            ],
            //2. menampilkan pesan kesalahan
            //(di slide selanjutnya)

            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'nim.required' => 'NIM Wajib di Isi',
                'nim.unique' => 'NIM Tidak Boleh Sama',
                'nim.numeric' => 'Harus Berupa Angka',
                'nama.required' => 'Nama Wajib di Isi',
                'alamat.required' => 'Alamat Wajib di Isi',
                'email.required' => 'Email Wajib di Isi',
                'email.regex' => 'Harus berformat email',
            ],
        );
        //lanjutan slide sebelumnya
        //2. proses input data tangkap request dari form input
        DB::table('mahasantri')->insert(
            [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'jurusan' => $request->jurusan,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'email' => $request->email,
            ]
        );
        //2.landing page
        return redirect('/mahasantri');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
