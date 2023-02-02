<nav class="sb-topnav navbar navbar-expand navbar-dark bg-light text-white"
    style="background-image: linear-gradient(to right,#1358a7,
 #191839, #0680c6, #273871, #0473bc, #2b4388, #2c2c64, #23345b, #2c3c94);">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">Dashboard</a>

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                {{-- <i class="fas fa-user fa-fw"></i> --}}
                <img src="{{ asset('images/users/' . Auth::user()->picture) }}" class="rounded-circle" height="30px"
                    width="30px" alt="{{ Auth::user()->name }}">
                {{ auth()->user()->name ?? '' }}
                <br/>
                {{ auth()->user()->uuid ?? '' }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                {{-- <li><a class="dropdown-item" href="{{ route('profiles')}}">Profiles</a></li> --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout</a>

                    </form>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-bell"></i> Notifications</a></li>


            </ul>
        </li>
    </ul>
</nav>
