        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>
            
            <!-- Welcome Section -->
            <div class="mb-6">
              <h4 class="mb-2 d-flex align-items-center">Archived Activity Logs</h4>
              <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/logs'); ?>">Activity Logs</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Archived</li>
                    </ol>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom-0">
                     <div class="row g-4">
                        <div class="col-lg-3">
                          <label class="form-label small text-muted mb-1">Search</label>
                          <input type="search" class="form-control" id="searchInput" placeholder="Search archived logs...">
                        </div>
                        <div class="col-lg-3">
                          <label class="form-label small text-muted mb-1">Users</label>
                          <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary dropdown-toggle w-100 text-start" type="button" id="userFilterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                              <span class="selected-users">All Users</span>
                            </button>
                            <div class="dropdown-menu p-3 w-100" id="userFilterDropdown" style="max-height: 300px; overflow-y: auto;">
                              <div class="mb-2">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="selectAllUsers">
                                  <label class="form-check-label fw-bold" for="selectAllUsers">
                                    Select All
                                  </label>
                                </div>
                                <hr class="my-2">
                              </div>
                              <div id="userCheckboxes">
                                <!-- Will be populated dynamically -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <label class="form-label small text-muted mb-1">Action Type</label>
                          <select class="form-select" id="actionFilter">
                            <option value="">All Actions</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="create">Create</option>
                            <option value="update">Update</option>
                            <option value="delete">Delete</option>
                            <option value="archive">Archive</option>
                            <option value="restore">Restore</option>
                          </select>
                        </div>
                        <div class="col-lg-3">
                          <label class="form-label small text-muted mb-1">Date Range</label>
                          <div class="input-group">
                            <input type="date" class="form-control" id="startDate" placeholder="Start" max="">
                            <span class="input-group-text">to</span>
                            <input type="date" class="form-control" id="endDate" placeholder="End" max="">
                          </div>
                          <script>
                            // Set max date to today for both date inputs
                            const today = new Date().toISOString().split('T')[0];
                            document.getElementById('startDate').max = today;
                            document.getElementById('endDate').max = today;
                            
                            // Ensure end date is not before start date
                            document.getElementById('startDate').addEventListener('change', function() {
                                document.getElementById('endDate').min = this.value;
                            });
                            
                            // Ensure start date is not after end date
                            document.getElementById('endDate').addEventListener('change', function() {
                                document.getElementById('startDate').max = this.value || today;
                            });
                          </script>
                        </div>
                      </div>
                    <div class="row g-4 mt-1 mb-1">
                        <div class="col-lg-3">
                          <label class="form-label small text-muted mb-1">Time Range</label>
                          <div class="input-group">
                            <input type="time" class="form-control" id="startTime" placeholder="Start Time">
                            <span class="input-group-text">to</span>
                            <input type="time" class="form-control" id="endTime" placeholder="End Time">
                          </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-end gap-2">
                          <button class="btn btn-outline-danger" id="clearFilters">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            Clear Filters
                          </button>
                          <button class="btn btn-subtle-info" id="applyFilters">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                            Apply Filters
                          </button>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-end align-items-end gap-2">
                          <!-- Action Dropdown -->
                          <div class="dropdown" id="actionDropdown" style="display: none;">
                            <button class="btn btn-subtle-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#!" id="restoreAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-restore me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3.06 13a9 9 0 1 0 .49 -4.087"></path>
                                    <path d="M3 4.001v5h5"></path>
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                  </svg>
                                  Restore
                                </a>
                              </li>
                            </ul>
                          </div>
                          <a href="<?php echo base_url('logs'); ?>" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            Back to Logs
                          </a>
                        </div>
                      </div>
                  </div>

                  <div class="table-responsive table-checkbox" style="max-height: 70vh; overflow-x: auto; overflow-y: auto;">
                    <table class="table text-nowrap table-centered table-hover mb-0" style="min-width: 1200px;">
                      <thead class="sticky-top">
                        <tr>
                          <th class="pe-0">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="checkAll">
                              <label class="form-check-label" for="checkAll"></label>
                            </div>
                          </th>
                          <th class="fw-bold">ID</th>
                          <th class="fw-bold">User</th>
                          <th class="fw-bold">Action</th>
                          <th class="fw-bold">Description</th>
                          <th class="fw-bold">Date & Time</th>
                        </tr>
                      </thead>
                      <tbody id="logsTableBody">
                        <!-- Logs will be populated here via AJAX -->
                        <tr>
                          <td colspan="6" class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                              <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2 text-muted">Loading archived logs...</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="card-footer border-top border-dashed">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                      <p class="mb-0" id="entriesInfo">0 archived entries found</p>
                      <div class="d-flex align-items-center gap-2">
                        <div class="pagination-controls">
                          <button class="btn btn-sm btn-white" id="firstPage" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                            First
                          </button>
                          <button class="btn btn-sm btn-white" id="prevPage" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            Previous
                          </button>
                          <span class="mx-2" id="pageInfo">Page <strong id="currentPage">1</strong> of <strong id="totalPages">1</strong></span>
                          <button class="btn btn-sm btn-white" id="nextPage">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                          </button>
                          <button class="btn btn-sm btn-white" id="lastPage">
                            Last
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>

      <!-- Restore Confirmation Modal -->
      <div class="modal fade" id="restoreConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success-subtle">
              <h5 class="modal-title">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-restore me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3.06 13a9 9 0 1 0 .49 -4.087"></path>
                  <path d="M3 4.001v5h5"></path>
                  <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                </svg>
                Confirm Restore
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="mb-0">Are you sure you want to restore <strong id="restoreCount">0</strong> log(s)?</p>
              <p class="text-muted small mt-2 mb-0">Restored logs will be moved back to active logs.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-success" id="confirmRestoreBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-restore me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3.06 13a9 9 0 1 0 .49 -4.087"></path>
                  <path d="M3 4.001v5h5"></path>
                  <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                </svg>
                Restore
              </button>
            </div>
          </div>
        </div>
      </div>

<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;
    let totalPages = 1;
    let searchTerm = '';
    let startDate = '';
    let endDate = '';
    let startTime = '';
    let endTime = '';
    let userFilter = '';
    let actionFilter = '';

    // Load users for filter dropdown
    function loadUsers() {
        fetch('<?php echo base_url(); ?>logs/getUsers')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const userCheckboxes = document.getElementById('userCheckboxes');
                    userCheckboxes.innerHTML = ''; // Clear existing checkboxes
                    
                    // Add users as checkboxes
                    data.users.forEach(user => {
                        const div = document.createElement('div');
                        div.className = 'form-check';
                        div.innerHTML = `
                            <input class="form-check-input user-checkbox" type="checkbox" 
                                   id="user_${user.id}" value="${user.id}" 
                                   data-name="${user.name}">
                            <label class="form-check-label" for="user_${user.id}">
                                ${user.name}
                            </label>
                        `;
                        userCheckboxes.appendChild(div);
                    });
                    
                    // Handle Select All checkbox
                    const selectAllCheckbox = document.getElementById('selectAllUsers');
                    const userCheckboxInputs = document.querySelectorAll('.user-checkbox');
                    
                    selectAllCheckbox.addEventListener('change', function() {
                        userCheckboxInputs.forEach(checkbox => {
                            checkbox.checked = this.checked;
                        });
                        updateSelectedUsersText();
                    });
                    
                    // Handle individual checkbox changes
                    userCheckboxInputs.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const allChecked = Array.from(userCheckboxInputs).every(cb => cb.checked);
                            const someChecked = Array.from(userCheckboxInputs).some(cb => cb.checked);
                            selectAllCheckbox.checked = allChecked;
                            selectAllCheckbox.indeterminate = someChecked && !allChecked;
                            updateSelectedUsersText();
                        });
                    });
                    
                    // Prevent dropdown from closing when clicking inside
                    document.getElementById('userFilterDropdown').addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                }
            })
            .catch(error => {
                console.error('Error loading users:', error);
                showAlert('Error loading users. Please try again.', 'danger');
            });
    }
    
    // Update the selected users text
    function updateSelectedUsersText() {
        const selectedCheckboxes = document.querySelectorAll('.user-checkbox:checked');
        const selectedCount = selectedCheckboxes.length;
        const totalUsers = document.querySelectorAll('.user-checkbox').length;
        const selectedUsersSpan = document.querySelector('.selected-users');
        
        if (selectedCount === 0) {
            selectedUsersSpan.textContent = 'All Users';
        } else if (selectedCount === totalUsers) {
            selectedUsersSpan.textContent = 'All Users Selected';
        } else {
            const names = Array.from(selectedCheckboxes)
                .map(cb => cb.dataset.name)
                .slice(0, 2);
            const additional = selectedCount > 2 ? ` (+${selectedCount - 2} more)` : '';
            selectedUsersSpan.textContent = names.join(', ') + additional;
        }
        
        // Update userFilter value for search
        userFilter = selectedCount === 0 ? '' : 
            Array.from(selectedCheckboxes).map(cb => cb.value).join(',');
            
        // Trigger search with new filter
        loadLogs(1);
    }
    
    // Bootstrap Alert Function
    function showAlert(message, type, duration = 5000) {
        var alertContainer = document.getElementById('alert-container');
        var alertId = 'alert-' + Date.now();
        
        var alertHTML = `
            <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show shadow-lg" role="alert">
                <strong>${type === 'success' ? 'Success!' : 'Error!'}</strong> ${message}
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
    
    // Function to load logs
    function loadLogs(page = 1) {
        const tbody = document.getElementById('logsTableBody');
        tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-muted">Loading archived logs...</p>
                </td>
            </tr>
        `;
        
        const params = new URLSearchParams({
            page: page,
            search: searchTerm,
            start_date: startDate,
            end_date: endDate,
            start_time: startTime,
            end_time: endTime,
            user_id: userFilter,
            action_type: actionFilter
        });
        
        fetch('<?php echo base_url(); ?>logs/fetchArchivedLogs?' + params.toString())
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    currentPage = data.currentPage;
                    totalPages = data.totalPages;
                    
                    // Update pagination info
                    document.getElementById('currentPage').textContent = currentPage;
                    document.getElementById('totalPages').textContent = totalPages;
                    document.getElementById('entriesInfo').textContent = data.range + ' archived';
                    
                    // Update pagination buttons
                    document.getElementById('firstPage').disabled = currentPage === 1;
                    document.getElementById('prevPage').disabled = currentPage === 1;
                    document.getElementById('nextPage').disabled = currentPage >= totalPages;
                    document.getElementById('lastPage').disabled = currentPage >= totalPages;
                    
                    // Populate table
                    if (data.logs.length > 0) {
                        tbody.innerHTML = '';
                        data.logs.forEach(log => {
                            const actionBadge = getActionBadge(log.action);
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td class="pe-0">
                                    <div class="form-check">
                                        <input class="form-check-input log-checkbox" type="checkbox" value="${log.id}">
                                        <label class="form-check-label"></label>
                                    </div>
                                </td>
                                <td><strong>#${log.id}</strong></td>
                                <td>${log.user}</td>
                                <td>${actionBadge}</td>
                                <td>${log.description}</td>
                                <td>${log.date}</td>
                            `;
                            tbody.appendChild(row);
                        });
                        
                        // Reinitialize checkbox handlers
                        initCheckboxHandlers();
                    } else {
                        tbody.innerHTML = `
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    No archived logs found.
                                </td>
                            </tr>
                        `;
                    }
                } else {
                    showAlert(data.message || 'Failed to load logs', 'danger');
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="6" class="text-center py-5 text-danger">
                                Error loading logs. Please try again.
                            </td>
                        </tr>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('An error occurred while loading logs', 'danger');
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-5 text-danger">
                            Error loading logs. Please try again.
                        </td>
                    </tr>
                `;
            });
    }
    
    // Function to get action badge
    function getActionBadge(action) {
        const actionLower = action.toLowerCase();
        let badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
        
        if (actionLower === 'create') {
            badgeClass = 'bg-success-subtle text-success-emphasis';
        } else if (actionLower === 'update') {
            badgeClass = 'bg-info-subtle text-info-emphasis';
        } else if (actionLower === 'delete') {
            badgeClass = 'bg-danger-subtle text-danger-emphasis';
        } else if (actionLower === 'archive') {
            badgeClass = 'bg-warning-subtle text-warning-emphasis';
        } else if (actionLower === 'restore') {
            badgeClass = 'bg-primary-subtle text-primary-emphasis';
        }
        
        return `<span class="badge ${badgeClass}">${action}</span>`;
    }
    
    // Checkbox handlers
    function initCheckboxHandlers() {
        const actionDropdown = document.getElementById('actionDropdown');
        const checkAllBox = document.getElementById('checkAll');
        const logCheckboxes = document.querySelectorAll('.log-checkbox');
        
        function toggleActionDropdown() {
            const anyChecked = Array.from(logCheckboxes).some(cb => cb.checked);
            actionDropdown.style.display = anyChecked ? 'block' : 'none';
        }
        
        checkAllBox.addEventListener('change', function() {
            logCheckboxes.forEach(cb => cb.checked = this.checked);
            toggleActionDropdown();
        });
        
        logCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(logCheckboxes).every(cb => cb.checked);
                checkAllBox.checked = allChecked;
                checkAllBox.indeterminate = !allChecked && Array.from(logCheckboxes).some(cb => cb.checked);
                toggleActionDropdown();
            });
        });
    }
    
    // Pagination handlers
    document.getElementById('firstPage').addEventListener('click', () => loadLogs(1));
    document.getElementById('prevPage').addEventListener('click', () => loadLogs(currentPage - 1));
    document.getElementById('nextPage').addEventListener('click', () => loadLogs(currentPage + 1));
    document.getElementById('lastPage').addEventListener('click', () => loadLogs(totalPages));
    
    // Filter handlers

    document.getElementById('applyFilters').addEventListener('click', function() {
        searchTerm = document.getElementById('searchInput').value;
        startDate = document.getElementById('startDate').value;
        endDate = document.getElementById('endDate').value;
        startTime = document.getElementById('startTime').value;
        endTime = document.getElementById('endTime').value;
        // Get selected user IDs from checkboxes
        userFilter = Array.from(document.querySelectorAll('.user-checkbox:checked'))
            .map(cb => cb.value)
            .join(',');
        actionFilter = document.getElementById('actionFilter').value;
        loadLogs(1);
    });
    
    document.getElementById('clearFilters').addEventListener('click', function() {
        document.getElementById('searchInput').value = '';
        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
        document.getElementById('startTime').value = '';
        document.getElementById('endTime').value = '';
        // Clear user checkboxes
        document.querySelectorAll('.user-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('selectAllUsers').checked = false;
        document.getElementById('selectAllUsers').indeterminate = false;
        document.querySelector('.selected-users').textContent = 'All Users';
        userFilter = '';
        document.getElementById('actionFilter').value = '';
        searchTerm = '';
        startDate = '';
        endDate = '';
        startTime = '';
        endTime = '';
        userFilter = '';
        actionFilter = '';
        loadLogs(1);
    });
    
    // Allow Enter key to apply filters
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('applyFilters').click();
        }
    });
    
    // Restore Action
    let selectedIdsForRestore = [];
    
    document.getElementById('restoreAction').addEventListener('click', function(e) {
        e.preventDefault();
        const checked = Array.from(document.querySelectorAll('.log-checkbox')).filter(cb => cb.checked);
        if (checked.length === 0) {
            showAlert('Please select at least one log to restore', 'danger');
            return;
        }
        
        selectedIdsForRestore = checked.map(cb => cb.value);
        document.getElementById('restoreCount').textContent = selectedIdsForRestore.length;
        new bootstrap.Modal(document.getElementById('restoreConfirmModal')).show();
    });
    
    // Confirm Restore Button Handler
    document.getElementById('confirmRestoreBtn').addEventListener('click', function() {
        const confirmBtn = this;
        const originalHTML = confirmBtn.innerHTML;
        
        confirmBtn.disabled = true;
        confirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Restoring...';
        
        fetch('<?php echo base_url(); ?>logs/restoreLogs', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'ids=' + JSON.stringify(selectedIdsForRestore)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('restoreConfirmModal')).hide();
                showAlert(data.message, 'success');
                loadLogs(currentPage);
            } else {
                showAlert(data.message, 'danger');
                confirmBtn.disabled = false;
                confirmBtn.innerHTML = originalHTML;
            }
        })
        .catch(error => {
            console.error('Error restoring logs:', error);
            showAlert('An error occurred while restoring. Please try again.', 'danger');
            confirmBtn.disabled = false;
            confirmBtn.innerHTML = originalHTML;
        });
    });
    
    // Initial load
    loadUsers();
    loadLogs(1);
});
</script>

<style>
.sticky-top {
    position: sticky;
    top: 0;
    background-color: white;
    z-index: 10;
}

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

.pagination-controls {
    display: flex;
    align-items: center;
    gap: 8px;
}

.pagination-controls button {
    display: flex;
    align-items: center;
    gap: 4px;
}

.pagination-controls button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
</body>
</html>

