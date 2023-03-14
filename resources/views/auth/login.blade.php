@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center min-vh-100 ">
        <div class="row w-50 bg-white shadow-lg rounded-lg p-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="py-4"></div>
                    <img class="img-fluid w-50 mx-auto d-block mt-5" src="{{ asset('img/logo.png') }}" alt="">
                </div>
            <div class="col-md-6 col-sm-12 ">
                <center><h3><b>Login</b></h3></center>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3 mt-5">
                        <input id="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror"  placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-grid mx-auto mt-4">
                        <button class="btn btn-primary rounded-pill" type="submit">Login</button>
                    </div>
                </form>
                <hr>
                <center><p>dont have any account?</p></center>
                <div class="d-grid mx-auto">
                    <a type="button" href="{{ route('register') }}" class="btn btn-outline-success rounded-pill">Register</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection