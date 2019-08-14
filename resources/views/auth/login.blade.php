<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In &middot; Temur Kamilov Portfolio&middot;</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{ asset('admin/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/elephant.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/login-1.min.css') }}">
</head>
<body>
    <div class="login">
        <div class="login-body">
            <h3 class="login-heading">Sign in</h3>
            <div class="login-form">
                <form data-toggle="validator" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input id="email" class="form-control" type="text" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your username." value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="login-footer">
            <ul class="list-inline">
                <li>© Temur Kamilov 2019</li>
            </ul>
        </div>
    </div>
    <script src="{{ asset('admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/js/elephant.min.js') }}"></script>
  </body>
</html>