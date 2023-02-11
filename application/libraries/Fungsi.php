<?php

class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('user_m');
    }

    function user_login()
    {
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function user_login2()
    {
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get_role($user_id)->row();
        return $user_data;
    }
}
