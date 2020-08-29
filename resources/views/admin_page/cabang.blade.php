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
<div class="row">
    <div class="col-12 pt-3 pl-4 pr-4">
        <a href="/cabang/tambah" class="btn btn-light shadow float-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Tambah
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-4 pl-4 pr-4">
        <div class="card p-3 shadow">
            <p class="mb-3 chart-title">
                <i class="fa fa-user-friends mr-1"></i> Data Cabang
            </p>
            <table class="table table-striped table-inverse table-responsive-sm" id="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $num = 0 @endphp
                    @foreach ($data_cabang as $cabang)
                    @php $num++ @endphp
                    <tr>
                        <td scope="row"><?= $num ?></td>
                        <td><?= $cabang->nama ?></td>
                        <td><?= $cabang->alamat ?></td>
                        <td><?= $cabang->no_telp ?></td>
                        <td>
                            <a href="/cabang/ubah/{{ $cabang->id }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal_{{ $num }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteModal_{{ $num }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $cabang->nama }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="/data_pengguna/hapus" method="post">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <p class="mb-0">Apakah anda yakin menghapus data tersebut?</p>
                                    <input type="hidden" name="id_delete" value="{{ $cabang->id }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection