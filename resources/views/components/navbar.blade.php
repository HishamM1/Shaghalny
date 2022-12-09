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
                        <a href="/employer">
                            <li class="btn btn-darkBlue">Employer?</li>
                        </a>
                    </ul>
                    <button class="toggle-menu"><i class="fa-solid fa-bars"></i></button>
                @else
                    <span>Welcome, {{ auth()->user()->company_name }}!</span>
                    <ul class="links">
                        <a href="/dashboard">
                            <li class="btn btn-darkBlue">Dashboard</li>
                        </a>
                        <a href="/logout">
                            <li class="btn btn-danger">Log out</li>
                        </a>

                    </ul>
                    <button class="toggle-menu"><i class="fa-solid fa-bars"></i></button>
                @endguest
            </div>
        </div>
        <!-- End NavBar -->
