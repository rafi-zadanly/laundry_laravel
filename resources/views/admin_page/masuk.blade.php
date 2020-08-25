<?php
use Illuminate\Support\Facades\Session;
?>
<!doctype html>
<html lang="en">
<head>
    <title>Sign In | Clean Laundry</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/login_style.css">
</head>
<body>
    <div class="container-fluid container-full-screen">
        <div class="form-wrapper rounded shadow-lg pt-4 pb-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="montserrat-font letters-spacing">
                        CLEAN LAUNDRY
                    </h3>
                    <hr class="bg-secondary ml-4 mr-4">
                </div>
            </div>
            @if(Session::has('alert'))
            <div class="row mt-1">
                <div class="col-10 offset-1">
                    <div class="alert alert-danger shadow-sm" role="alert">
                        <center><?= Session::get('alert') ?></center>
                    </div>
                </div>
            </div>
            @endif
            <form action="/masuk/konfirmasi" method="POST">
            {{ csrf_field() }}
            <div class="row mt-2">
                <div class="col-10 offset-1 poppins-font">
                    <div class="input-group">
                        <span class="input-group-text input-title text-light">
                            Username
                        </span>
                        <input type="text" class="form-control form-input" name="username" id="name" placeholder="Type your username" value="{{ old('username') }}" aria-label="" autofocus>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-10 offset-1 poppins-font">
                    <div class="input-group shadow-sm">
                        <span class="input-group-text input-title text-light">
                            Password
                        </span>
                        <input type="password" class="form-control form-input" name="password" id="password" placeholder="Type your password" aria-label="" autocomplete="off">
                        <span class="input-group-text pwstatus bg-light">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-10 offset-1 poppins-font text-center">
                    <button type="submit" class="btn btn-gradient text-light rounded-pill shadow">Sign In</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $('.pwstatus').click(function () { 
            $('.pwstatus .fa').toggleClass('fa-eye-slash');
            $('.pwstatus .fa').toggleClass('fa-eye');

            if ($('.pwstatus .fa').hasClass('fa-eye-slash')) {
                $('#password').attr('type', 'password');
            }else{
                $('#password').attr('type', 'text');
            }
        });
        $(function(){
            $('.form-wrapper').addClass('form-active');
        })
        $('button[type=submit]').click(function () { 
            $('button[type=submit]').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
        });
    </script>
</body>
</html>