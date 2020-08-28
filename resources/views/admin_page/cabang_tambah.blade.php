@extends('admin_page.base')

@section('content')
@if(Session::has('alert'))
<div class="row">
    <div class="col-6 offset-3 pt-3">
        <div class="alert alert-{{ Session::get('type') == 'success' ? 'success' : 'danger' }} shadow-sm" role="alert">
            <center>{{ Session::get('alert') }}</center>
        </div>
    </div>
</div>
@endif
<div class="row mt-4">
    <div class="col-3 text-right">
        <a href="/cabang" class="btn btn-light rounded-circle shadow">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-6 card shadow p-3">
        <h4><center>Tambah Data Cabang</center></h4>
        <hr class="bg-danger">
        <form action="/cabang/tambah/konfirmasi" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Nama Cabang<span class="required-input">*</span></label>
                        <input type="text" class="form-control @error('nama_cabang') is-invalid @enderror" name="nama_cabang" id="" aria-describedby="helpId" value="{{ old('nama_cabang') }}" autocomplete="off" autofocus>
                        @error('nama_cabang') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">No. Telepon<span class="required-input">*</span></label>
                        <input type="number" class="form-control no-prop @error('no_telepon') is-invalid @enderror" name="no_telepon" id="" aria-describedby="helpId" value="{{ old('no_telepon') }}" autocomplete="off">
                        @error('no_telepon') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat Cabang<span class="required-input">*</span></label>
                <textarea name="alamat_cabang" id="" rows="3" class="form-control @error('alamat_cabang') is-invalid @enderror"></textarea>
                @error('alamat_cabang') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="text-right">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
    </div>
</div>

@endsection