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
                        <label>Type</label>
                        <select name="type" class="form-control mx-3">
                            <option value="">- Choose -</option>
                            <option value="AKTIVA" {{ request()->type == 'AKTIVA' ? 'selected' : ''}}>AKTIVA</option>
                            <option value="LABA-RUGI" {{ request()->type == 'LABA-RUGI' ? 'selected' : ''}}>LABA-RUGI</option>
                            <option value="PASSIVA" {{ request()->type == 'PASSIVA' ? 'selected' : ''}}>PASSIVA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="tahun" class="form-control mx-3" value="{{ request()->tahun }}">
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
                                {{--  <th>Type</th>
                                <th>Tanggal</th>  --}}
                                <th>Deskripsi</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    {{--  <th>{{ $item->TYPE_NERACA }}</th>
                                    <th>{{ $item->TANGGAL }}</th>  --}}
                                    <th>{{ $item->DESKRIPSI }}</th>
                                    <th>{{ $item->SALDO }}</th>
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
            {!! $data->appends(['type' => request()->input('type'), 'tahun' => request()->input('tahun')])->links() !!}
        </div>
    </div>
@endsection

