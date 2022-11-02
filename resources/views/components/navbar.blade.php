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
                @else
                    <span>Welcome, {{ auth()->user()->company_name }}!</span>
                    <form method="post"action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-danger">Log Out</button>
                    </form>
                @endguest
            </div>
        </div>
        <!-- End NavBar -->
