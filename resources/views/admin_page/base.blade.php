<?php
use Illuminate\Support\Facades\Session;

$status = Session::get('status'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Laundry</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/loader.css" rel="stylesheet">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-html5-1.6.3/r-2.2.5/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center border-bottom pt-3 pb-3 poppins-font">
                <img src="/assets/img/logo.png" alt="" class="brand-logo"> Clean Laundry
            </div>
            <div class="list-group list-group-flush">
                <a href="/dasbor" class="list-group-item list-group-item-action {{ $page_name == 'dasbor' ? 'active disabled' : '' }}">
                    <i class="fa fa-tachometer-alt side-nav-icon" aria-hidden="true"></i>Dasbor
                </a>
                @if(in_array($status, ['kasir', 'admin']))
                <a href="/paket_laundry" class="list-group-item list-group-item-action {{ $page_name == 'paket_laundry' ? 'active disabled' : '' }}">
                    <i class="fa fa-box side-nav-icon" aria-hidden="true"></i>Paket Laundry
                </a>
                <button class="list-group-item list-group-item-action {{ $page_group == 'data_pelanggan' ? 'active' : '' }}" id="customer-collapse-btn" type="button" data-toggle="collapse" data-target="#customer-collapse" aria-expanded="false" aria-controls="customer-collapse">
                    <i class="fa fa-user-cog side-nav-icon" aria-hidden="true"></i>Data Pelanggan<i class="fa fa-chevron-down float-right mt-1 {{ $page_group == 'data_pelanggan' ? 'collapse-active' : '' }}" aria-hidden="true" id="customer-collapse-logo"></i>
                </button>
                <div class="collapse" id="customer-collapse">
                    <div class="card card-body rounded-0 p-0">
                        <div class="card-text">
                            <a href="/data_member" class="list-group-item list-group-item-action border-0 pt-2 pb-2 {{ $page_name == 'data_member' ? 'active disabled' : '' }}">
                                <ul class="m-0"><li>Member</li></ul>
                            </a>
                            <a href="/data_non_member" class="list-group-item list-group-item-action border-0 pt-2 pb-2 {{ $page_name == 'data_non_member' ? 'active disabled' : '' }}">
                                <ul class="m-0"><li>Non-Member</li></ul>
                            </a>
                        </div>
                    </div>
                </div>
                <button class="list-group-item list-group-item-action {{ $page_group == 'data_transaksi' ? 'active' : '' }}" id="transaction-collapse-btn" type="button" data-toggle="collapse" data-target="#transaction-collapse" aria-expanded="false" aria-controls="transaction-collapse">
                    <i class="fa fa-money-bill side-nav-icon" aria-hidden="true"></i>Data Transaksi<i class="fa fa-chevron-down float-right mt-1 {{ $page_group == 'data_transaksi' ? 'collapse-active' : '' }}" aria-hidden="true" id="transaction-collapse-logo"></i>
                </button>
                <div class="collapse" id="transaction-collapse">
                    <div class="card card-body rounded-0 p-0">
                        <div class="card-text">
                            <a href="/transaksi_member" class="list-group-item list-group-item-action border-0 pt-2 pb-2 {{ $page_name == 'transaksi_member' ? 'active disabled' : '' }}">
                                <ul class="m-0"><li>Member</li></ul>
                            </a>
                            <a href="/transaksi_non_member" class="list-group-item list-group-item-action border-0 pt-2 pb-2 {{ $page_name == 'transaksi_non_member' ? 'active disabled' : '' }}">
                                <ul class="m-0"><li>Non-Member</li></ul>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if($status == 'admin')
                <a href="/data_pengguna" class="list-group-item list-group-item-action {{ $page_name == 'data_pengguna' ? 'active disabled' : '' }}">
                    <i class="fa fa-user side-nav-icon" aria-hidden="true"></i>Data Pengguna
                </a>
                <a href="/cabang" class="list-group-item list-group-item-action {{ $page_name == 'cabang' ? 'active disabled' : '' }}">
                    <i class="fa fa-store side-nav-icon" aria-hidden="true"></i>Cabang
                </a>
                @endif
                <a href="/laporan" class="list-group-item list-group-item-action {{ $page_name == 'laporan' ? 'active disabled' : '' }}">
                    <i class="fa fa-file side-nav-icon" aria-hidden="true"></i>Laporan
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg border-bottom shadow-sm">
                <button class="btn" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <span class="text-center text-capitalize">
                                {{ Session::get('nama_lengkap') }}
                            </span>
                        </li>
                        <li class="nav-item ml-3 mr-3">|</li>
                        <li class="nav-item mr-3">
                            <a href="/keluar">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid poppins-font pb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="content-loader-wrapper">
                                <div class="loadingio-spinner-pulse-9sejq2cy4il">
                                    <div class="ldio-b9hv0ciw3a">
                                        <div></div><div></div><div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-html5-1.6.3/r-2.2.5/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="/assets/js/script.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        <?php if($page_name == "dasbor"): ?>
        var monthlyOrder = document.getElementById('monthlyOrder').getContext('2d');
        var monthlyIncome = document.getElementById('monthlyIncome').getContext('2d');
        var monthlyOrderChart = new Chart(monthlyOrder, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Pesanan',
                    backgroundColor: '#457b9d',
                    borderColor: '#457b9d',
                    data: [7, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
        });
        var monthlyIncomeChart = new Chart(monthlyIncome, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Pendapatan',
                    backgroundColor: '#457b9d',
                    borderColor: '#457b9d',
                    data: [70000, 120000, 98000, 142000, 100000, 163000, 180000]
                }]
            },

            // Configuration options go here
            options: {}
        });
        <?php endif; ?>

        <?php if($page_group == "data_pelanggan"): ?>
            $('#customer-collapse').collapse('show');
        <?php endif; ?>

        <?php if($page_group == "data_transaksi"): ?>
            $('#transaction-collapse').collapse('show');
        <?php endif; ?>

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#menu-toggle").toggleClass('menu-active');
            $("#wrapper").toggleClass("toggled");
        });

        $(function () {
            $('.content-loader-wrapper').addClass('hide-active');
        });
        
        $('a, input[type=submit]').click(function () {
            $('html, body').animate({scrollTop: 0}, 100);
            $('.content-loader-wrapper').removeClass('hide-active');
        });

        $('#customer-collapse-btn').click(function () { 
            $('#customer-collapse-logo').toggleClass('collapse-active');
        });

        $('#transaction-collapse-btn').click(function () { 
            $('#transaction-collapse-logo').toggleClass('collapse-active');
        });

        $('.pw-toggle').click(function () { 
            $('.pw-toggle .fa').toggleClass('fa-eye-slash');
            $('.pw-toggle .fa').toggleClass('fa-eye');

            if ($('.pw-toggle .fa').hasClass('fa-eye-slash')) {
                $('.pw-input').attr('type', 'password');
            }else{
                $('.pw-input').attr('type', 'text');
            }
        });

        $('#table').DataTable();
        $('.select').select2()
    </script>

</body>
</html>