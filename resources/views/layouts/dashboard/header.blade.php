<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Akhdani</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav">
      <div class="">
        {{-- <a class="nav-link px-3" href="#">Log out</a> --}}
        {{-- <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type=" submit" class="nav-link px-3 bg-dark border-0"><i class="bi bi-box-arrow-right"></i>logout</button>
        </form> --}}
        {{-- <div class="dropdown"> --}}
          {{-- <button class="btn btn-secondary dropdown-toggle bg-dark border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::User()->name }}
          </button> --}}
          {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Actionn</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div> --}}
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="">
            <li class="">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </ul>
  </header>