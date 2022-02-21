<?php
class Rank_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->status) {
      redirect('/login');
    }
  }

  public function GetRanks()
  {
    return $this->db->query("SELECT * from tbl_rank where deleted_flag=0")->result_array();
  }

  public function InsertRank()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'rank_name' => $post['rank']
    );
    $this->db->insert('tbl_rank', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Rank Saved Succesfully!');
    }
  }

  public function UpdateRank()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'rank_name' => $post['rank']
    );
    $this->db->where('id', $post['rank_id']);
    $this->db->update('tbl_rank', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Rank Updated Succesfully!');
    }
  }

  public function DeleteRank()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_rank', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('Rank ID#' . $post['id'] . ' Deleted Succesfully!');
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
