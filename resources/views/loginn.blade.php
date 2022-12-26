<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      <a href="/index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form class="user" method="post" action="{{ url('registration') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {{-- <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value=""> --}}
            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                {{-- <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password"> --}}
                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-6">
                {{-- <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password"> --}}
                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation"  placeholder="Repeat Password" required autocomplete="new-password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Register Account
        </button>
    </form>

      
      <div style="text-align: center;margin-top: 11%">
        <a href="/" class="text-center">Sudah punya akun!</a>
      </div>
     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
