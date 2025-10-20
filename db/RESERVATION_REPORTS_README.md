# Reservation Reports & Analytics Documentation

## Overview
This system provides comprehensive reservation analytics using **SQL Views** for optimized data aggregation and reporting.

## SQL Views Created

### 1. `vw_monthly_reservation_summary`
**Purpose:** Aggregates reservation statistics by month

**Columns:**
- `month_year` - Format: YYYY-MM
- `year`, `month`, `month_name`
- `total_reservations` - Total count
- `pending_count`, `endorsed_count`, `confirmed_count`, `rejected_count`, `cancelled_count`, `completed_count`
- `total_revenue` - Sum of confirmed + completed
- `lost_revenue` - Sum of cancelled bookings
- `average_booking_value` - Average cost
- `average_attendees` - Average expected attendees

**Use Case:** Monthly trend analysis, revenue forecasting

---

### 2. `vw_facility_performance`
**Purpose:** Performance metrics for each facility

**Columns:**
- `facility_name`, `facility_capacity`
- `average_rate` - Average rental rate
- `total_bookings` - All bookings
- `pending_bookings`, `confirmed_bookings`, `completed_bookings`, `cancelled_bookings`
- `total_revenue` - Revenue generated
- `total_hours_booked` - Total duration
- `completion_rate` - Percentage of completed bookings
- `cancellation_rate` - Percentage of cancellations
- `total_attendees_served` - Total people served

**Use Case:** Facility optimization, capacity planning

---

### 3. `vw_daily_reservation_analytics`
**Purpose:** Day-by-day reservation statistics

**Columns:**
- `reservation_date`, `day_of_week`
- `total_reservations`
- `facilities_used` - Distinct facilities count
- `confirmed_count`, `completed_count`
- `daily_revenue`
- `total_expected_attendees`
- `earliest_booking`, `latest_booking` - Time range

**Use Case:** Daily operations, staffing optimization

---

### 4. `vw_organization_activity`
**Purpose:** Reservation activity by organization

**Columns:**
- `organization_name`
- `total_reservations`, `confirmed_reservations`, `completed_reservations`
- `total_spent` - Total revenue from org
- `average_booking_value`
- `total_attendees`
- `different_facilities_used`
- `first_booking_date`, `last_booking_date`

**Use Case:** Client relationship management, VIP identification

---

### 5. `vw_revenue_trend_analysis`
**Purpose:** Comprehensive revenue analysis by time period

**Columns:**
- `period` - YYYY-MM format
- `year`, `quarter`, `month`
- `confirmed_revenue` - Revenue from confirmed/completed
- `pending_revenue` - Potential revenue
- `lost_revenue` - From cancellations
- `active_days` - Days with bookings
- `total_bookings`
- `average_daily_revenue`

**Use Case:** Financial reporting, budget planning

---

### 6. `vw_peak_hours_analysis`
**Purpose:** Identifies most popular booking times

**Columns:**
- `booking_hour` - Hour of day (0-23)
- `total_bookings`
- `confirmed_bookings`
- `revenue`
- `facilities_used`
- `average_duration_hours`

**Use Case:** Resource allocation, pricing strategy

---

## Report Page Features

### URL
`/reports/reservations`

### Key Components

1. **Summary Statistics Cards**
   - Total Bookings
   - Total Revenue
   - Average Booking Value
   - Completed vs Pending Status

2. **Monthly Trend Chart**
   - Interactive ApexCharts visualization
   - Multi-series data (bookings + revenue)
   - Year filter

3. **Facility Performance Table**
   - Complete metrics per facility
   - Completion and cancellation rates
   - Visual progress bars

4. **Peak Hours Analysis**
   - Top 8 busiest hours
   - Visual bar representation
   - Booking counts

5. **Organization Activity Table**
   - Top 15 organizations by spending
   - Complete activity history
   - Period tracking

6. **Daily Analytics Table**
   - Last 30 days of activity
   - Day-of-week analysis
   - Time range tracking

### Performance Benefits

**Using SQL Views:**
- ✅ Pre-aggregated data (faster queries)
- ✅ Consistent business logic
- ✅ Reduced code complexity
- ✅ Easy maintenance
- ✅ Optimized database operations

**vs Traditional Approach:**
- Traditional: Multiple complex queries + PHP aggregation
- SQL Views: Single optimized query per view

### Model Methods

**Location:** `application/models/Model_reports.php`

- `getMonthlyReservationSummary($year)`
- `getFacilityPerformance()`
- `getDailyReservationAnalytics($start_date, $end_date)`
- `getOrganizationActivity()`
- `getRevenueTrendAnalysis($year)`
- `getPeakHoursAnalysis()`
- `getReservationReportYears()`

### Controller Method

**Location:** `application/controllers/Reports.php`

Method: `reservations()`
- Loads all view data
- Calculates summary statistics
- Renders comprehensive report

### View File

**Location:** `application/views/reports/reservations.php`

Features:
- Responsive Bootstrap 5 layout
- ApexCharts integration
- Year filter
- Interactive tables
- Progress bars and badges

## Installation

1. **Create SQL Views:**
   ```bash
   mysql -u root -p cu < db/create_reservation_report_views.sql
   ```

2. **Verify Views:**
   ```sql
   SHOW FULL TABLES WHERE Table_type = 'VIEW';
   ```

3. **Access Report:**
   Navigate to: `http://your-domain/reports/reservations`

## Maintenance

### Updating Views
If reservation table structure changes, update views:
```sql
-- Example: Add new field to monthly summary
CREATE OR REPLACE VIEW vw_monthly_reservation_summary AS
SELECT ...
-- Add your new columns here
FROM reservations;
```

### Performance Optimization
Views are automatically optimized by MySQL. For additional performance:
- Ensure proper indexes on `reservations` table
- Monitor query execution times
- Consider materialized views for very large datasets

## Security

- All views exclude `archived` reservations
- Data is read-only through views
- Controller checks user permissions (`viewReports`)
- SQL injection protection via parameterized queries

## Future Enhancements

Potential additions:
- Materialized views for historical data
- Export to PDF/Excel functionality
- Custom date range filters
- Comparison reports (Year-over-Year)
- Predictive analytics

---

**Created:** October 2025
**Database:** MySQL/MariaDB
**Framework:** CodeIgniter 3

