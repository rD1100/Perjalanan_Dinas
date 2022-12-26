
@extends('layouts.authPerdin.main')
@section('content')
    <div class="login-box">

        <div class="card card-outline card-info">

                @if (Session::has('successSignup'))              
                    <div class="alert alert-success  " role="alert">
                        {{ Session::get('successSignup') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>

                @endif

                @if (Session::has('loginEror'))              
                    <div class="alert alert-danger alert-dismissible fade show " role="alert">
                        {{ Session::get('loginEror') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>

                @endif
            <div class="card-header text-center">
                <img src="/img/Logo ars 2015.png" alt="" width="60%">
            </div>
            <div class="card-body">
            
                <form class="user" method="post" action="{{ url('signIn') }}">
                    @csrf
                    {{-- form group --}}
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter Email Address..." value="{{ old('email') }}"required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info btn-user btn-block">
                        Login
                    </button>

                    <hr>
                                        
                    <div class="text-center">
                        <a class="middle" href="{{ url('registration') }}">Belum punya akun!</a>
                    </div>
                </form>
            </div>
      
        </div>
      
    </div>
@endsection


   