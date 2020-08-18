<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Online Exam System</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('admin/img/icons/favicon/favicon-32x32.png') }}"  type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('admin/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/argon.css?v=1.2.0') }}" type="text/css">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pt-lg-4 pb-lg-4">
      <div class="container" style="height: 250px;">
        <div class="header-body text-center mb--10">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <!-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
	<!-- Page content -->
		<div class="container mt--8 pb-5">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-7">
			<div class="card bg-secondary border-0 mb-0">
				<div class="card-header bg-transparent pb-3">
				<div class="text-muted text-black text-center mt-2 mb-3">Welcome! <small>Sign in with credentials</small></div>
				<div class="btn-wrapper text-center">
				</div>
				</div>
				<div class="card-body px-lg-3 py-lg-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
                    
                                    <div class="card-body">
                                        @isset($url)
                                            <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                        </div>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    </div>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group input-group-merge input-group-alternative">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                        </div>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="form-check fl">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        
                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Login') }}
                                                        </button>
                                                    </div>
                                                </div>
                                        @else
                                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                        @endisset
                                        @csrf
                                    </div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</form>
  </div>
  <!-- Core -->
  <script src="{{ asset('admin/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="../assets/" src="{{ asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('admin/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>















{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body">
                    @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                    @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                    @csrf
                </div> --}}