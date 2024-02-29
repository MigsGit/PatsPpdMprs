@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" id="test_id">
                <div class="row">
                    <h2 class="my-3">Dashboard</h2>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard d-none" id="users_tab_id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">Users</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa-solid fa-xl fa-users"></i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalUsers">0</h1>
                                <a href="{{ route('user_management') }}">View Users</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title-dashboard">Machines</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <span><i class="fa fa-wrench"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3" id="totalMachines">0</h1>
                                <a href="{{ route('machine_management') }}">View Machine Lists</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            function getDataForDashboard(){
                $.ajax({
                    url: "get_data_for_dashboard",
                    method: "get",
                    dataType: "json",
                    success: function(response){
                        // console.log('response ', response['totalUsers']);
                        $('#totalUsers').text(response['totalUsers']);
                        $('#totalMachines').text(response['totalMachines']);
                    },
                });
            }
            getDataForDashboard();
        });
    </script>
@endsection
