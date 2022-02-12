<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('');
        }

        $this->session->set_userdata('sidebar_id', 1);
    }

    public function index()
    {

        $data = [
            'title'     => 'Home',
            'content'   => 'home/index',
        ];

        $this->load->view('templates/main', $data);
    }
}
