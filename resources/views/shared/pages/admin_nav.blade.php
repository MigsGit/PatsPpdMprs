
<aside class="main-sidebar sidebar-dark-navy elevation-4" style="height: 100vh">

    <!-- System title and logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
    {{-- <a href="" class="brand-link text-center"> --}}
        {{-- <img src="{{ asset('public/images/pricon_logo2.png') }}" --}}
        <img src=""
            class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light font-size"><h5>MPRS</h5></span>
    </a> <!-- System title and logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item has-treeview">
                    <a href="{{ url('../RapidX') }}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>Return to RapidX</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header font-weight-bold" id="machine_parameter_id"><i class="fa-solid fa-cogs"></i>&nbsp;&nbsp;Injection Machine Data</li>
                <li class="nav-item has-treeview">
                        <a href="{{ route('injection_machine_data') }}" class="nav-link">
                        <i class="fa-solid fa-solid fa-gauge-high"></i>
                        <p>Machine Parameter</p>
                    </a>
                </li>
                <li class="nav-header font-weight-bold d-none" id="user_management_id"> <i class="fa-solid fa-cogs"></i>&nbsp;&nbsp;User & Machine
                    Management</li>
                <li class="nav-item has-treeview d-none" id="user_settings_id">
                        <a href="{{ route('user_management') }}" class="nav-link">
                            {{-- <i class="fa-solid fa-cogs"></i> --}}
                            <i class="fas fa-users"></i>
                            <p>User Settings</p>
                        </a>
                </li>

                <li class="nav-item has-treeview d-none" id="machine_settings_id">
                    <a href="{{ route('machine_management') }}" class="nav-link">
                        {{-- <i class="fa-solid fa-cogs"></i> --}}
                        <i class="fa fa-wrench"></i>
                        <p>Machine Settings</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>