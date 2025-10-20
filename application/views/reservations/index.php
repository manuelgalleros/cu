        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>
            
            <!-- Welcome Section -->
            <div class="mb-6">
              <h4 class="mb-2 d-flex align-items-center">Manage Reservations</h4>
              <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Manage Reservations</li>
                    </ol>
              </nav>
            </div>
            
            <div class="row">
              <div class="col-12">
                  <div>
                <div class="card card-lg">
                  <div class="card-header border-bottom-0">
                    <div class="row g-4">
                      <div class="col-lg-4">
                        <input type="search" class="form-control" id="searchInput" placeholder="Search reservations...">
                      </div>
                      <div class="col-lg-8 d-flex justify-content-end">
                        <div class="d-flex align-items-center gap-2">
                          <!-- Action Dropdown -->
                          <div class="dropdown" id="actionDropdown" style="display: none;">
                            <button class="btn btn-subtle-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a class="dropdown-item" href="#!" id="viewAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                                  </svg>
                                  View
                                </a>
                              </li>
                              <?php if ($is_admin): ?>
                              <li>
                                <a class="dropdown-item" href="#!" id="updateAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                    <path d="M16 5l3 3"></path>
                                  </svg>
                                  Update
                                </a>
                              </li>
                              <?php endif; ?>
                            
                              <li>
                                <a class="dropdown-item" href="#!" id="archiveAction">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive me-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                    <path d="M10 12l4 0"></path>
                                  </svg>
                                  Archive
                                </a>
                              </li>
                            </ul>
                          </div>
                          <a href="<?php echo base_url('reservations/archived'); ?>" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path><path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path><path d="M10 12l4 0"></path></svg>
                            View Archived
                          </a>
                          <a href="<?php echo base_url('reservations/create'); ?>" class="btn btn-subtle-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            New Reservation
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
                          <th class="fw-bold">No. of Attendees</th>
                          <th class="fw-bold">Status</th>
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
                              <td><?php echo $reservation['expected_attendees'] ?? 'N/A'; ?></td>
                              <td>
                                <?php
                                $status = $reservation['status'];
                                $badge_class = '';
                                $status_text = ucfirst(strtolower($status)); // Ensure first letter is capital, rest lowercase
                                $rejection_reason = isset($reservation['rejection_reason']) ? $reservation['rejection_reason'] : '';
                                
                                switch($status) {
                                    case 'pending':
                                        $badge_class = 'bg-warning-subtle text-warning-emphasis';
                                        $status_text = 'Pending';
                                        break;
                                    case 'endorsed':
                                        $badge_class = 'bg-success-subtle text-success-emphasis';
                                        $status_text = 'Endorsed';
                                        break;
                                    case 'confirmed':
                                        $badge_class = 'bg-success-subtle text-success-emphasis';
                                        $status_text = 'Confirmed';
                                        break;
                                    case 'rejected':
                                        $badge_class = 'bg-danger-subtle text-danger-emphasis';
                                        $status_text = 'Rejected';
                                        break;
                                    case 'cancelled':
                                        $badge_class = 'bg-danger-subtle text-danger-emphasis';
                                        $status_text = 'Cancelled';
                                        break;
                                    case 'completed':
                                        $badge_class = 'bg-info-subtle text-info-emphasis';
                                        $status_text = 'Completed';
                                        break;
                                    case 'archived':
                                        $badge_class = 'bg-secondary-subtle text-secondary-emphasis';
                                        $status_text = 'Archived';
                                        break;
                                    default:
                                        $badge_class = 'bg-secondary-subtle text-secondary-emphasis';
                                }
                                
                                // Add tooltip for rejected status if rejection reason exists
                                // Add tooltip for pending status
                                $tooltip_attrs = '';
                                if($status === 'rejected' && !empty($rejection_reason)) {
                                    $tooltip_attrs = ' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="' . htmlspecialchars($rejection_reason, ENT_QUOTES) . '" style="cursor: help;"';
                                } elseif($status === 'pending') {
                                    $tooltip_attrs = ' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pending endorsement from the PPFMO" style="cursor: help;"';
                                } elseif($status === 'endorsed') {
                                    $tooltip_attrs = ' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Endorsed by PPFMO" style="cursor: help;"';
                              }
                                ?>
                                <span class="badge <?php echo $badge_class; ?>"<?php echo $tooltip_attrs; ?>><?php echo $status_text; ?></span>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="9" class="text-center py-5 text-muted">
                              No reservations found. <a href="<?php echo base_url('reservations/create'); ?>">Create your first reservation</a>
                            </td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="card-footer border-top border-dashed">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                      <p class="mb-0" id="entriesInfo"><?php echo count($reservations); ?> entries found</p>
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
            

      <!-- View Reservation Modal -->
      <div class="modal fade" id="viewReservationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Reservation Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewModalContent">
              <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Reservation Modal -->
      <div class="modal fade" id="editReservationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Reservation Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="editReservationForm">
                <input type="hidden" id="edit_reservation_id" name="reservation_id">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label fw-bold">Reservation ID</label>
                      <p id="edit_id" class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label fw-bold">Facility</label>
                      <p id="edit_facility" class="mb-0"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label fw-bold">Contact Person</label>
                      <p id="edit_contact" class="mb-0"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label for="edit_status" class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                      <select class="form-select" id="edit_status" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="endorsed">Endorsed</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="rejected">Rejected</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="completed">Completed</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="mb-3" id="rejection_reason_container" style="display: none;">
                  <label for="edit_rejection_reason" class="form-label fw-bold">Rejection Reason <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="edit_rejection_reason" name="rejection_reason" rows="3" placeholder="Please provide a reason for rejecting this reservation..."></textarea>
                </div>
                <div class="mb-3">
                  <label for="edit_special_requirements" class="form-label fw-bold">Special Requirements</label>
                  <textarea class="form-control" id="edit_special_requirements" name="special_requirements" rows="3"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-subtle-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-subtle-danger" id="saveReservationBtn">Save Changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Archive Confirmation Modal -->
      <div class="modal fade" id="archiveConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-warning-subtle">
              <h5 class="modal-title">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M12 9v4"></path>
                  <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                  <path d="M12 16h.01"></path>
                </svg>
                Confirm Archive
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="mb-0">Are you sure you want to archive <strong id="archiveCount">0</strong> reservation(s)?</p>
              <p class="text-muted small mt-2 mb-0">Archived reservations can be restored from the archived reservations page.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-warning" id="confirmArchiveBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                  <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                  <path d="M10 12l4 0"></path>
                </svg>
                Archive
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
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Real-time status update polling
    // Initialize with server time to avoid timezone issues
    let lastCheckTime = '<?php echo date('Y-m-d H:i:s'); ?>';
    let pollingInterval = null;
    
    function checkForUpdates() {
        fetch('<?php echo base_url(); ?>reservations/checkStatusUpdates?last_check=' + encodeURIComponent(lastCheckTime))
            .then(response => response.json())
            .then(data => {
                if (data.success && data.has_updates && data.count > 0) {
                    // Show notification with accurate count
                    const countText = data.count === 1 ? '1 reservation has' : `${data.count} reservations have`;
                    
                    
                    // Update the last check time to the most recent update timestamp
                    // This ensures we don't miss any updates or double-count
                    if (data.updated_reservations && data.updated_reservations.length > 0) {
                        // Get the most recent updated_at timestamp from the response
                        // Since the query returns results sorted by updated_at DESC, the first one is the most recent
                        const mostRecentUpdate = data.updated_reservations[0].updated_at;
                        lastCheckTime = mostRecentUpdate;
                        
                        console.log(`Updated lastCheckTime to: ${lastCheckTime} after detecting ${data.count} update(s)`);
                    } else {
                        // Fallback to current server time
                        lastCheckTime = data.current_time;
                    }
                    
                    // Reload only the table data
                    refreshTableData();
                } else if (data.success && !data.has_updates) {
                    // No updates, but update the timestamp to current server time to stay in sync
                    if (data.current_time) {
                        lastCheckTime = data.current_time;
                    }
                }
            })
            .catch(error => {
                console.error('Error checking for updates:', error);
            });
    }
    
    // Refresh table data without full page reload
    function refreshTableData() {
        fetch('<?php echo base_url(); ?>reservations/fetchAllReservations')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateTable(data.data);
                    // Reinitialize pagination after table update
                    initPagination();
                    
                    // Note: initCheckboxListeners() is called within updateTable()
                    // which properly resets checkboxes and action dropdown
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
                        No reservations found. <a href="<?php echo base_url('reservations/create'); ?>">Create your first reservation</a>
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
            let tooltipAttrs = '';
            
            switch(status) {
                case 'pending':
                    badgeClass = 'bg-warning-subtle text-warning-emphasis';
                    statusText = 'Pending';
                    tooltipAttrs = ' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pending endorsement from the PPFMO" style="cursor: help;"';
                    break;
                case 'endorsed':
                    badgeClass = 'bg-success-subtle text-success-emphasis';
                    statusText = 'Endorsed';
                    tooltipAttrs = ' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Endorsed by PPFMO" style="cursor: help;"';
                    break;
                case 'confirmed':
                    badgeClass = 'bg-success-subtle text-success-emphasis';
                    statusText = 'Confirmed';
                    break;
                case 'rejected':
                    badgeClass = 'bg-danger-subtle text-danger-emphasis';
                    statusText = 'Rejected';
                    if (reservation.rejection_reason) {
                        tooltipAttrs = ' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="' + escapeHtml(reservation.rejection_reason) + '" style="cursor: help;"';
                    }
                    break;
                case 'cancelled':
                    badgeClass = 'bg-danger-subtle text-danger-emphasis';
                    statusText = 'Cancelled';
                    break;
                case 'completed':
                    badgeClass = 'bg-info-subtle text-info-emphasis';
                    statusText = 'Completed';
                    break;
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
                        <span class="badge ${badgeClass}"${tooltipAttrs}>${statusText}</span>
                    </td>
                </tr>
            `;
        });
        
        tbody.innerHTML = html;
        
        // Reinitialize tooltips for new elements
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
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
    
    // Start polling every 10 seconds
    pollingInterval = setInterval(checkForUpdates, 10000);
    
    // Stop polling when page is not visible
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            if (pollingInterval) {
                clearInterval(pollingInterval);
                pollingInterval = null;
            }
        } else {
            // Resume polling when page becomes visible
            if (!pollingInterval) {
                pollingInterval = setInterval(checkForUpdates, 10000);
                // Check immediately when page becomes visible
                checkForUpdates();
            }
        }
    });
    
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
        document.getElementById('entriesInfo').textContent = `Showing ${start + 1}-${Math.min(end, filteredRows.length)} of ${filteredRows.length} entries`;
        
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
    
    // Initialize pagination on load
    initPagination();
    
    // Initialize checkbox functionality on load
    initCheckboxListeners();
    
    // View Action
    document.getElementById('viewAction').addEventListener('click', function(e) {
        e.preventDefault();
        const reservationCheckboxes = document.querySelectorAll('.reservation-checkbox');
        const checked = Array.from(reservationCheckboxes).filter(cb => cb.checked);
        if (checked.length !== 1) {
            showAlert('Please select exactly one reservation to view', 'danger');
            return;
        }
        
        const id = checked[0].value;
        fetch('<?php echo base_url(); ?>reservations/getReservationDetails/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const r = data.data;
                    
                    // Determine badge class based on status
                    let badgeClass = '';
                    const status = r.status.toLowerCase();
                    switch(status) {
                        case 'pending':
                            badgeClass = 'bg-warning-subtle text-warning-emphasis';
                            break;
                        case 'endorsed':
                            badgeClass = 'bg-success-subtle text-secondary-emphasis';
                            break;
                        case 'confirmed':
                            badgeClass = 'bg-success-subtle text-success-emphasis';
                            break;
                        case 'rejected':
                            badgeClass = 'bg-info-subtle text-danger-emphasis';
                            break;
                        case 'cancelled':
                            badgeClass = 'bg-danger-subtle text-danger-emphasis';
                            break;
                        case 'completed':
                            badgeClass = 'bg-info-subtle text-info-emphasis';
                            break;
                        case 'archived':
                            badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
                            break;
                        default:
                            badgeClass = 'bg-secondary-subtle text-secondary-emphasis';
                    }
                    
                    let rejectionReasonHtml = '';
                    if (r.status.toLowerCase() === 'rejected' && r.rejection_reason) {
                        rejectionReasonHtml = `
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Rejection Reason:</strong><br>${r.rejection_reason}
                                </div>
                            </div>
                        `;
                    }
                    
                    document.getElementById('viewModalContent').innerHTML = `
                        <div class="row g-3">
                            <div class="col-md-6">
                                <strong>Reservation ID:</strong><br>${r.id}
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong><br><span class="badge ${badgeClass}">${r.status.charAt(0).toUpperCase() + r.status.slice(1)}</span>
                            </div>
                            ${rejectionReasonHtml}
                            <div class="col-md-6">
                                <strong>Facility:</strong><br>${r.facility_name}
                            </div>
                            <div class="col-md-6">
                                <strong>Capacity:</strong><br>${r.facility_capacity} people
                            </div>
                            <div class="col-md-6">
                                <strong>Date:</strong><br>${new Date(r.reservation_date).toLocaleDateString()}
                            </div>
                            <div class="col-md-6">
                                <strong>Time:</strong><br>${r.reservation_time}
                            </div>
                            <div class="col-md-6">
                                <strong>Contact Person:</strong><br>${r.contact_name}
                            </div>
                            <div class="col-md-6">
                                <strong>Phone:</strong><br>${r.contact_phone}
                            </div>
                            <div class="col-md-6">
                                <strong>Email:</strong><br>${r.contact_email}
                            </div>
                            <div class="col-md-6">
                                <strong>Organization:</strong><br>${r.organization || 'N/A'}
                            </div>
                            <div class="col-12">
                                <strong>Purpose:</strong><br>${r.event_purpose}
                            </div>
                            <div class="col-md-6">
                                <strong>Expected Attendees:</strong><br>${r.expected_attendees || 'N/A'}
                            </div>
                            <div class="col-md-6">
                                <strong>Rate:</strong><br>₱${parseFloat(r.facility_rate).toLocaleString()}/hr
                            </div>
                            <div class="col-12">
                                <strong>Special Requirements:</strong><br>${r.special_requirements || 'None'}
                            </div>
                            <div class="col-md-6">
                                <strong>Total Cost:</strong><br><h5 class="text-primary">₱${parseFloat(r.total_cost).toLocaleString()}</h5>
                            </div>
                            <div class="col-md-6">
                                <strong>Created:</strong><br>${new Date(r.created_at).toLocaleString()}
                            </div>
                        </div>
                    `;
                    new bootstrap.Modal(document.getElementById('viewReservationModal')).show();
                } else {
                    showAlert(data.message, 'danger');
                }
            });
    });
    
    // Update Action
    document.getElementById('updateAction').addEventListener('click', function(e) {
        e.preventDefault();
        const reservationCheckboxes = document.querySelectorAll('.reservation-checkbox');
        const checked = Array.from(reservationCheckboxes).filter(cb => cb.checked);
        if (checked.length !== 1) {
            showAlert('Please select exactly one reservation to update', 'danger');
            return;
        }
        
        const id = checked[0].value;
        fetch('<?php echo base_url(); ?>reservations/getReservationDetails/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const r = data.data;
                    document.getElementById('edit_reservation_id').value = r.id;
                    document.getElementById('edit_id').textContent = r.id;
                    document.getElementById('edit_facility').textContent = r.facility_name;
                    document.getElementById('edit_contact').textContent = r.contact_name;
                    document.getElementById('edit_status').value = r.status;
                    document.getElementById('edit_special_requirements').value = r.special_requirements || '';
                    document.getElementById('edit_rejection_reason').value = r.rejection_reason || '';
                    
                    // Show/hide rejection reason based on current status
                    toggleRejectionReasonField();
                    
                    new bootstrap.Modal(document.getElementById('editReservationModal')).show();
                } else {
                    showAlert(data.message, 'danger');
                }
            });
    });
    
    // Toggle rejection reason field visibility
    function toggleRejectionReasonField() {
        const statusSelect = document.getElementById('edit_status');
        const rejectionContainer = document.getElementById('rejection_reason_container');
        const rejectionTextarea = document.getElementById('edit_rejection_reason');
        
        if (statusSelect.value === 'rejected') {
            rejectionContainer.style.display = 'block';
            rejectionTextarea.required = true;
        } else {
            rejectionContainer.style.display = 'none';
            rejectionTextarea.required = false;
        }
    }
    
    // Listen for status change
    document.getElementById('edit_status').addEventListener('change', toggleRejectionReasonField);
    
    // Save Changes
    document.getElementById('saveReservationBtn').addEventListener('click', function() {
        const status = document.getElementById('edit_status').value;
        const rejectionReason = document.getElementById('edit_rejection_reason').value;
        
        // Validate rejection reason if status is rejected
        if (status === 'rejected' && !rejectionReason.trim()) {
            showAlert('Please provide a rejection reason', 'danger');
            return;
        }
        
        const formData = new FormData(document.getElementById('editReservationForm'));
        
        fetch('<?php echo base_url(); ?>reservations/updateReservation', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert(data.message, 'success');
                bootstrap.Modal.getInstance(document.getElementById('editReservationModal')).hide();
                
                // Refresh table without full page reload
                setTimeout(() => {
                    refreshTableData();
                }, 500);
            } else {
                showAlert(data.message, 'danger');
            }
        });
    });
    
    // Archive Action
    let selectedIdsForArchive = [];
    
    document.getElementById('archiveAction').addEventListener('click', function(e) {
        e.preventDefault();
        const reservationCheckboxes = document.querySelectorAll('.reservation-checkbox');
        const checked = Array.from(reservationCheckboxes).filter(cb => cb.checked);
        if (checked.length === 0) {
            showAlert('Please select at least one reservation to archive', 'danger');
            return;
        }
        
        // Store selected IDs and show count in modal
        selectedIdsForArchive = checked.map(cb => cb.value);
        document.getElementById('archiveCount').textContent = selectedIdsForArchive.length;
        
        // Show the confirmation modal
        new bootstrap.Modal(document.getElementById('archiveConfirmModal')).show();
    });
    
    // Confirm Archive Button Handler
    document.getElementById('confirmArchiveBtn').addEventListener('click', function() {
        const confirmBtn = this;
        const originalHTML = confirmBtn.innerHTML;
        
        // Disable button and show loading state
        confirmBtn.disabled = true;
        confirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Archiving...';
        
        fetch('<?php echo base_url(); ?>reservations/archiveReservations', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'ids=' + JSON.stringify(selectedIdsForArchive)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide modal
                bootstrap.Modal.getInstance(document.getElementById('archiveConfirmModal')).hide();
                
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
            console.error('Error archiving reservations:', error);
            showAlert('An error occurred while archiving. Please try again.', 'danger');
            
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
