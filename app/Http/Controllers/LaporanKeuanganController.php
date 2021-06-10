<?php

namespace App\Http\Controllers;

use App\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index(Request $request) {
        $type =  $request->input('type');
        $tahun =  $request->input('tahun');
        if($type!="" || $tahun!=""){
            // $data = LaporanKeuangan::simplePaginate(10);
            $data = LaporanKeuangan::where('TYPE_NERACA', $type)->WhereYear('TANGGAL', $tahun)->Paginate(12);
            // $data = LaporanKeuangan::Paginate(12);
            $data->appends(['type' => $type, 'tanggal' => $tahun]);
        }
        else{
            // $data = LaporanKeuangan::orderBy('TANGGAL', 'DESC')->Paginate(10);
            $data = LaporanKeuangan::Paginate(10);
        }
        // return $data;
        return view('laporan_keuangan.index', compact('data'));
    }
}
