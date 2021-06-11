<?php

namespace App\Http\Controllers;

use App\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }
    public function index(Request $request) {
        $type =  $request->input('type');
        $tahun =  $request->input('tahun');
        if($type!="" || $tahun!=""){
            // $data = LaporanKeuangan::simplePaginate(10);
            if($type == 'LABA-RUGI'){
                $data = LaporanKeuangan::where('TYPE_NERACA', 'LABA')->orWhere('TYPE_NERACA', 'RUGI')->WhereDate('TANGGAL', $tahun)->Paginate(12);
            }else{
                $data = LaporanKeuangan::where('TYPE_NERACA', $type)->WhereDate('TANGGAL', $tahun)->Paginate(12);
            }
            // $data = LaporanKeuangan::Paginate(12);
            $data->appends(['type' => $type, 'tanggal' => $tahun]);
        }
        else{
            $data = LaporanKeuangan::Paginate(10);
            // $data = LaporanKeuangan::Paginate(10);
        }
        // return $data;
        return view('laporan_keuangan.index', compact('data'));
    }
}
