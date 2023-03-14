@extends('layouts.sidebar')
@section('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2>Produk Telah Dibuat</h2>
    </center>
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
                <h3>Daftar Produk</h3>
                @if($productsCount == 0)
                    <center>
                        <img src="{{asset('img/no_data.jpg')}}" alt="" width="350">
                    </center>
                @else
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah Unit</th>
                            <th scope="col">Pendapatan saat ini</th>
                            
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name_product}}</td>
                            <td>{{$product->unit}}</td>
                            <td>{{$product->price*$product->fundedUnit}}</td>
                            <td><a class="btn btn-primary btn-sm" href="https://invest.ihya-digital.online/product/detail/{{$product->id}}">Detail</a></td>
                            
                                {{--<a class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#approval{{ $user->user_id }}" role="button">Approval</a>--}}
                                {{-- <a class="btn btn-primary btn-sm" data-bs-toggle="modal" role="button" data-target="#lihatID{{ $user->user_id }}">{{ __('Approval') }}</a> --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>


            
            

<script>
    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = evt.which ? evt.which : evt.keyCode;
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
            alert("Only numbers are allowed!");
            return false;
        }
        return true;
    }

</script>
@endsection