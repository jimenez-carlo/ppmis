<?php
class Project_model extends CI_Model
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
    return $this->db->query("SELECT x.id,x.status_name from tbl_status x where x.deleted_flag = 0")->result_array();
  }

  public function GetStatusHistory($id)
  {
    return $this->db->query("SELECT z.status_name,x.created_date,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname from tbl_status_history x inner join tbl_users_info y on y.user_id = x.user_id inner join tbl_status z on z.id = x.status_id where x.project_id = $id order by x.created_date desc")->result_array();
  }

  public function GetProjects()
  {
    return $this->db->query("SELECT x.id,x.name,x.supplier,x.t_start_date,x.t_complete_date,x.a_start_date,x.a_complete_date,y.status_name from tbl_projects x inner join tbl_status y on y.id = x.status_id where x.deleted_flag = 0")->result_array();
  }

  public function GetStages($id)
  {
    return $this->db->query("SELECT x.*,y.*,z.sub_status_name,concat(xx.last,', ',xx.first,' ', substring(xx.middle,1,1)) as fullname,x.sub_status_id from tbl_stages x inner join tbl_sub_status_history y on y.project_id = x.project_id and y.stage_id = x.id inner join tbl_sub_status z on z.id = x.sub_status_id inner join tbl_users_info xx on xx.user_id = x.user_id where x.deleted_flag = 0 and x.project_id = $id")->result_array();
  }

  public function InsertProject()
  {
    $post = $this->input->post();
    if (empty($post['name'])) {
      return $this->error('Project Name is Empty!');
    }
    if (empty($post['supplier'])) {
      return $this->error('Supplier is Empty!');
    }
    if (empty($post['tstart'])) {
      return $this->error('Target Start Date is Empty!');
    }
    if (empty($post['tcomplete'])) {
      return $this->error('Target Complete Date is Empty!');
    }
    if (empty($post['astart'])) {
      return $this->error('Actual Start Date is Empty!');
    }
    if (empty($post['acomplete'])) {
      return $this->error('Actual Complete Date is Empty!');
    }

    $this->db->trans_begin();

    $data = array(
      'name' => $post['name'],
      'remarks' => $post['remarks'],
      'supplier' => $post['supplier'],
      't_start_date' => $post['tstart'],
      't_complete_date' => $post['tcomplete'],
      'a_start_date' => $post['astart'],
      'a_complete_date' => $post['acomplete'],
      'status_id' => 1,
      'user_id' => $this->session->current->id
    );
    $this->db->insert('tbl_projects', $data);

    $id = $this->db->insert_id();

    $this->InsertProjectAudit($id, "Project Created");
    $this->audit->InsertAudit("PROJECT", "Project Added #" . $id);
    $data = array(
      'project_id' => $id,
      'remarks' => "initial",
      'status_id' => 1,
      'user_id' => $this->session->current->id
    );

    $this->db->insert('tbl_status_history', $data);
    $stages = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    foreach ($stages as $res) {
      $this->InsertStage($id, "Stage " . $res, $this->session->current->id, 1, $res);
    }
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Project Created Succesfully!');
    }
  }

  public function InsertProjectAudit($project_id, $remarks = null, $from = null, $to = null, $column = null)
  {
    $data = array(
      'project_id' => $project_id,
      'remarks' => $remarks,
      'from' => $from,
      'to' => $to,
      'column_name' => $column,
      'user_id' => $this->session->current->id
    );
    $this->db->insert('tbl_project_audit', $data);
  }

  public function InsertStageAudit($stage_id, $remarks = null, $from = null, $to = null, $column = null)
  {
    $data = array(
      'stage_id' => $stage_id,
      'remarks' => $remarks,
      'from' => $from,
      'to' => $to,
      'column_name' => $column,
      'user_id' => $this->session->current->id
    );
    $this->db->insert('tbl_stage_audit', $data);
  }

  public function InsertStage($project_id, $details, $user_id, $status_id, $sequence)
  {
    $data = array(
      'project_id' => $project_id,
      'details' => $details,
      'user_id' => $user_id,
      'sub_status_id' => $status_id,
      'sequence' => $sequence
    );
    $this->db->insert('tbl_stages', $data);
    $stage_id = $this->db->insert_id();
    $data = array();
    $data = array(
      'project_id' => $project_id,
      'stage_id' => $stage_id,
      'sub_status_id' => $status_id,
      'user_id' => $user_id
    );
    $this->db->insert('tbl_sub_status_history', $data);
    $this->InsertStageAudit($stage_id, "Stage Created");
    $this->audit->InsertAudit("STAGE", "Stage Added #" . $stage_id);
  }

  public function InsertInfo()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'user_id' => $post['item_name'],
      'first' => $post['category_id'],
      'middle' => $post['subcategory_id'],
      'last' => $post['subcategory_id'],
      'emai' => $post['subcategory_id'],
      'rank' => $post['subcategory_id']
    );

    $this->db->insert('tbl_users', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('User Saved Succesfully!');
    }
  }

  public function UpdateProject()
  {
    $post = $this->input->post();
    if (empty($post['name'])) {
      return $this->error('Project Name is Empty!');
    }
    if (empty($post['supplier'])) {
      return $this->error('Supplier is Empty!');
    }
    if (empty($post['tstart'])) {
      return $this->error('Target Start Date is Empty!');
    }
    if (empty($post['tcomplete'])) {
      return $this->error('Target Complete Date is Empty!');
    }
    if (empty($post['astart'])) {
      return $this->error('Actual Start Date is Empty!');
    }
    if (empty($post['acomplete'])) {
      return $this->error('Actual Complete Date is Empty!');
    }

    $this->db->trans_begin();
    $old = $this->db->query("SELECT * from tbl_projects where deleted_flag = 0 and id = " . $post['id'] . " limit 1")->row();

    if ($post['name'] != $old->name) $this->InsertProjectAudit($post['id'], "name changed", $old->name, $post['name'], "name");
    if ($post['remarks'] != $old->remarks) $this->InsertProjectAudit($post['id'], "remarks changed", $old->remarks, $post['remarks'], "remarks");
    if ($post['supplier'] != $old->supplier) $this->InsertProjectAudit($post['id'], "supplier changed", $old->supplier, $post['supplier'], "supplier");
    if ($post['tstart'] != $old->t_start_date) $this->InsertProjectAudit($post['id'], "target start date changed", $old->t_start_date, $post['tstart'], "t_start_date");
    if ($post['tcomplete'] != $old->t_complete_date) $this->InsertProjectAudit($post['id'], "target complete date changed", $old->t_complete_date, $post['tcomplete'], "t_complete_date");
    if ($post['astart'] != $old->t_start_date) $this->InsertProjectAudit($post['id'], "actual start date changed", $old->t_start_date, $post['astart'], "a_start_date");
    if ($post['acomplete'] != $old->t_complete_date) $this->InsertProjectAudit($post['id'], "actual start date changed", $old->t_complete_date, $post['acomplete'], "a_complete_date");

    if ($post['name'] != $old->name) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " name from " .  $old->name . " to " . $post['name']);
    if ($post['remarks'] != $old->remarks) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " remarks from " .  $old->remarks . " to " . $post['remarks']);
    if ($post['supplier'] != $old->supplier) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " supplier from " .  $old->supplier . " to " . $post['supplier']);
    if ($post['tstart'] != $old->t_start_date) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " target start date from " .  $old->t_start_date . " to " . $post['tstart']);
    if ($post['tcomplete'] != $old->t_complete_date) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " target complete date from " .  $old->t_complete_date . " to " . $post['tcomplete']);
    if ($post['astart'] != $old->a_start_date) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " actual start date from " .  $old->a_start_date . " to " . $post['tstart']);
    if ($post['acomplete'] != $old->a_complete_date) $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " actual complete date from " .  $old->a_complete_date . " to " . $post['tcomplete']);

    if ($post['status'] != $old->status_id) {
      $this->InsertProjectAudit($post['id'], "status changed", $old->status_id, $post['status'], "status");
      $this->audit->InsertAudit("PROJECT", "Updated ProjectID#" . $post['id'] . " status from " . $this->audit->GetStatuses()[$old->status_id] . " to " . $this->audit->GetStatuses()[$post['status']]);
    }

    $data = array(
      'name' => $post['name'],
      'remarks' => $post['remarks'],
      'supplier' => $post['supplier'],
      't_start_date' => $post['tstart'],
      't_complete_date' => $post['tcomplete'],
      'a_start_date' => $post['astart'],
      'a_complete_date' => $post['acomplete']
    );
    if ($post['oldstatus'] != $post['status']) $data['status_id'] = $post['status'];

    $this->db->where('id', $post['id']);
    $this->db->update('tbl_projects', $data);
    $data = array();

    if ($post['oldstatus'] != $post['status']) {
      $data = array(
        'project_id' => $post['id'],
        'status_id' => $post['status'],
        'user_id' => $this->session->current->id
      );
      $this->db->insert('tbl_status_history', $data);
    }

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Project Updated Succesfully!');
    }
  }

  public function DeleteProject()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_projects', $data);
    $this->InsertProjectAudit($post['id'], "deleted_flag changed", 0, 1, "deleted_flag");
    $this->audit->InsertAudit("PROJECT", "Deleted ProjectID#" . $post['id']);

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Project ID#' . $post['id'] . ' Deleted Succesfully!');
    }
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
