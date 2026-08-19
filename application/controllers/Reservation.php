<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

    public function reserve()
    {
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'food_id' => $this->input->post('food_id'),
            'quantity' => $this->input->post('quantity'),
            'status' => 'Pending'
        );

        $this->db->insert('reservation', $data);

        redirect('food');
    }
}