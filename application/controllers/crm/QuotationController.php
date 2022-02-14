<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QuotationController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('');
        }

        if (!in_array(3, explode(',', $this->session->userdata('role')[0]))) {
            redirect('');
        }

        $this->session->set_userdata('sidebar_id', 3);
    }

    function index()
    {
        $data['title']     = 'Quotation Letter';
        $data['content']   = 'crm/quotation/index';
        $data['my_js']     = 'crm/quotation/index';

        $data['quotation'] = $this->DefaultModel->getQuery("
            SELECT 
                ql.*,
                l.name AS company 
            FROM tbl_quotation_letter AS ql
            JOIN tbl_lead AS l ON l.id = ql.lead_id " . ($this->session->userdata('role_id') != 1 ? 'AND l.created_by = ' . $this->session->userdata('user_id') : '') . "
        ");

        $this->load->view('templates/main', $data);
    }

    function form($id)
    {
        $data['title']      = 'Quotation Letter / New';
        $data['content']    = 'crm/quotation/form';
        $data['my_js']      = 'crm/quotation/form';

        $data['leads']      = $this->DefaultModel->getWhere('tbl_lead', ['id' => $id])->row_array();

        if ($this->session->userdata('role_id') != 1 && $data['leads']['created_by'] != $this->session->userdata('user_id')) {
            redirect('crm/leads');
        }

        $data['products']   = $this->DefaultModel->get('tbl_product');

        $data['lead_status'] = $this->DefaultModel->get('tbl_lead_status');
        $data['company_size'] = $this->DefaultModel->get('tbl_company_size');
        $data['company_type'] = $this->DefaultModel->get('tbl_company_type');

        $this->load->view('templates/main', $data);
    }

    function save()
    {
        if (empty($this->input->post('product_name'))) {
            redirect('crm/quotation/create/' . $this->input->post('lead_id'));
        }

        $status = 1; // default approve quotation letter

        $data_1 = [
            'lead_id'       => $this->input->post('lead_id'),
            'date'          => date('Y-m-d', strtotime($this->input->post('date'))),
            'created_by'    => $this->session->userdata('user_id'),
        ];

        $ql_id = $this->DefaultModel->insertReturnId('tbl_quotation_letter', $data_1);

        $data_2 = [];
        for ($i = 0; $i < count($this->input->post('product_name')); $i++) {
            if ($this->input->post('product_price')[$i] > $this->input->post('price_customer')[$i]) {
                $status = 0;
            }

            $data_2[] = [
                'parent_id' => $ql_id,
                'product_name' => $this->input->post('product_name')[$i],
                'product_description' => $this->input->post('product_description')[$i],
                'product_price' => $this->input->post('product_price')[$i],
                'customer_price' => $this->input->post('price_customer')[$i],
                'deal_price' => $this->input->post('price_customer')[$i] < $this->input->post('product_price')[$i] ? '' : $this->input->post('price_customer')[$i],
            ];
        }

        $this->DefaultModel->insertBatch('tbl_quotation_letter_line', $data_2);

        $ql_code = 'QL-' . str_pad($ql_id, 5, '0', STR_PAD_LEFT);
        $data_3 = [
            'name' => $ql_code,
            'status' => $status,
        ];

        $this->DefaultModel->update('tbl_quotation_letter', $data_3, ['id' => $ql_id]);

        if ($status == 1) {
            $this->DefaultModel->update('tbl_lead', ['lead_status_id' => 8], ['id' => $this->input->post('lead_id')]);
        }

        redirect('crm/quotation');
    }

    function detail($id)
    {
        $data['title']      = 'Quotation Letter / Detail';
        $data['content']    = 'crm/quotation/detail';

        $data['leads']      = $this->DefaultModel->getQuery("
            SELECT 
                ql.*,
                l.name AS company 
            FROM tbl_quotation_letter AS ql
            JOIN tbl_lead AS l ON l.id = ql.lead_id
            WHERE ql.id = $id
        ")->row_array();

        if ($this->session->userdata('role_id') != 1 && $data['leads']['created_by'] != $this->session->userdata('user_id')) {
            redirect('crm/quotation');
        }

        $data['products']   = $this->DefaultModel->getWhere('tbl_quotation_letter_line', ['parent_id' => $id]);

        $data['lead_status'] = $this->DefaultModel->get('tbl_lead_status');
        $data['company_size'] = $this->DefaultModel->get('tbl_company_size');
        $data['company_type'] = $this->DefaultModel->get('tbl_company_type');

        $this->load->view('templates/main', $data);
    }

    function getOne($id)
    {
        echo json_encode($this->DefaultModel->getWhere('tbl_product', ['id' => $id])->row_array());
    }
}
