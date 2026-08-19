<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FoodController extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('FoodModel');
	}

	public function index()
	{
		$data['foods'] = $this->FoodModel->getData();
		$data['food'] = null;

		$this->load->view('foodPage', $data);
	}

	public function saveData(){

		$data = [
			'food_name' => $this->input->post('food_name'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'status' => $this->input->post('status')
		];

		$response = $this->FoodModel->insertData($data);

		if($response){
			redirect('FoodController/index', 'refresh');
		}else{
			show_error('Error saving food');
		}
	}

	public function edit($id)
	{
		$data['foods'] = $this->FoodModel->getData();
		$data['food'] = $this->FoodModel->getFood($id);

		$this->load->view('foodPage', $data);
	}

	public function updateData($id)
	{
		$data = [
			'food_name' => $this->input->post('food_name'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'status' => $this->input->post('status')
		];

		$response = $this->FoodModel->updateData($id, $data);

		if($response){
			redirect('FoodController/index', 'refresh');
		}else{
			show_error('Error updating food');
		}
	}

	public function delete($id)
	{
		$response = $this->FoodModel->deleteData($id);

		if($response){
			redirect('FoodController/index', 'refresh');
		}else{
			show_error('Error deleting food');
		}
	}
}

?>