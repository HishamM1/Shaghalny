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
                    <h2>Find the Best Jobs in Egypt</h2>
                    <ul class="advantages">
                        <li><i class="fa-solid fa-circle-check"></i> <span>Apply for jobs
                                easily</span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Receive alerts
                                for the best jobs</span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Get discovered
                                by top companies</span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span>Explore the
                                right jobs & career opportunities</span></li>
                    </ul>
                    <h2>Trusted by over 25,000 companies</h2>
                </div>
                <div class="right">
                    <form action="" class="signupform">
                        <p>Sign Up and Start Applying For Jobs</p>
                        <div class="firstName">
                            <label for="firstName">First Name</label>
                            <input type="text" required />
                        </div>
                        <div class="lastName">
                            <label for="lastName">Last Name</label>
                            <input type="text" required />
                        </div>
                        <div class="email">
                            <label for="Email">Email</label>
                            <input type="email" required />
                        </div>
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" id="password" required />
                            <i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i>
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
