<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LeadsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('');
        }

        if (!in_array(2, explode(',', $this->session->userdata('role')[0]))) {
            redirect('');
        }

        $this->session->set_userdata('sidebar_id', 2);
    }

    function index()
    {
        $data['title']     = 'Leads';
        $data['content']   = 'crm/leads/index';
        $data['my_js']     = 'crm/leads/index';

        $data['leads'] = $this->DefaultModel->getQuery("
            SELECT 
                l.*, 
                u.name AS lead_owner 
            FROM tbl_lead AS l
            JOIN tbl_user AS u ON u.id = l.created_by
        ");

        $this->load->view('templates/main', $data);
    }

    function form($id = null, $read = false)
    {
        $data['title']      = 'Leads / ' . ($id ? ($read ? 'Detail' : 'Edit') : 'New');
        $data['content']    = 'crm/leads/form';
        $data['read']       = $read;

        if ($id) {
            $data['products'] = $this->DefaultModel->getWhere('tbl_lead', ['id' => $id])->row_array();
            $data['leads'] = $this->DefaultModel->getQuery("
                SELECT 
                    l.*, 
                    u.name AS lead_owner 
                FROM tbl_lead AS l
                JOIN tbl_user AS u ON u.id = l.created_by
                WHERE l.id = $id
            ")->row_array();
        }

        $data['lead_status'] = $this->DefaultModel->get('tbl_lead_status');
        $data['company_size'] = $this->DefaultModel->get('tbl_company_size');
        $data['company_type'] = $this->DefaultModel->get('tbl_company_type');

        $this->load->view('templates/main', $data);
    }

    function save($id = null)
    {
        $data = [
            'name'              => $this->input->post('name'),
            'email'             => $this->input->post('email'),
            'phone'             => $this->input->post('phone'),
            'mobile'            => $this->input->post('mobile'),
            'company'           => $this->input->post('company'),
            'company_size_id'   => $this->input->post('company_size'),
            'company_type_id'   => $this->input->post('company_type'),
            'address'           => $this->input->post('address'),
            'website'           => $this->input->post('website'),
            'source'            => $this->input->post('source'),
            'lead_status_id'    => $this->input->post('status'),
            'created_by'        => $this->session->userdata('user_id'),
        ];

        if ($id) {
            unset($data['created_by']);
            $this->DefaultModel->update('tbl_lead', $data, ['id' => $id]);
        } else {
            $this->DefaultModel->insert('tbl_lead', $data);
        }
        redirect('crm/leads');
    }

    function delete($id)
    {
        $this->DefaultModel->delete('tbl_lead', ['id' => $id]);
        redirect('crm/leads');
    }
}
