@section('title', "IHYA")
@extends('layouts.sidebar')
@section('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2>Riwayat Donasi</h2>
    </center>
    <div class="row mt-5">
        <div class="col-md-12 col-sm-12">
                @if($donationsCount == 0)
                <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
                    <center>
                        <img src="{{asset('img/no_data.jpg')}}" alt="" width="350">
                    </center>
                </div>
                @else
                @foreach($donations as $donation)
                <div class="row mt-2">
                    <div class="col-sm-12 col-md-12 bg-white shadow-lg rounded-lg p-2 border-left-success">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p><b>
                                    {{$donation->proyek->name}}
                                </b></p>
                            </div>
                            <div class="col-md-6 col-sm-6 d-flex justify-content-end">
                                <p>{{$donation->created_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h4>
                                    {{$donation->nominal}}
                                </h4>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 col-sm-12">
                                <span> 
                                {{$donation->proyek->location}}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="http://charity.ihya-digital.online/donasi/{{$donation->proyek_batch_id}}">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                {{ $donations->links() }}
                @endif
        </div>
    </div>
</div>
@endsection