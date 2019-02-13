@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h1 class="text-center">Register Your App</h1>

                <div class="panel-body">
                    <!-- <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form> -->
                </div>
            </div>
        </div>
    </div>

    <!--Shopify-->
    <div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h3>Create a new account</h3>
                    <p class="text-muted">Get our 30-day free trial and start increasing your sales today</p>
                </div>
                <hr class="mb-4">
                <form method="GET" action=" login/shopify" aria-label="{{ __('Register') }}">
                    <div class="form-group">
                        <label for="domain">Domain</label>

                        <div class="input-group mb-3">
                            <input id="domain" type="text" class="form-control{{ $errors->has('domain') ? ' is-invalid' : '' }}" name="domain" value="{{ old('domain') }}" placeholder="yourshop" aria-describedby="myshopify" required autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text" id="myshopify">.myshopify.com</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Continue</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-3">
           <!--  <p class="text-center text-muted">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p> -->
        </div>
    </div>
</div>
</div>
@endsection
