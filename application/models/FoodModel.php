<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function insertData($data){
		return $this->db->insert('foods', $data);
	}

	public function getData(){
		return $this->db->get('foods')->result();
	}

	public function getFood($id){
		return $this->db->where('id', $id)->get('foods')->row();
	}

	public function updateData($id, $data){
		return $this->db->where('id', $id)->update('foods', $data);
	}

	public function deleteData($id){
		return $this->db->where('id', $id)->delete('foods');
	}

	public function getFoodById($id){
    $this->db->where('id', $id);

    return $this->db->get('foods')->row();
	}	


	public function updateQuantity($id, $quantity){
	    $this->db->where('id', $id);

	    return $this->db->update('foods', [
	        'quantity' => $quantity
	    ]);
	}

	
}

?>