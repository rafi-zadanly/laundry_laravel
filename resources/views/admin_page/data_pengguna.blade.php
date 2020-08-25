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
        <a href="/data_pengguna/tambah" class="btn btn-light shadow float-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Tambah
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-4 pl-4 pr-4">
        <div class="card p-3 shadow">
            <p class="mb-3 chart-title">
                <i class="fa fa-user-friends mr-1"></i> Data Pengguna
            </p>
            <table class="table table-striped table-inverse table-responsive-sm" id="table">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Pengguna</th>
                        <th>Status</th>
                        <th>Id Cabang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; foreach ($data_pengguna as $pengguna) : ?>
                    <tr>
                        <td scope="row"><?= $pengguna->id ?></td>
                        <td><?= $pengguna->nama_lengkap ?></td>
                        <td><?= $pengguna->nama_pengguna ?></td>
                        <td><?= $pengguna->status ?></td>
                        <td><?= $pengguna->id_cabang ?></td>
                        <td>
                            <a href="/data_pengguna/ubah/{{ $pengguna->id }}" class="btn btn-primary btn-sm">
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
                                    <h5 class="modal-title">{{ $pengguna->nama_lengkap }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <form action="/data_pengguna/hapus" method="post">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <p class="mb-0">Apakah anda yakin menghapus data tersebut?</p>
                                    <input type="hidden" name="id_delete" value="{{ $pengguna->id }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $num++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection