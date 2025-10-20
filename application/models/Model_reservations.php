<?php 

class Model_reservations extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Generate a unique reservation ID with format: CU-XXXXXX
     * where XXXXXX is 6 alphanumeric characters
     */
    private function generateUniqueId()
    {
        $max_attempts = 10;
        $attempts = 0;
        
        do {
            // Generate 6 random alphanumeric characters (uppercase letters and numbers)
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            
            for ($i = 0; $i < 6; $i++) {
                $random_string .= $characters[rand(0, strlen($characters) - 1)];
            }
            
            $reservation_id = 'CU-' . $random_string;
            
            // Check if this ID already exists
            $this->db->where('id', $reservation_id);
            $query = $this->db->get('reservations');
            
            $attempts++;
            
            if ($query->num_rows() == 0) {
                return $reservation_id;
            }
            
        } while ($attempts < $max_attempts);
        
        // If we couldn't generate a unique ID after max attempts,
        // add timestamp to make it unique
        return 'CU-' . strtoupper(substr(uniqid(), -6));
    }

    /**
     * Create a new reservation
     */
    public function create($data = array())
    {
        if($data) {
            // Generate unique ID
            $data['id'] = $this->generateUniqueId();
            
            $insert = $this->db->insert('reservations', $data);
            return ($insert == true) ? $data['id'] : false;
        }
    }

    /**
     * Get all reservations
     */
    public function getReservationData($id = null) 
    {
        if($id) {
            $sql = "SELECT * FROM reservations WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM reservations ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * Get reservations by facility name
     */
    public function getReservationsByFacility($facility_name, $from_date = null, $to_date = null)
    {
        $this->db->select('*');
        $this->db->from('reservations');
        $this->db->where('facility_name', $facility_name);
        $this->db->where_in('status', array('pending', 'confirmed'));
        
        if($from_date && $to_date) {
            $this->db->where('reservation_date >=', $from_date);
            $this->db->where('reservation_date <=', $to_date);
        }
        
        $this->db->order_by('reservation_date', 'ASC');
        $this->db->order_by('time_start', 'ASC');
        
        $query = $this->db->query($this->db->get_compiled_select());
        return $query->result_array();
    }

    /**
     * Get reservations for a specific date and facility
     */
    public function getReservationsByDateAndFacility($date, $facility_name)
    {
        $sql = "SELECT * FROM reservations 
                WHERE reservation_date = ? 
                AND facility_name = ? 
                AND status IN ('pending', 'confirmed')
                ORDER BY time_start ASC";
        
        $query = $this->db->query($sql, array($date, $facility_name));
        return $query->result_array();
    }

    /**
     * Check if a time slot is available
     */
    public function isTimeSlotAvailable($facility_name, $date, $time_start, $time_end)
    {
        $sql = "SELECT COUNT(*) as count FROM reservations 
                WHERE facility_name = ? 
                AND reservation_date = ? 
                AND status IN ('pending', 'confirmed')
                AND (
                    (time_start < ? AND time_end > ?) OR
                    (time_start < ? AND time_end > ?) OR
                    (time_start >= ? AND time_end <= ?)
                )";
        
        $query = $this->db->query($sql, array(
            $facility_name, 
            $date, 
            $time_end, $time_start,  // Check if new reservation starts during existing
            $time_end, $time_start,  // Check if new reservation ends during existing
            $time_start, $time_end   // Check if new reservation encompasses existing
        ));
        
        $result = $query->row_array();
        return ($result['count'] == 0);
    }

    /**
     * Get available time slots for a specific date and facility
     */
    public function getAvailableTimeSlots($facility_name, $date)
    {
        // Get all reservations for this date and facility
        $reservations = $this->getReservationsByDateAndFacility($date, $facility_name);
        
        // Define all possible time slots (8:00 AM to 5:00 PM)
        $all_slots = array(
            array('time' => '08:00 AM - 09:00 AM', 'start' => '08:00:00', 'end' => '09:00:00'),
            array('time' => '09:00 AM - 10:00 AM', 'start' => '09:00:00', 'end' => '10:00:00'),
            array('time' => '10:00 AM - 11:00 AM', 'start' => '10:00:00', 'end' => '11:00:00'),
            array('time' => '11:00 AM - 12:00 PM', 'start' => '11:00:00', 'end' => '12:00:00'),
            array('time' => '12:00 PM - 01:00 PM', 'start' => '12:00:00', 'end' => '13:00:00'),
            array('time' => '01:00 PM - 02:00 PM', 'start' => '13:00:00', 'end' => '14:00:00'),
            array('time' => '02:00 PM - 03:00 PM', 'start' => '14:00:00', 'end' => '15:00:00'),
            array('time' => '03:00 PM - 04:00 PM', 'start' => '15:00:00', 'end' => '16:00:00'),
            array('time' => '04:00 PM - 05:00 PM', 'start' => '16:00:00', 'end' => '17:00:00')
        );
        
        $reserved_slots = array();
        foreach($reservations as $reservation) {
            $reserved_slots[] = array(
                'start' => $reservation['time_start'],
                'end' => $reservation['time_end']
            );
        }
        
        $available_slots = array();
        foreach($all_slots as $slot) {
            $is_available = true;
            foreach($reserved_slots as $reserved) {
                if(
                    ($slot['start'] < $reserved['end'] && $slot['end'] > $reserved['start'])
                ) {
                    $is_available = false;
                    break;
                }
            }
            if($is_available) {
                $available_slots[] = $slot['time'];
            }
        }
        
        return $available_slots;
    }

    /**
     * Check if a date is fully reserved
     */
    public function isDateFullyReserved($facility_name, $date)
    {
        $available_slots = $this->getAvailableTimeSlots($facility_name, $date);
        return (count($available_slots) == 0);
    }

    /**
     * Update reservation
     */
    public function update($id, $data = array())
    {
        if($data && $id) {
            $this->db->where('id', $id);
            $update = $this->db->update('reservations', $data);
            return ($update == true) ? true : false;
        }
    }

    /**
     * Delete reservation
     */
    public function remove($id)
    {
        if($id) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('reservations');
            return ($delete == true) ? true : false;
        }
    }

    /**
     * Get reservations count by status
     */
    public function countByStatus($status = 'pending')
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results('reservations');
    }

    /**
     * Get upcoming reservations
     */
    public function getUpcomingReservations($limit = 10)
    {
        $sql = "SELECT * FROM reservations 
                WHERE reservation_date >= CURDATE() 
                AND status IN ('pending', 'confirmed')
                ORDER BY reservation_date ASC, time_start ASC 
                LIMIT ?";
        
        $query = $this->db->query($sql, array($limit));
        return $query->result_array();
    }
    
    /**
     * Get all active reservations (not archived)
     */
    public function getAllActiveReservations($user_id = null)
    {
        $sql = "SELECT r.*, r.rejection_reason, u.firstname, u.lastname 
                FROM reservations r 
                LEFT JOIN users u ON r.created_by = u.id 
                WHERE r.status != 'archived'";
        
        // Filter by user_id if provided (for non-admin users)
        if ($user_id !== null) {
            $sql .= " AND r.created_by = " . intval($user_id);
        }
        
        $sql .= " ORDER BY r.created_at DESC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    /**
     * Get all archived reservations
     */
    public function getAllArchivedReservations($user_id = null)
    {
        $sql = "SELECT r.*, r.rejection_reason, u.firstname, u.lastname 
                FROM reservations r 
                LEFT JOIN users u ON r.created_by = u.id 
                WHERE r.status = 'archived'";
        
        // Filter by user_id if provided (for non-admin users)
        if ($user_id !== null) {
            $sql .= " AND r.created_by = " . intval($user_id);
        }
        
        $sql .= " ORDER BY r.updated_at DESC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    /**
     * Archive a reservation
     */
    public function archive($id)
    {
        if($id) {
            $data = array('status' => 'archived');
            $this->db->where('id', $id);
            $update = $this->db->update('reservations', $data);
            return ($update == true) ? true : false;
        }
        return false;
    }
    
    /**
     * Restore an archived reservation
     */
    public function restore($id)
    {
        if($id) {
            $data = array('status' => 'pending');
            $this->db->where('id', $id);
            $this->db->where('status', 'archived');
            $update = $this->db->update('reservations', $data);
            return ($update == true) ? true : false;
        }
        return false;
    }
    
    /**
     * Permanently delete a reservation by moving it to deleted_reservations table
     * @param string $id Reservation ID
     * @return bool Success status
     */
    public function deletePermanently($id)
    {
        if(!$id) {
            return false;
        }
        
        // Start transaction
        $this->db->trans_start();
        
        // Get the reservation data
        $this->db->where('id', $id);
        $this->db->where('status', 'archived'); // Only allow deletion of archived reservations
        $reservation = $this->db->get('reservations')->row_array();
        
        if(!$reservation) {
            $this->db->trans_rollback();
            return false;
        }
        
        // Get current user ID for deleted_by field
        $deleted_by = $this->session->userdata('id');
        
        // Add deletion metadata
        $reservation['deleted_by'] = $deleted_by;
        $reservation['deleted_at'] = date('Y-m-d H:i:s');
        
        // Insert into deleted_reservations table
        $this->db->insert('deleted_reservations', $reservation);
        
        // Delete from reservations table
        $this->db->where('id', $id);
        $this->db->delete('reservations');
        
        // Complete transaction
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }
    
    /**
     * Get reservations that have been updated since a specific timestamp
     * Used for real-time polling to detect changes
     */
    public function getReservationsUpdatedSince($timestamp)
    {
        $sql = "SELECT r.*, u.firstname, u.lastname 
                FROM reservations r 
                LEFT JOIN users u ON r.created_by = u.id 
                WHERE r.updated_at > ? 
                AND r.status != 'archived'
                ORDER BY r.updated_at DESC";
        
        $query = $this->db->query($sql, array($timestamp));
        return $query->result_array();
    }
    
    /**
     * Get dashboard statistics using SQL subqueries
     * Returns counts for each status in a single query
     */
    public function getDashboardStats()
    {
        $sql = "SELECT 
                    (SELECT COUNT(*) FROM reservations WHERE status = 'pending') as pending_count,
                    (SELECT COUNT(*) FROM reservations WHERE status = 'endorsed') as endorsed_count,
                    (SELECT COUNT(*) FROM reservations WHERE status = 'confirmed') as confirmed_count,
                    (SELECT COUNT(*) FROM reservations WHERE status = 'rejected') as rejected_count,
                    (SELECT COUNT(*) FROM reservations WHERE status = 'cancelled') as cancelled_count,
                    (SELECT COUNT(*) FROM reservations WHERE status = 'completed') as completed_count,
                    (SELECT COUNT(*) FROM reservations WHERE status = 'archived') as archived_count,
                    (SELECT COUNT(*) FROM reservations) as total_count,
                    (SELECT COUNT(*) FROM reservations WHERE reservation_date = CURDATE()) as today_count,
                    (SELECT COUNT(*) FROM reservations 
                     WHERE reservation_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
                     AND status IN ('confirmed', 'endorsed')) as upcoming_count,
                    (SELECT COALESCE(SUM(total_cost), 0) 
                     FROM reservations 
                     WHERE YEARWEEK(reservation_date) = YEARWEEK(CURDATE())
                     AND status IN ('confirmed', 'completed')) as week_revenue,
                    (SELECT COALESCE(SUM(total_cost), 0) 
                     FROM reservations 
                     WHERE MONTH(reservation_date) = MONTH(CURDATE())
                     AND YEAR(reservation_date) = YEAR(CURDATE())
                     AND status IN ('confirmed', 'completed')) as month_revenue";
        
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
    /**
     * Get facility utilization report using SQL subqueries
     * Shows booking counts and revenue for each facility
     */
    public function getFacilityUtilizationReport()
    {
        $sql = "SELECT 
                    facility_name,
                    (SELECT COUNT(*) 
                     FROM reservations r2 
                     WHERE r2.facility_name = r1.facility_name) as total_bookings,
                    
                    (SELECT COUNT(*) 
                     FROM reservations r2 
                     WHERE r2.facility_name = r1.facility_name 
                     AND r2.status = 'pending') as pending_bookings,
                    
                    (SELECT COUNT(*) 
                     FROM reservations r2 
                     WHERE r2.facility_name = r1.facility_name 
                     AND r2.status = 'endorsed') as endorsed_bookings,
                    
                    (SELECT COALESCE(SUM(total_cost), 0) 
                     FROM reservations r2 
                     WHERE r2.facility_name = r1.facility_name 
                     AND r2.status IN ('confirmed', 'completed')) as total_revenue,
                    
                    (SELECT MAX(reservation_date) 
                     FROM reservations r2 
                     WHERE r2.facility_name = r1.facility_name 
                     AND r2.status IN ('confirmed', 'completed')) as last_booking_date,
                    
                    (SELECT COUNT(*) 
                     FROM reservations r2 
                     WHERE r2.facility_name = r1.facility_name 
                     AND r2.reservation_date >= CURDATE()
                     AND r2.status IN ('confirmed', 'endorsed')) as upcoming_bookings

                FROM reservations r1
                GROUP BY facility_name
                ORDER BY total_bookings DESC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    /**
     * Get all reservations for calendar display
     * Returns reservations with facility, date, time, and status information
     */
    public function getCalendarReservations()
    {
        $sql = "SELECT 
                    id,
                    facility_name,
                    reservation_date,
                    time_start,
                    time_end,
                    status,
                    event_purpose,
                    contact_name
                FROM reservations 
                WHERE status NOT IN ('cancelled', 'archived', 'rejected')
                AND reservation_date >= CURDATE() - INTERVAL 1 MONTH
                ORDER BY reservation_date ASC, time_start ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAllDeletedReservations()
    {
        $sql = "SELECT * FROM deleted_reservations ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    /**
     * Get confirmed reservations for today and upcoming
     * Returns reservations with confirmed status ordered by date and time
     */
    public function getConfirmedReservations($limit = 10)
    {
        $sql = "SELECT 
                    id,
                    facility_name,
                    reservation_date,
                    time_start,
                    time_end,
                    status,
                    event_purpose,
                    contact_name,
                    reservation_time
                FROM reservations 
                WHERE status = 'confirmed'
                AND reservation_date >= CURDATE()
                ORDER BY reservation_date ASC, time_start ASC
                LIMIT ?";
        
        $query = $this->db->query($sql, array($limit));
        return $query->result_array();
    }

    
}

