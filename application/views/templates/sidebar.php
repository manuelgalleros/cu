    <?php 
    // Get current URL segments for active navigation
    $current_page = $this->uri->segment(1);
    $current_method = $this->uri->segment(2);
    
    // Check if user is admin (by user_id or affiliation)
    $user_id = $this->session->userdata('id');
    $user_affiliation = $this->session->userdata('affiliation');
    $is_admin = ($user_id == 1 || strtolower($user_affiliation) == 'admin');
    ?>
    <div>
  <div id="miniSidebar" class="sidebar-dynamic">
  <div class="brand-logo">
  <a class='d-none d-md-flex align-items-center gap-2'>
    <img src="<?php echo base_url() ?>assets/images/brand/cu_transparent.png" width="95%" height="100%" alt="">
  </a>
</div>
  <ul class="navbar-nav flex-column sidebar-nav-dynamic">
    
    <?php if ($is_admin): ?>
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>' href="<?php echo base_url('dashboard') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M13.45 11.55l2.05 -2.05"></path><path d="M6.4 20a9 9 0 1 1 11.2 0z"></path></svg>
        </span>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <?php endif; ?>
    
    <!-- Nav item -->
      <li class="nav-item">
      <div class="nav-heading">Manage</div>
    </li>
      
    <!-- Nav item -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php echo ($current_page == 'reservations') ? 'active' : ''; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M8 15h2v2h-2z"></path></svg>
        </span>
        <span class="text">Reservations</span>
      </a>
      <ul class="dropdown-menu flex-column">
        <li class="nav-item">
          <a class='nav-link <?php echo ($current_page == 'reservations' && $current_method == 'create') ? 'active' : ''; ?>' href="<?php echo base_url('reservations/create') ?>">Add New Reservation</a>
        </li>
        <li class="nav-item">
          <a class='nav-link <?php echo ($current_page == 'reservations' && ($current_method == '' || $current_method == 'index')) ? 'active' : ''; ?>' href="<?php echo base_url('reservations') ?>">Manage Reservations</a>
        </li>
        <li class="nav-item">
          <a class='nav-link <?php echo ($current_page == 'reservations' && $current_method == 'archived') ? 'active' : ''; ?>' href="<?php echo base_url('reservations/archived') ?>">Archived Reservations</a>
        </li>
      </ul>
    </li>
    
    
    <?php if ($is_admin): ?>
    <!-- Nav item -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#users" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path></svg>
        </span>
        <span class="text">Users</span>
      </a>
      <ul class="dropdown-menu flex-column">
        <li class="nav-item">
          <a class='nav-link' href="<?php echo base_url('users/create') ?>">Add New User</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href="<?php echo base_url('users') ?>">Manage Users</a>
        </li>
      </ul>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'reports') ? 'active' : ''; ?>' href="<?php echo base_url('reports/reservations') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M4 20l14 0"></path></svg>
        </span>
        <span class="text">Facility Reports</span>
      </a>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'logs') ? 'active' : ''; ?>' href="<?php echo base_url('logs') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M13 5h8"></path><path d="M13 9h5"></path><path d="M13 15h8"></path><path d="M13 19h5"></path><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path></svg>
        </span>
        <span class="text">Activity Logs</span>
      </a>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#system-settings" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path></svg>
        </span>
        <span class="text">System Settings</span>
      </a>
      <ul class="dropdown-menu flex-column">
        <li class="nav-item">
          <a class='nav-link' href="<?php echo base_url('systemsettings/backupRecovery') ?>">Backup & Recovery</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href="<?php echo base_url('systemsettings/databasePermissions') ?>">Database Permissions</a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    
    <!-- Nav item -->
      <li class="nav-item">
      <div class="nav-heading">My Account</div>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'profile') ? 'active' : ''; ?>' href='#profile'>
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
        </span>
        <span class="text">View Profile</span>
      </a>
    </li>

  </ul>

</div>

<!-- Mobile Offcanvas Sidebar -->
<div class="offcanvasNav offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-color: #CC1C02;">
  <div class="offcanvas-header">

      <a class='d-flex align-items-center gap-2'>
        <img src="<?php echo base_url() ?>assets/images/brand/cu_transparent.png" alt="" width="95%">
      </a>

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="color: white;"></button>
  </div>
  <div class="offcanvas-body p-0">
  <ul class="navbar-nav flex-column">
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'dashboard') ? 'active' : ''; ?>' href="<?php echo base_url('dashboard') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M13.45 11.55l2.05 -2.05"></path><path d="M6.4 20a9 9 0 1 1 11.2 0z"></path></svg>
        </span>
        <span class="text">Dashboard</span>
      </a>
    </li>
    
    <!-- Nav item -->
      <li class="nav-item">
      <div class="nav-heading">Manage</div>
    </li>
      
    <!-- Nav item -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php echo ($current_page == 'reservations') ? 'active' : ''; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path><path d="M16 3l0 4"></path><path d="M8 3l0 4"></path><path d="M4 11l16 0"></path><path d="M8 15h2v2h-2z"></path></svg>
        </span>
        <span class="text">Reservations</span>
      </a>
      <ul class="dropdown-menu flex-column">
        <li class="nav-item">
          <a class='nav-link <?php echo ($current_page == 'reservations' && $current_method == 'create') ? 'active' : ''; ?>' href="<?php echo base_url('reservations/create') ?>">Add New Reservation</a>
        </li>
        <li class="nav-item">
          <a class='nav-link <?php echo ($current_page == 'reservations' && ($current_method == '' || $current_method == 'index')) ? 'active' : ''; ?>' href="<?php echo base_url('reservations/index') ?>">Manage Reservations</a>
        </li>
        <li class="nav-item">
          <a class='nav-link <?php echo ($current_page == 'reservations' && $current_method == 'archived') ? 'active' : ''; ?>' href="<?php echo base_url('reservations/archived') ?>">Archived Reservations</a>
        </li>
      </ul>
    </li>
    
    
    <?php if ($is_admin): ?>
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'users') ? 'active' : ''; ?>' href="<?php echo base_url('users') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path></svg>
        </span>
        <span class="text">Users</span>
      </a>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'groups') ? 'active' : ''; ?>' href='#groups'>
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-group"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path><path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M17 10h2a2 2 0 0 1 2 2v1"></path><path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path></svg>
        </span>
        <span class="text">Groups</span>
      </a>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'reports') ? 'active' : ''; ?>' href="<?php echo base_url('reports/reservations') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M9 8m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M15 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M4 20l14 0"></path></svg>
        </span>
        <span class="text">Facility Reports</span>
      </a>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'logs') ? 'active' : ''; ?>' href="<?php echo base_url('logs') ?>">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M13 5h8"></path><path d="M13 9h5"></path><path d="M13 15h8"></path><path d="M13 19h5"></path><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path></svg>
        </span>
        <span class="text">Activity Logs</span>
      </a>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php echo ($current_page == 'systemsettings') ? 'active' : ''; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path></svg>
        </span>
        <span class="text">System Settings</span>
      </a>
      <ul class="dropdown-menu flex-column">
        <li class="nav-item">
          <a class='nav-link' href="<?php echo base_url('systemsettings/backupRecovery') ?>">Backup & Recovery</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href="<?php echo base_url('systemsettings/databasePermissions') ?>">Database Permissions</a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    
    <!-- Nav item -->
      <li class="nav-item">
      <div class="nav-heading">My Account</div>
    </li>
    
    <!-- Nav item -->
    <li class="nav-item">
      <a class='nav-link <?php echo ($current_page == 'profile') ? 'active' : ''; ?>' href='#profile'>
        <span class="nav-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
        </span>
        <span class="text">View Profile</span>
      </a>
    </li>

  </ul>
  </div>
</div>
        
      <!-- Main Content -->
      <div id="content" class="position-relative h-100">