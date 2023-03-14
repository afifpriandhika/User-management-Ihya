@extends('layouts.sidebar')


@section('content')



    <div class="container">
        
        <div class="row">
            <center><h2>Dashboard</h2></center>
            <div class="col-md-12 col-sm-12 p-5 bg-white rounded-lg shadow-lg mt-3">
                <center>
                    <h2>Selamat Datang di Ekosistem Digital Ihya</h2>
                    <p>Kelola akun anda pada ekosistem digital Ihya</p>
                    <img src="{{ asset('img/welcome.jpg') }}" alt="" width="350" class="mt-3">
                </center>
            </div>
        </div>

        
        <div class="row mt-5">
            <h4>Aplikasi Ihya</h4>
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <a class="btn btn-success p-3" href="https://invest.ihya-digital.online/">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="100" >
                        <h3 class="mt-3">Ihya Invest</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <a class="btn btn-light p-3" href="http://charity.ihya-digital.online/">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="100" >
                        <h3 class="mt-3">Ihya Charity</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection