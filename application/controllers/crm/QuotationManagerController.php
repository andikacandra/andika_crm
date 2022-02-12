<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QuotationManagerController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('');
        }

        if (!in_array(4, explode(',', $this->session->userdata('role')[0]))) {
            redirect('');
        }

        $this->session->set_userdata('sidebar_id', 4);
    }

    function index()
    {
        $data['title']     = 'Quotation Letter Approval';
        $data['content']   = 'crm/quotation/approval_list';
        // $data['my_js']     = 'crm/leads/index';

        $data['quotation'] = $this->DefaultModel->getQuery("
            SELECT 
                ql.*,
                l.name AS company 
            FROM tbl_quotation_letter AS ql
            JOIN tbl_lead AS l ON l.id = ql.lead_id
            WHERE ql.status = 0
        ");

        $this->load->view('templates/main', $data);
    }

    function save($id, $status)
    {
        $this->DefaultModel->update('tbl_quotation_letter', ['status' => $status], ['id' => $id]);

        if ($status == 1) {
            $child = $this->DefaultModel->getWhere('tbl_quotation_letter_line', ['parent_id' => $id])->result_array();

            $data = [];

            foreach ($child as $row) {
                $data[] = [
                    'id'         => $row['id'],
                    'deal_price' => $row['customer_price'],
                ];
            }

            $this->DefaultModel->updateBatch('tbl_quotation_letter_line', $data, 'id');
        }

        redirect('crm/qapproval');
    }

    function form($id)
    {
        $data['title']      = 'Quotation Letter Approval / Form';
        $data['content']    = 'crm/quotation/approval_form';

        $data['leads']      = $this->DefaultModel->getQuery("
            SELECT 
                ql.*,
                l.name AS company ,
                u.name AS lead_owner
            FROM tbl_quotation_letter AS ql
            JOIN tbl_lead AS l ON l.id = ql.lead_id
            JOIN tbl_user AS u ON u.id = ql.created_by
            WHERE ql.id = $id
        ")->row_array();
        $data['products']   = $this->DefaultModel->getWhere('tbl_quotation_letter_line', ['parent_id' => $id]);

        $data['lead_status'] = $this->DefaultModel->get('tbl_lead_status');
        $data['company_size'] = $this->DefaultModel->get('tbl_company_size');
        $data['company_type'] = $this->DefaultModel->get('tbl_company_type');

        $this->load->view('templates/main', $data);
    }
}
