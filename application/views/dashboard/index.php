        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Welcome Section -->
            <div class="mb-6">
              <h4 class="mb-2 d-flex align-items-center">Welcome, <?php echo $this->session->userdata('firstname') ?: 'User'; ?>! <img src="assets/images/hand.gif" alt="hand-gif" style="height: 1.5rem; width: auto; margin-left: 0.5rem;"></h4>
              <p class="text-secondary mb-0">Here's what's happening today.</p>
            </div>
          
          <!-- Dashboard Statistics (Using SQL Subqueries) -->
          <div class="row g-6 mb-6">
            <div class="col-xl-3 col-md-6 col-12">
              <!-- Total Reservations Card -->
              <div class="card card-lg bg-gradient-info">
                <div class="card-body d-flex flex-column gap-8">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">Total Reservations</div>
                    </div>
                    <div class="text-success-emphasis">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-stats">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4"></path>
                        <path d="M18 14v4h4"></path>
                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M15 3v4"></path>
                        <path d="M7 3v4"></path>
                        <path d="M3 11h16"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="lh-1 d-flex flex-column gap-3">
                    <div class="fs-1 fw-bold"><?php echo number_format($dashboard_stats['total_count']); ?></div>
                    <p class="mb-0">
                      <span class="text-info-emphasis"><?php echo $dashboard_stats['today_count']; ?> today</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
              <!-- Pending Endorsements Card -->
              <div class="card card-lg bg-gradient-warning">
                <div class="card-body d-flex flex-column gap-8">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">Pending Endorsements</div>
                    </div>
                    <div class="text-warning-emphasis">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock-play">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 7v5l2 2"></path>
                        <path d="M17 22l5 -3l-5 -3z"></path>
                        <path d="M13.017 20.943a9 9 0 1 1 7.831 -9.292"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="lh-1 d-flex flex-column gap-3">
                    <div class="fs-1 fw-bold"><?php echo number_format($dashboard_stats['pending_count']); ?></div>
                    <p class="mb-0">
                      <span class="text-warning-emphasis">Awaiting PPFMO endorsement</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
              <!-- Confirmed Reservations Card -->
              <div class="card card-lg bg-gradient-success">
                <div class="card-body d-flex flex-column gap-8">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">Confirmed Reservations</div>
                    </div>
                    <div class="text-success-emphasis">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="lh-1 d-flex flex-column gap-3">
                    <div class="fs-1 fw-bold"><?php echo number_format($dashboard_stats['confirmed_count']); ?></div>
                    <p class="mb-0">
                      <span class="text-success-emphasis me-1"><?php echo $dashboard_stats['upcoming_count']; ?> upcoming this week</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
              <!-- Canceleld Card -->
              <div class="card card-lg bg-gradient-danger">
                <div class="card-body d-flex flex-column gap-8">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="fw-semibold">Cancelled Reservations</div>
                    </div>
                    <div class="text-danger-emphasis">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x-circle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M10 10l4 4m0 -4l-4 4"></path>
                      </svg>
                    </div>
                  </div>
                  <div class="lh-1 d-flex flex-column gap-3">
                    <div class="fs-1 fw-bold"><?php echo number_format($dashboard_stats['cancelled_count']); ?></div>
                    <p class="mb-0">
                      <span class="text-danger-emphasis">Cancelled this month</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Calendar and Confirmed Reservations Row -->
          <div class="row g-6 mb-6 mt-3">
            <!-- Reservation Calendar (Wider) -->
            <div class="col-lg-8 col-12">
              <div class="card card-lg">
                <div class="card-header border-bottom-0">
                  <div class="row g-4">
                    <div class="col-lg-6">
                      <h5 class="mb-0">Reservation Calendar</h5>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                      <div class="d-flex align-items-center gap-2">
                        <div class="d-flex align-items-center gap-2">
                          <button id="prev-month" class="btn btn-white btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M15 6l-6 6l6 6"></path>
                            </svg>
                          </button>
                          <button id="today-btn" class="btn btn-white btn-sm">Today</button>
                          <button id="next-month" class="btn btn-white btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M9 6l6 6l-6 6"></path>
                            </svg>
                          </button>
                        </div>
                        <div class="dropdown">
                          <select id="calendar-view" class="form-select form-select-sm">
                            <option value="dayGridMonth">Month</option>
                            <option value="timeGridWeek">Week</option>
                            <option value="timeGridDay">Day</option>
                            <option value="listWeek">List</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-3 position-relative">
                    <div class="flex-grow-1 text-center mt-5">
                      <h5 id="calendar-title" class="mb-0">January 2025</h5>
                    </div>
                    <div class="position-absolute mt-4" style="right: 0;">
                      <button class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M12 5l0 14"></path>
                          <path d="M5 12l14 0"></path>
                        </svg>
                        New Reservation
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="reservation-calendar" style="height: 500px;"></div>
                </div>
              </div>
            </div>
            
            <!-- Confirmed Reservations (Narrower) -->
            <div class="col-lg-4 col-12">
              <div class="card card-lg">
                <div class="card-header border-bottom-0">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Confirmed Reservations</h5>
                    <span class="badge bg-primary-subtle text-primary-emphasis"><?php echo count($confirmed_reservations); ?> Active</span>
                  </div>
                </div>
                <div class="card-body">
                  <?php if (!empty($confirmed_reservations)): ?>
                    <div class="list-group list-group-flush">
                      <?php 
                        // Facility type icons and colors
                        $facility_icons = [
                          'Conference' => ['icon' => 'calendar-event', 'color' => 'info'],
                          'Lab' => ['icon' => 'device-desktop', 'color' => 'warning'],
                          'Auditorium' => ['icon' => 'presentation', 'color' => 'danger'],
                          'Gymnasium' => ['icon' => 'trophy', 'color' => 'success'],
                          'Sports' => ['icon' => 'ball-basketball', 'color' => 'success'],
                          'Hall' => ['icon' => 'users', 'color' => 'primary'],
                          'Court' => ['icon' => 'ball-volleyball', 'color' => 'info']
                        ];
                        
                        foreach ($confirmed_reservations as $reservation): 
                          // Determine icon and color based on facility name
                          $icon = 'calendar-event';
                          $color = 'primary';
                          foreach ($facility_icons as $key => $value) {
                            if (stripos($reservation['facility_name'], $key) !== false) {
                              $icon = $value['icon'];
                              $color = $value['color'];
                              break;
                            }
                          }
                          
                          // Determine status badge
                          $today = date('Y-m-d');
                          $reservation_date = $reservation['reservation_date'];
                          $current_time = date('H:i:s');
                          
                          if ($reservation_date == $today && $current_time >= $reservation['time_start'] && $current_time <= $reservation['time_end']) {
                            $status_badge = '<span class="badge bg-success-subtle text-success-emphasis">In Progress</span>';
                          } elseif ($reservation_date == $today) {
                            $status_badge = '<span class="badge bg-primary-subtle text-primary-emphasis">Today</span>';
                          } else {
                            $status_badge = '<span class="badge bg-info-subtle text-info-emphasis">' . date('M d', strtotime($reservation_date)) . '</span>';
                          }
                      ?>
                        <div class="list-group-item list-group-item-action border-0 px-0">
                          <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex gap-3">
                              <div class="icon-shape icon-md bg-<?php echo $color; ?>-subtle text-<?php echo $color; ?>-emphasis rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-<?php echo $icon; ?>">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                  <?php if ($icon == 'calendar-event'): ?>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M16 3l0 4"></path>
                                    <path d="M8 3l0 4"></path>
                                    <path d="M4 11l16 0"></path>
                                    <path d="M8 15h2v2h-2z"></path>
                                  <?php elseif ($icon == 'device-desktop'): ?>
                                    <path d="M3 4a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-12z"></path>
                                    <path d="M7 20h10"></path>
                                    <path d="M9 16v4"></path>
                                    <path d="M15 16v4"></path>
                                  <?php elseif ($icon == 'presentation'): ?>
                                    <path d="M3 4l18 0"></path>
                                    <path d="M4 4v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-10"></path>
                                    <path d="M12 14l0 4"></path>
                                    <path d="M9 18l6 0"></path>
                                  <?php elseif ($icon == 'trophy'): ?>
                                    <path d="M8 21l8 0"></path>
                                    <path d="M12 17l0 4"></path>
                                    <path d="M7 4l10 0"></path>
                                    <path d="M17 4v8a5 5 0 0 1 -10 0v-8"></path>
                                    <path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                  <?php else: ?>
                                    <circle cx="12" cy="12" r="9"></circle>
                                  <?php endif; ?>
                                </svg>
                              </div>
                              <div>
                                <h6 class="mb-1"><?php echo htmlspecialchars($reservation['facility_name']); ?></h6>
                                <p class="mb-1 text-secondary small"><?php echo htmlspecialchars($reservation['event_purpose']); ?></p>
                                <small class="text-<?php echo $color; ?>-emphasis"><?php echo date('g:i A', strtotime($reservation['time_start'])); ?> - <?php echo date('g:i A', strtotime($reservation['time_end'])); ?></small>
                              </div>
                            </div>
                            <?php echo $status_badge; ?>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <div class="text-center mt-3">
                      <a href="<?php echo base_url('reservations'); ?>" class="text-primary text-decoration-none small">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right me-1">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M5 12l14 0"></path>
                          <path d="M13 18l6 -6"></path>
                          <path d="M13 6l6 6"></path>
                        </svg>
                        View All
                      </a>
                    </div>
                  <?php else: ?>
                    <div class="text-center py-5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-x text-secondary mb-3">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M13 21h-7a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6.5"></path>
                        <path d="M16 3v4"></path>
                        <path d="M8 3v4"></path>
                        <path d="M4 11h16"></path>
                        <path d="M22 22l-5 -5"></path>
                        <path d="M17 22l5 -5"></path>
                      </svg>
                      <p class="text-secondary mb-0">No confirmed reservations</p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <!-- Facility Utilization Report (Using SQL Subqueries) -->
          <div class="row g-6 mb-6">
            <div class="col-12">
              <div class="card card-lg">
                <div class="card-header border-bottom">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5 class="mt-2">Facility Utilization Report</h5>
                    </div>
                    <a href="<?php echo base_url('reservations'); ?>" class="btn btn-sm btn-subtle-danger">
                      View All Reservations
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead class="table-light">
                        <tr>
                          <th>Facility Name</th>
                          <th class="text-center">Total Bookings</th>
                          <th class="text-center">Pending</th>
                          <th class="text-center">Endorsed</th>
                          <th class="text-center">Upcoming</th>
                          <th class="text-end">Total Revenue</th>
                          <th class="text-center">Last Booking</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($facility_utilization)): ?>
                          <?php foreach($facility_utilization as $facility): ?>
                            <tr>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="icon-shape icon-sm bg-primary-subtle text-primary-emphasis rounded-circle me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                      <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
                                      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1z"/>
                                    </svg>
                                  </div>
                                  <strong><?php echo $facility['facility_name']; ?></strong>
                                </div>
                              </td>
                              <td class="text-center">
                                <span class="badge bg-primary mt-1">
                                  <?php echo $facility['total_bookings']; ?>
                                </span>
                              </td>
                              <td class="text-center">
                                  <span class="badge bg-warning mt-1">
                                    <?php echo $facility['pending_bookings']; ?>
                                  </span>
                              </td>
                              <td class="text-center">
                                  <span class="badge bg-success mt-1">
                                    <?php echo $facility['endorsed_bookings']; ?>
                                  </span>
                              </td>
                              <td class="text-center">
                                  <span class="badge bg-info mt-1">
                                    <?php echo $facility['upcoming_bookings']; ?>
                                  </span>
                              </td>
                              <td class="text-end">
                                <div class="mt-1">
                                <span class="text-success">₱<?php echo number_format($facility['total_revenue'], 2); ?></span>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="mt-1">
                                <?php if($facility['last_booking_date']): ?>
                                  <small class="text-muted mt-1"><?php echo date('M d, Y', strtotime($facility['last_booking_date'])); ?></small>
                                <?php else: ?>
                                  <small class="text-muted mt-1">No bookings</small>
                                <?php endif; ?>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                              No facility data available
                            </td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>
                
    <!-- Libs JS -->
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/vendors/sidebarnav.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendors/chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendors/swiper.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/fullcalendar/index.global.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    
    <style>
      /* Calendar event styling */
      .fc-event {
        cursor: pointer !important;
        border-radius: 4px !important;
        padding: 2px 4px !important;
        font-size: 0.75rem !important;
        line-height: 1.2 !important;
        color: #ffffff !important;
      }
      
      .fc-event-title {
        font-weight: 500 !important;
        color: #ffffff !important;
      }
      
      .fc-event-main {
        color: #ffffff !important;
      }
      
      .fc-daygrid-event-dot {
        border-color: #ffffff !important;
      }
      
      /* Calendar tooltip styling */
      .reservation-tooltip .tooltip-inner {
        max-width: 300px !important;
        padding: 10px !important;
        text-align: left !important;
        background-color: #1f2937 !important;
        color: #f9fafb !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2) !important;
      }
      
      .reservation-tooltip .tooltip-arrow::before {
        border-top-color: #1f2937 !important;
      }
      
      /* More link styling */
      .fc-daygrid-more-link {
        color: #0d6efd !important;
        font-weight: 500 !important;
        font-size: 0.75rem !important;
      }
      
      .fc-more-popover {
        z-index: 1050 !important;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
      }
      
      /* Calendar day cells with reservations */
      .fc-day-today {
        background-color: orange !important;
      }
     
    </style>
    
    <script>
      // Initialize FullCalendar for reservations
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('reservation-calendar');
        
        // Function to get facility color (darker colors for better contrast in both light and dark modes)
        function getFacilityColor(facilityName) {
          const colors = {
            // Conference Rooms - Darker Blue shades
            'Conference Room A': { bg: '#2563eb', border: '#1e40af' },
            'Conference Room B': { bg: '#2563eb', border: '#1e40af' },
            'Conference Room C': { bg: '#2563eb', border: '#1e40af' },
            'Meeting Room': { bg: '#2563eb', border: '#1e40af' },
            
            // Labs - Darker Orange shades
            'Computer Lab': { bg: '#d97706', border: '#b45309' },
            'Research Lab': { bg: '#d97706', border: '#b45309' },
            'Lab Equipment': { bg: '#d97706', border: '#b45309' },
            'Science Lab': { bg: '#d97706', border: '#b45309' },
            
            // Auditoriums - Darker Red shades
            'Auditorium': { bg: '#dc2626', border: '#b91c1c' },
            'Main Auditorium': { bg: '#dc2626', border: '#b91c1c' },
            'Mini Auditorium': { bg: '#dc2626', border: '#b91c1c' },
            
            // Sports Facilities - Darker Green shades
            'Gymnasium': { bg: '#059669', border: '#047857' },
            'Sports Complex': { bg: '#059669', border: '#047857' },
            'Swimming Pool': { bg: '#14b8a6', border: '#0d9488' },
            'Covered Court': { bg: '#0d9488', border: '#0f766e' },
            
            // Others - Darker Purple shades
            'Function Hall': { bg: '#7c3aed', border: '#6d28d9' },
            'Multipurpose Hall': { bg: '#7c3aed', border: '#6d28d9' },
            'Multi-Purpose Hall': { bg: '#7c3aed', border: '#6d28d9' },
            'Library': { bg: '#8b5cf6', border: '#7c3aed' }
          };
          
          // Try to find exact match
          if (colors[facilityName]) {
            return colors[facilityName];
          }
          
          // Try to find partial match
          for (let key in colors) {
            if (facilityName.includes(key) || key.includes(facilityName)) {
              return colors[key];
            }
          }
          
          // Default color if not found
          return { bg: '#4b5563', border: '#374151' };
        }
        
        // Format time from HH:MM:SS to h:mm AM/PM
        function formatTime(timeStr) {
          if (!timeStr) return '';
          const parts = timeStr.split(':');
          let hours = parseInt(parts[0]);
          const minutes = parts[1];
          const ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours ? hours : 12; // 0 should be 12
          return hours + ':' + minutes + ' ' + ampm;
        }
        
        // Prepare events from PHP data
        var calendarEvents = [
          <?php if (!empty($calendar_reservations)): ?>
            <?php foreach ($calendar_reservations as $index => $reservation): ?>
              {
                id: '<?php echo $reservation['id']; ?>',
                title: '<?php echo date('g:i A', strtotime($reservation['time_start'])); ?>-<?php echo date('g:i A', strtotime($reservation['time_end'])); ?>',
                start: '<?php echo $reservation['reservation_date']; ?>T<?php echo $reservation['time_start']; ?>',
                end: '<?php echo $reservation['reservation_date']; ?>T<?php echo $reservation['time_end']; ?>',
                backgroundColor: '<?php 
                  // Dynamic color generation based on facility (darker colors for better contrast)
                  $colors = [
                    'Conference' => '#2563eb', // Darker blue
                    'Lab' => '#d97706',        // Darker orange
                    'Auditorium' => '#dc2626', // Darker red
                    'Gymnasium' => '#059669',  // Darker green
                    'Sports' => '#059669',     // Darker green
                    'Hall' => '#7c3aed',       // Darker purple
                    'Library' => '#8b5cf6',    // Darker purple
                    'Court' => '#0d9488',      // Darker teal
                    'Pool' => '#14b8a6',       // Darker teal
                    'Multi-Purpose' => '#7c3aed' // Darker purple
                  ];
                  $color = '#4b5563'; // default darker gray
                  foreach ($colors as $key => $value) {
                    if (stripos($reservation['facility_name'], $key) !== false) {
                      $color = $value;
                      break;
                    }
                  }
                  echo $color;
                ?>',
                borderColor: '<?php 
                  // Border color matches background but slightly darker
                  $colors = [
                    'Conference' => '#1e40af',
                    'Lab' => '#b45309',
                    'Auditorium' => '#b91c1c',
                    'Gymnasium' => '#047857',
                    'Sports' => '#047857',
                    'Hall' => '#6d28d9',
                    'Library' => '#7c3aed',
                    'Court' => '#0f766e',
                    'Pool' => '#0d9488',
                    'Multi-Purpose' => '#6d28d9'
                  ];
                  $border = '#374151'; // default
                  foreach ($colors as $key => $value) {
                    if (stripos($reservation['facility_name'], $key) !== false) {
                      $border = $value;
                      break;
                    }
                  }
                  echo $border;
                ?>',
                textColor: '#ffffff',
                extendedProps: {
                  facility: '<?php echo addslashes($reservation['facility_name']); ?>',
                  status: '<?php echo $reservation['status']; ?>',
                  purpose: '<?php echo addslashes($reservation['event_purpose']); ?>',
                  contact: '<?php echo addslashes($reservation['contact_name']); ?>'
                }
              }<?php if ($index < count($calendar_reservations) - 1): ?>,<?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        ];
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: false,
          height: 'auto',
          dayMaxEvents: 3,
          moreLinkClick: 'popover',
          displayEventTime: false,
          events: calendarEvents,
          eventDidMount: function(info) {
            // Add tooltip with reservation details
            const props = info.event.extendedProps;
            
            // Determine badge color based on status
            let badgeColor = 'warning'; // default for pending
            if (props.status === 'confirmed') {
              badgeColor = 'success';
            } else if (props.status === 'endorsed') {
              badgeColor = 'primary';
            } else if (props.status === 'completed') {
              badgeColor = 'info';
            }
            
            const tooltipContent = '<div style="padding: 5px;"><strong>' + props.facility + '</strong><br>' +
              '<strong>Status:</strong> <span class="badge bg-' + badgeColor + '">' + 
              props.status.toUpperCase() + '</span><br>' +
              '<strong>Purpose:</strong> ' + props.purpose + '<br>' +
              '<strong>Contact:</strong> ' + props.contact + '</div>';
            
            if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
              new bootstrap.Tooltip(info.el, {
                html: true,
                placement: 'top',
                trigger: 'hover',
                container: 'body',
                title: tooltipContent,
                customClass: 'reservation-tooltip'
              });
            }
          }
        });
        calendar.render();
        
        // Handle view changes
        document.getElementById('calendar-view').addEventListener('change', function(e) {
          calendar.changeView(e.target.value);
        });
        
        // Handle navigation
        document.getElementById('prev-month').addEventListener('click', function(e) {
          e.preventDefault();
          calendar.prev();
          updateCalendarTitle();
        });
        
        document.getElementById('next-month').addEventListener('click', function(e) {
          e.preventDefault();
          calendar.next();
          updateCalendarTitle();
        });
        
        document.getElementById('today-btn').addEventListener('click', function() {
          calendar.today();
          updateCalendarTitle();
        });
        
        function updateCalendarTitle() {
          document.getElementById('calendar-title').textContent = calendar.view.title;
        }
        
        // Initial title update
        updateCalendarTitle();
      });
    </script>
  </body>
</html>
