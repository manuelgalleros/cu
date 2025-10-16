<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard - CU Facilities Reservation';
		
		$this->load->model('model_users');
		$this->load->model('model_logs');
		$this->load->model('model_reservations');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
        $user_id = $this->session->userdata('id');
		$this->data['total_users'] = $this->model_users->countTotalUsers();
		
		// Get recent activities for dashboard
		$recent_activities = $this->model_logs->get_activities(10, 0);
		$this->data['recent_activities'] = $recent_activities['activities'];
		
		// Get dashboard statistics using SQL subqueries
		$this->data['dashboard_stats'] = $this->model_reservations->getDashboardStats();
		
		// Get facility utilization report
		$this->data['facility_utilization'] = $this->model_reservations->getFacilityUtilizationReport();
		
		// Get calendar reservations
		$this->data['calendar_reservations'] = $this->model_reservations->getCalendarReservations();
		
		// Get confirmed reservations
		$this->data['confirmed_reservations'] = $this->model_reservations->getConfirmedReservations(3);
		
		$user_data = $this->model_users->getUserData($user_id);
		$this->data['user_data'] = $user_data;
        
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('dashboard/index', $this->data);
	}
	
}