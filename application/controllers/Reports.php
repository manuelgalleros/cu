<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = 'View Reports';
		$this->load->model('model_reports');
		$this->load->model('model_users');
	}

	/* 
    * It redirects to the report page
    * and based on the year, all the orders data are fetch from the database.
    */
	public function index()
	{
		if(!in_array('viewReports', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		
		$today_year = date('Y');

		if($this->input->post('select_year')) {
			$today_year = $this->input->post('select_year');
		}

		$parking_data = $this->model_reports->getOrderData($today_year);
		$this->data['report_years'] = $this->model_reports->getOrderYear();
		

		$final_parking_data = array();
		foreach ($parking_data as $k => $v) {
			
			if(count($v) > 1) {
				$total_amount_earned = array();
				foreach ($v as $k2 => $v2) {
					if($v2) {
						$total_amount_earned[] = $v2['gross_amount'];						
					}
				}
				$final_parking_data[$k] = array_sum($total_amount_earned);	
			}
			else {
				$final_parking_data[$k] = 0;	
			}
			
		}
		
		$user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);
		$this->data['selected_year'] = $today_year;
		$this->data['company_currency'] = $this->company_currency();
		$this->data['results'] = $final_parking_data;

		$this->render_template('reports/index', $this->data);
	}

	/**
	 * Reservation Reports Page
	 * Uses SQL views for optimized reporting
	 */
	public function reservations()
	{
		if(!in_array('viewReports', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		// Get selected year or default to current year
		$selected_year = $this->input->post('select_year') ? $this->input->post('select_year') : date('Y');
		$next_year = $selected_year + 1;

		// Fetch all report data from SQL views
		$this->data['monthly_summary'] = $this->model_reports->getMonthlyReservationSummary($selected_year);
		$this->data['facility_performance'] = $this->model_reports->getFacilityPerformance();
		$this->data['daily_analytics'] = $this->model_reports->getDailyReservationAnalytics();
		$this->data['organization_activity'] = $this->model_reports->getOrganizationActivity();
		$this->data['revenue_trend'] = $this->model_reports->getRevenueTrendAnalysis($selected_year);
		$this->data['peak_hours'] = $this->model_reports->getPeakHoursAnalysis();
		$this->data['report_years'] = $this->model_reports->getReservationReportYears();
		$this->data['selected_year'] = $selected_year;
		$this->data['year_range'] = $selected_year . '-' . $next_year;

		// Fetch data for the next year to calculate year range statistics
		$next_year_summary = $this->model_reports->getMonthlyReservationSummary($next_year);

		// Calculate summary statistics (facility utilization focused)
		// This includes both selected year and next year for total bookings
		$summary_stats = array(
			'total_bookings' => 0,
			'total_pending' => 0,
			'total_confirmed' => 0,
			'total_completed' => 0,
			'total_cancelled' => 0
		);

		// Add statistics from selected year
		foreach ($this->data['monthly_summary'] as $month) {
			$summary_stats['total_bookings'] += $month['total_reservations'];
			$summary_stats['total_pending'] += $month['pending_count'];
			$summary_stats['total_confirmed'] += $month['confirmed_count'];
			$summary_stats['total_completed'] += $month['completed_count'];
			$summary_stats['total_cancelled'] += $month['cancelled_count'];
		}

		// Add statistics from next year for total bookings
		foreach ($next_year_summary as $month) {
			$summary_stats['total_bookings'] += $month['total_reservations'];
			$summary_stats['total_pending'] += $month['pending_count'];
			$summary_stats['total_confirmed'] += $month['confirmed_count'];
			$summary_stats['total_completed'] += $month['completed_count'];
			$summary_stats['total_cancelled'] += $month['cancelled_count'];
		}

		$this->data['summary_stats'] = $summary_stats;

		$user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);

		$this->render_template('reports/reservations', $this->data);
	}
}	