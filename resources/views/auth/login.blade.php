<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div class="container">
        <div class="text-center wd100P mgb20">
            <img src="{{ asset('/img/TheAngelite.png') }}">
            <span class="fs60 fc-red">THE ANGELITE</span>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default bd-rad10 bd0 box-shadow">
                    <div class="panel-heading bdtlr-rad10 bgc-maroon text-center fs25 fc-white">LOG IN TO YOUR ACCOUNT</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="col-md-8 col-md-offset-2 mgb20">                                
                                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="money-group box-shadow">
                                        <span class="money-icon"><i class="glyphicon glyphicon-user fc-gold"></i></span>
                                        <input id="email" type="email" class="form-control money-input bd-rad0 dp-bl" name="email" value="{{ old('email') }}" required placeholder="Username or Email Address" autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-2 mgb20">
                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="money-group box-shadow">
                                        <span class="money-icon"><i class="glyphicon glyphicon-lock fc-gold"></i></span>
                                        <input id="password" type="password" class="form-control money-input bd-rad0 dp-bl" name="password" value="{{ old('password') }}" required placeholder="Password">
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-2 mgb20 ">
                                <button type="submit" class="btn-red-o wd100P box-shadow">
                                    Sign In
                                </button>
                            </div>

                            <div class="col-md-8 col-md-offset-2 mgb20">
                                <div class="col-md-4 pdh0">
                                    <div class="checkbox">
                                        <label class="fs13 text-muted">
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-4 pdh0 pdt7">
                                    <a class="fs13 text-muted" href="{{ url('/password/reset') }}">
                                        Forgot Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
