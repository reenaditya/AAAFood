@extends('layouts.guest')
@section('content')
  <div class="inner-wrapper">
    <div class="container-fluid no-padding">
      <div class="row no-gutters overflow-auto">
        <div class="col-md-6">
          <div class="main-banner" style="height: 100vh;">
            <img src="assets/img/banner/banner-1.jpg" class="img-fluid full-width main-img" alt="banner">
            
            <img src="assets/img/banner/burger.png" class="footer-img" alt="footer-img">
          </div>
        </div>
        <div class="col-md-6">
          <div class="section-2 user-page main-padding">
            <div class="login-sec">
              <div class="login-box">
                  	<form method="POST" action="{{ route('login') }}">
                  		@csrf
                  		<h4 class="text-light-black fw-600">Sign in with your Food Delivery account</h4>
                  	<div class="row">
                    <div class="col-12">
                    
                    
                      <div class="form-group">
                        <label class="text-light-white fs-14">Email</label>
                        <input type="email" name="email" class="form-control form-control-submit" value="{{old('email')}}" placeholder="Email I'd" required>
                        @error('email')
                        	<span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="text-light-white fs-14">Password</label>
                        <input type="password" id="password-field" name="password" class="form-control form-control-submit" value="" placeholder="Password" required>
                        <div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                        @error('password')
                        <span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                      <div class="form-group checkbox-reset">
                        <label class="custom-checkbox mb-0">
                          <input type="checkbox" name="remember"> <span class="checkmark"></span> Keep me signed in</label> <a href="{{ route('password.request') }}">Reset password</a>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn-second btn-submit full-width">
                         Sign in</button>
                      </div>
                      <div class="form-group text-center"> <span>or</span>
                      </div>
                      <div class="form-group">
                        <a href="{{url('auth/facebook')}}" class="btn-second btn-facebook full-width">
                          <img src="assets/img/facebook-logo.svg" alt="btn logo">Continue with Facebook</a>
                      </div>
                      <div class="form-group">
                        <a href="{{url('auth/google')}}" class="btn-second btn-google full-width">
                          <img src="assets/img/google-logo.png" alt="btn logo">Continue with Google</a>
                      </div>
                      <div class="form-group text-center mb-0"> <a href="{{ route('register') }}">Create your account</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection