<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'app');
		$this->load->model('User_model', 'user');
		$this->load->model('Project_model', 'project');
		$this->load->model('Stage_model', 'stage');
		$this->load->model('Dashboard_model', 'dashboard');
		$this->load->model('Rank_model', 'rank');
		$this->load->model('Report_model', 'report');
		$this->load->model('Audit_model', 'audit');
		if (!$this->session->status) {
			redirect('/login');
		}
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function Header($type, $id = null)
	{
		$data = array();
		if (!empty($id)) $data['id'] = $id;
		$this->load->view('components/header/' . $type, $data);
	}

	public function Body($type, $name)
	{
		$post = $this->input->post();
		$data['init'] = true;
		if ($type == 'form') {
			if (strpos($name, 'edit') !== false) {
				$clean_type = str_replace('_edit', '', $name);
				$temp = $this->app->GetOne($clean_type, $post['id']);
				$data['default'] = $temp;
				$data['category'] = $this->app->GetCategory();
				$data['roles'] 		= $this->app->GetRoles();
				if ($clean_type == 'inventory') {
					$data['subcategory'] = $this->app->GetSubCategory($temp->category_id);
				}
				if ($clean_type == 'projects') {
					$data['statuses'] = $this->project->GetStatuses();
					$this->audit->InsertAudit("PROJECT", "Viewed ProjectID#" . $post['id']);
				}
				if ($clean_type == 'stages') {
					$data['statuses'] = $this->stage->GetStatuses();
					$data['default'] = $this->stage->GetStage($post['id']);
					$this->audit->InsertAudit("STAGE", "Viewed StageID#" . $post['id']);
				}
				if ($clean_type == 'view_user') {
					$data['ranks'] = $this->user->GetRanks();
				}
				if ($clean_type == 'ranks') {
					$data['statuses'] = $this->rank->GetRanks();
				}
				if ($clean_type == 'projects_audit') {
					$data['project_changes'] = $this->audit->GetProjects($post['id']);
					$data['status_array'] = $this->audit->GetStatuses();
				}
			} else {
				$data['category']    = $this->app->GetCategory();
				$data['subcategory'] = $this->app->GetSubCategory();
				$data['roles'] 				= $this->app->GetRoles();
				$data['ranks'] = $this->user->GetRanks();
			}
			$this->load->view('components/form/' . $name, $data);
		} else {
			$data['content'] = $this->TableData($name, $post['id']);
			$this->load->view('components/table/' . $name, $data);
		}
	}

	public function TableData($name, $id = null)
	{
		$post = $this->input->post();
		switch ($name) {
			case 'inventory':
				return $this->app->GetInventory();
				break;
			case 'category':
				return $this->app->GetCategory();
				break;
			case 'subcategory':
				return $this->app->GetSubCategory();
				break;
			case 'item_history':
				return $this->app->GetItemHistory($id);
				break;
			case 'projects':
				return $this->project->GetProjects();
				break;
			case 'reports':
				return $this->app->GetItemHistory($id);
				break;
			case 'users':
				return $this->user->GetUsers();
				break;
			case 'comments':
				return $this->stage->GetComments();
				break;
			case 'stage_history':
				return $this->stage->GetStageHistory();
				break;
			case 'dashboard':
				return $this->dashboard->GetData();
				break;
			case 'rank':
				return $this->rank->GetRanks();
				break;
			case 'report':
				return $this->report->GetProjects();
				break;
			case 'project_history':
				return $this->project->GetStatusHistory($post['id']);
				break;
			case 'project_stages':
				return $this->project->GetStages($post['id']);
				break;
			case 'project_audit':
				return $this->project->GetProjects();
				break;
			case 'audit_trail':
				return $this->audit->GetAll();
				break;
		}
	}


	public function Request()
	{
		$post = $this->input->post();
		if (isset($post['SaveCategory'])) {
			echo $this->app->InsertCategory();
		} else if (isset($post['SaveSubCategory'])) {
			echo $this->app->InsertSubCategory();
		} else if (isset($post['SaveItem'])) {
			echo $this->app->InsertItem();
		} else if (isset($post['UpdateItem'])) {
			echo $this->app->UpdateItem();
		} else if (isset($post['UpdateCategory'])) {
			echo $this->app->UpdateCategory();
		} else if (isset($post['UpdateSubCategory'])) {
			echo $this->app->UpdateSubCategory();
		} else if (isset($post['DeleteCategory'])) {
			echo $this->app->DeleteCategory();
		} else if (isset($post['DeleteSubCategory'])) {
			echo $this->app->DeleteSubCategory();
		} else if (isset($post['DeleteItem'])) {
			echo $this->app->DeleteItem();
		} else if (isset($post['SaveUser'])) {
			echo $this->user->InsertUser();
		} else if (isset($post['UpdateUser'])) {
			echo $this->user->UpdateUser();
		} else if (isset($post['DeleteUser'])) {
			echo $this->user->DeleteUser();
		} else if (isset($post['SaveProject'])) {
			echo $this->project->InsertProject();
		} else if (isset($post['UpdateProject'])) {
			echo $this->project->UpdateProject();
		} else if (isset($post['DeleteProject'])) {
			echo $this->project->DeleteProject();
		} else if (isset($post['CommentStage'])) {
			echo $this->stage->InsertComment();
		} else if (isset($post['UpdateStage'])) {
			echo $this->stage->UpdateStage();
		}

		if (isset($post['SaveRank'])) 	echo $this->rank->InsertRank();
		if (isset($post['UpdateRank'])) echo $this->rank->UpdateRank();
		if (isset($post['DeleteRank'])) echo $this->rank->DeleteRank();


		if (isset($post['ImportCSV'])) {
			echo $this->app->ImportCSV();
		}
	}

	public function DropdownSubCategory()
	{
		$post = $this->input->post();
		$selected = 1;
		if (isset($post['selected'])) {
			$selected = $post['selected'];
		}
		$data['subcategory'] = $this->app->GetSubCategory($selected);
		$this->load->view('dropdown', $data);
	}


	public function generateProjectPDF()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$details = $this->app->GetOne("projects", $post['id']);
		$stages  = $this->project->GetStages($post['id']);
		$table = '';
		foreach ($stages as $res) {
			$table .= '
				<tr>
					<td>' . $res['sequence'] . '</td>
					<td>' . $res['details'] . '</td>
					<td>' . $res['assigned_date'] . '</td>
					<td>' . $res['sub_status_name'] . '</td>
					<td>' . $res['fullname'] . '</td>
				</tr>';
		}
		$html = '
<html>
	<head>
		<meta charset="utf-8" />
		<title>Project PDF</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<style>
			.r{
				text-align:right!important;
			}
			.l{
				text-align:left!important;
			}
			.b{
			font-weight:bold;}
			.invoice-box {
				padding: 30px;
				border: 1px solid #eee;
				font-size: 16px;
				line-height: 24px;
				font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

</style>
	</head>

	<body>
		<div class="invoice-box">
		<h3>PROJECT</h3>
			<table cellpadding="0" cellspacing="0">
			<tr>
				<td>Project ID:</td>
				<td>' . $details->id . '</td>
				<td>Status:</td>
				<td>' . $details->status_id . '</td>
			</tr>
			<tr>
				<td>Project Name:</td>
				<td>' . $details->name . '</td>
				<td>Supplier:</td>
				<td>' . $details->supplier . '</td>
			</tr>
			<tr>
				<td>Target Start Date:</td>
				<td>' . $details->t_start_date . '</td>
				<td>Target Complete Date:</td>
				<td>' . $details->t_complete_date . '</td>
			</tr>
			<tr>
				<td>Actual Start Date:</td>
				<td>' . $details->a_start_date . '</td>
				<td>Actual Complete Date:</td>
				<td>' . $details->a_complete_date . '</td>
			</tr>
			</table>
			<h3>STAGES</h3>
			<table cellpadding="0" cellspacing="0">
<tr class="heading">
					<td>ID</td>
					<td>Stage Details</td>
					<td>Date</td>
					<td>Status</td>
					<td>Created By</td>
				</tr>
' . $table . '


			</table>
<h3>Remarks</h3>
<h5>' . $details->remarks . '</h5>
<div "style=text-align:center!important">
</div>
		</div>
	</body>
</html>
';

		$mpdf = new \Mpdf\Mpdf();
		//[ 'margin_left' => 20,
		// 'margin_right' => 15,
		// 'margin_top' => 10,
		// 'margin_bottom' => 25,
		// 'margin_header' => 10,
		// 'margin_footer' => 10]

		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("PMMIS - Invoice");
		$mpdf->SetAuthor("PMMIS");
		// $mpdf->SetWatermarkText("Paid");
		$mpdf->showWatermarkText = true;
		$mpdf->watermark_font = 'DejaVuSansCondensed';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->DefHTMLFooterByName(
			'Chapter2Footer',
			'<div style="text-align: right; font-weight: bold; font-size: 8pt; 
  font-style: italic;">Chapter 2 Footer</div>'
		);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
		$this->audit->InsertAudit("REPORT", "Generate Report ProjectID#" . $post['id']);
		exit;
	}
}
