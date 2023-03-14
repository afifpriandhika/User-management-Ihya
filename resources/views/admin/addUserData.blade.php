@extends('layouts.adminSidebar')

@section('content')
<div class="container">
    <center>
        <h2>Add User Data</h2>
        {{-- <span>Settings and recommendations to help you keep your account secure</span> --}}
    </center>
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-5">
                <form method="POST" action="{{route('storeUser')}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-floating mt-3 mb-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" id="floatingInput" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">E-mail</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name" required>
                                <label for="floatingInput">Nama</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Tempat Lahir" required name = "birthplace">
                                <label for="floatingInput">Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="floatingInput" required name="birthdate">
                                <label for="floatingInput">Tanggal Lahir</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput" onkeypress="return onlyNumberKey(event)" maxlength="13" placeholder="Nomor HP" required name="phone">
                                <label for="floatingInput">Nomor HP</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <select class="form-select" aria-label="Default select example"  name="role">
                                <option selected>--- Pilih Role ---</option>
                                <option value="2">User (Investor/Business Owner/Donatur/Penggalang Dana</option>
                                <option value="0" >Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection