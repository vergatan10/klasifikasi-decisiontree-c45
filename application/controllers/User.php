<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m');
    }

    public function index()
    {
        $data['row'] = $this->user_m->get_role();
        $this->template->load('template', 'table_user', $data);
    }

    public function change_password()
    {
        $this->template->load('template', 'change_password');
    }

    public function add()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('flash_user', 'Berhasil Tambah User!');
                $this->session->set_flashdata('keterangan', 'Berhasil!');
                $this->session->set_flashdata('info', 'success');
                redirect(base_url() . 'user');
            } else {
                $this->session->set_flashdata('flash_user', 'Gagal Tambah User!');
                $this->session->set_flashdata('keterangan', 'GAGAL!');
                $this->session->set_flashdata('info', 'error');
                redirect(base_url() . 'user');
            }
        } else {
            $this->session->set_flashdata('flash_user', 'Tidak menemukan metode!');
            $this->session->set_flashdata('keterangan', 'Warning!');
            $this->session->set_flashdata('info', 'warning');
            redirect(base_url() . 'user');
        }
    }

    public function edit()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['edit'])) {
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('flash_user', 'Berhasil Edit User!');
                $this->session->set_flashdata('keterangan', 'Berhasil!');
                $this->session->set_flashdata('info', 'success');
                redirect(base_url() . 'user');
            } else {
                $this->session->set_flashdata('flash_user', 'Gagal ubah password!');
                $this->session->set_flashdata('keterangan', 'GAGAL!');
                $this->session->set_flashdata('info', 'error');
                redirect(base_url() . 'user');
            }
        } else {
            $this->session->set_flashdata('flash_user', 'Tidak menemukan metode!');
            $this->session->set_flashdata('keterangan', 'Warning!');
            $this->session->set_flashdata('info', 'warning');
            redirect(base_url() . 'user');
        }
    }

    public function show_edit($id)
    {
        $data['query'] = $this->user_m->get($id)->result();

        if ($data['query']) {
            $data['query2'] = $this->user_m->get($id)->result();
            $this->session->set_flashdata('info_data', 'show');
            $data['row'] = $this->user_m->get_role();
            $this->template->load('template', 'table_user', $data);
        } else {
            $data['row'] = $this->user_m->get_role();
            $this->template->load('template', 'table_user', $data);
        }
    }

    public function del($id)
    {
        $this->user_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash_user', 'User Berhasil dihapus!');
            $this->session->set_flashdata('keterangan', 'Berhasil!');
            $this->session->set_flashdata('info', 'success');
            redirect(base_url() . 'user');
        } else {
            $this->session->set_flashdata('flash_user', 'Tidak Berhasil dihapus!');
            $this->session->set_flashdata('keterangan', 'Gagal!');
            $this->session->set_flashdata('info', 'error');
            redirect(base_url() . 'user');
        }
    }
}
