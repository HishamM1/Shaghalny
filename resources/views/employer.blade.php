<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- GoogleFonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,700&display=swap"
        rel="stylesheet" />
    <!-- Font Awesome Library -->
    <script src="https://kit.fontawesome.com/ccfa29ce82.js" crossorigin="anonymous"></script>
    <!-- Global Css -->
    <link rel="stylesheet" href="/styles/global.css" />
    <!-- Css -->
    <link rel="stylesheet" href="/styles/signup.css" />
    <title>Sign Up</title>
</head>

<body>
    <div class="signup">
        <div class="signupContainer">
            <div class="logoContainer">
                <a href="/" class="logo">Shaghalny</a>
            </div>
            <div class="content">
                <div class="left">
                    <h2>Join 25,000+ Companies Hiring Top Talent Through WUZZUF</h2>
                    <ul class="advantages">
                        <li><i class="fa-solid fa-circle-check"></i> <span>Reach 2,000,000+ qualified candidates.</span>
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Easily post professionally written
                                jobs.</span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Hire top talent faster and smarter.</span>
                        </li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Get personalized recruitment support.</span>
                        </li>
                    </ul>
                    <h2>Trusted by over 25,000 companies</h2>
                </div>
                <div class="right">
                    <form method="POST" action="/employer" class="signupform">
                        @csrf
                        <p>Create a Company Account to Start Hiring Now</p>
                        <div class="firstName">
                            <label for="firstName">Company Name</label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}" required />
                            @error('company_name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="lastName">
                            <label for="lastName">Industry</label>
                            <input type="text" name="industry" value="{{ old('industry') }}" required />
                            @error('industry')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="lastName">
                            <label for="lastName">Company Description</label>
                            <input type="text" name="company_description" value="{{ old('company_description') }}"
                                required />
                            @error('company_description')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="lastName">
                            <label for="lastName">Location</label>
                            <input type="text" name="location" value="{{ old('location') }}" required />
                            @error('location')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="email">
                            <label for="Email">Company Email</label>
                            <input type="text" name="company_email" value="{{ old('company_email') }}" required />
                            @error('company_email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required />
                            <i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i>
                            @error('password')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="signUpBtn btn" type="submit">Sign Up</button>
                        <div class="terms">By signing up, you agree to our <a>Terms and
                                Conditions</a></div>
                        <hr>
                        <div class="footer">Already on Shaghalny? <a href="/login" class="joinNowBtn">Sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/scripts/main.js"></script>
</body>

</html>
