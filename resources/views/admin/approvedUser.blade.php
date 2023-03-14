@extends('layouts.adminSidebar')
@section('content')

    <center>
        <h2>User Terverifikasi</h2>
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
                            <td>{{$user->provinsi}}, {{$user->kota}}, {{$user->kecamatan}}, {{$user->kelurahan}}, {{$user->address_detail}}</td>
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
                                <form method ="POST" action="/admin/userVerification/revoke/{{$user->id}}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <button class="btn btn-danger btn-sm" role="submit" href="#approval{{ $user->user_id }}">Cabut Verifikasi</a>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>


@endsection