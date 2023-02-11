<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function login($post)
    {
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1(md5($post['password'])));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_role($id = null)
    {
        $this->db->select('user.*, role.jenis as role_name');
        $this->db->from('user');
        $this->db->join('role', 'user.role = role.id_role');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = array(
            'username' => $post['username'],
            'password' => sha1(md5($post['password'])),
            'email' => $post['email'] != "" ? $post['email'] : null,
            'telp' => $post['telp'] != "" ? $post['telp'] : null,
            'role' => $post['role']
        );
        $this->db->insert('user', $params);
    }

    public function edit($post)
    {
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        $params['telp'] = $post['telp'];
        $params['role'] = $post['role'];
        $this->db->where('id', $post['id']);
        $this->db->update('user', $params);
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function change_pass($post)
    {
        $params['password'] = sha1(md5($post['password']));
        $this->db->where('id', $post['user_id']);
        $true = $this->db->update('user', $params);
        if ($true == TRUE) {
            return TRUE;
        } else if ($true == FALSE) {
            return FALSE;
        }
    }
}
