<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('AdminModel');

    }


    public function index()
    {
        $this->load->view('adminLogin');
    }


    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->AdminModel->login($email, $password);


        if($admin){

           $this->session->set_userdata('admin_id', $admin->id);
            $this->session->set_userdata('admin_email', $admin->email);
            $this->session->set_userdata('is_admin_logged_in', TRUE);

            redirect('AdminController/adminPage');

        }else{

            $data['error'] = "Invalid email or password";
            $this->load->view('adminLogin', $data);

        }

    }


      public function adminPage()
    {
        if(!$this->session->userdata('is_admin_logged_in')){
            redirect('AdminController/index');
        }

        $admin_id = $this->session->userdata('admin_id');

        $this->db->where('id', $admin_id);
        $data['admin'] = $this->db->get('admin_acc')->row();

        $this->load->view('adminPage', $data);
    }

    public function reservations()
{
    if(!$this->session->userdata('is_admin_logged_in')){
        redirect('AdminController/index');
    }

    $this->load->model('ReservationModel');

    $data['reservations'] = $this->ReservationModel->getAllReservations();

    $this->load->view('adminReservations', $data);
}

public function updateStatus($id, $status)
{
    if(!$this->session->userdata('is_admin_logged_in')){
        redirect('AdminController/index');
    }

    $this->load->model('ReservationModel');
    $this->load->model('FoodModel');



    $reservation = $this->ReservationModel->getReservationById($id);


  
    if($status == "Approved"){

        $food = $this->FoodModel->getFoodById($reservation->food_id);

        $new_quantity = $food->quantity - $reservation->quantity;


        $this->FoodModel->updateQuantity(
            $reservation->food_id,
            $new_quantity
        );

    }


 
    $this->ReservationModel->updateStatus($id, $status);


    redirect('AdminController/reservations');
}


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('AdminController/index');
    }

    public function updateStore(){
    $name = $this->input->post('store_name');

    $this->FoodModel->updateStoreName($name);

    redirect('AdminController/adminPage');
}

     public function storeSettings()
    {
        if(!$this->session->userdata('is_admin_logged_in')){
            redirect('AdminController/index');
        }

        $admin_id = $this->session->userdata('admin_id');

        $this->db->where('id', $admin_id);

        $data['admin'] = $this->db->get('admin_acc')->row();

        $this->load->view('storeSettings', $data);
    }

        public function updateStoreName()
    {
        if(!$this->session->userdata('is_admin_logged_in')){
            redirect('AdminController/index');
        }

        $admin_id = $this->session->userdata('admin_id');
        $store_name = $this->input->post('store_name');

        $this->AdminModel->updateStoreName($admin_id, $store_name);

        redirect('AdminController/adminPage');
    }

}

?>