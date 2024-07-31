<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex " href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-1 ">AZ News</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @auth
        @if (Auth::user()->role == 'admin')
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link
                " href="{{ url('post') }}">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>Data Artikel</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Category</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('subcategorie') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Sub Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('user') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data User</span>
                </a>
            </li>
        @else
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('post') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Artikel</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Category</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ url('profile') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Profile</span>
                </a>
            </li>
        @endif
    @endauth
    <!-- Nav Item - Charts -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
