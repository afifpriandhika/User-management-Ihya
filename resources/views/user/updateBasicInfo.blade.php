@extends ('layouts.sidebar')
{{-- @include('layouts.flash-message') --}}
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center mt-5">
        <div class="w-75 bg-white shadow-lg rounded-lg p-5">
            <center><h2>Update Basic Info</h2></center>
            <form method="post" action="/profile/updateBasicInfo/{{Auth::user()->id}}" class="mt-3" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="alert alert-warning mt-3" role="alert">
                    PERHATIAN : pastikan data identitas yang anda masukkan telah sesuai dengan KTP
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Nama</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$profiles->ktp_name}}">
                        <div id="emailHelp" class="form-text">Pastikan nama sama dengan yang terdapat pada KTP</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Tempat Lahir</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="birthplace" value="{{$profiles->birthplace}}">
                        <div id="emailHelp" class="form-text">Pastikan data sama dengan yang terdapat pada KTP. Contoh : Jakarta</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="date" class="form-control" id="inputEmail3" name="birthdate" value="{{ date('Y-m-d',strtotime($profiles->birthdate)) }}">
                        <div id="emailHelp" class="form-text">Pastikan data sama dengan yang terdapat pada KTP</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Sosial Media</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="social_media" value="{{ $profiles->social_media}}">
                        <div id="emailHelp" class="form-text">Contoh : Instagram/Facebook/Twitter/dsb</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Link Sosial Media</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="social_link" value="{{ $profiles->social_link }}">
                        <div id="emailHelp" class="form-text">Contoh : www.instagram/abcda</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Foto Profil</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="file" class="form-control" name="profile_image">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Provinsi</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="provinsi" value="{{$profiles->provinsi}}" required>
                        <div id="emailHelp" class="form-text">Contoh : Jawa Timur</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Kota/Kabupaten</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="kota" value="{{$profiles->kota}}" required>
                        <div id="emailHelp" class="form-text">Contoh : Surabaya</div>
                    </div> 
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Kecamatan</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" id="inputEmail3" name="kecamatan" value="{{$profiles->kecamatan}}" required>
                        <div id="emailHelp" class="form-text">Contoh : Gubeng</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Desa/Kelurahan</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="kelurahan" value="{{$profiles->kelurahan}}" required>
                        <div id="emailHelp" class="form-text">Contoh : Gubeng</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Detail Alamat</label>
                    <div class="col-md-9 col-sm-12">
                        <textarea type="text" class="form-control" name="address_detail">{{$profiles->address_detail}}</textarea>
                        <div id="emailHelp" class="form-text">Tulis Detail alamat yang belum ada di form sebelumnya. Contoh : RT, RW, Nomor, Kode Pos</div>
                    </div>
                </div>
                
                <hr>
                
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Pekerjaan</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="job" value="{{$profiles->job}}">
                        <div id="emailHelp" class="form-text">Contoh : Pegawai Swasta</div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Detail Pekerjaan</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="job_detail" value="{{$profiles->job_detail}}">
                        <div id="emailHelp" class="form-text">Contoh : PT. Telkom Indoneisa</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col d-flex justify-content-end mt-3">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#updateModal">
                            {{ __('Update') }}
                        </a>
                    </div>
                </div>
                
                <!-- Popup Modal confirmation update -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Data?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah Anda yakin ingin mengubah data ? </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of popup modal -->
            </form>
        </div>
    </div>
</div>
@endsection