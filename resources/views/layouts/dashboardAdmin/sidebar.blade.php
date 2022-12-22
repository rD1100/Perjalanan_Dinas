<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('SDM') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-smile-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">RDComp </div>
    </a>

   

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      <?php
      $userRole=Auth::User()-> id;
      $roleResult = DB::table('users')
           ->select('role_user_tb.role_name', 'users.name')
           ->join('role_user_tb', 'users.role_id', '=', 'role_user_tb.role_id')
           ->where('id',$userRole)
           ->get();       

     ?>
      @foreach ($roleResult as $item)
      {{-- <h6>Halo {{ $item -> name }}</h6> --}}
        {{ $item->role_name }}
      @endforeach

    </div>

 
    <li class="nav-item">
      <a class="nav-link" href="{{ url('SDM') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pengajuan Perdin</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('masterKota') }}">
        <i class="fas fa-fw fa-city"></i>
        <span>Master Kota</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>