        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>
            
            <!-- Welcome Section -->
            <div class="mb-6">
              <h4 class="mb-2 d-flex align-items-center">Archived Reservations</h4>
              <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/reservations'); ?>">Reservations</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Archived</li>
                    </ol>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom-0">
                    <div class="row g-4">
                      <div class="col-lg-4">
                        <input type="search" class="form-control" id="searchInput" placeholder="Search archived reservations...">
                      </div>
                      <div class="col-lg-8 d-flex justify-content-end">
                        <div class="d-flex align-items-center gap-2">
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
                          <a href="<?php echo base_url('reservations'); ?>" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            Back to Reservations
                          </a>
                        </div>
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
                          <th class="fw-bold">Reservation ID</th>
                          <th class="fw-bold">Facility</th>
                          <th class="fw-bold">Reservation Date</th>
                          <th class="fw-bold">Time</th>
                          <th class="fw-bold">Contact Person</th>
                          <th class="fw-bold">Purpose</th>
                          <th class="fw-bold">Archived Date</th>
                        </tr>
                      </thead>
                      <tbody id="reservationsTableBody">
                        <?php if(!empty($reservations)): ?>
                          <?php foreach($reservations as $reservation): ?>
                            <tr data-id="<?php echo $reservation['id']; ?>">
                              <td class="pe-0">
                                <div class="form-check">
                                  <input class="form-check-input reservation-checkbox" type="checkbox" value="<?php echo $reservation['id']; ?>">
                                  <label class="form-check-label"></label>
                                </div>
                              </td>
                              <td><strong><?php echo $reservation['id']; ?></strong></td>
                              <td><?php echo $reservation['facility_name']; ?></td>
                              <td><?php echo date('M d, Y', strtotime($reservation['reservation_date'])); ?></td>
                              <td><?php echo $reservation['reservation_time']; ?></td>
                              <td><?php echo $reservation['contact_name']; ?></td>
                              <td><?php echo substr($reservation['event_purpose'], 0, 50) . (strlen($reservation['event_purpose']) > 50 ? '...' : ''); ?></td>
                              <td><?php echo date('M d, Y h:i A', strtotime($reservation['updated_at'])); ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                              No archived reservations found.
                            </td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="card-footer border-top border-dashed">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                      <p class="mb-0" id="entriesInfo"><?php echo count($reservations); ?> archived entries found</p>
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
              <p class="mb-0">Are you sure you want to restore <strong id="restoreCount">0</strong> reservation(s)?</p>
              <p class="text-muted small mt-2 mb-0">Restored reservations will be moved back to active reservations with a "pending" status.</p>
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
    // Pagination variables
    let currentPage = 1;
    let rowsPerPage = 10;
    let allRows = [];
    let filteredRows = [];
    
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
    
    // Initialize pagination
    function initPagination() {
        allRows = Array.from(document.querySelectorAll('#reservationsTableBody tr'));
        filteredRows = allRows.filter(row => row.style.display !== 'none');
        renderPage();
    }
    
    // Render current page
    function renderPage() {
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        
        // Hide all rows first
        allRows.forEach(row => row.classList.add('d-none'));
        
        // Show only rows for current page
        filteredRows.slice(start, end).forEach(row => row.classList.remove('d-none'));
        
        // Update pagination controls
        document.getElementById('currentPage').textContent = totalPages > 0 ? currentPage : 0;
        document.getElementById('totalPages').textContent = totalPages;
        document.getElementById('entriesInfo').textContent = `Showing ${start + 1}-${Math.min(end, filteredRows.length)} of ${filteredRows.length} archived entries`;
        
        // Enable/disable buttons
        document.getElementById('firstPage').disabled = currentPage === 1;
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage >= totalPages;
        document.getElementById('lastPage').disabled = currentPage >= totalPages;
    }
    
    // Pagination button handlers
    document.getElementById('firstPage').addEventListener('click', function() {
        currentPage = 1;
        renderPage();
    });
    
    document.getElementById('prevPage').addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderPage();
        }
    });
    
    document.getElementById('nextPage').addEventListener('click', function() {
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderPage();
        }
    });
    
    document.getElementById('lastPage').addEventListener('click', function() {
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        currentPage = totalPages;
        renderPage();
    });
    
    // Refresh table data without full page reload
    function refreshTableData() {
        fetch('<?php echo base_url(); ?>reservations/fetchAllArchivedReservations')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateTable(data.data);
                    // Reinitialize pagination after table update
                    initPagination();
                }
            })
            .catch(error => {
                console.error('Error refreshing table:', error);
                showAlert('Failed to refresh table data. Please refresh the page.', 'danger');
            });
    }
    
    // Update table with new data
    function updateTable(reservations) {
        const tbody = document.getElementById('reservationsTableBody');
        
        if (!reservations || reservations.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-5 text-muted">
                        No archived reservations found. <a href="<?php echo base_url('reservations'); ?>">View active reservations</a>
                    </td>
                </tr>
            `;
            return;
        }
        
        let html = '';
        reservations.forEach(reservation => {
            const status = reservation.status.toLowerCase();
            let badgeClass = '';
            let statusText = reservation.status.charAt(0).toUpperCase() + reservation.status.slice(1);
            
            switch(status) {
                case 'archived':
                    badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
                    statusText = 'Archived';
                    break;
                default:
                    badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
            }
            
            const reservationDate = new Date(reservation.reservation_date);
            const formattedDate = reservationDate.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
            const purpose = reservation.event_purpose.length > 50 
                ? reservation.event_purpose.substring(0, 50) + '...' 
                : reservation.event_purpose;
            const attendees = reservation.expected_attendees || 'N/A';
            
            html += `
                <tr data-id="${reservation.id}">
                    <td class="pe-0">
                        <div class="form-check">
                            <input class="form-check-input reservation-checkbox" type="checkbox" value="${reservation.id}">
                            <label class="form-check-label"></label>
                        </div>
                    </td>
                    <td><strong>${reservation.id}</strong></td>
                    <td>${escapeHtml(reservation.facility_name)}</td>
                    <td>${formattedDate}</td>
                    <td>${escapeHtml(reservation.reservation_time)}</td>
                    <td>${escapeHtml(reservation.contact_name)}</td>
                    <td>${escapeHtml(purpose)}</td>
                    <td>${attendees}</td>
                    <td>
                        <span class="badge ${badgeClass}">${statusText}</span>
                    </td>
                </tr>
            `;
        });
        
        tbody.innerHTML = html;
        
        // Reinitialize checkbox event listeners
        initCheckboxListeners();
    }
    
    // Helper function to escape HTML
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Toggle action dropdown visibility
    function toggleActionDropdown() {
        const actionDropdown = document.getElementById('actionDropdown');
        const reservationCheckboxes = document.querySelectorAll('.reservation-checkbox');
        const anyChecked = Array.from(reservationCheckboxes).some(cb => cb.checked);
        actionDropdown.style.display = anyChecked ? 'block' : 'none';
    }
    
    // Initialize checkbox listeners
    function initCheckboxListeners() {
        const checkAllBox = document.getElementById('checkAll');
        const reservationCheckboxes = document.querySelectorAll('.reservation-checkbox');
        
        // Reset checkAll state
        checkAllBox.checked = false;
        checkAllBox.indeterminate = false;
        
        // Hide action dropdown initially
        toggleActionDropdown();
        
        // Remove old event listeners by cloning and replacing the checkAll element
        const newCheckAllBox = checkAllBox.cloneNode(true);
        checkAllBox.parentNode.replaceChild(newCheckAllBox, checkAllBox);
        
        // Add checkAll listener
        newCheckAllBox.addEventListener('change', function() {
            reservationCheckboxes.forEach(cb => cb.checked = this.checked);
            toggleActionDropdown();
        });
        
        // Add individual checkbox listeners
        reservationCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(reservationCheckboxes).every(cb => cb.checked);
                const anyChecked = Array.from(reservationCheckboxes).some(cb => cb.checked);
                
                newCheckAllBox.checked = allChecked;
                newCheckAllBox.indeterminate = !allChecked && anyChecked;
                toggleActionDropdown();
            });
        });
    }
    
    // Initialize pagination on load
    initPagination();
    
    // Initialize checkbox functionality on load
    initCheckboxListeners();
    
    // Restore Action
    let selectedIdsForRestore = [];
    
    document.getElementById('restoreAction').addEventListener('click', function(e) {
        e.preventDefault();
        const reservationCheckboxes = document.querySelectorAll('.reservation-checkbox');
        const checked = Array.from(reservationCheckboxes).filter(cb => cb.checked);
        if (checked.length === 0) {
            showAlert('Please select at least one reservation to restore', 'danger');
            return;
        }
        
        // Store selected IDs and show count in modal
        selectedIdsForRestore = checked.map(cb => cb.value);
        document.getElementById('restoreCount').textContent = selectedIdsForRestore.length;
        
        // Show the confirmation modal
        new bootstrap.Modal(document.getElementById('restoreConfirmModal')).show();
    });
    
    // Confirm Restore Button Handler
    document.getElementById('confirmRestoreBtn').addEventListener('click', function() {
        const confirmBtn = this;
        const originalHTML = confirmBtn.innerHTML;
        
        // Disable button and show loading state
        confirmBtn.disabled = true;
        confirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Restoring...';
        
        fetch('<?php echo base_url(); ?>reservations/restoreReservation', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'ids=' + JSON.stringify(selectedIdsForRestore)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide modal
                bootstrap.Modal.getInstance(document.getElementById('restoreConfirmModal')).hide();
                
                // Show success message
                showAlert(data.message, 'success');
                
                // Refresh table without full page reload
                setTimeout(() => {
                    refreshTableData();
                }, 500);
            } else {
                showAlert(data.message, 'danger');
                
                // Re-enable button
                confirmBtn.disabled = false;
                confirmBtn.innerHTML = originalHTML;
            }
        })
        .catch(error => {
            console.error('Error restoring reservations:', error);
            showAlert('An error occurred while restoring. Please try again.', 'danger');
            
            // Re-enable button
            confirmBtn.disabled = false;
            confirmBtn.innerHTML = originalHTML;
        });
    });
    
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        
        // Reset all rows display
        allRows.forEach(row => row.style.display = '');
        
        // Filter rows based on search
        allRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (!text.includes(searchTerm)) {
                row.style.display = 'none';
            }
        });
        
        // Update filtered rows and reset to page 1
        filteredRows = allRows.filter(row => row.style.display !== 'none');
        currentPage = 1;
        renderPage();
    });
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

