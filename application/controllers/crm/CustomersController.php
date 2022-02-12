<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomersController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('');
        }

        if (!in_array(5, explode(',', $this->session->userdata('role')[0]))) {
            redirect('');
        }

        $this->session->set_userdata('sidebar_id', 5);
    }

    function index()
    {
        $data['title']     = 'Customers';
        $data['content']   = 'crm/customers/index';

        $data['customers'] = $this->DefaultModel->getQuery("
            SELECT
                l.*,
                COUNT(l.id) AS count_product
            FROM tbl_quotation_letter AS ql
            JOIN tbl_quotation_letter_line AS qll ON qll.parent_id = ql.id
            JOIN tbl_lead AS l ON l.id = ql.lead_id
            WHERE ql.status = 1
            GROUP BY l.id
        ");

        $this->load->view('templates/main', $data);
    }

    function detail($id)
    {
        $data['title']     = 'Customers / Detail';
        $data['content']   = 'crm/customers/detail';

        $data['leads'] = $this->DefaultModel->getQuery("
            SELECT 
                l.*,
                cs.name as csize_name,
                ct.name as industry_name
            FROM tbl_lead AS l
            LEFT JOIN tbl_company_size AS cs ON cs.id = l.company_size_id
            LEFT JOIN tbl_company_type AS ct ON ct.id = l.company_type_id
            WHERE l.id = $id
        ")->row_array();

        $data['products'] = $this->DefaultModel->getQuery("
            SELECT 
                ql.name,
                qll.*
            FROM tbl_quotation_letter AS ql
            JOIN tbl_quotation_letter_line AS qll ON qll.parent_id = ql.id
            WHERE ql.status = 1
            AND ql.lead_id = $id
        ");

        $this->load->view('templates/main', $data);
    }
}
