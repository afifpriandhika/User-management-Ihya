@extends ('layouts.sidebar')

@section ('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2>Profil</h2>
        <span>Info about you and your preferences across Ihya Ecosystem</span>
    </center>
    
    @if(Auth::user()->profile->birthplace == null || Auth::user()->profile->birthdate == null || Auth::user()->profile->provinsi == null)
    <div class="alert alert-warning mt-5" role="alert">
      SIlahkan lengkapi data diri anda terlebih dahulu!
    </div>
    @else
    @endif


    <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
        <h3>Basic Info</h3>
        
        <!--<img src="" class="rounded mx-auto d-block" alt="..." width="200px" >-->
       
        <!--<img src="" class="rounded mx-auto d-block" alt="..." width="200px" >-->
        
        <table class="table mt-5">
            <tbody>
                <tr>
                    <th scope="row">Nama</th>
                    <td>{{Auth::user()->profile->ktp_name}}</td>
                </tr>
                <tr>
                    <th scope="row">Tempat,Tanggal Lahir</th>
                    <td>
                        @if(Auth::user()->profile->birthplace != null)
                            {{$profiles->birthplace}}, {{date('d M Y', strtotime($profiles->birthdate))}}
                        @else
                            <span class="badge rounded-pill bg-warning">belum melengkapi TTL</span>
                        @endif
                    </td>
                    
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>
                        @if($profiles->provinsi == null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi alamat</span>
                        @else
                        {{$profiles->provinsi}}, {{$profiles->kota}}, {{$profiles->kecamatan}}, {{$profiles->kelurahan}}, {{$profiles->address_detail}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>
                        @if($profiles->job == null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi data pekerjaan</span>
                        @else
                        {{$profiles->job}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Detail Pekerjaan</th>
                    <td>
                        @if($profiles->job_detail == null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi detail pekerjaan</span>
                        @else
                        {{$profiles->job_detail}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Soial Media</th>
                    <td>
                        @if($profiles->social_media == null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi sosial media</span>
                        @else
                        {{$profiles->social_media}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Link Social Media</th>
                    <td>
                        @if($profiles->social_link == null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi link sosial media</span>
                        @else
                        <a href="{{$profiles->social_link}}">{{$profiles->social_link}}</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href="{{ route('updateBasicInfo') }}" class="btn btn-primary">
                    {{ __('Update') }}
                </a>
            </div>
        </div>
    </div>
    
    
    @if(Auth::user()->profile->nik == null || Auth::user()->profile->ktp_scan == null || Auth::user()->profile->ktp_selfie == null)
    <div class="alert alert-warning mt-5" role="alert">
      SIlahkan lengkapi data diri anda terlebih dahulu!
    </div>
    @else
    @endif
    <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
        <h3>ID Info</h3>
        <table class="table mt-5">
            <tbody>
                <tr>
                    <th scope="row">NIK</th>
                    <td>
                        @if($profiles->nik == null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi NIK</span>
                        @else
                        {{$profiles->nik}}
                        @endif
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">Foto KTP</th>
                    <td>
                        @if($profiles->ktp_scan == null)
                        <span class="badge rounded-pill bg-warning">belum upload ktp</span>
                        @else
                        <span class="badge rounded-pill bg-success">ktp sudah diupload</span>
                        @endif
                    </td>
                    <td>
                        @if($profiles->ktp_scan == null)
                        @else
                        <a class="btn btn-primary" data-toggle="modal" data-target="#lihatKTP">
                            {{ __('Lihat') }}
                        </a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Selfie KTP</th>
                    <td>@if($profiles->ktp_selfie == null)
                        <span class="badge rounded-pill bg-warning">belum upload selfie ktp</span>
                        @else
                        <span class="badge rounded-pill bg-success">selfie ktp sudah diupload</span>
                        @endif
                    </td>
                    <td>
                        @if($profiles->ktp_selfie == null)
                        @else
                        <a class="btn btn-primary" data-toggle="modal" data-target="#lihatSelfie">
                            {{ __('Lihat') }}
                        </a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Status Approval</th>
                    <td>
                       
                       @if($profiles->nik != null && $profiles->ktp_selfie != null && $profiles->ktp_scan != null && $profiles->kecamatan != null && $profiles->id_approval == null)
                       <span class="badge rounded-pill bg-primary">Menunggu validasi</span>
                       @elseif($profiles->id_approval == 1)
                       <span class="badge rounded-pill bg-success">Data tervalidasi</span>
                       @elseif($profiles->id_approval == 2)
                       <span class="badge rounded-pill bg-danger">Data ditolak</span>
                       @else
                       <span class="badge rounded-pill bg-warning">Belum melengkapi data diri</span>
                       @endif
                    </td>
                    <td></td>
                </tr>
                @if($profiles->id_approval == 2)
                <tr>
                    <th scope="row">Alasan ID ditolak</th>
                    <td>{{$profiles->rejection_note}}</td>
                </tr>
                @else
                @endif
            </tbody>
        </table>
        
        <div class="row">
            <div class="col d-flex justify-content-end">
                @if($profiles->ktp_selfie != null && $profiles->ktp_scan != null && $profiles->id_approval == 1)
                @else
                <a href="{{ route('updateIdentity') }}" class="btn btn-primary">
                    {{ __('Update') }}
                </a>
                @endif
            </div>
        </div>  
    </div>
    
    <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
        <h3>Contact Info</h3>
        <table class="table mt-5">
            <tbody>
                <tr>
                    <th scope="row">Nomor HP</th>
                    <td>
                        @if($profiles->phone==null)
                        <span class="badge rounded-pill bg-warning">belum melengkapi nomor telepon</span>
                        @else
                        {{$profiles->phone}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">E-Mail</th>
                    <td>{{Auth::user()->email}}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <a href="{{ route('updateContact') }}" class="btn btn-primary">
                    {{ __('Update') }}
                </a>
            </div>
        </div>
    </div>
</div>

<!--popup modal-->
<div class="modal fade" id="lihatKTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto KTP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <img src="{{ asset($profiles->ktp_scan) }}" class="rounded mx-auto d-block" alt="..." width="400px">
        </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihatSelfie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Selfie KTP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset($profiles->ktp_selfie) }}" class="rounded mx-auto d-block" alt="..." width="400px">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- end of popup modal -->
@endsection

