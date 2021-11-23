<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="javascript:void(0);">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('facility.index') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event.index') }}">Daftar Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('regulation.index') }}">Peraturan</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="btn btn-sm btn-outline-light nav-btn" href="{{ route('login') }}">Login</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                        <i class="fas fa-user-circle ml-2"></i>
                    </a>
                    <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header"><strong>{{ Auth::user()->registration_number }}</strong></h6>
                        @if( Auth::user()->hasRole('Mahasiswa') && Auth::user()->faculty )
                        <h6 class="dropdown-header pt-0"><small>{{ Auth::user()->faculty }}</small></h6>
                        @endif
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>