<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email) 
	{
		if($email) {
			$sql = 'SELECT * FROM users WHERE email = ?';
			$query = $this->db->query($sql, array($email));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
		Also checks if user has Admin affiliation
	*/
	public function login($email, $password) {
		if($email && $password) {
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql, array($email));

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				// Check if user has Admin affiliation
				if($result['affiliation'] !== 'Admin') {
					return false;
				}

				$hash_password = password_verify($password, $result['password']);
				if($hash_password === true) {
					return $result;	
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	}
	
	/* 
		Save remember me token to database
	*/
	public function save_remember_token($user_id, $token) {
		if($user_id && $token) {
			$data = array(
				'remember_token' => $token,
				'remember_token_expiry' => date('Y-m-d H:i:s', strtotime('+30 days'))
			);
			
			$this->db->where('id', $user_id);
			return $this->db->update('users', $data);
		}
		return false;
	}
	
	/* 
		Verify remember me token
	*/
	public function verify_remember_token($token) {
		if($token) {
			$sql = "SELECT * FROM users WHERE remember_token = ? AND remember_token_expiry > NOW()";
			$query = $this->db->query($sql, array($token));
			
			if($query->num_rows() == 1) {
				$result = $query->row_array();
				
				// Check if user has Admin affiliation
				if($result['affiliation'] === 'Admin') {
					return $result;
				}
			}
		}
		return false;
	}
	
	/* 
		Clear remember me token
	*/
	public function clear_remember_token($user_id) {
		if($user_id) {
			$data = array(
				'remember_token' => NULL,
				'remember_token_expiry' => NULL
			);
			
			$this->db->where('id', $user_id);
			return $this->db->update('users', $data);
		}
		return false;
	}

	/* 
		This function creates a new user account
	*/
	public function signup($data) {
		if($data) {
			// Hash the password
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			
			// Insert the user
			$insert = $this->db->insert('users', $data);
			return $insert ? $this->db->insert_id() : false;
		}
		return false;
	}
}