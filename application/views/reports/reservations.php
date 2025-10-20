        <!-- container -->
        <div class="custom-container" style="min-height: calc(100vh - 120px);">
            <!-- Page Header -->
            <div class="mb-6">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h4 class="mb-2 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar me-2" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6z"></path>
                      <path d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-10z"></path>
                      <path d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-14z"></path>
                    </svg>
                    Facility Utilization Reports
                  </h4>
                  <p class="text-secondary mb-0">Most used facilities and booking analytics powered by SQL views</p>
                </div>
                <div>
                  <form method="post" id="reportYearForm">
                    <select class="form-select" name="select_year" onchange="document.getElementById('reportYearForm').submit();">
                      <?php if($report_years): ?>
                        <?php foreach ($report_years as $year): ?>
                          <option value="<?php echo $year; ?>" <?php echo ($year == $selected_year) ? 'selected' : ''; ?>>
                            <?php echo $year; ?>
                          </option>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                      <?php endif; ?>
                    </select>
                  </form>
                </div>
              </div>
              <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">Home</a></li>
                      <li class="breadcrumb-item"><a href="<?php echo base_url('/reports'); ?>">Reports</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Facility Reports</li>
                    </ol>
              </nav>
            </div>

            <!-- Summary Statistics Cards -->
            <div class="row g-6 mb-6">
              <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <div class="card card-lg h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div>
                        <h4 class="mb-0"><?php echo number_format($summary_stats['total_bookings']); ?></h4>
                        <span class="text-secondary">Total Bookings</span>
                      </div>
                      <div class="icon-shape icon-xl bg-primary-subtle text-primary-emphasis rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                          <line x1="16" y1="2" x2="16" y2="6"></line>
                          <line x1="8" y1="2" x2="8" y2="6"></line>
                          <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-primary-subtle text-primary-emphasis"><?php echo $year_range; ?></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <div class="card card-lg h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div>
                        <h4 class="mb-0"><?php echo number_format($summary_stats['total_confirmed']); ?></h4>
                        <span class="text-secondary">Confirmed Reservations</span>
                      </div>
                      <div class="icon-shape icon-xl bg-success-subtle text-success-emphasis rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-success-subtle text-success-emphasis"><?php echo $year_range; ?></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <div class="card card-lg h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div>
                        <?php 
                        $total_hours = 0;
                        foreach($facility_performance as $f) {
                          $total_hours += $f['total_hours_booked'];
                        }
                        ?>
                        <h4 class="mb-0"><?php echo number_format($total_hours); ?></h4>
                        <span class="text-secondary">Total Hours Booked</span>
                      </div>
                      <div class="icon-shape icon-xl bg-info-subtle text-info-emphasis rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="12" cy="12" r="10"></circle>
                          <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <span class="badge bg-info-subtle text-info-emphasis">All Facilities</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <div class="card card-lg h-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                      <div>
                        <h4 class="mb-0"><?php echo number_format($summary_stats['total_completed']); ?></h4>
                        <span class="text-secondary">Completed</span>
                      </div>
                      <div class="icon-shape icon-xl bg-warning-subtle text-warning-emphasis rounded-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                          <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <small class="text-secondary"><?php echo $summary_stats['total_pending']; ?> Pending</small>
                      <small class="text-secondary">•</small>
                      <small class="text-secondary"><?php echo $summary_stats['total_cancelled']; ?> Cancelled</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Monthly Summary Chart & Revenue Trend -->
            <div class="row g-6 mb-6">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom">
                    <h5 class="mb-0">Monthly Booking Trends (<?php echo $selected_year; ?>)</h5>
                    <p class="text-secondary small mb-0" >view</p>
                  </div>
                  <div class="card-body">
                    <div id="monthlyTrendChart" style="height: 400px;"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Facility Performance & Peak Hours -->
            <div class="row g-6 mb-6">
              <div class="col-lg-8 col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom">
                    <h5 class="mb-0">Facility Performance Analysis</h5>
                    <p class="text-secondary small mb-0">Data from vw_facility_performance view</p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                      <thead class="table-light">
                        <tr>
                          <th>Facility</th>
                          <th>Capacity</th>
                          <th>Total Bookings</th>
                          <th>Completed</th>
                          <th>Hours Booked</th>
                          <th>Attendees Served</th>
                          <th>Completion Rate</th>
                          <th>Cancel Rate</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($facility_performance)): ?>
                          <?php foreach($facility_performance as $facility): ?>
                            <tr>
                              <td><strong><?php echo htmlspecialchars($facility['facility_name']); ?></strong></td>
                              <td><?php echo number_format($facility['facility_capacity']); ?></td>
                              <td><?php echo number_format($facility['total_bookings']); ?></td>
                              <td><?php echo number_format($facility['completed_bookings']); ?></td>
                              <td><?php echo number_format($facility['total_hours_booked']); ?>h</td>
                              <td><?php echo number_format($facility['total_attendees_served']); ?></td>
                              <td>
                                <div class="d-flex align-items-center gap-2">
                                  <div class="progress" style="width: 60px; height: 6px;">
                                    <div class="progress-bar bg-success" style="width: <?php echo $facility['completion_rate']; ?>%"></div>
                                  </div>
                                  <small><?php echo number_format($facility['completion_rate'], 1); ?>%</small>
                                </div>
                              </td>
                              <td>
                                <span class="badge bg-<?php echo ($facility['cancellation_rate'] > 20) ? 'danger' : 'warning'; ?>-subtle text-<?php echo ($facility['cancellation_rate'] > 20) ? 'danger' : 'warning'; ?>-emphasis">
                                  <?php echo number_format($facility['cancellation_rate'], 1); ?>%
                                </span>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="8" class="text-center py-5 text-muted">No facility data available</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-12">
                <div class="card card-lg h-100">
                  <div class="card-header border-bottom">
                    <h5 class="mb-0">Peak Booking Hours</h5>
                    <p class="text-secondary small mb-0">Data from vw_peak_hours_analysis view</p>
                  </div>
                  <div class="card-body">
                    <div class="list-group list-group-flush">
                      <?php if(!empty($peak_hours)): ?>
                        <?php 
                        $max_bookings = max(array_column($peak_hours, 'total_bookings'));
                        $top_hours = array_slice($peak_hours, 0, 8);
                        foreach($top_hours as $hour): 
                          $percentage = ($hour['total_bookings'] / $max_bookings) * 100;
                        ?>
                          <div class="list-group-item border-0 px-0">
                            <div class="d-flex justify-content-between mb-2">
                              <span class="fw-semibold"><?php echo date('g:00 A', strtotime($hour['booking_hour'] . ':00:00')); ?></span>
                              <span class="badge bg-primary-subtle text-primary-emphasis"><?php echo $hour['total_bookings']; ?> bookings</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                              <div class="progress-bar bg-primary" style="width: <?php echo $percentage; ?>%"></div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <div class="text-center py-5 text-muted">No data available</div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Organization Activity -->
            <div class="row g-6 mb-6">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom">
                    <h5 class="mb-0">Top Organizations by Activity</h5>
                    <p class="text-secondary small mb-0">Data from vw_organization_activity view</p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                      <thead class="table-light">
                        <tr>
                          <th>Organization</th>
                          <th>Total Reservations</th>
                          <th>Confirmed</th>
                          <th>Completed</th>
                          <th>Total Attendees</th>
                          <th>Facilities Used</th>
                          <th>Period</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($organization_activity)): ?>
                          <?php 
                          $top_orgs = array_slice($organization_activity, 0, 15);
                          foreach($top_orgs as $org): 
                          ?>
                            <tr>
                              <td><strong><?php echo htmlspecialchars($org['organization_name']); ?></strong></td>
                              <td><?php echo number_format($org['total_reservations']); ?></td>
                              <td><?php echo number_format($org['confirmed_reservations']); ?></td>
                              <td><?php echo number_format($org['completed_reservations']); ?></td>
                              <td><?php echo number_format($org['total_attendees']); ?></td>
                              <td><?php echo $org['different_facilities_used']; ?></td>
                              <td>
                                <small class="text-secondary">
                                  <?php echo date('M Y', strtotime($org['first_booking_date'])); ?> - 
                                  <?php echo date('M Y', strtotime($org['last_booking_date'])); ?>
                                </small>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="7" class="text-center py-5 text-muted">No organization data available</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Recent Daily Analytics -->
            <div class="row g-6 mb-6">
              <div class="col-12">
                <div class="card card-lg">
                  <div class="card-header border-bottom">
                    <h5 class="mb-0">Recent Daily Analytics (Last 30 Days)</h5>
                    <p class="text-secondary small mb-0">Data from vw_daily_reservation_analytics view</p>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                      <thead class="table-light">
                        <tr>
                          <th>Date</th>
                          <th>Day</th>
                          <th>Reservations</th>
                          <th>Facilities Used</th>
                          <th>Confirmed</th>
                          <th>Completed</th>
                          <th>Expected Attendees</th>
                          <th>Time Range</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($daily_analytics)): ?>
                          <?php foreach($daily_analytics as $day): ?>
                            <tr>
                              <td><strong><?php echo date('M d, Y', strtotime($day['reservation_date'])); ?></strong></td>
                              <td>
                                <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                  <?php echo $day['day_of_week']; ?>
                                </span>
                              </td>
                              <td><?php echo number_format($day['total_reservations']); ?></td>
                              <td><?php echo $day['facilities_used']; ?></td>
                              <td><?php echo number_format($day['confirmed_count']); ?></td>
                              <td><?php echo number_format($day['completed_count']); ?></td>
                              <td><?php echo number_format($day['total_expected_attendees']); ?></td>
                              <td>
                                <small class="text-secondary">
                                  <?php echo date('g:i A', strtotime($day['earliest_booking'])); ?> - 
                                  <?php echo date('g:i A', strtotime($day['latest_booking'])); ?>
                                </small>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="8" class="text-center py-5 text-muted">No daily analytics available</td>
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
<script src="<?php echo base_url(); ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>

<script>
// Monthly Trend Chart
document.addEventListener('DOMContentLoaded', function() {
    var monthlyData = <?php echo json_encode($monthly_summary); ?>;
    
    if (monthlyData && monthlyData.length > 0) {
        var categories = monthlyData.map(item => item.month_name);
        var totalBookings = monthlyData.map(item => parseInt(item.total_reservations));
        var confirmedBookings = monthlyData.map(item => parseInt(item.confirmed_count));
        var completedBookings = monthlyData.map(item => parseInt(item.completed_count));
        var cancelledBookings = monthlyData.map(item => parseInt(item.cancelled_count));
        
        var options = {
            series: [
                {
                    name: 'Total Bookings',
                    type: 'column',
                    data: totalBookings
                },
                {
                    name: 'Confirmed',
                    type: 'column',
                    data: confirmedBookings
                },
                {
                    name: 'Completed',
                    type: 'column',
                    data: completedBookings
                },
                {
                    name: 'Cancelled',
                    type: 'line',
                    data: cancelledBookings
                }
            ],
            chart: {
                height: 400,
                type: 'line',
                toolbar: {
                    show: true
                }
            },
            stroke: {
                width: [0, 0, 0, 3],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
            colors: ['#0d6efd', '#198754', '#ffc107', '#dc3545'],
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: categories
            },
            yaxis: {
                title: {
                    text: 'Number of Bookings'
                }
            },
            legend: {
                position: 'top'
            },
            tooltip: {
                shared: true,
                intersect: false
            }
        };

        var chart = new ApexCharts(document.querySelector("#monthlyTrendChart"), options);
        chart.render();
    } else {
        document.getElementById('monthlyTrendChart').innerHTML = '<div class="text-center py-5 text-muted">No data available for the selected year</div>';
    }
});
</script>

</body>
</html>

