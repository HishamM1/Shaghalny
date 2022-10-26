<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome Library -->
    <script src="https://kit.fontawesome.com/ccfa29ce82.js" crossorigin="anonymous"></script>
    <!-- Global Css -->
    <link rel="stylesheet" href="/styles/global.css">
    <!-- Css -->
    <link rel="stylesheet" href="/styles/login.css" />
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div class="loginContainer">
            <div class="logoContainer">
                <a href="/" class="logo">Shaghalny</a>
            </div>
            <form action="" class="loginForm">
                <p>Welcome Back</p>
                <div class="email">
                    <label for="Email">Email</label>
                    <input type="email" placeholder="Email" />
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" id="password" />
                    <i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i>
                </div>
                <button class="signInBtn btn" type="submit">Sign in</button>
                <div class="forgotBtn">
                    <a href="#">Forgot password?</a>
                </div>
                <hr>
                <div class="footer">New to Shaghalny? <a href="/employer" class="joinNowBtn">Join Now</a></div>
            </form>
        </div>
    </div>
    <script src="scripts/main.js"></script>
</body>

</html>
