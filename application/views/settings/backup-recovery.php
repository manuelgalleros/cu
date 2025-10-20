        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Alert Container -->
            <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 500px;"></div>

            <!-- Header -->
            <div class="mb-4">
              <h4 class="mb-1 d-flex align-items-center">Backup Recovery</h4>
              <small class="text-muted">View of permanently deleted reservation records</small>
              <nav aria-label="breadcrumb" class="mt-2">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('systemsettings'); ?>">Settings</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Backup &amp; Recovery</li>
                    </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom-0">
                    <div class="row g-3 align-items-center">
                      <div class="col-lg-5">
                        <input type="search" class="form-control form-control-sm" id="searchInput" placeholder="Search deleted records...">
                      </div>
                      <div class="col-lg-7 d-flex justify-content-end">
                        <a href="<?php echo base_url('reservations'); ?>" class="btn btn-sm btn-outline-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                          Back to Reservations
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="table-responsive" style="max-height: 70vh; overflow-x: auto; overflow-y: auto;">
                    <table class="table table-sm text-nowrap table-hover mb-0" style="min-width: 1100px;">
                      <thead class="sticky-top">
                        <tr>
                          <th class="fw-semibold">Reservation ID</th>
                          <th class="fw-semibold">Facility</th>
                          <th class="fw-semibold">Reservation Date</th>
                          <th class="fw-semibold">Time</th>
                          <th class="fw-semibold">Contact Person</th>
                          <th class="fw-semibold">Purpose</th>
                          <th class="fw-semibold">Deleted Date</th>
                        </tr>
                      </thead>
                      <tbody id="tableBody">
                        <?php if(!empty($deleted_reservations)): ?>
                          <?php foreach($deleted_reservations as $row): ?>
                            <tr>
                              <td><strong><?php echo $row['id']; ?></strong></td>
                              <td><?php echo isset($row['facility_name']) ? $row['facility_name'] : '-'; ?></td>
                              <td><?php echo isset($row['reservation_date']) ? date('M d, Y', strtotime($row['reservation_date'])) : '-'; ?></td>
                              <td><?php echo isset($row['reservation_time']) ? $row['reservation_time'] : '-'; ?></td>
                              <td><?php echo isset($row['contact_name']) ? $row['contact_name'] : '-'; ?></td>
                              <td><?php echo isset($row['event_purpose']) ? (strlen($row['event_purpose']) > 50 ? substr($row['event_purpose'],0,50).'...' : $row['event_purpose']) : '-'; ?></td>
                              <td><?php echo isset($row['deleted_at']) ? date('M d, Y h:i A', strtotime($row['deleted_at'])) : '-'; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                              No deleted reservation records found.
                            </td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="card-footer border-top border-dashed">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                      <p class="mb-0 small" id="entriesInfo"><?php echo count($deleted_reservations); ?> deleted entries found</p>
                      <div class="pagination-controls">
                        <button class="btn btn-sm btn-white" id="firstPage" disabled>First</button>
                        <button class="btn btn-sm btn-white" id="prevPage" disabled>Previous</button>
                        <span class="mx-2 small" id="pageInfo">Page <strong id="currentPage">1</strong> of <strong id="totalPages">1</strong></span>
                        <button class="btn btn-sm btn-white" id="nextPage">Next</button>
                        <button class="btn btn-sm btn-white" id="lastPage">Last</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Deleted Users Table -->
            <div class="row mt-4">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Deleted Users</h5>
                    </div>
                  </div>
                  <div class="table-responsive" style="max-height: 50vh; overflow-x: auto; overflow-y: auto;">
                    <table class="table table-sm text-nowrap table-hover mb-0" style="min-width: 1000px;">
                      <thead class="sticky-top">
                        <tr>
                          <th class="fw-semibold">ID</th>
                          <th class="fw-semibold">Email</th>
                          <th class="fw-semibold">Name</th>
                          <th class="fw-semibold">Mobile</th>
                          <th class="fw-semibold">Affiliation</th>
                          <th class="fw-semibold">Deleted Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($deleted_users)): ?>
                          <?php foreach($deleted_users as $u): ?>
                            <tr>
                              <td><strong><?php echo $u['id']; ?></strong></td>
                              <td><?php echo isset($u['email']) ? $u['email'] : '-'; ?></td>
                              <td><?php echo (isset($u['firstname']) ? $u['firstname'] : '') . ' ' . (isset($u['lastname']) ? $u['lastname'] : ''); ?></td>
                              <td><?php echo isset($u['mobile_number']) ? $u['mobile_number'] : '-'; ?></td>
                              <td><?php echo isset($u['affiliation']) ? $u['affiliation'] : '-'; ?></td>
                              <td><?php echo isset($u['deleted_at']) ? date('M d, Y h:i A', strtotime($u['deleted_at'])) : '-'; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No deleted users found.</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
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

    function showAlert(message, type, duration = 4000) {
        var alertContainer = document.getElementById('alert-container');
        var alertId = 'alert-' + Date.now();
        var alertHTML = `
            <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show shadow-sm" role="alert">
                <small><strong>${type === 'success' ? 'Success!' : 'Notice'}</strong> ${message}</small>
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

    function initPagination() {
        allRows = Array.from(document.querySelectorAll('#tableBody tr'));
        filteredRows = allRows.filter(row => row.style.display !== 'none');
        renderPage();
    }

    function renderPage() {
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        allRows.forEach(row => row.classList.add('d-none'));
        filteredRows.slice(start, end).forEach(row => row.classList.remove('d-none'));
        document.getElementById('currentPage').textContent = totalPages > 0 ? currentPage : 0;
        document.getElementById('totalPages').textContent = totalPages;
        document.getElementById('entriesInfo').textContent = `Showing ${filteredRows.length === 0 ? 0 : start + 1}-${Math.min(end, filteredRows.length)} of ${filteredRows.length} deleted entries`;
        document.getElementById('firstPage').disabled = currentPage === 1;
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage >= totalPages;
        document.getElementById('lastPage').disabled = currentPage >= totalPages;
    }

    document.getElementById('firstPage').addEventListener('click', function() { currentPage = 1; renderPage(); });
    document.getElementById('prevPage').addEventListener('click', function() { if (currentPage > 1) { currentPage--; renderPage(); }});
    document.getElementById('nextPage').addEventListener('click', function() { const totalPages = Math.ceil(filteredRows.length / rowsPerPage); if (currentPage < totalPages) { currentPage++; renderPage(); }});
    document.getElementById('lastPage').addEventListener('click', function() { const totalPages = Math.ceil(filteredRows.length / rowsPerPage); currentPage = totalPages; renderPage(); });

    initPagination();

    // Search
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const term = this.value.toLowerCase();
        allRows.forEach(row => row.style.display = '');
        allRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (!text.includes(term)) {
                row.style.display = 'none';
            }
        });
        filteredRows = allRows.filter(row => row.style.display !== 'none');
        currentPage = 1;
        renderPage();
    });
});
</script>

<style>
.sticky-top { position: sticky; top: 0; background-color: white; z-index: 10; }
.pagination-controls { display: flex; align-items: center; gap: 6px; }
.pagination-controls button { display: flex; align-items: center; gap: 4px; }
.pagination-controls button:disabled { opacity: 0.5; cursor: not-allowed; }
</style>


