<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
  public function index()
  {
    $this->session->sess_destroy();
    $this->load->model('Audit_model', 'audit');
    $this->audit->InsertAudit("SYSTEM", "Log out");
    redirect('/');
  }
}
