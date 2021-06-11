<?php

namespace App\Http\Controllers;

use App\SummaryKeuangan;
use Illuminate\Http\Request;

class SummaryKeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }
    public function index(Request $request) {
        // $data = SummaryKeuangan::Paginate(10);
        // return $data;
        // $type =  $request->input('type');
        $tahun =  $request->input('tahun');
        if($tahun!=""){
            // $data = SummaryKeuangan::simplePaginate(10);
            $data = SummaryKeuangan::WhereYear('tahun', $tahun)->Paginate(12);
            $data->appends(['tanggal' => $tahun]);
        }
        else{
            $data = SummaryKeuangan::Paginate(10);
        }
        // return $data;
        return view('summary_keuangan.index', compact('data'));
    }
}
