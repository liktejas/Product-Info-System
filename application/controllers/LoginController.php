<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('EModel');
        date_default_timezone_set('Asia/Kolkata');
        // header('Cache-Control: no-cache, must-revalidate, max-age=0');
    }

    public function new()
    {
        echo '<h1>Hello World!!!</h1>';
    }
    public function superadmin()
    {
        $this->load->view('superadmin');
    }
    public function superadmin_login()
    {
        if(isset($_POST['login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = array(
                'username' => $username,
                'password' => $password
            );
            $login = $this->EModel->login_superadmin($data);
            if($login)
            {
                $session_data = array(
                    'username' => $login->username,
                    'name' => $login->name,
                    'id' => $login->id
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'control');
            }
            else
            {
                $this->session->set_flashdata('err_message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Login Failed</strong></div>');
                $this->load->view('superadmin');
            }
        }
        else
        {
            $this->load->view('superadmin'); 
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'superadmin');
    }

    public function control_panel()
    {
        if(empty($_SESSION['name']))
        {
            redirect(base_url().'superadmin');
        }
        $db_products = $this->EModel->get_items_for_control();
        $data = array('db_products'=> $db_products);
        $this->load->view('products_control',$data);
    }

}
?>