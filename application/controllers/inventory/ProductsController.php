<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('');
        }

        if (!in_array(6, explode(',', $this->session->userdata('role')[0]))) {
            redirect('');
        }

        $this->session->set_userdata('sidebar_id', 6);
    }

    function index()
    {
        $data['title']     = 'Products';
        $data['content']   = 'inventory/products/index';
        $data['my_js']     = 'inventory/products/index';

        $data['products'] = $this->DefaultModel->get('tbl_product');

        $this->load->view('templates/main', $data);
    }

    function form($id = null)
    {
        $data['title']      = 'Products / ' . ($id ? 'Edit' : 'New');
        $data['content']    = 'inventory/products/form';

        if ($id) {
            $data['products'] = $this->DefaultModel->getWhere('tbl_product', ['id' => $id])->row_array();
        }

        $this->load->view('templates/main', $data);
    }

    function save($id = null)
    {
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
        ];

        if ($id) {
            $this->DefaultModel->update('tbl_product', $data, ['id' => $id]);
        } else {
            $this->DefaultModel->insert('tbl_product', $data);
        }

        redirect('products');
    }

    function delete($id)
    {
        $this->DefaultModel->delete('tbl_product', ['id' => $id]);
        redirect('products');
    }

    function getOne($id)
    {
        echo json_encode($this->DefaultModel->getWhere('tbl_product', ['id' => $id])->row_array());
    }
}
