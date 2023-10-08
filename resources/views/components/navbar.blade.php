        <!-- Start NavBar -->
        <div class="navbar">
            <div class="container">
                <div class="logoContainer">
                    <a href="/" class="logo">Shaghalny</a>
                </div>
                @guest
                    <ul class="links">
                        <a href="/login">
                            <li class="btn btn-danger">Login</li>
                        </a>
                        <a href="{{route("register.create")}}">
                            <li class="btn btn-darkBlue">Employer?</li>
                        </a>
                    </ul>
                    <button class="toggle-menu"><i class="fa-solid fa-bars"></i></button>
                @else
                    <ul class="links">
                        <a href="{{route('dashboard.index')}}">
                            <li class="btn btn-darkBlue">Dashboard</li>
                        </a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form>

                    </ul>
                    <button class="toggle-menu"><i class="fa-solid fa-bars"></i></button>
                @endguest
            </div>
        </div>
        <!-- End NavBar -->
