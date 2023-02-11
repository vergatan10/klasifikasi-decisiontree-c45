<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Form_validation extends CI_Form_validation
{
    public function __construct()
    {
        parent::__construct();
    }
    public function edit_unique($str, $field)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'user_id !=' => $id))->num_rows() === 0)
            : FALSE;
    }
}
