<?php 

class Model_reports extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*getting the total months*/
	private function months()
	{
		return array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
	}

	/* getting the year of the orders */
	public function getOrderYear()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		$result = $query->result_array();
		
		$return_data = array();
		foreach ($result as $k => $v) {
			$date = date('Y', $v['date_time']);
			$return_data[] = $date;
		}

		$return_data = array_unique($return_data);

		return $return_data;
	}

	// getting the order reports based on the year and moths
	public function getOrderData($year)
	{	
		if($year) {
			$months = $this->months();
			
			$sql = "SELECT * FROM orders WHERE paid_status = ?";
			$query = $this->db->query($sql, array(1));
			$result = $query->result_array();

			$final_data = array();
			foreach ($months as $month_k => $month_y) {
				$get_mon_year = $year.'-'.$month_y;	

				$final_data[$get_mon_year][] = '';
				foreach ($result as $k => $v) {
					$month_year = date('Y-m', $v['date_time']);

					if($get_mon_year == $month_year) {
						$final_data[$get_mon_year][] = $v;
					}
				}
			}	


			return $final_data;
			
		}
	}

	// ============================================
	// RESERVATION REPORTS USING SQL VIEWS
	// ============================================

	/**
	 * Get monthly reservation summary from SQL view
	 * @param int $year Optional year filter
	 * @return array Monthly reservation statistics
	 */
	public function getMonthlyReservationSummary($year = null)
	{
		$sql = "SELECT * FROM vw_monthly_reservation_summary";
		if ($year) {
			$sql .= " WHERE year = ?";
			$query = $this->db->query($sql, array($year));
		} else {
			$query = $this->db->query($sql);
		}
		return $query->result_array();
	}

	/**
	 * Get facility performance metrics from SQL view
	 * @return array Facility performance data
	 */
	public function getFacilityPerformance()
	{
		$sql = "SELECT * FROM vw_facility_performance";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * Get daily reservation analytics from SQL view
	 * @param string $start_date Optional start date
	 * @param string $end_date Optional end date
	 * @return array Daily analytics data
	 */
	public function getDailyReservationAnalytics($start_date = null, $end_date = null)
	{
		$sql = "SELECT * FROM vw_daily_reservation_analytics";
		$conditions = array();
		$params = array();

		if ($start_date) {
			$conditions[] = "reservation_date >= ?";
			$params[] = $start_date;
		}
		if ($end_date) {
			$conditions[] = "reservation_date <= ?";
			$params[] = $end_date;
		}

		if (!empty($conditions)) {
			$sql .= " WHERE " . implode(" AND ", $conditions);
		}

		$sql .= " LIMIT 30";

		$query = $this->db->query($sql, $params);
		return $query->result_array();
	}

	/**
	 * Get organization activity report from SQL view
	 * @return array Organization activity data
	 */
	public function getOrganizationActivity()
	{
		$sql = "SELECT * FROM vw_organization_activity";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * Get revenue trend analysis from SQL view
	 * @param int $year Optional year filter
	 * @return array Revenue trend data
	 */
	public function getRevenueTrendAnalysis($year = null)
	{
		$sql = "SELECT * FROM vw_revenue_trend_analysis";
		if ($year) {
			$sql .= " WHERE year = ?";
			$query = $this->db->query($sql, array($year));
		} else {
			$sql .= " LIMIT 12"; // Last 12 months
			$query = $this->db->query($sql);
		}
		return $query->result_array();
	}

	/**
	 * Get peak hours analysis from SQL view
	 * @return array Peak hours data
	 */
	public function getPeakHoursAnalysis()
	{
		$sql = "SELECT * FROM vw_peak_hours_analysis";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * Get available years for reservation reports
	 * @return array List of years
	 */
	public function getReservationReportYears()
	{
		$sql = "SELECT DISTINCT YEAR(reservation_date) as year 
				FROM reservations 
				WHERE status != 'archived'
				ORDER BY year DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		$years = array();
		foreach ($result as $row) {
			$years[] = $row['year'];
		}
		
		return $years;
	}
}