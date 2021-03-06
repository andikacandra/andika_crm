<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('is_login') != true) {
            $this->load->view('login_page');
        } else {
            redirect('home');
        }
    }

    function loginProcess()
    {
        $email  = $this->input->post('email');
        $pass   = $this->input->post('pass');

        if (!empty($email)) {
            $user = $this->DefaultModel->getWhere('tbl_user', ['email' => $email]);
            if ($user->num_rows()) {
                $user = $user->result_array()[0];
                if (MD5($pass) == $user['password']) {
                    $data = [
                        'is_login'  => true,
                        'user_id'   => $user['id'],
                        'name'      => $user['name'],
                        'role_id'   => $user['id_role'],
                        'role'      => [$this->DefaultModel->getWhere('tbl_role', ['id' => $user['id_role']])->row()->access],
                    ];

                    $this->session->set_userdata($data);

                    redirect('home');
                } else {
                    $this->session->set_flashdata('email_old', $email);
                    $this->session->set_flashdata('login_err', 'Wrong password');
                }
            } else {
                $this->session->set_flashdata('login_err', 'Email ' . $email . ' is not registered');
            }
        }

        redirect('login', 'refresh');
    }

    function logout()
    {
        session_destroy();
        redirect('login', 'refresh');
    }
}
