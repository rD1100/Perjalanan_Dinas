@if (Session::has('loginEror'))
    {{-- <div class="pt-3"> --}}
    {{-- <div class="alert alert-${type} alert-dismissible" role="alert"> --}}
    <div class="pt-3">
        <div class="alert alert-danger" role="alert">
        {{ Session::get('loginEror') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
    </div>
    {{-- <div class="alert alert-danger" role="alert">Email anda belum terdaftar!</div> --}}
@endif



