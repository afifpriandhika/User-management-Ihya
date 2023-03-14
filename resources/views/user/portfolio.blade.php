@extends('layouts.sidebar')
@section('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2>Portofolio Investasi</h2>
    </center>
    
    <div class = "row mt-5">
        <div class="col-md-4 col-sm-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nilai Investasi</div>
                                {{$currentValue}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Keuntungan</div>
                                {{$totalProfit}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Dana ditarik</div>
                                {{$withdrawed}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah Unit</th>
                            <th scope="col">Nilai Investasi</th>
                            <th scope="col">Jatuh Tempo</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <th scope="row">{{$portfolio->name_product}}</th>
                            <td>{{$portfolio->number_units}}</td>
                            <td>{{$portfolio->total_income}}</td>
                            <td>{{date('d-m-Y', strtotime($portfolio->contract_end))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $portfolios->links() }}
                
            </div>
        </div>
    </div>
    <center><a class="btn btn-primary mt-5" href="https://invest.ihya-digital.online/dashboard" role="button">Selengkapnya</a></center>
    
</div>
@endsection