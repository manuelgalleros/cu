<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
		$this->load->model('model_logs');
		
		// Set Philippine timezone for all date/time operations
		date_default_timezone_set('Asia/Manila');
		
		// Load cookie helper
		$this->load->helper('cookie');
		
		// Check for remember me token if not logged in
		if(!$this->session->userdata('logged_in')) {
			$this->check_remember_me();
		}
	}
	
	/**
	 * Check if user has valid remember me cookie
	 */
	private function check_remember_me() {
		$remember_token = get_cookie('remember_me_token');
		
		if($remember_token) {
			// Verify the token
			$user = $this->model_auth->verify_remember_token($remember_token);
			
			if($user) {
				// Create session
				$logged_in_sess = array(
					'id' => $user['id'],
					'email' => $user['email'],
					'firstname' => $user['firstname'] ?? '',
					'lastname' => $user['lastname'] ?? '',
					'affiliation' => $user['affiliation'] ?? '',
					'logged_in' => TRUE,
					'remembered' => TRUE
				);
				
				$this->session->set_userdata($logged_in_sess);
				
				// Log auto-login
				$username_display = trim(($user['firstname'] ?? '') . ' ' . ($user['lastname'] ?? ''));
				if (empty($username_display)) {
					$username_display = $user['email'];
				}
				
				$this->model_logs->create([
					'user_id' => $user['id'],
					'username' => $username_display,
					'action' => 'Login',
					'description' => 'Auth: User auto-logged in via remember me: ' . $username_display,
					'created_at' => time(),
					'timestamp' => date('Y-m-d H:i:s')
				]);
			} else {
				// Invalid token, delete cookie
				delete_cookie('remember_me_token');
			}
		}
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
public function signin()
{
    // Check if this is an AJAX request
    $is_ajax = $this->input->is_ajax_request() || $this->input->post('ajax') == '1';
    
    if ($is_ajax) {
        // Suppress deprecation warnings for clean JSON output
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
        
        // Set JSON response header
        header('Content-Type: application/json');
        
        // Check if already logged in
        if($this->session->userdata('logged_in')) {
            echo json_encode([
                'success' => true, 
                'message' => 'Already logged in',
                'redirect' => base_url('dashboard')
            ]);
            return;
        }
        
        // Initialize response
        $response = [
            'success' => false,
            'message' => 'An error occurred',
        ];
        
        // Verify reCAPTCHA
        $recaptcha_response = $this->input->post('g-recaptcha-response');
        if (empty($recaptcha_response)) {
            $response['message'] = 'Please complete the reCAPTCHA verification';
            echo json_encode($response);
            return;
        }
        
        // Verify reCAPTCHA with Google
        $recaptcha_secret = '6Lcxpc8rAAAAALjcwWRpj-G6HWsTNf0BqNjl-4kh'; 
        $recaptcha_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
        
        // Get IP address with fallback
        $user_ip = $this->input->ip_address();
        if (empty($user_ip)) {
            $user_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        
        $recaptcha_data = array(
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response,
            'remoteip' => $user_ip
        );
        
        $recaptcha_options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($recaptcha_data)
            )
        );
        
        $recaptcha_context = stream_context_create($recaptcha_options);
        $recaptcha_result = file_get_contents($recaptcha_verify_url, false, $recaptcha_context);
        $recaptcha_json = json_decode($recaptcha_result);
        
        if (!$recaptcha_json->success) {
            $response['message'] = 'reCAPTCHA verification failed. Please try again.';
            echo json_encode($response);
            return;
        }
        
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            // Check if email exists
            $email_exists = $this->model_auth->check_email($this->input->post('email'));
            
            if ($email_exists == TRUE) {
                // Attempt to log in
                $login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));
                
                if ($login) {
                    // Create session data
                    $logged_in_sess = array(
                        'id' => $login['id'],
                        'email' => $login['email'],
                        'firstname' => $login['firstname'] ?? '',
                        'lastname' => $login['lastname'] ?? '',
                        'affiliation' => $login['affiliation'] ?? '',
                        'logged_in' => TRUE
                    );
                    
                    $this->session->set_userdata($logged_in_sess);
                    
                    // Handle remember me
                    if($this->input->post('remember_me')) {
                        // Generate unique token
                        $token = bin2hex(random_bytes(32));
                        
                        // Save token to database
                        $this->model_auth->save_remember_token($login['id'], $token);
                        
                        // Set cookie (30 days)
                        $cookie = array(
                            'name'   => 'remember_me_token',
                            'value'  => $token,
                            'expire' => 2592000, // 30 days in seconds
                            'path'   => '/',
                            'secure' => FALSE,
                            'httponly' => TRUE
                        );
                        set_cookie($cookie);
                    }
                    
                    // Log successful login
                    $username_display = trim(($login['firstname'] ?? '') . ' ' . ($login['lastname'] ?? ''));
                    if (empty($username_display)) {
                        $username_display = $login['email'];
                    }
                    
                    $this->model_logs->create([
                        'user_id' => $login['id'],
                        'username' => $username_display,
                        'action' => 'Login',
                        'description' => 'Auth: User logged in: ' . $username_display,
                        'created_at' => time(),
                        'timestamp' => date('Y-m-d H:i:s')
                    ]);
                    
                    // Return success response
                    $response = [
                        'success' => true,
                        'message' => 'Login successful. Redirecting...',
                        'redirect' => base_url('dashboard')
                    ];
                } else {
                    // Log failed login attempt
                    $this->model_logs->create([
                        'user_id' => 0,
                        'username' => 'Unknown',
                        'action' => 'Login',
                        'description' => 'Auth: Failed login attempt for email: ' . $this->input->post('email'),
                        'created_at' => time(),
                        'timestamp' => date('Y-m-d H:i:s')
                    ]);
                    
                    $response['message'] = 'Login failed. Please check your credentials and ensure you have Admin affiliation.';
                }
            } else {
                $response['message'] = 'Email does not exist';
            }
        } else {
            // Validation errors
            $response['message'] = validation_errors('', '');
        }
        
        // Return JSON response
        echo json_encode($response);
        return;
    }
    
    // Regular form submission (non-AJAX)
    $this->logged_in();

    // Initialize errors
    $this->data['errors'] = [];

    // Set validation rules
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == TRUE) {
        // true case
        $email_exists = $this->model_auth->check_email($this->input->post('email'));

        if ($email_exists == TRUE) {
            $login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

            if ($login) {
                $logged_in_sess = array(
                    'id' => $login['id'],
                    'email' => $login['email'],
                    'firstname' => $login['firstname'] ?? '',
                    'lastname' => $login['lastname'] ?? '',
                    'affiliation' => $login['affiliation'] ?? '',
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($logged_in_sess);
                
                // Handle remember me
                if($this->input->post('remember_me')) {
                    // Generate unique token
                    $token = bin2hex(random_bytes(32));
                    
                    // Save token to database
                    $this->model_auth->save_remember_token($login['id'], $token);
                    
                    // Set cookie (30 days)
                    $cookie = array(
                        'name'   => 'remember_me_token',
                        'value'  => $token,
                        'expire' => 2592000, // 30 days in seconds
                        'path'   => '/',
                        'secure' => FALSE,
                        'httponly' => TRUE
                    );
                    set_cookie($cookie);
                }
                
                // Log successful login
                $username_display = trim(($login['firstname'] ?? '') . ' ' . ($login['lastname'] ?? ''));
                if (empty($username_display)) {
                    $username_display = $login['email'];
                }
                
                $this->model_logs->create([
                    'user_id' => $login['id'],
                    'username' => $username_display,
                    'action' => 'Login',
                    'description' => 'Auth: User logged in: ' . $username_display,
                    'created_at' => time(),
                    'timestamp' => date('Y-m-d H:i:s')
                ]);
                
                redirect('dashboard', 'refresh');
            } else {
                $this->data['errors'][] = 'Login failed. Please check your credentials and ensure you have Admin affiliation.';
                
                // Log failed login attempt
                $this->model_logs->create([
                    'user_id' => 0,
                    'username' => 'Unknown',
                    'action' => 'Login',
                    'description' => 'Auth: Failed login attempt for email: ' . $this->input->post('email'),
                    'created_at' => time(),
                    'timestamp' => date('Y-m-d H:i:s')
                ]);
            }
        } else {
            $this->data['errors'][] = 'Email does not exist';
        }
    } else {
        // Collect validation errors
        $this->data['errors'] = array_merge($this->data['errors'], $this->form_validation->error_array());
    }

    // Load the view with errors
    $this->load->view('authentication/signin', $this->data);
}

    
public function signup()
{
    $this->logged_in();

    // Check if this is an AJAX request
    $is_ajax = $this->input->is_ajax_request() || $this->input->post('ajax') == '1';
    
    if ($is_ajax) {
        // Suppress deprecation warnings for clean JSON output
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
        
        // Set JSON response header
        header('Content-Type: application/json');
        
        // Initialize response
        $response = [
            'success' => false,
            'message' => 'An error occurred',
        ];
        
        // Verify reCAPTCHA
        $recaptcha_response = $this->input->post('g-recaptcha-response');
        if (empty($recaptcha_response)) {
            $response['message'] = 'Please complete the reCAPTCHA verification';
            echo json_encode($response);
            return;
        }
        
        // Verify reCAPTCHA with Google
        $recaptcha_secret = '6Lcxpc8rAAAAALjcwWRpj-G6HWsTNf0BqNjl-4kh'; 
        $recaptcha_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
        
        // Get IP address with fallback
        $user_ip = $this->input->ip_address();
        if (empty($user_ip)) {
            $user_ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        }
        
        $recaptcha_data = array(
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response,
            'remoteip' => $user_ip
        );
        
        $recaptcha_options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($recaptcha_data)
            )
        );
        
        $recaptcha_context = stream_context_create($recaptcha_options);
        $recaptcha_result = file_get_contents($recaptcha_verify_url, false, $recaptcha_context);
        $recaptcha_json = json_decode($recaptcha_result);
        
        if (!$recaptcha_json->success) {
            $response['message'] = 'reCAPTCHA verification failed. Please try again.';
            echo json_encode($response);
            return;
        }
        
        // Set validation rules
        $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|trim|numeric');
        $this->form_validation->set_rules('affiliation', 'Affiliation', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            // Check if email already exists
            $email_exists = $this->model_auth->check_email($this->input->post('email'));
            
            if ($email_exists == FALSE) {
                // Prepare user data
                $user_data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'mobile_number' => $this->input->post('mobile_number'),
                    'affiliation' => $this->input->post('affiliation'),
                    'profile_image' => 'default.jpg'
                );
                
                // Create the user
                $user_id = $this->model_auth->signup($user_data);
                
                if ($user_id) {
                    // Log successful registration
                    $username_display = trim($user_data['firstname'] . ' ' . $user_data['lastname']);
                    
                    $this->model_logs->create([
                        'user_id' => $user_id,
                        'username' => $username_display,
                        'action' => 'Register',
                        'description' => 'Auth: New user registered: ' . $username_display,
                        'created_at' => time(),
                        'timestamp' => date('Y-m-d H:i:s')
                    ]);
                    
                    // Return success response
                    $response = [
                        'success' => true,
                        'message' => 'Registration successful! Redirecting to login...',
                        'redirect' => base_url('auth/signin')
                    ];
                } else {
                    $response['message'] = 'Failed to create account. Please try again.';
                }
            } else {
                $response['message'] = 'Email already exists. Please use a different email.';
            }
        } else {
            // Validation errors
            $response['message'] = validation_errors('', '');
        }
        
        // Return JSON response
        echo json_encode($response);
        return;
    }

    // Initialize errors for non-AJAX
    $this->data['errors'] = [];

    // Load the view with errors
    $this->load->view('authentication/signup', $this->data);
}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		// Log logout before destroying session
		if($this->session->userdata('logged_in')) {
			// Store session data before destroying
			$user_id = $this->session->userdata('id') ?? 0;
			$firstname = $this->session->userdata('firstname') ?? '';
			$lastname = $this->session->userdata('lastname') ?? '';
			$email = $this->session->userdata('email') ?? '';
			
			// Create display name from firstname + lastname, or use email as fallback
			$username_display = trim($firstname . ' ' . $lastname);
			if (empty($username_display)) {
				$username_display = $email;
			}
			
			// Clear remember me token from database
			if($user_id) {
				$this->model_auth->clear_remember_token($user_id);
			}
			
			// Clear remember me cookie
			delete_cookie('remember_me_token');
			
			// Only log if we have valid user data
			if ($user_id && $username_display) {
				$this->model_logs->create([
					'user_id' => $user_id,
					'username' => $username_display,
					'action' => 'Logout',
					'description' => 'Auth: User logged out: ' . $username_display,
					'created_at' => time(),
					'timestamp' => date('Y-m-d H:i:s')
				]);
			}
		}
		
		// Destroy session
		$this->session->sess_destroy();
		
		// Redirect to signin page
		redirect('auth/signin', 'refresh');
	}

}
