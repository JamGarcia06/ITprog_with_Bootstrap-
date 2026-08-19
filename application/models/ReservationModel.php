<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservationModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function insertData($data){
		return $this->db->insert('reservation', $data);
	}

	public function getData(){
		return $this->db->get('reservation')->result();
	}

	public function getUserReservations($user_id)
	{
	$this->db->select('reservation.*, foods.food_name');
	$this->db->from('reservation');
	$this->db->join('foods', 'foods.id = reservation.food_id');
	$this->db->where('user_id', $user_id);

	return $this->db->get()->result();
	}

      public function getAllReservations()
    {
    $this->db->select('reservation.*, foods.food_name, users.email');
    $this->db->from('reservation');

    $this->db->join('foods', 'foods.id = reservation.food_id');
    $this->db->join('users', 'users.id = reservation.user_id');

    $this->db->order_by('reservation.reservation_time', 'DESC');

    return $this->db->get()->result();
    }

    public function updateStatus($id, $status){
    $this->db->where('id', $id);

    return $this->db->update('reservation', [
        'status' => $status
    ]);
}
    public function getReservationById($id){
    $this->db->where('id', $id);

    return $this->db->get('reservation')->row();
    }

}

?>