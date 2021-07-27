<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Sign In | AppStack - Admin &amp; Dashboard Template</title>

	<link rel="canonical" href="pages-sign-in.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

	<link class="js-stylesheet" href="{{ asset('admin/css/light.css') }}" rel="stylesheet">
	<script src="{{ asset('admin/js/settings.js') }}"></script>
	<!-- END SETTINGS -->
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="main d-flex justify-content-center w-100">
		<main class="content d-flex p-0">
			<div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<h1 class="h2">Welcome Admin</h1>
								
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-4">
										
										<form method="POST" action="{{ route('login') }}">
                  						@csrf
											<div class="mb-3">
												<label class="form-label">Email</label>
												<input 
												type="email" 
												name="email" 
												class="form-control form-control-lg" 
												value="{{old('email')}}" 
												placeholder="Email I'd" 
												required>
	                        					@error('email')
	                        						<span class="text-danger">{{$message}} </span>
	                        					@enderror
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												 <input 
												 type="password" 
												 id="password-field" 
												 name="password" 
												 class="form-control form-control-lg" 
												 value="password" 
												 placeholder="Password" required>
                        	
						                        @error('password')
						                        	<span class="text-danger">{{$message}} </span>
						                        @enderror
											
											</div>
											<div>
												<div class="form-check align-items-center">
													
													<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember" checked>
													<label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
												</div>
											</div>
											<div class="text-center mt-3">
												
												<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<script src="{{ asset('admin/js/app.js') }}"></script>

</body>
</html>