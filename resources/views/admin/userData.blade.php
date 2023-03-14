@extends('layouts.adminSidebar')
@section('content')


    <center>
        <h2>User Management</h2>
    </center>
    @include('layouts.flash-message')
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
                <h3>User Data</h3>
                <div class="table-responsive">
                    @if($usersCount == 0)
                    <center>
                        <img src="{{asset('img/no_data.jpg')}}" alt="" width="350">
                    </center>
                    @else
                    <table class="table table-hover table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">UID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">Role</th>
                                <th scope="col">Registered at</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->role=='admin')
                                        admin
                                    @else
                                        user
                                    @endif
                                </td>
                                <td>
                                    {{date('D, d M Y', strtotime($user->created_at))}}
                                </td>
                                <td>
                                    @if($user->profile->id_approval == 2)
                                        <span class="badge rounded-pill bg-danger">ditolak</span>
                                    @elseif($user->profile->id_approval == 1)
                                        <span class="badge rounded-pill bg-success">di-approve</span>
                                    @elseif($user->profile->id_approval == null && $user->profile->ktp_scan != null && $user->profile->ktp_selfie != null && $user->profile->kecamatan != null)
                                        <span class="badge rounded-pill bg-warning">menunggu</span>
                                    @elseif($user->profile->id_approval == null && $user->profile->ktp_scan == null && $user->profile->ktp_selfie == null)
                                        <span class="badge rounded-pill bg-warning">tidak-verified</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex">
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#lihatData{{ $user->id }}">Detail</a>
                                        <a href="/admin/userManagement/editUserData/{{ $user->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/admin/userManagement/destroy/{{ $user->id }}" class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    {{-- Pagination --}}
                                
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>


<!-- Popup Modal Lihat ID -->
    @foreach($users as $user)
        <div class="modal fade" id="lihatData{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true"> 
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data ID</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">NIK</th>
                                            
                                            <td>
                                                @if($user->profile->nik == null)
                                                    <span class="badge rounded-pill bg-danger">Belum melengkapi NIK</span>
                                                @else
                                                    {{$user->profile->nik}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NAMA</th>
                                            <td>{{$user->profile->ktp_name}}</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">TTL</th>
                                            <td>{{$user->profile->birthplace}}, {{date('d-m-Y', strtotime($user->profile->birthdate))}}</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">No HP</th>
                                            <td>{{$user->profile->phone}}</td>                                      
                                        </tr>
                                        <tr>
                                            <th scope="row">ALAMAT</th>
                                            <td>
                                                @if($user->profile->kecamatan == null)
                                                    <span class="badge rounded-pill bg-danger">Belum melengkapi alamat</span>
                                                @else
                                                   {{$user->profile->provinsi}}, {{$user->profile->kota}}, {{$user->profile->kecamatan}}, {{$user->profile->kelurahan}}, {{$user->profile->address_detail}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">PEKERJAAN</th>
                                            <td>
                                                @if($user->profile->job == null)
                                                    <span class="badge rounded-pill bg-danger">Belum melengkapi data pekerjaan</span>
                                                @else
                                                   {{$user->profile->job}}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>   
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                
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

    $('#dataTable').DataTable({
                columnDefs: [{
                    targets: 7,
                    render: function (data, type, row) {
                        data = data.replace(/<(?:.|\\n)*?>/gm, '');
                        if(type === 'display' && data.length > 90){
                            return data.substr(0, 90) + '…';
                        }else{
                            return data;
                        }
                    }
                }]
            });

</script>
@endsection