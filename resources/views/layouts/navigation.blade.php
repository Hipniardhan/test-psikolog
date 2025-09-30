<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-3">
  <div class="container-fluid">
    <a class="navbar-brand fw-semibold" href="/">{{ config('app.name','Laravel') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
            @if(auth()->user()->role==='admin')
                <li class="nav-item"><a class="nav-link {{ request()->is('admin*')?'active':'' }}" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
            @else
                <li class="nav-item"><a class="nav-link {{ request()->is('tes/kepribadian*')?'active':'' }}" href="/tes/kepribadian">Tes Kepribadian</a></li>
            @endif
        @endauth
      </ul>
      <ul class="navbar-nav ms-auto">
        @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @endguest
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="px-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
            <li class="nav-item ms-2 d-none d-lg-block">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            </li>
            <li class="nav-item d-lg-none">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="nav-link btn btn-link">Logout</button>
                </form>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
