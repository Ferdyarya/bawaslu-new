<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/dashboard" class="brand-link">
    <img src="{{ asset('img/cropped-logo_5e7c48724a6631.png')}}" alt="Bawaslu Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-bold">BAWASLU</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/default-avatar-profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @if (Auth::guard('web')->check())
        <a href="/dashboard" class="d-block">{{Auth::guard('web')->user()->name}} </a>
        @endif
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
--}}
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="/dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if(Auth::guard('web')->user()->role === 'admin')
            <li class="nav-item">
              <a href="{{ route('staf.index') }}" class="nav-link">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>Staff</p>
              </a>
            </li>
            @endif
            @if(Auth::guard('web')->user()->role === 'admin')
            <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            @endif
            @if(Auth::guard('web')->user()->role === 'supervisor')
            <li class="nav-item">
              <a href="{{ route('staf.index') }}" class="nav-link">
                <i class="fa fa-user-plus nav-icon"></i>
                <p>Staff</p>
              </a>
            </li>
            @endif
            @if(Auth::guard('web')->user()->role === 'supervisor')
            <li class="nav-item">
              <a href="{{ route('petugas.index') }}" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Petugas Lapangan</p>
              </a>
            </li>
            @endif
            @if(Auth::guard('web')->user()->role === 'admin')
            <li class="nav-item">
              <a href="{{ route('petugas.index') }}" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Petugas Lapangan</p>
              </a>
            </li>
            @endif
            @if(Auth::guard('web')->user()->role === 'staff')
            <li class="nav-item">
              <a href="{{ route('petugas.index') }}" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Petugas Lapangan</p>
              </a>
            </li>
            @endif
            {{-- <li class="nav-item">
              <a href="./index3.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p> --}}
              </a>
            </li>
          </ul>
        </li>
        @if(Auth::guard('web')->user()->role === 'admin')
        <li class="nav-header">Surat</li>
        <li class="nav-item">
          <a href="{{ route('surattugas.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Surat Tugas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('suratpenugasan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Surat Penugasan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('penerimaan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Penerimaan Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('evaluasi.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Evaluasi Pelaksanaan
            </p>
          </a>
        </li>
        @endif
        @if(Auth::guard('web')->user()->role === 'supervisor')
        <li class="nav-item">
          <a href="{{ route('suratpenugasan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Surat Penugasan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('penerimaan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Penerimaan Laporan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('evaluasi.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Evaluasi Pelaksanaan
            </p>
          </a>
        </li>
        @endif

        @if(Auth::guard('web')->user()->role === 'staff')
        <li class="nav-item">
          <a href="{{ route('suratpenugasan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Surat Penugasan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('penerimaan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Penerimaan Laporan
            </p>
          </a>
        </li>
        @endif

        @if(Auth::guard('web')->user()->role === 'user')
        <li class="nav-item">
          <a href="{{ route('suratpenugasan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Surat Penugasan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('penerimaan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Penerimaan Laporan
            </p>
          </a>
        </li>
    @endif

        @if(Auth::guard('web')->user()->role === 'admin')
        <li class="nav-header">Report</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/laporan/lp-surattugas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Surat Tugas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/laporan/lp-suratpenugasan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Surat Penugasan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/laporan/lp-penerimaan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Penerimaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/laporan/lp-evaluasi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Evaluasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/laporan/lp-performa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Peforma Petugas</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); ">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>Log Out</p>
                    <!-- {{ __('Log Out') }} -->
                </a>
            </div>
        </form>
      </li>
       {{--  <li class="nav-item">
          <a href="https://adminlte.io/docs/3.1/" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Documentation</p>
          </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Informational</p>
          </a>
        </li> --}}

      </ul>
    </nav>


    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
