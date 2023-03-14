@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center min-vh-100 ">
        <div class="w-50 bg-white shadow-lg rounded-lg p-5">
            <center><h3><b>Register</b></h3></center>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating mb-3 mt-5">
                                    <input type="text" class="form-control rounded-pill" id="floatingInput" placeholder="name" name="name" required>
                                    <label for="floatingInput">Nama</label>
                                    <div id="emailHelp" class="form-text">Pastikan nama sama dengan yang terdapat pada KTP</div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" id="floatingInput" placeholder="name@example.com" name="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">E-mail</label>
                                    <div id="emailHelp" class="form-text">Pastikan menggunakan email yang terdaftar. Contoh : abcd@gmail.com</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control rounded-pill" id="floatingInput" onkeypress="return onlyNumberKey(event)" maxlength="13" placeholder="Nomor HP" required name="phone">
                                    <label for="floatingInput">Nomor HP</label>
                                    <div id="emailHelp" class="form-text">Contoh : 081234567890</div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="floatingInput" placeholder="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">buat password</label>
                                    <div id="emailHelp" class="form-text">Password minimal terdiri dari 8 karakter</div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control rounded-pill" name="password_confirmation" required autocomplete="new-password" id="floatingInput" placeholder="password">
                                    <label for="floatingInput">ketik ulang password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary rounded-pill">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                <center><span>Sudah memiliki akun Ihya? </span><a href="{{route ('login') }}"> Login</a></center>
            </form>
            
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