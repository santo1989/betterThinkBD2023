
<header class="nav-header" style="background-image: linear-gradient(to right,#1358a7,
 #191839, #0680c6, #273871, #0473bc, #2b4388, #2c2c64, #23345b, #2c3c94);">
    <div class="navvv">

        <img src="{{ asset('ui/frontend/images/assets/logo.jpg') }}" alt="" heigt=50px; width=60px;
            class="logo-image rounded" >

        <div class="logo"><a
                href="# "class="text-white text-decoration-none"><strong>Better Think BD</strong></a></div>

    </div>
    <div class="tranzit">
        <div class="line"> </div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <nav class="bla-bar pt-3">

        <ul>
            <li>
                <a href="#"><strong>Home</strong></a>
            </li>
            <li>
                <a href="#"><strong>Services</strong></a>
            </li>
            <li>
                <a href="#"><strong>About Us</strong></a>
            </li>
            <li>
                <a href="#"><strong>Blog</strong></a>
            </li>
            @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ url('/home') }}">Dashboard</a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}">Log in</a>
                    </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        <li>
                        @endif
                    @endauth
            @endif

            {{-- @if (Session::has('user'))
                <li>
                    <a href="#"><strong>Dashboard</strong></a>
                </li>
                <li>
                    <form method="POST" action="{{ route('user_logout') }}">
                        @csrf
                        <a class="dropdown-item"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();"><strong>Logout</strong></a>

                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('user_login') }}"><strong>Login</strong></a>
                </li>
            @endif --}}
        </ul>

    </nav>
</header>
