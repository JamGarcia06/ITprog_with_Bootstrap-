<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        return $this->db->get('admin_acc')->row();
    }

    public function updateStoreName($admin_id, $store_name)
    {
        $this->db->where('id', $admin_id);

        return $this->db->update('admin_acc', [
            'store_name' => $store_name
        ]);
    }

}
?>