<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function login($email, $password){
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		return $this->db->get('users')->row();
	}
}

?>