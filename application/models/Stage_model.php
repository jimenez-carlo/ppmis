<?php
class Stage_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->status) {
      redirect('/login');
    }
    $this->load->model('Audit_model', 'audit');
  }

  public function GetStatuses()
  {
    return $this->db->query("SELECT x.id,x.sub_status_name from tbl_sub_status x where x.deleted_flag = 0")->result_array();
  }

  public function GetComments()
  {
    $post = $this->input->post();
    $id = $post['id'];
    return $this->db->query("SELECT x.*,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname from tbl_stage_thread x inner join tbl_users_info y on y.id = x.user_id where x.deleted_flag = 0 and x.stage_id = $id order by created_date desc ")->result_array();
  }

  public function GetStageHistory()
  {
    $post = $this->input->post();
    $id = $post['id'];
    return $this->db->query("SELECT z.sub_status_name,x.created_date,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname from tbl_sub_status_history x inner join tbl_users_info y on y.user_id = x.user_id inner join tbl_sub_status z on z.id = x.sub_status_id where x.stage_id = $id order by x.created_date asc")->result_array();
  }


  public function GetStages($id)
  {
    return $this->db->query("SELECT x.*,y.*,z.sub_status_name,concat(xx.last,', ',xx.first,' ', substring(xx.middle,1,1)) as fullname from tbl_stages x inner join tbl_sub_status_history y on y.project_id = x.project_id and y.stage_id = x.id inner join tbl_sub_status z on z.id = y.sub_status_id inner join tbl_users_info xx on xx.user_id = x.user_id where x.deleted_flag = 0 and x.project_id = $id")->result_array();
  }

  public function GetStage($id)
  {
    return $this->db->query("SELECT x.*,y.name,z.sub_status_name,concat(xx.last,', ',xx.first,' ', substring(xx.middle,1,1)) as fullname from tbl_stages x inner join  tbl_users_info xx on xx.user_id = x.user_id inner join tbl_projects y on y.id = x.project_id inner join tbl_sub_status z on z.id = x.sub_status_id where x.deleted_flag = 0 and x.id = $id")->row();
  }

  public function InsertComment()
  {
    $post = $this->input->post();
    if (empty($post['msg'])) {
      return $this->error('Error Something Went Wrong!');
    }

    $this->db->trans_begin();

    $data = array(
      'stage_id' => $post['CommentStage'],
      'message' => $post['msg'],
      'user_id' => $this->session->current->id
    );

    $this->db->insert('tbl_stage_thread', $data);

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Project Created Succesfully!');
    }
  }

  public function UpdateStage()
  {
    $post = $this->input->post();
    if (empty($post['details'])) {
      return $this->error('Stage Details is Empty!');
    }
    if (empty($post['dt'])) {
      return $this->error('Date is Empty!');
    }

    $this->db->trans_begin();

    $old = $this->db->query("SELECT * from tbl_stages where deleted_flag = 0 and id = " . $post['id'] . " limit 1")->row();

    if ($post['details'] != $old->details) $this->InsertStageAudit($post['id'], "details changed", $old->details, $post['details'], "details");
    if ($post['dt'] != $old->assigned_date) $this->InsertStageAudit($post['dt'], "date changed", $old->assigned_date, $post['dt'], "assigned_date");
    if ($post['remarks'] != $old->remarks) $this->InsertStageAudit($post['id'], "remarks changed", $old->remarks, $post['remarks'], "remarks");
    if ($post['status'] != $old->sub_status_id) $this->InsertStageAudit($post['id'], "status changed", $old->sub_status_id, $post['status'], "sub_status_id");

    if ($post['details'] != $old->details) $this->audit->InsertAudit("STAGE", "Updated StageID#" . $post['id'] . " details from " .  $old->details . " to " . $post['details']);
    if ($post['remarks'] != $old->remarks) $this->audit->InsertAudit("STAGE", "Updated StageID#" . $post['id'] . " remarks from " .  $old->remarks . " to " . $post['remarks']);
    if ($post['dt'] != $old->assigned_date) $this->audit->InsertAudit("STAGE", "Updated StageID#" . $post['id'] . " date from " .  $old->assigned_date . " to " . $post['dt']);
    if ($post['oldstatus'] != $post['status']) {
      $this->audit->InsertAudit("STAGE", "Updated StageID#" . $post['id'] . " status from " . $this->audit->GetSubStatuses()[$old->sub_status_id] . " to " . $this->audit->GetSubStatuses()[$post['status']]);
    }

    $data = array(
      'details' => $post['details'],
      'assigned_date' => $post['dt'],
      'remarks' => $post['remarks']
    );
    if ($post['oldstatus'] != $post['status']) $data['sub_status_id'] = $post['status'];
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_stages', $data);

    $data = array();

    if ($post['oldstatus'] != $post['status']) {
      $data = array(
        'stage_id' => $post['id'],
        'sub_status_id' => $post['status'],
        'user_id' => $this->session->current->id
      );
      $this->db->insert('tbl_sub_status_history', $data);
    }

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Stage Updated Succesfully!');
    }
  }

  public function InsertStageAudit($project_id, $remarks = null, $from = null, $to = null, $column = null)
  {
    $data = array(
      'project_id' => $project_id,
      'remarks' => $remarks,
      'from' => $from,
      'to' => $to,
      'column_name' => $column,
      'user_id' => $this->session->current->id
    );
    $this->db->insert('tbl_stage_audit', $data);
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
