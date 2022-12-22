@extends('layouts.authPerdin.main')
@section('contentAuth')
<div class="card-body p-0">
    
    <!-- Nested Row within Card Body -->
    <div class="row">
        
        <div class="col-lg"> 
            <div class="p-5">
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
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
   
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
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
        
                        </form>
                        <hr>
                        <div class="text-center">
                           
                            {{-- <a class="small" href="{{ ('password.request') }}">Lupa password?</a> --}}
                            
                        </div>
     
                        <div class="text-center">
                            <a class="middle" href="{{ url('registration') }}">Buat akun!</a>
                        </div>
                    

            </div> 
        
        </div> 

    </div>
</div>
@endsection