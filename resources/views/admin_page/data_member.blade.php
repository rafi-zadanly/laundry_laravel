@extends('admin_page.base')

@section('content')
<div class="row">
    <div class="col-12 pt-4 pl-4 pr-4">
        <a href="" class="btn btn-light shadow float-right">
            <i class="fa fa-plus" aria-hidden="true"></i> Tambah
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12 pt-4 pl-4 pr-4">
        <div class="card p-3 shadow">
            <p class="mb-3 chart-title">
                <i class="fa fa-user-friends mr-1"></i> Data Member
            </p>
            <table class="table table-striped table-inverse table-responsive-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor HP</th>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th>Waktu Member</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>M. Rafi Zadanly</td>
                        <td>Jl. H. Fatimah 01/11 no. 11</td>
                        <td>Laki-Laki</td>
                        <td>085894015326</td>
                        <td>28 Januari 2020</td>
                        <td>28 Februari 2020</td>
                        <td>1 Bulan</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>Andi Garden</td>
                        <td>Jl. Pekapuran 04/08 no. 35</td>
                        <td>Laki-Laki</td>
                        <td>089612837746</td>
                        <td>2 Februari 2020</td>
                        <td>2 April 2020</td>
                        <td>2 Bulan</td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection