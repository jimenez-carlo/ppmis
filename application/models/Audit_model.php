<?php
class Audit_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    // if (!$this->session->status) {
    //   redirect('/login');
    // }

  }

  public function GetProjects($id)
  {
    return $this->db->query("SELECT x.*,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname from tbl_project_audit x inner join tbl_users_info y on y.id = x.user_id where project_id = $id order by x.created_date desc")->result_array();
  }

  public function GetStatuses()
  {
    $status = $this->db->query("SELECT x.* from tbl_status x  where deleted_flag = 0")->result_array();
    $result = array();
    foreach ($status as $res) {
      $result[$res['id']] = $res['status_name'];
    }
    return $result;
  }

  public function GetSubStatuses()
  {
    $status = $this->db->query("SELECT x.* from tbl_sub_status x  where deleted_flag = 0")->result_array();
    $result = array();
    foreach ($status as $res) {
      $result[$res['id']] = $res['sub_status_name'];
    }
    return $result;
  }

  public function InsertAudit($module = null, $remarks = null)
  {
    $data = array(
      'remarks' => $remarks,
      'module' => $module,
      'user_id' => (!empty($this->session->current->id) ? $this->session->current->id : null)
    );
    $this->db->insert('tbl_audit_trail', $data);
  }

  public function GetAll()
  {
    return $this->db->query("SELECT x.*,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname from tbl_audit_trail x left join tbl_users_info y on y.id = x.user_id order by x.created_date desc")->result_array();
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
