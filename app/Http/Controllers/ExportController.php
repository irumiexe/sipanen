<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\HasilPanen;
use Illuminate\Http\Request;
use App\Exports\HasilPanenExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index()
    {
        return view('auth.export.index', [
            'title' => 'Export Data'
        ]);
    }

    public function export(Request $request)
    {
        $hasil = HasilPanen::with('kecamatan', 'kelurahan')->get();
        // dd($request->all());
        $per = $request->pilih_export;

        $hasil = HasilPanen::with('kecamatan', 'kelurahan')->get();
        if($per != "Seluruh Daerah") {
            $kecamatan = Kecamatan::where('nama', $per)->first();
            $hasil = HasilPanen::with('kecamatan', 'kelurahan')->where('kecamatan_id', $kecamatan->id)->get();
        }
        
        // return view('auth.export.seluruh-daerah', [
        //     'hasil' => $hasil,
        // ]);

        return Excel::download(new HasilPanenExport($per), 'Hasil Panen - ' . $per . '.xlsx');
    }
}
