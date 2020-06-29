<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">

    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;400;700;900&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body>

    <div class="wrapper-login">
        <!-- Heading Start -->
        <div class="heading">
            <h1>Sistem Penggajian Karyawan</h1>
            <h2>silakan masukkan username dan password Anda !</h2>
        </div>
        <!-- Heading End -->
        <!-- Form Start -->
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <div class="form-group">
                <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="username" required>
                <span><i class="fa fa-user" aria-hidden="true"></i></span>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password" required>
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="checkbox text-left">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> <label for="remember">
                    <p>{{ __('Remember Me') }}</p>
                </label>
            </div>
            <button type="submit" class="btn btn-login">Masuk</button>
        </form>
        <!-- Form End -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32oNMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>