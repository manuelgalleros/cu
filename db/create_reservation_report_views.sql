-- SQL Views for Reservation Reports
-- These views provide optimized data aggregation for reporting purposes

-- =====================================================
-- View 1: Monthly Reservation Summary
-- Aggregates reservation counts and revenue by month
-- =====================================================
CREATE OR REPLACE VIEW vw_monthly_reservation_summary AS
SELECT 
    DATE_FORMAT(reservation_date, '%Y-%m') as month_year,
    YEAR(reservation_date) as year,
    MONTH(reservation_date) as month,
    MONTHNAME(reservation_date) as month_name,
    COUNT(*) as total_reservations,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending_count,
    SUM(CASE WHEN status = 'endorsed' THEN 1 ELSE 0 END) as endorsed_count,
    SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_count,
    SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) as rejected_count,
    SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) as cancelled_count,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_count,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) as total_revenue,
    SUM(CASE WHEN status = 'cancelled' THEN total_cost ELSE 0 END) as lost_revenue,
    AVG(total_cost) as average_booking_value,
    AVG(expected_attendees) as average_attendees
FROM reservations
WHERE status != 'archived'
GROUP BY DATE_FORMAT(reservation_date, '%Y-%m'), YEAR(reservation_date), MONTH(reservation_date), MONTHNAME(reservation_date)
ORDER BY year DESC, month DESC;

-- =====================================================
-- View 2: Facility Performance Report
-- Shows performance metrics for each facility
-- =====================================================
CREATE OR REPLACE VIEW vw_facility_performance AS
SELECT 
    facility_name,
    facility_capacity,
    AVG(facility_rate) as average_rate,
    COUNT(*) as total_bookings,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending_bookings,
    SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_bookings,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_bookings,
    SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) as cancelled_bookings,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) as total_revenue,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN duration ELSE 0 END) as total_hours_booked,
    ROUND((SUM(CASE WHEN status IN ('confirmed', 'completed') THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as completion_rate,
    ROUND((SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as cancellation_rate,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN expected_attendees ELSE 0 END) as total_attendees_served
FROM reservations
WHERE status != 'archived'
GROUP BY facility_name, facility_capacity
ORDER BY total_revenue DESC;

-- =====================================================
-- View 3: Daily Reservation Analytics
-- Provides day-by-day reservation statistics
-- =====================================================
CREATE OR REPLACE VIEW vw_daily_reservation_analytics AS
SELECT 
    reservation_date,
    DAYNAME(reservation_date) as day_of_week,
    COUNT(*) as total_reservations,
    COUNT(DISTINCT facility_name) as facilities_used,
    SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_count,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_count,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) as daily_revenue,
    SUM(expected_attendees) as total_expected_attendees,
    MIN(time_start) as earliest_booking,
    MAX(time_end) as latest_booking
FROM reservations
WHERE status != 'archived'
GROUP BY reservation_date, DAYNAME(reservation_date)
ORDER BY reservation_date DESC;

-- =====================================================
-- View 4: Organization Activity Report
-- Shows reservation activity by organization
-- =====================================================
CREATE OR REPLACE VIEW vw_organization_activity AS
SELECT 
    COALESCE(organization, 'Individual') as organization_name,
    COUNT(*) as total_reservations,
    SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_reservations,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_reservations,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) as total_spent,
    AVG(total_cost) as average_booking_value,
    SUM(expected_attendees) as total_attendees,
    COUNT(DISTINCT facility_name) as different_facilities_used,
    MIN(reservation_date) as first_booking_date,
    MAX(reservation_date) as last_booking_date
FROM reservations
WHERE status != 'archived'
GROUP BY organization_name
ORDER BY total_spent DESC;

-- =====================================================
-- View 5: Revenue Trend Analysis
-- Comprehensive revenue analysis by time period
-- =====================================================
CREATE OR REPLACE VIEW vw_revenue_trend_analysis AS
SELECT 
    DATE_FORMAT(reservation_date, '%Y-%m') as period,
    YEAR(reservation_date) as year,
    QUARTER(reservation_date) as quarter,
    MONTH(reservation_date) as month,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) as confirmed_revenue,
    SUM(CASE WHEN status = 'pending' THEN total_cost ELSE 0 END) as pending_revenue,
    SUM(CASE WHEN status = 'cancelled' THEN total_cost ELSE 0 END) as lost_revenue,
    COUNT(DISTINCT reservation_date) as active_days,
    COUNT(*) as total_bookings,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) / 
        NULLIF(COUNT(DISTINCT reservation_date), 0) as average_daily_revenue
FROM reservations
WHERE status != 'archived'
GROUP BY DATE_FORMAT(reservation_date, '%Y-%m'), YEAR(reservation_date), QUARTER(reservation_date), MONTH(reservation_date)
ORDER BY period DESC;

-- =====================================================
-- View 6: Peak Hours Analysis
-- Identifies most popular booking times
-- =====================================================
CREATE OR REPLACE VIEW vw_peak_hours_analysis AS
SELECT 
    HOUR(time_start) as booking_hour,
    COUNT(*) as total_bookings,
    SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed_bookings,
    SUM(CASE WHEN status IN ('confirmed', 'completed') THEN total_cost ELSE 0 END) as revenue,
    COUNT(DISTINCT facility_name) as facilities_used,
    AVG(duration) as average_duration_hours
FROM reservations
WHERE status != 'archived'
GROUP BY HOUR(time_start)
ORDER BY total_bookings DESC;

