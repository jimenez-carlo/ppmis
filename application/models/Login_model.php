<?php
class Login_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $post = $this->input->post();
    return $this->db->get_where('tbl_users', array('username' => $post['user']), 1);
  }
}
