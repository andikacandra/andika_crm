<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LeadsController extends CI_Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Leads',
            'content'   => 'crm/leads/index',
        ];

        $this->load->view('templates/main', $data);
    }
}
