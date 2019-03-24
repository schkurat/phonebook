<?php
class User extends CI_Model {
    
	public function check_user_email($email) {

	  $this->db->where('email', $email);
	  $request = $this->db->get('users');

	  $result = $request->result();
	  if ( $result ) return $result[0];
	  else return 0;
	}
        
        public function add_user($email, $pass) {
	
            $user['first_name'] = $this->input->post('first_name', TRUE);
            $user['last_name'] = $this->input->post('last_name', TRUE);
            $user['email'] = $email;
            $user['pasword'] = $pass;

            $this->db->insert('users', $user);
            return true;
	  
	}	
}

