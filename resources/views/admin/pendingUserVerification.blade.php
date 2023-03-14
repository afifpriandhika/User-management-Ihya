@extends('layouts.adminSidebar')
@section('content')

   
    <center>
        <h2>User Siap Verifikasi Identitas</h2>
    </center>
     @include('layouts.flash-message')
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
                <h3>User Data</h3>
                @if($usersCount == 0)
                    <center>
                        <img src="{{asset('img/no_data.jpg')}}" alt="" width="350">
                    </center>
                @else
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">UID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            
                            {{-- <th scope="col">Identitas</th>
                            <th scope="col">Approval</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->ktp_name}}</td>
                            <td>{{$user->nik}}</td>
                            <td>{{$user->provinsi}}, {{$user->kota}}, {{$user->kecamatan}}, {{$user->kelurahan}} {{$user->address_detail}} </td>
                            <td>
                                @if($user->id_approval == 2)
                                    <span class="badge rounded-pill bg-danger">ditolak</span>
                                @elseif($user->id_approval == 1)
                                    <span class="badge rounded-pill bg-success">di-approve</span>
                                @elseif($user->id_approval == null && $user->ktp_scan != null && $user->ktp_selfie != null)
                                    <span class="badge rounded-pill bg-warning">menunggu</span>
                                @endif
                                </td>
                            <td>
                                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#approval{{ $user->user_id }}" role="button">Approval</a>
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

@foreach($users as $user)
<div class="modal fade" id="approval{{ $user->user_id }}" role="dialog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row">NIK</th>
                            <td>{{$user->nik}}</td>
                        </tr>
                        <tr>
                            <th scope="row">NAMA</th>
                            <td>{{$user->ktp_name}}</td>                                      
                        </tr>
                        <tr>
                        <th scope="row">ALAMAT</th>
                        <td>{{$user->provinsi}}, {{$user->kota}}, {{$user->kecamatan}}, {{$user->kelurahan}}, {{$user->address_detail}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row mt-5">
                    <div class="col-sm-12 col-md-6">
                        Selfie KTP
                        <img src="{{ asset($user->ktp_selfie) }}" class="rounded" alt="..." width="85%">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        Scan KTP
                        <img src="{{ asset($user->ktp_scan) }}" class="rounded" alt="..." width="85%">
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <form method="POST" action="/admin/userVerification/approve/{{$user->id}}">
                        @csrf
                        {{ method_field('PUT') }}
                        <!-- <input type="text" hidden value=1 name=approval> -->
                        <button class="btn btn-success" type="submit">Approve</button>
                    </form>
                    <button class="btn btn-danger" data-bs-target="#tolakID{{ $user->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">Tolak</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tolakID{{ $user->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Penolakan Verifikasi Identitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/userVerification/reject/{{$user->id}}">
                    @csrf
                    {{ method_field('PUT') }}
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="rejection_note"></textarea>
                    <label for="floatingTextarea">Alasan Penolakan</label>
                </div>
            </div>
            <div class="modal-footer">
                    <!-- <input type="text" hidden value=1 name=approval> -->
                    <button class="btn btn-danger" type="submit">Tolak</button>
                </form>
                <b  utton class="btn btn-secondary" data-bs-target="#approval{{ $user->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">Kembali</b>
            </div>
        </div>
    </div>

@endforeach

            <!-- Button trigger modal -->
            
            

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