<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasantriController extends Controller
{
    public function dataMahasantri(){
        $no = 1;
        $mhs1 = ['nama' => 'Fawwaz', 'asal' => 'Jakarta'];
        $mhs2 = ['nama' => 'Inaya', 'asal' => 'Depok'];
        $mhs3 = ['nama' => 'Zidan', 'asal' => 'Sinjai'];
        $mhs4 = ['nama' => 'Bambang', 'asal' => 'Mojokerto'];
        $mhs5 = ['nama' => 'Unyil', 'asal' => 'Bandung'];

        $data = [$mhs1, $mhs2, $mhs3, $mhs4, $mhs5];

        return view('data_mahasantri', compact('data')
        );
    }
}
