@extends('admin_page.base')

@section('content')
<div class="row">
    <div class="col-6 offset-3 pt-3">
        <div class="card p-3 shadow">
            <form action="/laporan/cetak" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <h5 class="text-center">Cetak Data Laporan</h5>
                        <hr class="bg-danger">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Cetak Data</label>
                            <select name="cetak_data" class="form-control" autofocus>
                                <option value="NULL">Pilih Data</option>
                                <option value="pengguna">Pengguna</option>
                                <option value="cabang">Cabang</option>
                            </select>
                            @error('cetak_data') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Cetak File</label>
                            <select name="cetak_file" class="form-control">
                                <option value="NULL">Pilih File</option>
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                            @error('cetak_file') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-12 text-right mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-print" aria-hidden="true"></i> Cetak
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection