<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->not_logged_in();
        
        // Set Philippine timezone for all date/time operations
        date_default_timezone_set('Asia/Manila');
        
        $this->data['page_title'] = 'Activity Logs';
        $this->load->model('model_logs');
        $this->load->model('model_users');
    }
    
    /**
     * Show log view
     */
    public function index()
    {
        
        $user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);
        $this->render_template('logs/index', $this->data);
    }
    
    /**
     * Fetch logs via AJAX
     */
    /**
     * Get users for filter dropdown
     */
    public function getUsers()
    {
        // Get all users including admin
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $query = $this->db->query($sql);
        $users = $query->result_array();
        
        $user_list = [];
        foreach($users as $user) {
            $name = trim($user['firstname'] . ' ' . $user['lastname']);
            if(empty($name)) {
                $name = $user['username'];
            }
            $user_list[] = [
                'id' => $user['id'],
                'name' => $name
            ];
        }
        
        echo json_encode([
            'success' => true,
            'users' => $user_list
        ]);
    }

    /**
     * Fetch logs via AJAX
     */
    public function fetchLogs()
    {
        $page = $this->input->get('page');
        $page = !$page ? 1 : $page;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        $filters = [
            'search' => $this->input->get('search'),
            'start_date' => $this->input->get('start_date'),
            'end_date' => $this->input->get('end_date'),
            'start_time' => $this->input->get('start_time'),
            'end_time' => $this->input->get('end_time'),
            'user_id' => $this->input->get('user_id'),
            'action_type' => $this->input->get('action_type')
        ];
        
        $result = $this->model_logs->get_active_logs($limit, $offset, $filters);
        
        $logs = $result['activities'];
        $total_logs = $result['count'];
        $total_pages = ceil($total_logs / $limit);
        
        $response = [
            'success' => true,
            'logs' => $logs,
            'totalPages' => $total_pages,
            'currentPage' => (int)$page,
            'totalRecords' => $total_logs,
            'range' => ($total_logs > 0) ? ($offset + 1) . '-' . min($offset + $limit, $total_logs) . ' of ' . $total_logs : '0-0 of 0'
        ];
        
        echo json_encode($response);
    }
    
    /**
     * Fetch archived logs via AJAX
     */
    public function fetchArchivedLogs()
    {
        $page = $this->input->get('page');
        $page = !$page ? 1 : $page;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        $filters = [
            'search' => $this->input->get('search'),
            'start_date' => $this->input->get('start_date'),
            'end_date' => $this->input->get('end_date'),
            'start_time' => $this->input->get('start_time'),
            'end_time' => $this->input->get('end_time'),
            'user_id' => $this->input->get('user_id'),
            'action_type' => $this->input->get('action_type')
        ];
        
        $result = $this->model_logs->get_archived_logs($limit, $offset, $filters);
        
        $logs = $result['activities'];
        $total_logs = $result['count'];
        $total_pages = ceil($total_logs / $limit);
        
        $response = [
            'success' => true,
            'logs' => $logs,
            'totalPages' => $total_pages,
            'currentPage' => (int)$page,
            'totalRecords' => $total_logs,
            'range' => ($total_logs > 0) ? ($offset + 1) . '-' . min($offset + $limit, $total_logs) . ' of ' . $total_logs : '0-0 of 0'
        ];
        
        echo json_encode($response);
    }
    
    /**
     * Archive logs
     */
    public function archiveLogs()
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
            echo json_encode(array('success' => false, 'message' => 'No logs selected'));
            return;
        }
        
        $archived_count = 0;
        foreach($ids as $id) {
            $result = $this->model_logs->archive($id);
            if($result) {
                $archived_count++;
            }
        }
        
        if($archived_count > 0) {
            echo json_encode(array(
                'success' => true, 
                'message' => $archived_count . ' log(s) archived successfully'
            ));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to archive logs'));
        }
    }
    
    /**
     * View archived logs
     */
    public function archived()
    {
        $user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);
        $this->data['page_title'] = 'Archived Activity Logs';
        $this->render_template('logs/archived', $this->data);
    }
    
    /**
     * Restore archived logs
     */
    public function restoreLogs()
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
            echo json_encode(array('success' => false, 'message' => 'No logs selected'));
            return;
        }
        
        $restored_count = 0;
        foreach($ids as $id) {
            $result = $this->model_logs->restore($id);
            if($result) {
                $restored_count++;
            }
        }
        
        if($restored_count > 0) {
            echo json_encode(array(
                'success' => true, 
                'message' => $restored_count . ' log(s) restored successfully'
            ));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to restore logs'));
        }
    }
    
    /**
     * Clear all logs
     */
    public function clear()
    {
        
        if($this->input->post('type') == 'clear') {
            $result = $this->model_logs->clear_all();
            
            if($result) {
                // Ensure Philippine timezone is set
                date_default_timezone_set('Asia/Manila');
                
                // Current time in Philippines
                $current_time = time();
                
                // Log that logs were cleared by admin
                $log_data = [
                    'user_id' => $this->session->userdata('id'),
                    'username' => $this->session->userdata('username'),
                    'action' => 'Clear',
                    'description' => 'Cleared all activity logs',
                    'created_at' => $current_time,
                    'timestamp' => date('Y-m-d H:i:s', $current_time)
                ];
                $this->model_logs->create($log_data);
                
                $response['status'] = true;
                $response['message'] = 'All logs cleared successfully';
            } else {
                $response['status'] = false;
                $response['message'] = 'Failed to clear logs';
            }
            
            echo json_encode($response);
        }
    }
    
    /**
     * Log activity from other controllers
     * Only logs important actions (create, update, delete, archive) when they are successful
     * 
     * @param string $action The action performed (Create, Update, Delete, Archive)
     * @param string $module The module where the action occurred (Products, Orders, etc.)
     * @param string $description Description of the activity
     * @param bool $success Whether the action was successful
     * @return bool True on success, false on failure
     */
    public function logActivity($action, $module, $description, $success = true)
    {
        // Write to PHP error log for debugging - to see if this method is being called
        error_log("LOGS CONTROLLER - logActivity called: Action: $action, Module: $module, Description: $description");
        
        // Only log if the action was successful or explicitly configured to log failures
        if (!$success) {
            // For order operations, we want to capture failures as well
            if ($module === 'Orders' && (stripos($description, 'order #') !== false)) {
                // Continue logging for failed order operations that include an order number
            } else {
                return false;
            }
        }
        
        // List of actions that should be logged
        $loggable_actions = ['create', 'update', 'delete', 'archive', 'restore', 'endorsed', 'login', 'logout'];
        
        // Convert action to lowercase for comparison
        $action_lower = strtolower($action);
        
        // Only proceed if this is an action we want to log
        if (!in_array($action_lower, $loggable_actions)) {
            return false;
        }
        
        // Ensure order operations for Orders module include the order number
        if ($module === 'Orders' && 
            (strpos($description, 'order #') === false) && 
            (strpos($description, 'orders') === false)) {
            
            // Try to extract order info from the description if possible
            if (preg_match('/order (\d+)/', $description, $matches)) {
                error_log("FIXING ORDER NUMBER FORMAT: " . $description);
                $description = str_replace('order ' . $matches[1], 'order #' . $matches[1], $description);
                error_log("UPDATED TO: " . $description);
            } else {
                // If description doesn't already include order number, log warning
                error_log('Logging warning: Order operation should include order number - ' . $description);
            }
        }
        
        // Ensure Philippine timezone is set
        date_default_timezone_set('Asia/Manila');
        
        // Get current time in Philippines
        $current_time = time();
        $current_datetime = date('Y-m-d H:i:s', $current_time);
        
        // Prepare log data
        $log_data = [
            'user_id' => $this->session->userdata('id'),
            'username' => $this->session->userdata('username'),
            'action' => ucfirst($action), // Capitalize first letter
            'description' => $module . ': ' . $description,
            'created_at' => $current_time,
            'timestamp' => $current_datetime
        ];
        
        // Log the full data being saved
        error_log("CONTROLLER LOGGING ACTIVITY: " . json_encode($log_data));
        
        // Add the log
        return $this->model_logs->create($log_data);
    }
    
    /**
     * Format a timestamp to Philippine Standard Time
     * 
     * @param int $timestamp Unix timestamp
     * @param string $format Date format
     * @return string Formatted date/time
     */
    private function formatPhilippineDateTime($timestamp, $format = 'Y-m-d H:i:s')
    {
        // Set timezone to Philippine Standard Time
        date_default_timezone_set('Asia/Manila');
        
        // Return formatted date
        return date($format, $timestamp);
    }
} 