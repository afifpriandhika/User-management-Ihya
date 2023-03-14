    @extends('layouts.adminSidebar')

    @section('content')
    <div class="container">
        <center>
            <h2>Edit User Data</h2>
            <span>Settings and recommendations to help you keep your account secure</span>
        </center>
        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <div class="mt-3 rounded-lg bg-white shadow-lg p-5">
                    <form method="POST" action="/admin/userManagement/editUserData/{{$profiles->user_id}}">
                    {{ method_field('PUT') }}
                        @csrf
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
                        <hr>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-12 col-form-label">Provinsi</label>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="inputEmail3" name="provinsi" value="{{$profiles->provinsi}}">
                                <div id="emailHelp" class="form-text">Contoh : Jawa Timur</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-12 col-form-label">Kota/Kabupaten</label>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="inputEmail3" name="kota" value="{{$profiles->kota}}">
                                <div id="emailHelp" class="form-text">Contoh : Surabaya</div>
                            </div> 
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-12 col-form-label">Kecamatan</label>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="inputEmail3" name="kecamatan" value="{{$profiles->kecamatan}}">
                                <div id="emailHelp" class="form-text">Contoh : Gubeng</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-sm-12 col-form-label">Desa/Kelurahan</label>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" name="kelurahan" value="{{$profiles->kelurahan}}">
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
                        
                        <hr>
                        <div class="row">
                            <label class="col-md-3 col-sm-12 col-form-label">Role</label>
                            <div class="col-md-9 col-sm-12">
                                <select class="form-select" aria-label="Default select example"  name="role">
                                    @if($profiles->role == 0)
                                    <option value=>User</option>
                                    <option selected value="0" >Admin</option>
                                    @else
                                    <option selected value="2">User</option>
                                    <option value="0" >Admin</option>
                                    @endif
                                </select>
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
    </div>
    @endsection