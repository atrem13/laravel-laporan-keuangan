@extends('template.main')

@section('main-title')
    Laporan Keuangan
@endsection

@section('body')
    <div class="row">
        {{--  input form  --}}
        <div class="col-12">
            <div class="card m-b-30 card-body">
                <h4 class="card-title font-16 mt-0">Filter</h4>
                <form action="" class="form-inline">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="year" name="tahun" class="form-control mx-3" value="{{ request()->tahun }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        {{--  end input form  --}}

        {{--  table  --}}
        <div class="col-12">
            <div class="card m-b-30 card-body">
                <h4 class="card-title font-16 mt-0">Data</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="min-width:100px">Kode Barang</th>
                                <th style="min-width:100px">Nama Barang</th>
                                <th style="min-width:100px">Tahun Penjualan</th>
                                <th style="min-width:100px">Janurai</th>
                                <th style="min-width:100px">Februari</th>
                                <th style="min-width:100px">Maret</th>
                                <th style="min-width:100px">April</th>
                                <th style="min-width:100px">Mei</th>
                                <th style="min-width:100px">Juni</th>
                                <th style="min-width:100px">Juli</th>
                                <th style="min-width:100px">Agustus</th>
                                <th style="min-width:100px">September</th>
                                <th style="min-width:100px">Oktober</th>
                                <th style="min-width:100px">November</th>
                                <th style="min-width:100px">Desember</th>
                                <th style="min-width:100px">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th style="min-width:100px">{{ $item->kode_barang }}</th>
                                    <th style="min-width:100px">{{ $item->nama_barang }}</th>
                                    <th style="min-width:100px">{{ $item->tahun }}</th>
                                    <th style="min-width:100px">{{ $item->B01 }}</th>
                                    <th style="min-width:100px">{{ $item->B02 }}</th>
                                    <th style="min-width:100px">{{ $item->B03 }}</th>
                                    <th style="min-width:100px">{{ $item->B04 }}</th>
                                    <th style="min-width:100px">{{ $item->B05 }}</th>
                                    <th style="min-width:100px">{{ $item->B06 }}</th>
                                    <th style="min-width:100px">{{ $item->B07 }}</th>
                                    <th style="min-width:100px">{{ $item->B08 }}</th>
                                    <th style="min-width:100px">{{ $item->B09 }}</th>
                                    <th style="min-width:100px">{{ $item->B10 }}</th>
                                    <th style="min-width:100px">{{ $item->B11 }}</th>
                                    <th style="min-width:100px">{{ $item->B12 }}</th>
                                    <th style="min-width:100px">{{ $item->TOTAL }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{--  end table  --}}

    </div>
    <div class="row mt-3 justify-content-between">
        <div class="col-5"></div>
        <div class="col-5">
            {!! $data->appends(['tahun' => request()->input('tahun')])->links() !!}
        </div>
    </div>
@endsection

