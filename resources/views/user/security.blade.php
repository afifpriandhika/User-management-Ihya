@extends('layouts.sidebar')

@section('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2>Security</h2>
        <span>Settings and recommendations to help you keep your account secure</span>
    </center>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-5">
                <h3>Recent Activity in your account</h3>
                <table class="table mt-5">
                    <tbody>
                        <tr>
                            <th scope="row">Created at</th>
                            <td>{{Auth::user()->created_at}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Terakhir diupdate</th>
                            <td>{{Auth::user()->updated_at}}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/security/updatePassword/{{Auth::user()->id}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row g-3 align-items-center">
                            <div class="col-3">
                                <label for="inputPassword6" class="col-form-label">Password Baru</label>
                            </div>
                            <div class="col-auto">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                    Must be 8-20 characters long.
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2 g-3 align-items-center">
                            <div class="col-3">
                                <label for="inputPassword6" class="col-form-label">Konfirmasi Password</label>
                            </div>
                            <div class="col-auto">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection