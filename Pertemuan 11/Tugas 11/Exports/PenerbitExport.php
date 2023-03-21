<?php

namespace App\Exports;

use App\Models\Penerbit;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenerbitExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Buku::all();
        $ar_penerbit = DB::table('penerbit')
            ->select(
                'penerbit.nama',
                'penerbit.alamat',
                'penerbit.email',
                'penerbit.website',
                'penerbit.telepon',
                'penerbit.cp',
            )
            ->get();
        return $ar_penerbit;
    }
}
