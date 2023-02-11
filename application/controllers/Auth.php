<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->id,
					'level' => $row->role
				);
				$this->session->set_userdata($params);
				redirect('home');
			} else {
				redirect('c45');
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('home');
	}
}
// defined('BASEPATH') or exit('No direct script access allowed');

// class Auth extends CI_Controller
// {
// 	function __construct()
// 	{
// 		parent::__construct();
// 	}
// 	public function login()
// 	{
// 		$data = array(
// 			"user_name" => $this->input->post("user_name"),
// 			"user_password" => $this->input->post("user_password")
// 		);
// 		if ($data['user_name'] == "admin" && $data['user_password'] == "admin") {
// 			$data['login'] = true;
// 			$this->session->set_userdata('login', $data);
// 			redirect("c45");
// 		}
// 		redirect("home");
// 	}
// 	public function logout()
// 	{
// 		if ($this->session->userdata('login')['login'] == true) {
// 			$this->session->sess_destroy();
// 			redirect("home");
// 		} else {
// 			show_404();
// 		}
// 	}
// }
