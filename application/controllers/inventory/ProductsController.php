<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsController extends CI_Controller
{
    public function index()
    {
        $data = [
            'title'     => 'Products',
            'content'   => 'inventory/products/index',
        ];

        $this->load->view('templates/main', $data);
    }
}
