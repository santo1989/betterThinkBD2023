<header class="nav-header"
    style="background-image: linear-gradient(to right,#1358a7,
 #191839, #0680c6, #273871, #0473bc, #2b4388, #2c2c64, #23345b, #2c3c94);">
    <div class="navvv">

        <img src="{{ asset('ui/frontend/images/assets/logo.jpg') }}" alt="" heigt=50px; width=60px;
            class="logo-image rounded">

        <div class="logo"><a href="{{ route('index') }} "class="text-white text-decoration-none"><strong>Better Think
                    BD</strong></a></div>
    

    </div>
    <div class="tranzit">
        <div class="line"> </div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <nav class="bla-bar">

        <ul>
            <li>
                   {{-- search button  --}}
                  <!-- The form -->
<form class="example pt-2" action="{{ route('product_search') }}" style="margin:auto;max-width:auto;">
  <input type="text" placeholder="Search.." name="search2" required>
  <button type="submit"><i class="fa fa-search"></i></button>
</form>



            </li>
            <li>
                <a href="{{ route('index') }}"><strong>Home</strong></a>
            </li>
            <li>
                <a href="{{ route('services') }}"><strong>Services</strong></a>
            </li>
            <li>
                <a href="{{ route('about') }}"><strong>About Us</strong></a>
            </li>
            <li>
                <a href="{{ route('contactUS') }}"><strong>Contact Us</strong></a>
            </li>
            <li>
                <a href="{{ route('blogs') }}"><strong>Blog</strong></a>
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
    <script>
tranzit = document.querySelector(".tranzit");
    tranzit.onclick = function() {
        navBar = document.querySelector(".bla-bar");
        navBar.classList.toggle("active");
    }
        </script>
</header>

<style>
 body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
} 




</style>
