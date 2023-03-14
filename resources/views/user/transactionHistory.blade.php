@extends('layouts.sidebar')
@section('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2 class="mb-5"> Riwayat Transaksi</h2>
    </center>
    @foreach($transactions as $transaction)
    
    @if($transaction->transaction_type == 'income' || $transaction->payment_channel=="Pembayaran")
    <div class="row mt-2">
        <div class="col-sm-12 col-md-12 bg-white shadow-lg rounded-lg p-2 border-left-success">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p><b>
                        @if($transaction->transaction_type == 'income')
                        Pembayaran
                        @elseif($transaction->transaction_type == 'outcome')
                        Penarikan Dana
                        @else
                        {{$transaction->payment_channel}}
                        @endif
                    </b></p>
                </div>
                <div class="col-md-6 col-sm-6 d-flex justify-content-end">
                    <p>{{$transaction->created_at}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h4>
                        @if($transaction->total_price==null)
                        {{$transaction->total_income}}
                        {{$transaction->nominal}}
                             
                        @elseif($transaction->total_price != null)
                        {{$transaction->total_price}}
                        @endif
                    </h4>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                    <span> 
                    @if($transaction->product_id == null)
                        Donasi
                    @else
                        Investasi
                    @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    @else
    <div class="row mt-2">
        <div class="col-sm-12 col-md-12 bg-white shadow-lg rounded-lg p-2 border-left-danger">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <p><b>
                        @if($transaction->transaction_type == 'income')
                        Pembayaran
                        @elseif($transaction->transaction_type == 'outcome')
                        Penarikan Dana
                        @else
                        {{$transaction->payment_channel}}
                        @endif
                    </b></p>
                </div>
                <div class="col-md-6 col-sm-6 d-flex justify-content-end">
                    <p>{{$transaction->created_at}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h4>
                        @if($transaction->total_price==null)
                        {{$transaction->total_income}}
                        {{$transaction->nominal}}
                             
                        @elseif($transaction->total_price != null)
                        {{$transaction->total_price}}
                        @endif
                    </h4>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                    <span> 
                    @if($transaction->product_id == null)
                        Donasi
                    @else
                        Investasi
                    @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    
    <div class="mt-3">
         {{ $transactions->links() }}
    </div>
   
    
</div>
@endsection