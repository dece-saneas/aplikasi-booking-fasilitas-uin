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
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('fasilitas.index') }}">Fasilitas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('regulation.index') }}">Peraturan</a>
                </li>

                <!-- Profile & Login -->
                @guest
                <li class="nav-item">
                    <a class="btn btn-sm btn-light nav-btn btn-login" href="{{ route('login') }}">Login</a>
                </li>
                @else
                <li class="nav-item dropdown ml-lg-4 mt-4 mt-lg-0">
                    <a href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/profile-placeholder.jpg') }}" alt="img-profile" class="img-profile img-circle" style="opacity: .8">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">
                            <strong>{{ Auth::user()->name }}</strong><br>
                            @if( Auth::user()->hasRole('Mahasiswa') && Auth::user()->faculty )
                            <small>{{ Auth::user()->faculty }} /</small>
                            @endif
                            <small>{{ Auth::user()->registration_number }}</small>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item text-muted" href="javascript:void(0);" onclick="event.preventDefault(); this.closest('form').submit();">Logout<i class="fas fa-sign-out-alt ml-2"></i></a>
                        </form>
                    </div>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>