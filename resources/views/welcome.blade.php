<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ URL::asset('assets/css/login.css') }}">
        <title>SI Sidang TEDC</title>
    </head>
    <body>
        @if (session()->has('loginError'))
            <div>{{ session('loginError') }}</div>
        @endif
        <div class="center">
            <h1>Login</h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="txt_field">
                    <input type="text" name="username" id="username" required class="@error('username') is-invalid @enderror" value="{{ old('username') }}">
                    <span></span>
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="txt_field">
                    <input type="password" name="password" id="password" required>
                    <span></span>
                    <label for="password">Password</label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
</html>