@extends('layouts.app')

@section('content')
<div class="login-box">
        <div class="login-logo">
          <a href="../../index2.html"><b>My</b>BLOG</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>
      
          <form method="POST" action="{{ route('login') }}">
              @csrf

            <div class="form-group has-feedback">
              <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
              <span class="fa fa-envelope form-control-feedback"></span>
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
              <span class="fa fa-lock form-control-feedback"></span>
              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" name="remember"> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
      
          <br>
          <a href="{{ route('password.request') }}">I forgot my password</a><br>
      
        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->
@endsection