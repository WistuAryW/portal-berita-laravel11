@extends('dashboard.main')
@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        </script>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    @auth
        @if (Auth::user()->role == 'admin')
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->

            
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <a style="text-decoration: none" href="{{ url('post') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-2xl font-weight-bold text-danger text-uppercase mb-1">
                                            Data Artikel</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $post }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-area fa-2x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <a style="text-decoration: none" href="{{ url('categories') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-2xl font-weight-bold text-success text-uppercase mb-1">
                                            Data Categorie</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-area fa-2x text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <a style="text-decoration: none" href="{{ url('subcategorie') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-2xl font-weight-bold text-info text-uppercase mb-1">
                                            Sub Categorie</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subCategorie }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-area fa-2x text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <a style="text-decoration: none" href="{{ url('user') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-2xl font-weight-bold text-warning text-uppercase mb-1">
                                            Data User</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <a class="btn" href="{{ url('post') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="h6 text-xs text-start font-weight-bold text-secondary text-uppercase mb-1">
                                            Data Artikel
                                        </div>
                                    </div>
                                    <div class="col-auto  mx-3">
                                        <i class="fas fa-heart fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <a class="btn" href="{{ url('categories') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="h6 text-xs text-start font-weight-bold text-primary text-uppercase mb-1">
                                            Data Category
                                        </div>
                                    </div>
                                    <div class="col-auto  mx-3">
                                        <i class="fas fa-chart-area fa-2x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <a class="btn" href="{{ url('profile') }}">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="h6 text-xs text-start font-weight-bold text-warning text-uppercase mb-1">
                                            Data Profile
                                        </div>
                                    </div>
                                    <div class="col-auto  mx-3">
                                        <i class="fas fa-user fa-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endauth


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Content Row -->
@endsection
