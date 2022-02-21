<?php
class Dashboard_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->status) {
      redirect('/login');
    }
  }

  public function GetData()
  {
    $data = new stdClass();
    $projectTotal = $this->db->query("SELECT count(*) as `count` from tbl_projects where deleted_flag = 0 limit 1");
    $projectPending = $this->db->query("SELECT count(*) as `count` from tbl_projects where deleted_flag = 0 and status_id = 1 limit 1");
    $projectInprogress = $this->db->query("SELECT count(*) as `count` from tbl_projects where deleted_flag = 0 and status_id = 2 limit 1");
    $projectCompleted = $this->db->query("SELECT count(*) as `count` from tbl_projects where deleted_flag = 0 and status_id = 3 limit 1");
    $projectCreated = $this->db->query("SELECT count(*) as `count` from tbl_projects where deleted_flag = 0 and `user_id` = " . $this->session->current->id . " limit 1");
    $userTotal = $this->db->query("SELECT count(*) as `count` from tbl_users where deleted_flag = 0 limit 1");
    $data->projectTotal = (!empty($projectTotal->num_rows())) ? $projectTotal->row()->count : 0;
    $data->projectPending = (!empty($projectPending->num_rows())) ? $projectPending->row()->count : 0;
    $data->projectInprogress = (!empty($projectInprogress->num_rows())) ? $projectInprogress->row()->count : 0;
    $data->projectCompleted = (!empty($projectCompleted->num_rows())) ? $projectCompleted->row()->count : 0;
    $data->userTotal = (!empty($userTotal->num_rows())) ? $userTotal->row()->count : 0;
    $data->projectCreated = (!empty($projectCreated->num_rows())) ? $projectCreated->row()->count : 0;
    return $data;
  }

  public function error($message = "Error")
  {
    echo '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
  <div><i class="fa fa-warning"></i><b>  ' . $message . '</b></div> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  public function success($message = "Successfull")
  {
    echo '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
    <i class="fa fa-check"></i>
  <div><b>' . $message . '</b></div>
  <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
