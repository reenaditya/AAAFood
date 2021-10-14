@extends('layouts.guest')
@section('content')
  <div class="inner-wrapper">
    <div class="container-fluid no-padding">
      <div class="row no-gutters overflow-auto">
        <div class="col-md-6">
          <div class="main-banner" style="height: 170vh;">
            <img src="assets/img/banner/banner-1.jpg" class="img-fluid full-width main-img" alt="banner">
            
            <img src="assets/img/banner/burger.png" class="footer-img" alt="footer-img">
          </div>
        </div>
        <div class="col-md-6">
          <div class="section-2 user-page main-padding">
            <div class="login-sec">
              <div class="login-box">
                  	<form method="POST" action="{{ route('register') }}">
                  		@csrf
                  <h4 class="text-light-black fw-600">Create your account</h4>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label class="text-light-white fs-14">Name</label>
                        <input type="text" name="name" class="form-control form-control-submit" placeholder="Name" required value="{{old('name')}} " >
                        @error('name')
                        	<span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label class="text-light-white fs-14">Email</label>
                        <input type="email" name="email" value="{{old('email')}} " class="form-control form-control-submit" placeholder="Email I'd" required>
                        @error('email')
                        	<span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <label class="text-light-white fs-14">VIP Member? </label>
                          <div class="form-group d-flex">
                            <label class="custom-checkbox mb-0 mr-3">
                              <input type="radio" name="vip" value="1"> 
                              <span class="checkmark"></span> Yes
                            </label>
                            <label class="custom-checkbox mb-0">
                              <input type="radio" name="vip" value="0" > 
                              <span class="checkmark"></span> No
                            </label>
                          </div>    
                        </div>
                        <div class="col-6">
                          <label class="text-light-white fs-14">Your VIP Number?</label>
                          <div class="form-group">
                            <input type="text" name="coupen" value="{{old('coupen')}} " class="form-control form-control-submit" placeholder="coupon code" >
                            @error('coupenk')
                              <span class="text-danger">{{"Coupen code invalid"}} </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="text-light-white fs-14">Mobile number</label>
                        <input type="number" min="999999" max="99999999999" name="mobile" class="form-control form-control-submit" placeholder="" required>
                        @error('mobile')
                          <span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="text-light-white fs-14">Password (8 character minimum)</label>
                        <input type="password" id="password-field" name="password" class="form-control form-control-submit" value="password" placeholder="Password" required>
                        <div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                        @error('password')
                        	<span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="text-light-white fs-14">Confirm Password</label>
                        <input type="password" id="password-field1" name="password_confirmation" class="form-control form-control-submit" value="password" placeholder="Password" required>
                        <div data-name="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                        @error('password_confirmation')
                        	<span class="text-danger">{{$message}} </span>
                        @enderror
                      </div>
                      <div class="form-group checkbox-reset">
                        <label class="custom-checkbox mb-0">
                          <input type="checkbox" name="remember"> <span class="checkmark"></span> Keep me signed in</label>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn-second btn-submit full-width">Create your account</button>
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
                      <div class="form-group text-center">
                        <p class="text-light-black mb-0">Have an account? <a href="{{ route('login') }}">Sign in</a>
                        </p>
                      </div> <span class="text-light-black fs-12 terms">By creating your account, you agree to the <a href="#"> Terms of Use </a> and <a href="#"> Privacy Policy.</a></span>
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