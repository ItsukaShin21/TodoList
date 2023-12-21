<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/loginPage.css') }}">
    <script src={{ asset('scripts/jquery.js') }}></script>
    <script src={{ asset('scripts/login.js') }}></script>
    <title>TODO LIST | Login</title>
</head>
<body>
    @if(session('success'))
    <div class="success-message">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    @if(isset($error))
    <div class="error-message">
        <p>{{ $error }}</p>
    </div>
    @elseif(isset($success))
    <div class="success-message">
        <p>{{ $success }}</p>
    </div>
    @endif
    
    <div class="mainContent">
        <h1>LOGIN</h1>
        <form method="POST">
            @csrf
                <label>Username</label>
                    <input type="text" name="name" class="loginInput" id="name" required>
                <label>Password</label>
                    <input type="password" name="password" class="loginInput" id="password" required>
                <input type="submit" name="loginBtn" class="loginButton" id="loginBtn" value="LOGIN">
        </form>
        <div class="registerRoute">
            <p>You don't have an account?</p>
            <a href="{{ route('register') }}" name="registerBtn" class="registerButton" id="registerBtn">Register</a>
        </div>

    </div>

    <footer>
        <p>All rights reserve 2023</p>
    </footer>

</body>
</html>