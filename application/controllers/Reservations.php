<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Manage Reservations';

        $this->load->model('model_users');
        $this->load->model('model_reservations');
        $this->load->library('upload');
        $this->load->library('logs');

        
	}

  
    public function index()
    {

        $user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);
        $this->data['reservations'] = $this->model_reservations->getAllActiveReservations();

        $this->render_template('reservations/index', $this->data);  
    }
    
    /**
     * Get all reservations (AJAX)
     */
    public function fetchAllReservations()
    {
        $reservations = $this->model_reservations->getAllActiveReservations();
        echo json_encode(array('success' => true, 'data' => $reservations));
    }
    
    /**
     * Get all archived reservations (AJAX)
     */
    public function fetchAllArchivedReservations()
    {
        $reservations = $this->model_reservations->getAllArchivedReservations();
        echo json_encode(array('success' => true, 'data' => $reservations));
    }
    
    /**
     * Get reservation details by ID (AJAX)
     */
    public function getReservationDetails($id)
    {
        $reservation = $this->model_reservations->getReservationData($id);
        
        if($reservation) {
            echo json_encode(array('success' => true, 'data' => $reservation));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Reservation not found'));
        }
    }
    
    /**
     * Update reservation
     */
    public function updateReservation()
    {
        if($this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
            return;
        }
        
        $id = $this->input->post('reservation_id');
        $status = $this->input->post('status');
        
        if(!$id) {
            echo json_encode(array('success' => false, 'message' => 'Reservation ID is required'));
            return;
        }
        
        // Validate rejection reason if status is rejected
        if($status === 'rejected') {
            $rejection_reason = $this->input->post('rejection_reason');
            if(empty($rejection_reason)) {
                echo json_encode(array('success' => false, 'message' => 'Rejection reason is required when rejecting a reservation'));
                return;
            }
        }
        
        $data = array(
            'status' => $status ? $status : $this->input->post('current_status')
        );
        
        // Optionally update other fields if provided
        if($this->input->post('special_requirements')) {
            $data['special_requirements'] = $this->input->post('special_requirements');
        }
        
        // Handle rejection reason
        if($status === 'rejected' && $this->input->post('rejection_reason')) {
            $data['rejection_reason'] = $this->input->post('rejection_reason');
        } else if($status !== 'rejected') {
            // Clear rejection reason if status is changed from rejected to something else
            $data['rejection_reason'] = null;
        }
        
        $update = $this->model_reservations->update($id, $data);
        
        if($update) {
            // Log the activity
            $log_message = 'Updated reservation ' . $id . ' status to ' . $data['status'];
            if($status === 'rejected') {
                $log_message .= ' with reason: ' . $this->input->post('rejection_reason');
            }
            
            $this->logs->logActivity(
                'update', 
                'Reservations', 
                $log_message,
                true
            );
            
            echo json_encode(array('success' => true, 'message' => 'Reservation updated successfully'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to update reservation'));
        }
    }
    
    /**
     * Archive reservations
     */
    public function archiveReservations()
    {
        if($this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
            return;
        }
        
        $ids = $this->input->post('ids');
        
        // If ids is a JSON string, decode it
        if(is_string($ids)) {
            $ids = json_decode($ids, true);
        }
        
        if(!$ids || !is_array($ids)) {
            echo json_encode(array('success' => false, 'message' => 'No reservations selected'));
            return;
        }
        
        $archived_count = 0;
        foreach($ids as $id) {
            $result = $this->model_reservations->archive($id);
            if($result) {
                $archived_count++;
                
                // Log the activity
                $this->logs->logActivity(
                    'archive', 
                    'Reservations', 
                    'Archived reservation ' . $id,
                    true
                );
            }
        }
        
        if($archived_count > 0) {
            echo json_encode(array(
                'success' => true, 
                'message' => $archived_count . ' reservation(s) archived successfully'
            ));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to archive reservations'));
        }
    }
    
    /**
     * View archived reservations
     */
    public function archived()
    {
        $user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);
        $this->data['page_title'] = 'Archived Reservations';
        $this->data['reservations'] = $this->model_reservations->getAllArchivedReservations();

        $this->render_template('reservations/archived', $this->data);  
    }
    
    /**
     * Restore archived reservation
     */
    public function restoreReservation()
    {
        if($this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
            return;
        }
        
        $ids = $this->input->post('ids');
        
        // If ids is a JSON string, decode it
        if(is_string($ids)) {
            $ids = json_decode($ids, true);
        }
        
        if(!$ids || !is_array($ids)) {
            echo json_encode(array('success' => false, 'message' => 'No reservations selected'));
            return;
        }
        
        $restored_count = 0;
        foreach($ids as $id) {
            $result = $this->model_reservations->restore($id);
            if($result) {
                $restored_count++;
                
                // Log the activity
                $this->logs->logActivity(
                    'restore', 
                    'Reservations', 
                    'Restored reservation ' . $id,
                    true
                );
            }
        }
        
        if($restored_count > 0) {
            echo json_encode(array(
                'success' => true, 
                'message' => $restored_count . ' reservation(s) restored successfully'
            ));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to restore reservations'));
        }
    }
    
    public function create()
    {
        $this->data['page_title'] = 'Add New Reservation';
        $user_id = $this->session->userdata('id');
        $this->render_template('reservations/new-reservation', $this->data);  
    }
    
    /**
     * Get reservations for a specific facility
     */
    public function getReservationsByFacility()
    {
        $facility_name = $this->input->get('facility');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        
        if(!$facility_name) {
            $response = array('success' => false, 'message' => 'Facility name is required');
            echo json_encode($response);
            return;
        }
        
        $reservations = $this->model_reservations->getReservationsByFacility($facility_name, $from_date, $to_date);
        
        // Format reservations for FullCalendar
        $events = array();
        foreach($reservations as $reservation) {
            $events[] = array(
                'id' => $reservation['id'],
                'title' => $reservation['reservation_time'],
                'start' => $reservation['reservation_date'],
                'backgroundColor' => '#ff5630',
                'borderColor' => '#ff5630',
                'extendedProps' => array(
                    'time' => $reservation['reservation_time'],
                    'contact' => $reservation['contact_name'],
                    'purpose' => $reservation['event_purpose']
                )
            );
        }
        
        $response = array('success' => true, 'events' => $events);
        echo json_encode($response);
    }
    
    /**
     * Check if a date is fully reserved
     */
    public function checkDateAvailability()
    {
        $facility_name = $this->input->get('facility');
        $date = $this->input->get('date');
        
        if(!$facility_name || !$date) {
            $response = array('success' => false, 'message' => 'Facility name and date are required');
            echo json_encode($response);
            return;
        }
        
        $is_fully_reserved = $this->model_reservations->isDateFullyReserved($facility_name, $date);
        $available_slots = $this->model_reservations->getAvailableTimeSlots($facility_name, $date);
        
        $response = array(
            'success' => true,
            'is_fully_reserved' => $is_fully_reserved,
            'available_slots' => $available_slots
        );
        
        echo json_encode($response);
    }
    
    /**
     * Check for status updates (used for real-time polling)
     */
    public function checkStatusUpdates()
    {
        $last_check = $this->input->get('last_check');
        
        if(!$last_check) {
            echo json_encode(array('success' => false, 'message' => 'Last check timestamp required'));
            return;
        }
        
        // Get reservations that have been updated since last check
        $updated_reservations = $this->model_reservations->getReservationsUpdatedSince($last_check);
        
        // Get current server time for synchronization
        $current_time = date('Y-m-d H:i:s');
        
        if(count($updated_reservations) > 0) {
            // Return only the essential data to minimize response size
            // The updated_reservations are already sorted by updated_at DESC in the model
            echo json_encode(array(
                'success' => true, 
                'has_updates' => true,
                'updated_reservations' => $updated_reservations,
                'count' => count($updated_reservations),
                'current_time' => $current_time
            ));
        } else {
            echo json_encode(array(
                'success' => true, 
                'has_updates' => false,
                'current_time' => $current_time
            ));
        }
    }
    
    /**
     * External API endpoint for PPFMO to update reservation status
     * This endpoint can be called from the separate PPFMO folder/system
     */
    public function updateReservationStatusApi()
    {
        if($this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
            return;
        }
        
        // Get API key for security (optional but recommended)
        $api_key = $this->input->post('api_key') ?: $this->input->server('HTTP_X_API_KEY');
        
        // Validate API key (you should set this in your config)
        $valid_api_key = 'PPFMO_2025_SECURE_KEY'; // Change this to a secure key
        if($api_key !== $valid_api_key) {
            echo json_encode(array('success' => false, 'message' => 'Invalid API key'));
            return;
        }
        
        $reservation_id = $this->input->post('reservation_id');
        $status = $this->input->post('status');
        $rejection_reason = $this->input->post('rejection_reason');
        
        if(!$reservation_id || !$status) {
            echo json_encode(array('success' => false, 'message' => 'Reservation ID and status are required'));
            return;
        }
        
        // Validate status
        $valid_statuses = array('pending', 'endorsed', 'confirmed', 'rejected', 'cancelled', 'completed');
        if(!in_array($status, $valid_statuses)) {
            echo json_encode(array('success' => false, 'message' => 'Invalid status value'));
            return;
        }
        
        // Check if reservation exists
        $reservation = $this->model_reservations->getReservationData($reservation_id);
        if(!$reservation) {
            echo json_encode(array('success' => false, 'message' => 'Reservation not found'));
            return;
        }
        
        // Validate rejection reason for rejected status
        if($status === 'rejected' && empty($rejection_reason)) {
            echo json_encode(array('success' => false, 'message' => 'Rejection reason is required when rejecting a reservation'));
            return;
        }
        
        $data = array(
            'status' => $status
        );
        
        if($status === 'rejected' && $rejection_reason) {
            $data['rejection_reason'] = $rejection_reason;
        } else if($status !== 'rejected') {
            $data['rejection_reason'] = null;
        }
        
        $update = $this->model_reservations->update($reservation_id, $data);
        
        if($update) {
            // Log the activity
            $log_message = 'Reservation ' . $reservation_id . ' status updated to ' . $status . ' by PPFMO';
            if($status === 'rejected') {
                $log_message .= ' with reason: ' . $rejection_reason;
            }
            
            $this->logs->logActivity(
                'update', 
                'Reservations', 
                $log_message,
                true
            );
            
            echo json_encode(array(
                'success' => true, 
                'message' => 'Reservation status updated successfully',
                'reservation_id' => $reservation_id,
                'new_status' => $status
            ));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to update reservation status'));
        }
    }
    
    /**
     * Submit a new reservation (supports both single-day and multi-day reservations)
     */
    public function submitReservation()
    {
        if($this->input->server('REQUEST_METHOD') !== 'POST') {
            $response = array('success' => false, 'message' => 'Invalid request method');
            echo json_encode($response);
            return;
        }
        
        // Get POST data
        $facility_name = $this->input->post('facility_name');
        $facility_capacity = $this->input->post('facility_capacity');
        $facility_rate = $this->input->post('facility_rate');
        $contact_name = $this->input->post('contact_name');
        $contact_phone = $this->input->post('contact_phone');
        $contact_email = $this->input->post('contact_email');
        $organization = $this->input->post('organization');
        $event_purpose = $this->input->post('event_purpose');
        $expected_attendees = $this->input->post('expected_attendees');
        $special_requirements = $this->input->post('special_requirements');
        $is_multi_day = $this->input->post('is_multi_day');
        
        // Validate required fields
        if(!$facility_name || !$contact_name || !$contact_phone || !$contact_email || !$organization || !$event_purpose || !$expected_attendees) {
            $response = array('success' => false, 'message' => 'Please fill in all required fields');
            echo json_encode($response);
            return;
        }
        
        // Handle multi-day reservations
        if($is_multi_day == '1') {
            $date_range_start = $this->input->post('date_range_start');
            $date_range_end = $this->input->post('date_range_end');
            $time_slots_json = $this->input->post('time_slots');
            
            if(!$date_range_start || !$date_range_end || !$time_slots_json) {
                $response = array('success' => false, 'message' => 'Please select dates and time slots');
                echo json_encode($response);
                return;
            }
            
            $time_slots = json_decode($time_slots_json, true);
            
            if(empty($time_slots)) {
                $response = array('success' => false, 'message' => 'Please select time slots for all dates');
                echo json_encode($response);
                return;
            }
            
            // Create multiple reservations (one for each date/time combination)
            $created_ids = array();
            $total_reservations = 0;
            
            foreach($time_slots as $date => $slot_info) {
                $reservation_time = $slot_info['time'];
                
                // Parse time slot to get start and end times
                $time_parts = explode(' - ', $reservation_time);
                if(count($time_parts) != 2) {
                    continue; // Skip invalid time formats
                }
                
                // Convert to 24-hour format for database storage
                $time_start = date('H:i:s', strtotime($time_parts[0]));
                $time_end = date('H:i:s', strtotime($time_parts[1]));
                
                // Check if time slot is available
                $is_available = $this->model_reservations->isTimeSlotAvailable($facility_name, $date, $time_start, $time_end);
                
                if(!$is_available) {
                    $response = array('success' => false, 'message' => 'One or more time slots are no longer available. Please try again.');
                    echo json_encode($response);
                    return;
                }
                
                // Calculate cost for this slot
                $slot_cost = floatval($facility_rate);
                
                // Prepare data for insertion
                $data = array(
                    'facility_name' => $facility_name,
                    'facility_capacity' => intval($facility_capacity),
                    'facility_rate' => floatval($facility_rate),
                    'reservation_date' => $date,
                    'reservation_time' => $reservation_time,
                    'time_start' => $time_start,
                    'time_end' => $time_end,
                    'duration' => 1,
                    'contact_name' => $contact_name,
                    'contact_phone' => $contact_phone,
                    'contact_email' => $contact_email,
                    'organization' => $organization,
                    'event_purpose' => $event_purpose,
                    'expected_attendees' => $expected_attendees ? intval($expected_attendees) : null,
                    'special_requirements' => $special_requirements,
                    'total_cost' => $slot_cost,
                    'status' => 'pending',
                    'created_by' => $this->session->userdata('id')
                );
                
                // Insert into database
                $reservation_id = $this->model_reservations->create($data);
                
                if($reservation_id) {
                    $created_ids[] = $reservation_id;
                    $total_reservations++;
                    
                    // Log the activity
                    $this->logs->logActivity(
                        'create', 
                        'Reservations', 
                        'Created reservation ' . $reservation_id . ' for ' . $facility_name . ' on ' . $date . ' (' . $reservation_time . ')',
                        true
                    );
                }
            }
            
            if($total_reservations > 0) {
                $response = array(
                    'success' => true, 
                    'message' => 'Multi-day reservation created successfully! ' . $total_reservations . ' slot(s) reserved.',
                    'reservation_ids' => $created_ids
                );
            } else {
                $response = array('success' => false, 'message' => 'Failed to create reservation. Please try again.');
            }
            
        } else {
            // Handle single-day reservation
            $date_range_start = $this->input->post('date_range_start');
            $time_slots_json = $this->input->post('time_slots');
            
            if(!$date_range_start || !$time_slots_json) {
                $response = array('success' => false, 'message' => 'Please select a date and time');
                echo json_encode($response);
                return;
            }
            
            $time_slots = json_decode($time_slots_json, true);
            
            if(empty($time_slots)) {
                $response = array('success' => false, 'message' => 'Please select a time slot');
                echo json_encode($response);
                return;
            }
            
            // Get the first (and only) date and time slot
            $reservation_date = $date_range_start;
            $slot_info = reset($time_slots); // Get first element
            $reservation_time = $slot_info['time'];
            $duration = 1;
            
            // Parse time slot to get start and end times
            $time_parts = explode(' - ', $reservation_time);
            if(count($time_parts) != 2) {
                $response = array('success' => false, 'message' => 'Invalid time format');
                echo json_encode($response);
                return;
            }
            
            // Convert to 24-hour format for database storage
            $time_start = date('H:i:s', strtotime($time_parts[0]));
            $time_end = date('H:i:s', strtotime($time_parts[1]));
            
            // Check if time slot is available
            $is_available = $this->model_reservations->isTimeSlotAvailable($facility_name, $reservation_date, $time_start, $time_end);
            
            if(!$is_available) {
                $response = array('success' => false, 'message' => 'This time slot is no longer available. Please select another time.');
                echo json_encode($response);
                return;
            }
            
            // Calculate total cost
            $total_cost = floatval($facility_rate) * intval($duration);
            
            // Prepare data for insertion
            $data = array(
                'facility_name' => $facility_name,
                'facility_capacity' => intval($facility_capacity),
                'facility_rate' => floatval($facility_rate),
                'reservation_date' => $reservation_date,
                'reservation_time' => $reservation_time,
                'time_start' => $time_start,
                'time_end' => $time_end,
                'duration' => intval($duration),
                'contact_name' => $contact_name,
                'contact_phone' => $contact_phone,
                'contact_email' => $contact_email,
                'organization' => $organization,
                'event_purpose' => $event_purpose,
                'expected_attendees' => $expected_attendees ? intval($expected_attendees) : null,
                'special_requirements' => $special_requirements,
                'total_cost' => $total_cost,
                'status' => 'pending',
                'created_by' => $this->session->userdata('id')
            );
            
            // Insert into database
            $reservation_id = $this->model_reservations->create($data);
            
            if($reservation_id) {
                // Log the activity
                $this->logs->logActivity(
                    'create', 
                    'Reservations', 
                    'Created new reservation ' . $reservation_id . ' for ' . $facility_name . ' on ' . $reservation_date,
                    true
                );
                
                $response = array(
                    'success' => true, 
                    'message' => 'Reservation created successfully! Your reservation ID is: ' . $reservation_id,
                    'reservation_id' => $reservation_id
                );
            } else {
                $response = array('success' => false, 'message' => 'Failed to create reservation. Please try again.');
            }
        }
        
        echo json_encode($response);
    }
}