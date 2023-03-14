@extends('layouts.sidebar')
@section('content')
<div class="container">
    @include('layouts.flash-message')
    <center>
        <h2>Proyek Donasi Telah Dibuat</h2>
    </center>
    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="mt-3 rounded-lg bg-white shadow-lg p-3">
                <h3>Daftar Proyek</h3>
                @if($projectsCount == 0)
                    <center>
                        <img src="{{asset('img/no_data.jpg')}}" alt="" width="350">
                    </center>
                @else
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama Proyek</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Target</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{$project->name}}</td>
                            <td>{{$project->batch_no}}</td>
                            <td>{{$project->type}}</td>
                            <td>{{$project->location}}</td>
                            <td>{{$project->target_nominal}} </td>
                            <td>{{$project->start_date}} </td>
                            <td>{{$project->end_date}} </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="http://charity.ihya-digital.online/funding/{{$project->proyek_id}}/batch/{{$project->id}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $projects->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection