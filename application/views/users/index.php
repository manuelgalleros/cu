        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>

            <!-- Header -->
            <div class="mb-4">
              <h4 class="mb-1 d-flex align-items-center">Manage Users</h4>
              <nav aria-label="breadcrumb" class="mt-2">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom-0" style="position: relative; z-index: 10;">
                    <div class="row g-4">
                      <div class="col-lg-4">
                        <input type="search" class="form-control" id="searchInput" placeholder="Search users...">
                      </div>
                      <div class="col-lg-8 d-flex justify-content-end">
                        <div class="d-flex align-items-center gap-2">
                          <!-- Action Dropdown (Hidden by default, shows when users are selected) -->
                          <div class="dropdown" id="actionDropdown" style="display: none; position: static;">
                            <button class="btn btn-subtle-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="z-index: 1050;">
                              <li>
                                <a class="dropdown-item" href="#!" id="editAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                  </svg>
                                  Edit
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#!" id="deleteAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                  </svg>
                                  Delete
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#!" id="manageDbPermsAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                                  </svg>
                                  Manage DB Permissions
                                </a>
                              </li>
                            </ul>
                          </div>
                          <a href="<?php echo base_url('users/create'); ?>" class="btn btn-subtle-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            Add New User
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="table-responsive table-checkbox" style="max-height: 70vh; overflow-x: auto; overflow-y: auto;">
                    <table class="table text-nowrap table-centered table-hover mb-0" style="min-width: 1100px;">
                      <thead class="sticky-top" style="z-index: 5;">
                        <tr>
                          <th class="pe-0">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="checkAll">
                              <label class="form-check-label" for="checkAll"></label>
                            </div>
                          </th>
                          <th class="fw-bold">Email</th>
                          <th class="fw-bold">Name</th>
                          <th class="fw-bold">Mobile</th>
                          <th class="fw-bold">Affiliation</th>
                        </tr>
                      </thead>
                      <tbody id="usersTableBody">
                        <?php if(!empty($all_users)): ?>
                          <?php foreach($all_users as $row): ?>
                            <tr data-id="<?php echo $row['user_info']['id']; ?>">
                              <td class="pe-0">
                                <div class="form-check">
                                  <input class="form-check-input user-checkbox" type="checkbox" value="<?php echo $row['user_info']['id']; ?>">
                                  <label class="form-check-label"></label>
                                </div>
                              </td>
                              <td><?php echo htmlspecialchars($row['user_info']['email']); ?></td>
                              <td><?php echo htmlspecialchars($row['user_info']['firstname'] . ' ' . $row['user_info']['lastname']); ?></td>
                              <td><?php echo htmlspecialchars($row['user_info']['mobile_number']); ?></td>
                              <td><?php echo htmlspecialchars($row['user_info']['affiliation']); ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                              No users found.
                            </td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="card-footer border-top border-dashed">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                      <p class="mb-0" id="entriesInfo"><?php echo count($all_users); ?> entries found</p>
                      <div class="d-flex align-items-center gap-2">
                        <div class="pagination-controls">
                          <button class="btn btn-sm btn-white" id="firstPage" disabled>First</button>
                          <button class="btn btn-sm btn-white" id="prevPage" disabled>Previous</button>
                          <span class="mx-2" id="pageInfo">Page <strong id="currentPage">1</strong> of <strong id="totalPages">1</strong></span>
                          <button class="btn btn-sm btn-white" id="nextPage">Next</button>
                          <button class="btn btn-sm btn-white" id="lastPage">Last</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>

<!-- Database Permissions Modal -->
<div class="modal fade" id="dbPermissionsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
            <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
            <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
          </svg>
          Manage Database Permissions
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-info mb-4">
          <strong>Selected Users:</strong> <span id="selectedUsersCount">0</span> user(s)<br>
          <small>Click on privilege cards to grant/revoke MySQL database permissions for the selected users.</small>
        </div>
        
        <!-- Privilege Cards Grid (Similar to Reservation Time Slots) -->
        <div class="row g-3">
          <div class="col-12">
            <h6 class="text-muted mb-3">Basic Data Operations</h6>
            <div class="row g-2">
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="SELECT" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_SELECT" value="SELECT">
                      <label class="form-check-label" for="priv_SELECT">
                        <strong>SELECT</strong><br>
                        <small class="text-muted">Read data from tables</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="INSERT" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_INSERT" value="INSERT">
                      <label class="form-check-label" for="priv_INSERT">
                        <strong>INSERT</strong><br>
                        <small class="text-muted">Insert new records</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="UPDATE" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_UPDATE" value="UPDATE">
                      <label class="form-check-label" for="priv_UPDATE">
                        <strong>UPDATE</strong><br>
                        <small class="text-muted">Modify existing records</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="DELETE" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_DELETE" value="DELETE">
                      <label class="form-check-label" for="priv_DELETE">
                        <strong>DELETE</strong><br>
                        <small class="text-muted">Delete records</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-12"><hr></div>
          
          <div class="col-12">
            <h6 class="text-muted mb-3">Table Structure</h6>
            <div class="row g-2">
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="CREATE" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_CREATE" value="CREATE">
                      <label class="form-check-label" for="priv_CREATE">
                        <strong>CREATE</strong><br>
                        <small class="text-muted">Create new tables</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="DROP" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_DROP" value="DROP">
                      <label class="form-check-label" for="priv_DROP">
                        <strong>DROP</strong><br>
                        <small class="text-muted">Drop tables</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="ALTER" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_ALTER" value="ALTER">
                      <label class="form-check-label" for="priv_ALTER">
                        <strong>ALTER</strong><br>
                        <small class="text-muted">Modify table structure</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="card privilege-card border cursor-pointer" data-privilege="INDEX" style="cursor: pointer; transition: all 0.3s;">
                  <div class="card-body p-3">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input privilege-checkbox" id="priv_INDEX" value="INDEX">
                      <label class="form-check-label" for="priv_INDEX">
                        <strong>INDEX</strong><br>
                        <small class="text-muted">Create/drop indexes</small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" id="clearAllPerms">Clear All</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="savePermissions">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
            <circle cx="12" cy="14" r="2"></circle>
            <polyline points="14 4 14 8 8 8 8 4"></polyline>
          </svg>
          Save Permissions
        </button>
      </div>
    </div>
  </div>
</div>

<style>
/* Privilege Cards */
.privilege-card:hover {
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  transform: translateY(-2px);
}
.privilege-card.border-danger {
  border-width: 2px !important;
  border-color: #dc3545 !important;
  background-color: #fff5f5;
}

/* Dropdown Menu Positioning Fix */
.card-header {
  overflow: visible !important;
}
.dropdown-menu {
  position: absolute !important;
}
.table-responsive {
  overflow: visible !important;
}
.table-responsive.table-checkbox {
  overflow-x: auto !important;
  overflow-y: auto !important;
}
</style>

<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  let currentPage = 1;
  let rowsPerPage = 10;
  let allRows = [];
  let filteredRows = [];

  // Reservation-style success alert helper
  function showAlert(message, type) {
    var alertContainer = document.getElementById('alert-container');
    var alertId = 'alert-' + Date.now();
    var cls = type === 'success' ? 'alert-success' : 'alert-danger';
    var html = `
      <div id="${alertId}" class="alert ${cls} alert-dismissible fade show shadow-lg" role="alert">
        <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    `;
    alertContainer.insertAdjacentHTML('beforeend', html);
    setTimeout(function(){
      var el = document.getElementById(alertId);
      if (el) { var bs = new bootstrap.Alert(el); bs.close(); }
    }, 2000);
  }

  function initPagination() {
    allRows = Array.from(document.querySelectorAll('#usersTableBody tr'));
    filteredRows = allRows.filter(row => row.style.display !== 'none');
    renderPage();
  }

  function renderPage() {
    const totalPages = Math.ceil(filteredRows.length / rowsPerPage) || 1;
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    allRows.forEach(row => row.classList.add('d-none'));
    filteredRows.slice(start, end).forEach(row => row.classList.remove('d-none'));
    document.getElementById('currentPage').textContent = totalPages > 0 ? currentPage : 0;
    document.getElementById('totalPages').textContent = totalPages;
    document.getElementById('entriesInfo').textContent = `Showing ${filteredRows.length === 0 ? 0 : start + 1}-${Math.min(end, filteredRows.length)} of ${filteredRows.length} entries`;
    document.getElementById('firstPage').disabled = currentPage === 1;
    document.getElementById('prevPage').disabled = currentPage === 1;
    document.getElementById('nextPage').disabled = currentPage >= totalPages;
    document.getElementById('lastPage').disabled = currentPage >= totalPages;
  }

  document.getElementById('firstPage').addEventListener('click', function(){ currentPage = 1; renderPage(); });
  document.getElementById('prevPage').addEventListener('click', function(){ if(currentPage>1){ currentPage--; renderPage(); }});
  document.getElementById('nextPage').addEventListener('click', function(){ const totalPages = Math.ceil(filteredRows.length / rowsPerPage) || 1; if(currentPage<totalPages){ currentPage++; renderPage(); }});
  document.getElementById('lastPage').addEventListener('click', function(){ const totalPages = Math.ceil(filteredRows.length / rowsPerPage) || 1; currentPage = totalPages; renderPage(); });

  document.getElementById('searchInput').addEventListener('keyup', function(){
    const term = this.value.toLowerCase();
    allRows.forEach(row => row.style.display = '');
    allRows.forEach(row => { const text = row.textContent.toLowerCase(); if(!text.includes(term)){ row.style.display = 'none'; } });
    filteredRows = allRows.filter(row => row.style.display !== 'none');
    currentPage = 1;
    renderPage();
  });

  // Toggle action dropdown visibility (like reservations)
  function toggleActionDropdown() {
    const actionDropdown = document.getElementById('actionDropdown');
    const userCheckboxes = document.querySelectorAll('.user-checkbox');
    const anyChecked = Array.from(userCheckboxes).some(cb => cb.checked);
    actionDropdown.style.display = anyChecked ? 'block' : 'none';
  }

  // Initialize checkbox listeners (like reservations)
  function initCheckboxListeners() {
    const checkAllBox = document.getElementById('checkAll');
    const userCheckboxes = document.querySelectorAll('.user-checkbox');
    
    checkAllBox.checked = false;
    checkAllBox.indeterminate = false;
    toggleActionDropdown();
    
    // CheckAll listener
    checkAllBox.addEventListener('change', function() {
      userCheckboxes.forEach(cb => cb.checked = this.checked);
      toggleActionDropdown();
    });
    
    // Individual checkbox listeners
    userCheckboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const allChecked = Array.from(userCheckboxes).every(cb => cb.checked);
        const anyChecked = Array.from(userCheckboxes).some(cb => cb.checked);
        checkAllBox.checked = allChecked;
        checkAllBox.indeterminate = !allChecked && anyChecked;
        toggleActionDropdown();
      });
    });
  }

  initPagination();
  initCheckboxListeners();

  // Show server flash messages
  <?php if($this->session->flashdata('success')): ?>
    showAlert('<?php echo $this->session->flashdata('success'); ?>', 'success');
    <?php $this->session->unset_userdata('success'); ?>
  <?php endif; ?>
  
  <?php if($this->session->flashdata('error')): ?>
    showAlert('<?php echo $this->session->flashdata('error'); ?>', 'danger');
    <?php $this->session->unset_userdata('error'); ?>
  <?php endif; ?>

  // Edit Action - Redirects to edit page for single user, or shows alert for multiple
  document.getElementById('editAction').addEventListener('click', function(e) {
    e.preventDefault();
    const selectedCheckboxes = Array.from(document.querySelectorAll('.user-checkbox:checked'));
    
    if (selectedCheckboxes.length === 0) {
      showAlert('Please select at least one user', 'danger');
      return;
    }
    
    if (selectedCheckboxes.length === 1) {
      // Single user - redirect to edit page
      window.location.href = '<?php echo base_url(); ?>users/permissions/' + selectedCheckboxes[0].value;
    } else {
      // Multiple users - show info
      showAlert('Please select only one user to edit', 'danger');
    }
  });

  // Delete Action - Delete selected users
  document.getElementById('deleteAction').addEventListener('click', function(e) {
    e.preventDefault();
    const selectedCheckboxes = Array.from(document.querySelectorAll('.user-checkbox:checked'));
    
    if (selectedCheckboxes.length === 0) {
      showAlert('Please select at least one user to delete', 'danger');
      return;
    }
    
    const count = selectedCheckboxes.length;
    const confirmMsg = count === 1 
      ? 'Are you sure you want to delete this user?' 
      : `Are you sure you want to delete ${count} users?`;
    
    if (!confirm(confirmMsg)) {
      return;
    }
    
    // Delete users one by one
    let deleted = 0;
    let failed = 0;
    
    const deletePromises = selectedCheckboxes.map(cb => {
      return fetch('<?php echo base_url(); ?>users/delete/' + encodeURIComponent(cb.value), {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: 'confirm=1'
      })
      .then(res => res.json().catch(() => null))
      .then(json => {
        if (json && json.success) {
          deleted++;
        } else {
          failed++;
        }
      })
      .catch(() => {
        failed++;
      });
    });
    
    Promise.all(deletePromises).then(() => {
      if (deleted > 0) {
        showAlert(`Successfully deleted ${deleted} user(s)${failed > 0 ? ` (${failed} failed)` : ''}`, 'success');
        setTimeout(() => {
          window.location.reload();
        }, 1500);
      } else {
        showAlert('Failed to delete users', 'danger');
      }
    });
  });

  // Database Permissions Modal Logic
  const dbPermsModal = new bootstrap.Modal(document.getElementById('dbPermissionsModal'));
  
  // Open modal when action clicked
  document.getElementById('manageDbPermsAction').addEventListener('click', function(e) {
    e.preventDefault();
    const selectedCheckboxes = Array.from(document.querySelectorAll('.user-checkbox:checked'));
    const count = selectedCheckboxes.length;
    document.getElementById('selectedUsersCount').textContent = count;
    
    // Reset all privilege checkboxes
    document.querySelectorAll('.privilege-checkbox').forEach(cb => {
      cb.checked = false;
      const card = cb.closest('.privilege-card');
      card.classList.remove('border-danger');
    });
    
    dbPermsModal.show();
  });

  // Privilege card click handling (like reservation time slots)
  document.querySelectorAll('.privilege-card').forEach(card => {
    card.addEventListener('click', function(e) {
      if (e.target.type === 'checkbox' || e.target.tagName === 'LABEL') {
        return;
      }
      const checkbox = this.querySelector('.privilege-checkbox');
      checkbox.checked = !checkbox.checked;
      
      if (checkbox.checked) {
        this.classList.add('border-danger');
      } else {
        this.classList.remove('border-danger');
      }
    });
  });

  // Privilege checkbox change (for direct checkbox clicks)
  document.querySelectorAll('.privilege-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
      const card = this.closest('.privilege-card');
      if (this.checked) {
        card.classList.add('border-danger');
      } else {
        card.classList.remove('border-danger');
      }
    });
  });

  // Clear all privileges
  document.getElementById('clearAllPerms').addEventListener('click', function() {
    document.querySelectorAll('.privilege-checkbox').forEach(cb => {
      cb.checked = false;
      const card = cb.closest('.privilege-card');
      card.classList.remove('border-danger');
    });
  });

  // Save permissions
  document.getElementById('savePermissions').addEventListener('click', function() {
    const selectedUsers = Array.from(document.querySelectorAll('.user-checkbox:checked')).map(cb => cb.value);
    const selectedPrivileges = Array.from(document.querySelectorAll('.privilege-checkbox:checked')).map(cb => cb.value);
    
    if (selectedUsers.length === 0) {
      showAlert('No users selected', 'danger');
      return;
    }
    
    const saveBtn = this;
    const originalText = saveBtn.innerHTML;
    saveBtn.disabled = true;
    saveBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
    
    const formData = new FormData();
    selectedUsers.forEach(id => formData.append('user_ids[]', id));
    selectedPrivileges.forEach(priv => formData.append('privileges[]', priv));
    
    fetch('<?php echo base_url(); ?>users/updateDatabasePermissions', {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        dbPermsModal.hide();
        showAlert(data.message, 'success');
        
        // Uncheck all user checkboxes
        document.querySelectorAll('.user-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('checkAll').checked = false;
        toggleActionDropdown();
      } else {
        showAlert(data.message || 'Failed to update permissions', 'danger');
      }
      saveBtn.disabled = false;
      saveBtn.innerHTML = originalText;
    })
    .catch(error => {
      console.error('Error:', error);
      showAlert('An error occurred while saving permissions', 'danger');
      saveBtn.disabled = false;
      saveBtn.innerHTML = originalText;
    });
  });
});
</script>


