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
                <i class="fa fa-box mr-1"></i> Data Paket Laundry
            </p>
            <table class="table table-striped table-inverse table-responsive-sm">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Id Outlet</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>202101</td>
                        <td>Paket 1 Kg</td>
                        <td>Kiloan</td>
                        <td>Rp. 30.000</td>
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
                        <td>202101</td>
                        <td>Paket 2 Kg</td>
                        <td>Kiloan</td>
                        <td>Rp. 55.000</td>
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