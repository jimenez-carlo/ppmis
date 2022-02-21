<?php
class User_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->status) {
      redirect('/login');
    }
  }

  public function GetUsers()
  {
    return $this->db->query("SELECT x.id,x.username,x.salt,x.created_date,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname,y.first,y.middle,y.last,y.email,r.rank_name as `rank`,z.role_name FROM tbl_users x inner join tbl_users_info y on y.user_id = x.id inner join tbl_roles z on z.id = x.role_id  inner join tbl_rank r on r.id = y.rank_id where x.deleted_flag = 0")->result_array();
  }

  public function GetUser($id)
  {
    return $this->db->query("SELECT x.id,x.username,x.salt,x.created_date,concat(y.last,', ',y.first,' ', substring(y.middle,1,1)) as fullname,y.first,y.middle,y.last,y.email,r.rank_name as `rank`,z.role_name FROM tbl_users x inner join tbl_users_info y on y.user_id = x.id inner join tbl_roles z on z.id = x.role_id  inner join tbl_rank r on r.id = y.rank_id where x.deleted_flag = 0 and  x.id = $id")->row();
  }

  public function GetRanks()
  {
    return $this->db->query("SELECT * from tbl_rank where deleted_flag = 0")->result_array();
  }

  public function InsertUser()
  {
    $post = $this->input->post();
    if (empty($post['user'])) {
      return $this->error('Username is Empty!');
    }
    if (empty($post['pass'])) {
      return $this->error('Password is Empty!');
    }
    if ($post['pass'] != $post['conpass']) {
      return $this->error('Password Does Not Match!');
    }
    if (empty($post['first'])) {
      return $this->error('Firstname is Empty!');
    }
    if (empty($post['middle'])) {
      return $this->error('Middle is Empty!');
    }
    if (empty($post['last'])) {
      return $this->error('Last is Empty!');
    }
    if (empty($post['email'])) {
      return $this->error('Email is Empty!');
    }
    if ($this->email_exists($post['email']) > 0) {
      return $this->error('Email Already Taken!');
    }
    if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      return $this->error('Invalid Email Address!');
    }
    if (empty($post['rank'])) {
      return $this->error('Rank is Empty!');
    }

    $this->db->trans_begin();

    $data = array(
      'username' => $post['user'],
      'salt' => $this->password_salt($post['pass']),
      'role_id' => $post['role_id']
    );
    $this->db->insert('tbl_users', $data);

    $id = $this->db->insert_id();

    $data = array(
      'user_id' => $id,
      'first' => $post['first'],
      'middle' => $post['middle'],
      'last' => $post['last'],
      'email' => $post['email'],
      'rank_id' => $post['rank']
    );
    $this->db->insert('tbl_users_info', $data);

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('User Saved Succesfully!');
    }
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

  public function UpdateUser()
  {
    $post = $this->input->post();
    if (empty($post['user'])) {
      return $this->error('Username is Empty!');
    }
    if (empty($post['first'])) {
      return $this->error('Firstname is Empty!');
    }
    if (empty($post['middle'])) {
      return $this->error('Middle is Empty!');
    }
    if (empty($post['last'])) {
      return $this->error('Last is Empty!');
    }
    if (empty($post['email'])) {
      return $this->error('Email is Empty!');
    }
    if ($this->email_exists($post['email'], $post['user_id']) > 0) {
      return $this->error('Email Already Taken!');
    }
    if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      return $this->error('Invalid Email Address!');
    }
    if (empty($post['rank'])) {
      return $this->error('Rank is Empty!');
    }

    $this->db->trans_begin();

    $data = array();
    $data['username'] = $post['user'];
    $data['role_id'] = $post['role_id'];
    if (!empty(trim($post['pass']))) $data['salt'] = $this->password_salt($post['pass']);
    $this->db->where('id', $post['user_id']);
    $this->db->update('tbl_users', $data);

    $data = array();
    $data['first'] = $post['first'];
    $data['middle'] = $post['middle'];
    $data['last'] = $post['last'];
    $data['email'] = $post['email'];
    $data['rank_id'] = $post['rank'];
    $this->db->where('user_id', $post['user_id']);
    $this->db->update('tbl_users_info', $data);

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('User Updated Succesfully!');
    }
  }

  public function DeleteUser()
  {
    $post = $this->input->post();
    $this->db->trans_begin();
    $data = array(
      'deleted_flag' => 1
    );
    $this->db->where('id', $post['id']);
    $this->db->update('tbl_users', $data);
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return $this->error('Error Something Went Wrong!');
    } else {
      $this->db->trans_commit();
      return $this->success('User ID#' . $post['id'] . ' Deleted Succesfully!');
    }
  }

  public function email_exists($email = null, $id = null)
  {
    $this->db->select('id')->from('tbl_users_info')->where("email", $email);
    if (!empty($id)) $this->db->where('id !=', $id);
    return $this->db->get()->num_rows();
  }



  public function password_salt($password = null)
  {
    if (!empty($password)) {
      return password_hash(
        $password,
        PASSWORD_DEFAULT
      );
    }
    return false;
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
