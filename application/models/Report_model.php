<?php
class Report_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->status) {
      redirect('/login');
    }
  }

  public function GetProjects()
  {
    return $this->db->query("SELECT x.id,x.name, x.supplier, x.a_start_date,x.a_complete_date,y.status_name from tbl_projects x inner join tbl_status y on y.id = x.status_id  where x.deleted_flag=0")->result_array();
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
