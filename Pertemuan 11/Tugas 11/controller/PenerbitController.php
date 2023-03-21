<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use App\Exports\PenerbitExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();
        $keyword = $request->get('keyword');

        $ar_penerbit = DB::table('penerbit')
        ->where('nama', 'like', '%'.$keyword.'%')
        ->orWhere('alamat', 'like', '%'.$keyword.'%')
        ->orWhere('email', 'like', '%'.$keyword.'%')
        ->orWhere('website', 'like', '%'.$keyword.'%')
        ->orWhere('telepon', 'like', '%'.$keyword.'%')
        ->orWhere('cp', 'like', '%'.$keyword.'%')
        ->paginate(5);
        return view('penerbit.index', compact('ar_penerbit', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke hal form input buku
        return view('penerbit.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('penerbit')->insert(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'website' => $request->website,
                'telepon' => $request->telepon,
                'cp' => $request->cp,
            ]
        );
        //Landing Page
        return redirect('/penerbit');
    }

    public function penerbitPDF()
    {
        $ar_penerbit = DB::table('penerbit')
            ->select('penerbit.*')->get();
        $pdf = PDF::loadView('penerbit.daftarPenerbit', ['ar_penerbit' => $ar_penerbit]);
        return $pdf->download('dataPenerbit.pdf');
    }

    public function penerbitcsv()
    {
        return Excel::download(new PenerbitExport, 'penerbit.csv');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan 
        $ar_penerbit = DB::table('penerbit')
            ->where('penerbit.id', '=', $id)
            ->get();
        return view('penerbit.show', compact('ar_penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('penerbit')
            ->where('id', '=', $id)->get();
        return view('penerbit.form_edit', compact('data'));
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
        DB::table('penerbit')->where('id', '=', $id)->update(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'website' => $request->website,
                'telepon' => $request->telepon,
                'cp' => $request->cp,
            ]
        );
        //Landing Page
        return redirect('/penerbit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data
        DB::table('penerbit')->where('id', $id)->delete();
        return redirect('/penerbit');
    }
}
