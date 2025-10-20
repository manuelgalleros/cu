        <!-- container -->
        <div class="custom-container">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>

            <!-- Page Header -->
            <div class="mb-6">
              <h4 class="mb-2 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database me-2" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0"></path>
                  <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                  <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                </svg>
                PPFMO Database Permissions
              </h4>
              <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/systemsettings'); ?>">System Settings</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Database Permissions</li>
                    </ol>
              </nav>
            </div>

            <?php if (!$ppfmo_exists): ?>
            <!-- Create PPFMO User Section -->
            <div class="row">
              <div class="col-lg-8 col-12 mx-auto">
                <div class="card card-lg">
                  <div class="card-header bg-warning-subtle border-bottom">
                    <div class="d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                        <path d="M12 16h.01"></path>
                      </svg>
                      <h5 class="mb-0">PPFMO Database User Not Found</h5>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-info" role="alert">
                      <p class="mb-0"><strong>Notice:</strong> The PPFMO database user does not exist yet. Please create it first before managing permissions.</p>
                    </div>
                    
                    <form id="createUserForm">
                      <div class="mb-3">
                        <label for="password" class="form-label">Set Password for PPFMO User</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter a strong password" required>
                        <div class="form-text">This will create a MySQL user 'ppfmo'@'localhost' with the specified password.</div>
                      </div>
                      <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                          <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                        Create PPFMO User
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php else: ?>
            <!-- Super-Global Privileges Warning -->
            <?php if ($has_global): ?>
            <div class="row mb-4">
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                        <path d="M12 16h.01"></path>
                      </svg>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="alert-heading mb-2">⚠️ Super-Admin Privileges Detected!</h5>
                      <?php if ($is_super_admin): ?>
                      <p class="mb-2">The PPFMO user currently has <strong class="text-danger">ALL PRIVILEGES ON *.*</strong> - this means they have COMPLETE ACCESS to ALL databases and ALL tables on your entire MySQL server!</p>
                      <p class="mb-3"><strong>Critical Issue:</strong> The individual grant/revoke buttons below WILL NOT WORK until you remove these super-admin privileges. The super-global privilege overrides everything else.</p>
                      <?php else: ?>
                      <p class="mb-2">The PPFMO user has <strong>global privileges (*.*)  </strong> that override the individual permissions you're trying to manage here.</p>
                      <p class="mb-3"><strong>This means:</strong> The grant/revoke buttons below won't work until you remove these global privileges first.</p>
                      <?php endif; ?>
                      <div class="d-flex gap-2">
                        <button class="btn btn-danger btn-sm" id="removeGlobalPrivBtn">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M9 12l2 2l4 -4"></path>
                          </svg>
                          Remove Super-Global Privileges
                        </button>
                      </div>
                      <hr class="my-3">
                      <p class="small mb-0"><strong>Current Global Grant:</strong><br><code class="text-danger"><?php echo htmlspecialchars($global_privileges[0]); ?></code></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            
            <!-- Permissions Management Section -->
            <div class="row g-6 mb-6">
              <!-- Current Permissions Card -->
              <div class="col-lg-8 col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Database Permissions on CU Database</h5>
                      <span class="badge bg-success-subtle text-success-emphasis">PPFMO User Active</span>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-centered mb-0">
                        <thead class="table-light">
                          <tr>
                            <th>Operation</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- SELECT Permission -->
                          <tr>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <strong style="min-width: 65px;">SELECT</strong>
                                <span class="badge bg-info-subtle text-info-emphasis">Read</span>
                              </div>
                            </td>
                            <td>Allows PPFMO to view/read all tables in CU database</td>
                            <td>
                              <?php if ($permissions['select']): ?>
                                <span class="badge bg-success">Granted</span>
                              <?php else: ?>
                                <span class="badge bg-secondary">Revoked</span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if ($permissions['select']): ?>
                                <button class="btn btn-sm btn-danger revoke-btn" data-permission="SELECT" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                  </svg>
                                  Revoke
                                </button>
                              <?php else: ?>
                                <button class="btn btn-sm btn-success grant-btn" data-permission="SELECT" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                  </svg>
                                  Grant
                                </button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          
                          <!-- INSERT Permission -->
                          <tr>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <strong style="min-width: 65px;">INSERT</strong>
                                <span class="badge bg-primary-subtle text-primary-emphasis">Create</span>
                              </div>
                            </td>
                            <td>Allows PPFMO to create new records in CU database</td>
                            <td>
                              <?php if ($permissions['insert']): ?>
                                <span class="badge bg-success">Granted</span>
                              <?php else: ?>
                                <span class="badge bg-secondary">Revoked</span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if ($permissions['insert']): ?>
                                <button class="btn btn-sm btn-danger revoke-btn" data-permission="INSERT" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                  </svg>
                                  Revoke
                                </button>
                              <?php else: ?>
                                <button class="btn btn-sm btn-success grant-btn" data-permission="INSERT" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                  </svg>
                                  Grant
                                </button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          
                          <!-- UPDATE Permission -->
                          <tr>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <strong style="min-width: 65px;">UPDATE</strong>
                                <span class="badge bg-warning-subtle text-warning-emphasis">Modify</span>
                              </div>
                            </td>
                            <td>Allows PPFMO to modify records in CU database</td>
                            <td>
                              <?php if ($permissions['update']): ?>
                                <span class="badge bg-success">Granted</span>
                              <?php else: ?>
                                <span class="badge bg-secondary">Revoked</span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if ($permissions['update']): ?>
                                <button class="btn btn-sm btn-danger revoke-btn" data-permission="UPDATE" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                  </svg>
                                  Revoke
                                </button>
                              <?php else: ?>
                                <button class="btn btn-sm btn-success grant-btn" data-permission="UPDATE" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                  </svg>
                                  Grant
                                </button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          
                          <!-- DELETE Permission -->
                          <tr>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <strong style="min-width: 65px;">DELETE</strong>
                                <span class="badge bg-danger-subtle text-danger-emphasis">Remove</span>
                              </div>
                            </td>
                            <td>Allows PPFMO to delete records from CU database</td>
                            <td>
                              <?php if ($permissions['delete']): ?>
                                <span class="badge bg-success">Granted</span>
                              <?php else: ?>
                                <span class="badge bg-secondary">Revoked</span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <?php if ($permissions['delete']): ?>
                                <button class="btn btn-sm btn-danger revoke-btn" data-permission="DELETE" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                  </svg>
                                  Revoke
                                </button>
                              <?php else: ?>
                                <button class="btn btn-sm btn-success grant-btn" data-permission="DELETE" style="min-width: 100px;">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                  </svg>
                                  Grant
                                </button>
                              <?php endif; ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Quick Actions Card -->
              <div class="col-lg-4 col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom">
                    <h5 class="mb-0">Quick Actions</h5>
                  </div>
                  <div class="card-body">
                    <div class="d-grid gap-3">
                      <button class="btn btn-success" id="grantAllBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                        Grant All Permissions
                      </button>
                      <button class="btn btn-danger" id="revokeAllBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M18 6l-12 12"></path>
                          <path d="M6 6l12 12"></path>
                        </svg>
                        Revoke All Permissions
                      </button>
                    </div>

                    <hr class="my-4">

                    <h6 class="mb-3">Change PPFMO Password</h6>
                    <form id="changePasswordForm">
                      <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                        <div class="form-text">Update the database password for PPFMO user</div>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                          <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                          <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                        </svg>
                        Change Password
                      </button>
                    </form>
                  </div>
                </div>

                <!-- Info Card -->
                <div class="card card-lg mt-4">
                  <div class="card-header bg-info-subtle border-bottom">
                    <h6 class="mb-0">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M12 8l.01 0"></path>
                        <path d="M11 12l1 0l0 4l1 0"></path>
                      </svg>
                      Information
                    </h6>
                  </div>
                  <div class="card-body">
                    <p class="small mb-2"><strong>Database:</strong> cu</p>
                    <p class="small mb-2"><strong>Scope:</strong> All tables (cu.*)</p>
                    <p class="small mb-2"><strong>User:</strong> ppfmo@localhost</p>
                    <p class="small mb-0 text-muted">These permissions apply to all tables in the CU database.</p>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
        </div>

<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Alert function
    function showAlert(message, type, duration = 5000) {
        var alertContainer = document.getElementById('alert-container');
        var alertId = 'alert-' + Date.now();
        
        var alertHTML = `
            <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show shadow-lg" role="alert">
                <strong>${type === 'success' ? 'Success!' : type === 'danger' ? 'Error!' : 'Info'}</strong> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        alertContainer.insertAdjacentHTML('beforeend', alertHTML);
        
        if (duration > 0) {
            setTimeout(function() {
                var alertElement = document.getElementById(alertId);
                if (alertElement) {
                    var bsAlert = new bootstrap.Alert(alertElement);
                    bsAlert.close();
                }
            }, duration);
        }
    }

    // Function to check permission states and update bulk action buttons
    function updateBulkActionButtons() {
        const grantAllBtn = document.getElementById('grantAllBtn');
        const revokeAllBtn = document.getElementById('revokeAllBtn');
        
        // Count granted permissions
        const grantedBadges = document.querySelectorAll('tbody .badge.bg-success');
        const totalPermissions = document.querySelectorAll('tbody tr').length;
        const grantedCount = grantedBadges.length;
        
        // Disable/enable Grant All button
        if (grantedCount === totalPermissions) {
            grantAllBtn.disabled = true;
            grantAllBtn.classList.add('opacity-50');
            grantAllBtn.style.cursor = 'not-allowed';
        } else {
            grantAllBtn.disabled = false;
            grantAllBtn.classList.remove('opacity-50');
            grantAllBtn.style.cursor = 'pointer';
        }
        
        // Disable/enable Revoke All button
        if (grantedCount === 0) {
            revokeAllBtn.disabled = true;
            revokeAllBtn.classList.add('opacity-50');
            revokeAllBtn.style.cursor = 'not-allowed';
        } else {
            revokeAllBtn.disabled = false;
            revokeAllBtn.classList.remove('opacity-50');
            revokeAllBtn.style.cursor = 'pointer';
        }
    }

    // Function to update permission row UI
    function updatePermissionRow(permission, isGranted) {
        const permissionName = permission.toUpperCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const permBtn = row.querySelector(`[data-permission="${permissionName}"]`);
            if (permBtn) {
                const statusCell = row.querySelector('td:nth-child(3)');
                const actionCell = row.querySelector('td:nth-child(4)');
                
                // Update status badge
                if (isGranted) {
                    statusCell.innerHTML = '<span class="badge bg-success">Granted</span>';
                } else {
                    statusCell.innerHTML = '<span class="badge bg-secondary">Revoked</span>';
                }
                
                // Update action button
                if (isGranted) {
                    actionCell.innerHTML = `
                        <button class="btn btn-sm btn-danger revoke-btn" data-permission="${permissionName}" style="min-width: 100px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M18 6l-12 12"></path>
                                <path d="M6 6l12 12"></path>
                            </svg>
                            Revoke
                        </button>
                    `;
                } else {
                    actionCell.innerHTML = `
                        <button class="btn btn-sm btn-success grant-btn" data-permission="${permissionName}" style="min-width: 100px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                            Grant
                        </button>
                    `;
                }
                
                // Reattach event listeners
                const newBtn = actionCell.querySelector('button');
                if (isGranted) {
                    attachRevokeListener(newBtn);
                } else {
                    attachGrantListener(newBtn);
                }
            }
        });
        
        // Update bulk action buttons state
        updateBulkActionButtons();
    }

    // Function to update all permission rows
    function refreshAllPermissions() {
        fetch('<?php echo base_url(); ?>systemsettings/databasePermissions', {
            method: 'GET',
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        })
        .then(response => response.text())
        .then(html => {
            // Parse the response to extract permission data
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const rows = doc.querySelectorAll('tbody tr');
            
            rows.forEach((row, index) => {
                const statusBadge = row.querySelector('td:nth-child(3) .badge');
                if (statusBadge) {
                    const isGranted = statusBadge.classList.contains('bg-success');
                    const permBtn = row.querySelector('[data-permission]');
                    if (permBtn) {
                        const permission = permBtn.getAttribute('data-permission');
                        updatePermissionRow(permission.toLowerCase(), isGranted);
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error refreshing permissions:', error);
        });
    }

    // Create User Form
    const createUserForm = document.getElementById('createUserForm');
    if (createUserForm) {
        createUserForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalHTML = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Creating...';
            
            fetch('<?php echo base_url(); ?>systemsettings/createPpfmoUser', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'password=' + encodeURIComponent(password)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message, 'success');
                    setTimeout(() => location.reload(), 1500);
                } else {
                    showAlert(data.message, 'danger');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalHTML;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            });
        });
    }

    // Attach grant listener function
    function attachGrantListener(btn) {
        btn.addEventListener('click', function() {
            const permission = this.getAttribute('data-permission');
            const originalHTML = this.innerHTML;
            
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            
            fetch('<?php echo base_url(); ?>systemsettings/grantPermission', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'permission=' + permission
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.message, data.success ? 'success' : 'danger');
                if (data.success) {
                    // Update UI in real-time
                    updatePermissionRow(permission.toLowerCase(), true);
                } else {
                    this.disabled = false;
                    this.innerHTML = originalHTML;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                this.disabled = false;
                this.innerHTML = originalHTML;
            });
        });
    }

    // Grant Permission - Initial attachment
    document.querySelectorAll('.grant-btn').forEach(btn => {
        attachGrantListener(btn);
    });

    // Attach revoke listener function
    function attachRevokeListener(btn) {
        btn.addEventListener('click', function() {
            const permission = this.getAttribute('data-permission');
            const originalHTML = this.innerHTML;
            
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            
            fetch('<?php echo base_url(); ?>systemsettings/revokePermission', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'permission=' + permission
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.message, data.success ? 'success' : 'danger');
                if (data.success) {
                    // Update UI in real-time
                    updatePermissionRow(permission.toLowerCase(), false);
                } else {
                    this.disabled = false;
                    this.innerHTML = originalHTML;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                this.disabled = false;
                this.innerHTML = originalHTML;
            });
        });
    }

    // Revoke Permission - Initial attachment
    document.querySelectorAll('.revoke-btn').forEach(btn => {
        attachRevokeListener(btn);
    });

    // Grant All
    const grantAllBtn = document.getElementById('grantAllBtn');
    if (grantAllBtn) {
        grantAllBtn.addEventListener('click', function() {
            const originalHTML = this.innerHTML;
            const btn = this;
            
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Granting...';
            
            fetch('<?php echo base_url(); ?>systemsettings/grantAllPermissions', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.message, data.success ? 'success' : 'danger');
                btn.innerHTML = originalHTML;
                if (data.success) {
                    // Update all permission rows in real-time
                    updatePermissionRow('select', true);
                    updatePermissionRow('insert', true);
                    updatePermissionRow('update', true);
                    updatePermissionRow('delete', true);
                    // Button state will be updated by updateBulkActionButtons()
                } else {
                    btn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                btn.disabled = false;
                btn.innerHTML = originalHTML;
            });
        });
    }

    // Revoke All
    const revokeAllBtn = document.getElementById('revokeAllBtn');
    if (revokeAllBtn) {
        revokeAllBtn.addEventListener('click', function() {
            if (!confirm('Are you sure you want to revoke ALL permissions? This will prevent PPFMO from accessing reservations.')) {
                return;
            }
            
            const originalHTML = this.innerHTML;
            const btn = this;
            
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Revoking...';
            
            fetch('<?php echo base_url(); ?>systemsettings/revokeAllPermissions', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.message, data.success ? 'success' : 'danger');
                btn.innerHTML = originalHTML;
                if (data.success) {
                    // Update all permission rows in real-time
                    updatePermissionRow('select', false);
                    updatePermissionRow('insert', false);
                    updatePermissionRow('update', false);
                    updatePermissionRow('delete', false);
                    // Button state will be updated by updateBulkActionButtons()
                } else {
                    btn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                btn.disabled = false;
                btn.innerHTML = originalHTML;
            });
        });
    }

    // Change Password
    const changePasswordForm = document.getElementById('changePasswordForm');
    if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const new_password = document.getElementById('new_password').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalHTML = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Changing...';
            
            fetch('<?php echo base_url(); ?>systemsettings/changePpfmoPassword', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'new_password=' + encodeURIComponent(new_password)
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.message, data.success ? 'success' : 'danger');
                if (data.success) {
                    this.reset();
                }
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            });
        });
    }

    // Remove Global/Super-Admin Privileges
    const removeGlobalPrivBtn = document.getElementById('removeGlobalPrivBtn');
    if (removeGlobalPrivBtn) {
        removeGlobalPrivBtn.addEventListener('click', function() {
            if (!confirm('⚠️ WARNING: Remove Super-Admin Privileges?\n\nThis will:\n✓ Remove ALL PRIVILEGES ON *.* (super-global access)\n✓ Remove GRANT OPTION\n✓ Allow you to manage individual permissions\n\nThe PPFMO system may temporarily lose access until you grant specific permissions.\n\nContinue?')) {
                return;
            }
            
            const originalHTML = this.innerHTML;
            const btn = this;
            
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Removing...';
            
            fetch('<?php echo base_url(); ?>systemsettings/removeGlobalPrivileges', {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => {
                showAlert(data.message, data.success ? 'success' : 'danger');
                if (data.success) {
                    setTimeout(() => location.reload(), 2000);
                } else {
                    btn.disabled = false;
                    btn.innerHTML = originalHTML;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred. Please try again.', 'danger');
                btn.disabled = false;
                btn.innerHTML = originalHTML;
            });
        });
    }

    // Initialize bulk action buttons state on page load
    updateBulkActionButtons();
});
</script>

<style>
#alert-container .alert {
    margin-bottom: 10px;
    border-radius: 8px;
    animation: slideInRight 0.3s ease-out;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>

</body>
</html>

