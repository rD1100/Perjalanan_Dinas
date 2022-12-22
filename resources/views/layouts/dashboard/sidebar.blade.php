<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
    
       
        <li class="nav-item">
          <?php
          $userRole=Auth::User()-> id;
          $roleResult = DB::table('users')
               ->select('role_user_tb.role_name', 'users.name')
               ->join('role_user_tb', 'users.role_id', '=', 'role_user_tb.role_id')
               ->where('id',$userRole)
               ->get();       
    
         ?>
       
          <a  class="nav-link" href="#">
            <span data-feather="users" class="align-text-bottom"></span>
            
            {{ $item->role_name }}
          </a>
        </li>
        
      </ul>

    
    </div>
  </nav>