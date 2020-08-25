@extends('admin_page.base')

@section('content')
<div class="row">
    <div class="col-12 pt-4 pl-4 pr-4">
        <div class="card-deck">
            <div class="card shadow rounded">
                <div class="card-body row">
                    <div class="col-4">
                        <h1><i class="fa fa-users card-logo" aria-hidden="true"></i></h1>
                    </div>
                    <div class="col-8 text-right">
                        <h4 class="card-title">63</h4>
                        <p class="card-text dashboard">Total Pelanggan</p>
                    </div>
                </div>
            </div>
            <div class="card shadow rounded">
                <div class="card-body row">
                    <div class="col-4">
                        <h1><i class="fa fa-users card-logo" aria-hidden="true"></i></h1>
                    </div>
                    <div class="col-8 text-right">
                        <h4 class="card-title">4</h4>
                        <p class="card-text dashboard">Total Karyawan</p>
                    </div>
                </div>
            </div>
            <div class="card shadow rounded">
                <div class="card-body row">
                    <div class="col-4">
                        <h1><i class="fa fa-shopping-cart card-logo" aria-hidden="true"></i></h1>
                    </div>
                    <div class="col-8 text-right">
                        <h4 class="card-title">58</h4>
                        <p class="card-text dashboard">Total Pesanan</p>
                    </div>
                </div>
            </div>
            <div class="card shadow rounded">
                <div class="card-body row">
                    <div class="col-4">
                        <h1><i class="fa fa-shopping-cart card-logo" aria-hidden="true"></i></h1>
                    </div>
                    <div class="col-8 text-right">
                        <h4 class="card-title">5</h4>
                        <p class="card-text dashboard">Pesanan Baru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6 pt-4 pl-4">
        <div class="card p-3 shadow">
            <p class="mb-3 chart-title">
                <i class="fa fa-shopping-bag mr-1"></i> Pesanan / Bulan
            </p>
            <canvas id="monthlyOrder"></canvas>
        </div>
    </div>
    <div class="col-6 pt-4 pr-4">
        <div class="card p-3 shadow">
            <p class="mb-3 chart-title">
                <i class="fa fa-money mr-1"></i> Pendapatan / Bulan
            </p>
            <canvas id="monthlyIncome"></canvas>
        </div>
    </div>
</div>
@endsection