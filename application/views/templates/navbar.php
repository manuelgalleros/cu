<!-- navbar -->
<div class="navbar-glass navbar navbar-expand-lg px-0 px-lg-4">
  <div class="container-fluid px-lg-0">
    <div class="d-flex align-items-center gap-4">
      <!-- Collapse -->
      <div class="d-block d-lg-none">
        <a class="text-inherit" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 6l16 0"></path>
            <path d="M4 12l16 0"></path>
            <path d="M4 18l16 0"></path>
          </svg>
        </a>
      </div>
      <div class="d-none d-lg-block">
        <a class="sidebar-toggle d-flex texttooltip p-3" href="javascript:void(0)" data-template="collapseMessage">
          <span class="collapse-mini">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-bar-left text-secondary">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M4 12l10 0"></path>
              <path d="M4 12l4 4"></path>
              <path d="M4 12l4 -4"></path>
              <path d="M20 4l0 16"></path>
            </svg>
          </span>
          <span class="collapse-expanded">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-bar-right text-secondary">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M20 12l-10 0"></path>
              <path d="M20 12l-4 4"></path>
              <path d="M20 12l-4 -4"></path>
              <path d="M4 4l0 16"></path>
            </svg>
            <div id="collapseMessage" class="d-none">
              <span class="small">Collapse</span>
            </div>
          </span>
        </a>
      </div>
      <!-- Logo -->
      <!-- <div class="d-block d-md-none">
        <a href="./index.html">
          <img src="./assets/images/brand/logo/logo-icon.svg" alt="" />
        </a>
      </div> -->
    </div>

    <!-- Navbar nav -->
    <ul class="list-unstyled d-flex align-items-center mb-0 gap-2">
      <!-- Pages link -->
      <li>
        <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#searchModal">
          <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <circle cx="10" cy="10" r="7"></circle>
              <line x1="21" y1="21" x2="15" y2="15"></line>
            </svg>
          </span>
          <small class="ms-1">⌘K</small>
        </button>
        <!-- Modal -->
      </li>
      <!-- Light dark mode-->
      <li>
        <div class="dropdown">
          <button class="btn btn-ghost btn-icon rounded-circle d-flex align-items-center" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <i class="ti theme-icon-active lh-1 fs-5"><i class="ti theme-icon ti-sun"></i></i>
            <span class="visually-hidden bs-theme-text">Toggle theme</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                <i class="ti theme-icon ti ti-sun"></i>
                <span class="ms-2">Light</span>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <i class="ti theme-icon ti-moon-stars"></i>
                <span class="ms-2">Dark</span>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                <i class="ti theme-icon ti-circle-half-2"></i>
                <span class="ms-2">Auto</span>
              </button>
            </li>
          </ul>
        </div>
      </li>
      <!-- Bell icon -->
      <li>
        <a class="position-relative btn-icon btn-ghost btn rounded-circle" data-bs-toggle="offcanvas" href="#offcanvasNotification" role="button" aria-controls="offcanvasNotification">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bell">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
          </svg>
          </span>
        </a>
      </li>
      <!-- Dropdown -->
      <li class="ms-3 dropdown">
        <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo base_url()?>assets/images/avatar/default.jpg" alt="" class="avatar avatar-sm rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0">
          <div>
            <div class="d-flex gap-3 align-items-center border-dashed border-bottom px-4 py-4">
              <img src="<?php echo base_url()?>assets/images/avatar/default.jpg" alt="" class="avatar avatar-md rounded-circle">
              <div>
                <h4 class="mb-0 fs-5">
                  <?php 
                    $firstname = $this->session->userdata('firstname') ?: '';
                    $lastname = $this->session->userdata('lastname') ?: '';
                    $fullname = trim($firstname . ' ' . $lastname);
                    echo $fullname ?: $this->session->userdata('email') ?: 'User';
                  ?>
                </h4>
                <p class="mb-0 text-secondar small">
                  <?php echo $this->session->userdata('affiliation') ?: 'User'; ?>
                </p>
              </div>
            </div>
            <div class="p-3 d-flex flex-column gap-1">
              <a href="#!" class="dropdown-item d-flex align-items-center gap-2">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M10 12h4v4h-4z"></path>
                  </svg>
                </span>
                <span>Home</span>
              </a>
              <a href="#!" class="dropdown-item d-flex align-items-center gap-2">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-activity">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                  </svg>
                </span>
                <span> Activity Logs</span>
              </a>
              <a href="#!" class="dropdown-item d-flex align-items-center gap-2">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                  </svg>
                </span>
                <span> Account Settings</span>
              </a>
            </div>
            <div class="border-dashed border-top mb-4 pt-4 px-6">
              <a href="<?php echo base_url('auth/logout'); ?>" class="text-secondary d-flex align-items-center gap-2" id="logoutBtn">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-login-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                    <path d="M3 12h13l-3 -3"></path>
                    <path d="M13 15l3 -3"></path>
                  </svg>
                </span>
                <span>Logout</span></a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>

<!--Offcanvas notification-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNotification" aria-labelledby="offcanvasNotificationLabel">
  <div class="sticky-top bg-white">
    <div class="offcanvas-header gap-4">
      <div class="d-flex justify-content-between w-100">
        <h5 class="mb-0" id="offcanvasNotificationLabel">Notifications</h5>
        <div class="d-flex gap-3 align-items-center">
          <a href="#" class="link-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Mark all as read">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-checks">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M7 12l5 5l10 -10"></path>
              <path d="M2 12l5 5m5 -5l5 -5"></path>
            </svg>
          </a>
          <a href="#" class="text-inherit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
              <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
            </svg>
          </a>
        </div>
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="mt-2">
      <ul class="nav nav-line-bottom" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active px-4 py-2" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">
            All
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link px-4 py-2" id="pills-following-tab" data-bs-toggle="pill" data-bs-target="#pills-following" type="button" role="tab" aria-controls="pills-following" aria-selected="false">
            Following
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link px-4 py-2" id="pills-archive-tab" data-bs-toggle="pill" data-bs-target="#pills-archive" type="button" role="tab" aria-controls="pills-archive" aria-selected="false">
            Archive
          </button>
        </li>
      </ul>
    </div>
  </div>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
      <div data-simplebar="" style="height: 800px">
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column gap-1">
                <div>New message from John Doe</div>
                <small class="text-secondary"> 2 minutes ago</small>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column gap-1">
                <div>Your password will expire soon.</div>
                <small class="text-secondary"> 2 minutes ago</small>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Alice uploaded a new profile picture.</div>
                  <small class="text-secondary"> 1 hour ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-2.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Mike sent you a friend request.</div>
                  <small class="text-secondary"> 5 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
            <div class="d-flex gap-2 align-items-center mt-4">
              <button type="button" class="btn btn-primary btn-sm">Accept</button>
              <button type="button" class="btn btn-white btn-sm">Decline</button>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-3.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Sophia commented on your post.</div>
                  <small class="text-secondary"> 20 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-primary-subtle text-primary-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>A system update has been installed.</div>
                  <small class="text-secondary"> 30 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-info-subtle text-info-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                    <path d="M16 3v4"></path>
                    <path d="M8 3v4"></path>
                    <path d="M4 11h16"></path>
                    <path d="M7 14h.013"></path>
                    <path d="M10.01 14h.005"></path>
                    <path d="M13.01 14h.005"></path>
                    <path d="M16.015 14h.005"></path>
                    <path d="M13.015 17h.005"></path>
                    <path d="M7.01 17h.005"></path>
                    <path d="M10.01 17h.005"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Reminder: Team meeting at 3:00 PM.</div>
                  <small class="text-secondary"> 1 hour ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-danger-subtle text-danger-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Your order has been shipped!</div>
                  <small class="text-secondary"> 2 hours ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-3.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Sophia commented on your post.</div>
                  <small class="text-secondary"> 20 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-primary-subtle text-primary-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>A system update has been installed.</div>
                  <small class="text-secondary"> 30 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-info-subtle text-info-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                    <path d="M16 3v4"></path>
                    <path d="M8 3v4"></path>
                    <path d="M4 11h16"></path>
                    <path d="M7 14h.013"></path>
                    <path d="M10.01 14h.005"></path>
                    <path d="M13.01 14h.005"></path>
                    <path d="M16.015 14h.005"></path>
                    <path d="M13.015 17h.005"></path>
                    <path d="M7.01 17h.005"></path>
                    <path d="M10.01 17h.005"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Reminder: Team meeting at 3:00 PM.</div>
                  <small class="text-secondary"> 1 hour ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-danger-subtle text-danger-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Your order has been shipped!</div>
                  <small class="text-secondary"> 2 hours ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab" tabindex="0">
      <div data-simplebar="" style="height: 800px">
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-info-subtle text-info-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                    <path d="M16 3v4"></path>
                    <path d="M8 3v4"></path>
                    <path d="M4 11h16"></path>
                    <path d="M7 14h.013"></path>
                    <path d="M10.01 14h.005"></path>
                    <path d="M13.01 14h.005"></path>
                    <path d="M16.015 14h.005"></path>
                    <path d="M13.015 17h.005"></path>
                    <path d="M7.01 17h.005"></path>
                    <path d="M10.01 17h.005"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Reminder: Team meeting at 3:00 PM.</div>
                  <small class="text-secondary"> 1 hour ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-danger-subtle text-danger-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Your order has been shipped!</div>
                  <small class="text-secondary"> 2 hours ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-3.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Sophia commented on your post.</div>
                  <small class="text-secondary"> 20 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-primary-subtle text-primary-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>A system update has been installed.</div>
                  <small class="text-secondary"> 30 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-info-subtle text-info-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                    <path d="M16 3v4"></path>
                    <path d="M8 3v4"></path>
                    <path d="M4 11h16"></path>
                    <path d="M7 14h.013"></path>
                    <path d="M10.01 14h.005"></path>
                    <path d="M13.01 14h.005"></path>
                    <path d="M16.015 14h.005"></path>
                    <path d="M13.015 17h.005"></path>
                    <path d="M7.01 17h.005"></path>
                    <path d="M10.01 17h.005"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Reminder: Team meeting at 3:00 PM.</div>
                  <small class="text-secondary"> 1 hour ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <div class="icon-shape icon-md bg-danger-subtle text-danger-emphasis rounded-circle">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                  </svg>
                </div>
                <div class="d-flex flex-column gap-1">
                  <div>Your order has been shipped!</div>
                  <small class="text-secondary"> 2 hours ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-archive" role="tabpanel" aria-labelledby="pills-archive-tab" tabindex="0">
      <div data-simplebar="" style="height: 800px">
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column gap-1">
                <div>New message from John Doe</div>
                <small class="text-secondary"> 2 minutes ago</small>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column gap-1">
                <div>Your password will expire soon.</div>
                <small class="text-secondary"> 2 minutes ago</small>
              </div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-1.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Alice uploaded a new profile picture.</div>
                  <small class="text-secondary"> 1 hour ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action p-5 border-dashed border-bottom">
            <div class="d-flex justify-content-between">
              <div class="d-flex gap-4 align-items-center">
                <img src="<?php echo base_url() ?>assets/images/avatar/avatar-2.jpg" alt="" class="avatar avatar-md rounded-circle">
                <div class="d-flex flex-column gap-1">
                  <div>Mike sent you a friend request.</div>
                  <small class="text-secondary"> 5 minutes ago</small>
                </div>
              </div>

              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewbox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle text-info">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z"></path>
                </svg>
              </div>
            </div>
            <div class="d-flex gap-2 align-items-center mt-4">
              <button type="button" class="btn btn-primary btn-sm">Accept</button>
              <button type="button" class="btn btn-white btn-sm">Decline</button>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="px-5 py-3 text-center bg-white position-absolute bottom-0 border-top border-dashed w-100 text-center">
    <a href="#!" class="text-inherit">View all</a>
  </div>
</div>


<!-- Modal of pages -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <input type="search" class="form-control border-0 rounded-0 ps-0 form-focus-none" id="globalSearchInput" placeholder="Search any word..." aria-label="Search" aria-describedby="search-addon">
        <button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal" aria-label="Close">Esc</button>
      </div>
      <div class="modal-body" data-simplebar="" style="height: 400px">
        <div class="mb-4">
          <div class="d-flex flex-column border-bottom border-dashed py-4">
            <div class="mb-2">
              <span class="fw-semibold text-secondary small">Dashboard</span>
            </div>
            <div>
              <ul class="list-unstyled lh-lg mb-0">
                <li><a class='text-inherit' href='dashboard/analytics.html'>Analytics</a></li>
                <li><a href="./dashboard/project.html" class="text-inherit">Project</a></li>
                <li><a class='text-inherit' href='dashboard/ecommerce.html'>Ecommerce</a></li>
                <li><a class='text-inherit' href='dashboard/crm.html'>CRM</a></li>
                <li><a class='text-inherit' href='dashboard/finance.html'>Finance</a></li>
                <li><a class='text-inherit' href='dashboard/blog.html'>Blog</a></li>
              </ul>
            </div>
          </div>
          <div class="d-flex flex-column border-bottom border-dashed py-4">
            <div class="mb-2">
              <span class="fw-semibold text-secondary small">Apps</span>
            </div>
            <div>
              <ul class="list-unstyled lh-lg mb-0">
                <li><a class='text-inherit' href='apps/calendar.html'> Calendar</a></li>
                <li><a class='text-inherit' href='apps/chat-app.html'> Chat</a></li>
                <li><a class='text-inherit' href='apps/email/mail.html'>Email</a></li>
                <li><a class='text-inherit' href='apps/e-commerce/ecommerce-products.html'>Ecommerce</a></li>
                <li><a class='text-inherit' href='apps/kanban.html'> Kanban</a></li>
                <li><a class='text-inherit' href='apps/project/project-grid.html'>Project</a></li>
                <li><a class='text-inherit' href='dashboard/file.html'> File Manager</a></li>
                <li><a class='text-inherit' href='apps/crm/crm-contacts.html'> CRM</a></li>
                <li><a class='text-inherit' href='apps/invoice/invoice-list.html'> Invoice</a></li>
                <li><a class='text-inherit' href='apps/profile/profile-overview.html'> Profile</a></li>
                <li><a class='text-inherit' href='apps/blog/blog-list.html'> Blog</a></li>
              </ul>
            </div>
          </div>
          <div class="d-flex flex-column border-bottom border-dashed py-4">
            <div>
              <span class="fw-semibold text-secondary small">Pages</span>
            </div>
          </div>
          <div class="d-flex flex-column border-bottom border-dashed py-4">
            <div>
              <span class="fw-semibold text-secondary small">Quick Links</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="logoutModalLabel">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout text-danger me-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg>
          Confirm Logout
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-0">Are you sure you want to logout from your account?</p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger" id="confirmLogoutBtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout me-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
          </svg>
          Yes, Logout
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  // Logout modal trigger
  document.addEventListener('DOMContentLoaded', function() {
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
    
    if (logoutBtn) {
      logoutBtn.addEventListener('click', function(e) {
        e.preventDefault();
        logoutModal.show();
      });
    }
  });
</script>
