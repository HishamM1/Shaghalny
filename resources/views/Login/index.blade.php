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
<style>
    .error {
        color: red;
        font-size: 12px;
    }
</style>

<body>
    <div class="login">
        <div class="loginContainer">
            <div class="logoContainer">
                <a href="{{route('dashboard.index')}}" class="logo">Shaghalny</a>
            </div>
            <form method="POST" action="/login" class="loginForm">
                @csrf
                <p>Welcome Back</p>
                @error('loginerror')
                    <span class="error">{{ $message }}</span>
                @enderror
                <div class="email">
                    <label for="Email">Email</label>
                    <input name="company_email" type="email" placeholder="Email" value="{{ old('company_email') }}"
                        required />
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <input name="password" type="password" placeholder="Password" id="password" required />
                    <i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i>
                </div>

                <button class="signInBtn btn" type="submit">Sign in</button>
                <div class="forgotBtn">
                    <a href="#">Forgot password?</a>
                </div>
                <hr>
                <div class="footer">New to Shaghalny? <a href="{{route('register.create')}}" class="joinNowBtn">Join Now</a></div>
            </form>
        </div>
    </div>
    <script src="scripts/main.js"></script>
</body>

</html>
