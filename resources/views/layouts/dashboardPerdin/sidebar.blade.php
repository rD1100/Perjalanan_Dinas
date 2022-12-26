<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
   
        {{-- <i class="fas fa-laugh-wink"></i> --}}
        <img width="95%" src="/img/Logo ars 2015.png" alt=""> 
    
      <div class="sidebar-brand-text mx-3"></div>
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

        {{ $item->role_name }}
      @endforeach

    </div>

 
    <li class="nav-item">
      <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Perdinku</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>