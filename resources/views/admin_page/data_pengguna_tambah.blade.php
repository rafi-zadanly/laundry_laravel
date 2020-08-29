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
        <a href="/data_pengguna" class="btn btn-light rounded-circle shadow">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-6 card shadow p-3">
        <h4><center>Tambah Data Pengguna</center></h4>
        <hr class="bg-danger">
        <form action="/data_pengguna/tambah/konfirmasi" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Lengkap<span class="required-input">*</span></label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="" aria-describedby="helpId" value="{{ old('nama_lengkap') }}" autocomplete="off" autofocus>
                @error('nama_lengkap') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label for="">Nama Pengguna<span class="required-input">*</span></label>
                <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna" id="" aria-describedby="helpId" value="{{ old('nama_pengguna') }}" autocomplete="off">
                @error('nama_pengguna') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label for="">Kata Sandi<span class="required-input">*</span></label>
                <div class="input-group">
                    <input type="password" class="form-control pw-input @error('kata_sandi') is-invalid @enderror" name="kata_sandi" id="" aria-describedby="helpId" value="{{ old('kata_sandi') }}" autocomplete="off">
                    <div class="input-group-text pw-toggle">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </div>
                </div>
                @error('kata_sandi') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label for="">Cabang<span class="required-input">*</span></label>
                <select name="cabang" class="form-control select @error('cabang') is-invalid @enderror">
                    <option value="NULL">Pilih Cabang</option>
                    @foreach ($data_cabang as $cabang)
                    <option value="{{ $cabang->id }}">[{{ $cabang->id }}] {{ $cabang->nama }}</option>
                    @endforeach
                </select>
                @error('cabang') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
                <label for="">Status Pengguna<span class="required-input">*</span></label>
                <select name="status_pengguna" id="" class="form-control @error('status_pengguna') is-invalid @enderror">
                    <option value="NULL">Pilih Status</option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                </select>
                @error('status_pengguna') <small id="helpId" class="form-text text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="text-right">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
    </div>
</div>

@endsection