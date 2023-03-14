@extends ('layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center mt-5">
        <div class="w-50 bg-white shadow-lg rounded-lg p-5">
            <center><h2>Update Basic Info</h2></center>
            <form method="post" action="/profile/updateIdentity/{{Auth::user()->id}}" class="mt-5" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">NIK</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="nik" value="{{$profiles->nik}}" onkeypress="return onlyNumberKey(event)" min="16" maxlength="16" required>
                        <div id="emailHelp" class="form-text">NIK terdiri dari 16 dikit angka yang terdapat pada KTP</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Foto KTP</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="file" class="form-control" name="ktp">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-3 col-sm-12 col-form-label">Foto Selfie KTP</label>
                    <div class="col-md-9 col-sm-12">
                        <input type="file" class="form-control" name="selfie_ktp">
                    </div>
                </div>

                <div class="row">
                    <div class="col d-flex justify-content-end mt-5">
                        <a class="btn btn-primary" data-toggle="modal" data-target="#updateModal">
                            {{ __('Update') }}
                        </a>
                    </div>
                </div>
                <!-- Popup Modal confirmation update -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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