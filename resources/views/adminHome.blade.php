@extends('layouts.adminSidebar')
@section('content')
    <div class="container">
        <center><h2>Welcome, {{Auth::user()->name}} !</h2></center>
        <!-- Earnings (Monthly) Card Example -->
        <div class="row mt-5">
            <div class="col-md-6 col-sm-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total User</div>
                                    {{$userCount}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Online User</div>
                                    {{$onlineUserCount}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row mt-3">
            <div class="col-md-4 col-sm-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Verified User</div>
                                    {{$verifiedUserCount}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Pending User</div>
                                    {{$pendingUserCount}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Not-Verified User</div>
                                    {{$notVerifiedUserCount}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="rounded-lg bg-white shadow-lg p-5">
                   <div class="col-md-10 offset-md-1">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <canvas id="canvas" height="140" width="300"></canvas>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script>
            var year = <?php echo $year; ?>;
            var user = <?php echo $user; ?>;
            var barChartData = {
                labels: year,
                datasets: [{
                    label: 'User',
                    backgroundColor: "#3a86ff",
                    data: user
                }]
            };
        
        
            window.onload = function() {
                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                                borderColor: '#c1c1c1',
                                borderSkipped: 'bottom'
                            }
                        },
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Monthly Registered User'
                        }
                    }
                });
            };
        </script>

        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <div class="mt-3 rounded-lg bg-white shadow-lg p-5">
                    <h4>Recent Users</h4>
                    <table class="table table-striped mt-5">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created At</th>
                        </thead>
                        <tbody>
                            @foreach($recentUsers as $recentUser)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{$recentUser->name}}</td>
                                <td>{{$recentUser->created_at->format('D, d M Y')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection