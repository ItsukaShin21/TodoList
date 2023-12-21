<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ 'css/registerPage.css' }}">
    <script src="{{ asset('scripts/jquery.js') }}"></script>
    <script src="{{ asset('scripts/register.js') }}"></script>
    <title>TODO LIST | Register</title>
</head>
<body>

    <div class="mainContent">
        <h1>REGISTER</h1>
        <form method="POST">
            @csrf
            <label>Username</label>
            @error('name')
            <div class="message">
                <p>{{ $message }}</p>
            </div>
            @enderror
                <input type="text" name="name" class="registerInput" id="name" required>

            <label>Email</label>
            @error('email')
            <div class="message">
                <p>{{ $message }}</p>
            </div>
            @enderror
                <input type="email" name="email" class="registerInput" id="email" required>

            <label>Password</label>
            @error('password')
            <div class="message">
                <p>{{ $message }}</p>
            </div>
            @enderror
                <input type="password" name="password" class="registerInput" id="password" required>
            <input type="submit" name="registerBtn" class="registerButton" id="registerBtn">
        </form>
        <div class="loginRoute">
            <p>Already have an account?</p>
            <a href="{{ route('login') }}">LOGIN</a>
        </div>
    </div>

    <footer>
        <p>All rights reserve 2023</p>
    </footer>
</body>
</html>