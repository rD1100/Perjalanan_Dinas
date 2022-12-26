
@extends('layouts.authPerdin.main')
@section('content')    
    <div class="register-box">
        <div class="card card-outline card-info">
            <div class="card-header text-center">
                <img src="/img/Logo ars 2015.png" alt="" width="60%">
            </div>
            <div class="card-body">
        

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
                    <button type="submit" class="btn btn-info btn-user btn-block">
                        Register Account
                    </button>
                </form>

                <hr>
                                        
                <div class="text-center">
                    <a class="middle" href="{{ url('/') }}">Sudah punya akun ?</a>
                </div>
            
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection

