<?php

class Home_model extends CI_model
{

	// function Type($type){
	// 	$UserType = $this->db->select('type')->from('master_users')->where('type', $type)->get()->row()->type;
	// 	$UserType = strtolower($UserType);
	// 	if ($UserType == 'admin') {
			
	// 	} else {
	// 		# code...
	// 	}
		
	// }

	function login($email){
		$check = array();
		$check = $this->db->where('email', $email)->get('master_users')->row_array();
		return $check;
	}

}
?>
