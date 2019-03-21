<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alumni extends CI_Controller {
	var $data;
	var $user_id;
	var $link = 'mp-admin/alumni';
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language'));
		//models connection back-end
		$this->load->model('ad-min/M_settings', 'settings');
		$this->load->model('ad-min/M_logactivity', 'logactivity');
		$this->load->model('ad-min/M_menu', 'menu');
		$this->load->model('ad-min/M_usermenu', 'usermenu');
		$this->load->model('ad-min/M_user', 'user');
		//end models connection back-end
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	// redirect if needed, otherwise display the access privilege list
	public function index() {
		if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
			redirect('mp-admin/app/login', 'refresh');
		} elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('you must be an administrator to view this page.');
		} else {
			$user_id = $this->session->userdata('user_id');
			//start sidebar menu
			$this->data['title_site'] = $this->settings->get_title_site();
			$this->data['menu_data'] = $this->settings->get_menu($user_id);
			$this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
			/* START insert update delete view access */
			$this->data['akses'] = $this->user->get_access($user_id, $this->link);
			/* STOP insert update delete view access */
			$this->data['sub_header'] = "master";
			$this->data['content_header'] = "grup alumni";
			// logo header
			$this->data['ic_logo'] = $this->settings->get_logo_header();
			$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
			//end page header
			$this->data['level_user'] = $this->settings->level_user();
			$this->data['parent_data'] = $this->settings->get_all();
			//content view
			$this->data['content'] = $this->load->view('ad-min/content/v_group_alumni', $this->data, true);
			//end content view
			//main content
			$this->load->view('ad-min/main/v_main', $this->data);
			//end main content
		}
	}
	// datatables configuration
	public function data_list() {
		/* START insert update delete view akses */
		$user_id = $this->session->userdata('user_id');
		$data['akses'] = $this->user->get_access($user_id, $this->link); //get access for menu content settings
		/* STOP insert update delete view akses */
		$edit = $data['akses'][0]['update'];
		$delete = $data['akses'][0]['delete'];
		$list = $this->settings->get_alumni_group();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $group) {
			$no++;
			$row = array();
			$row[] = $group->name;
			if ($edit == 1) {
				$edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_group(' . "'" . $group->id . "'" . ')"><i class="ti-pencil-alt"></i></button>';
			} else {
				$edit_row = '';
			}
			if ($delete == 1) {
				$delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_group(' . "'" . $group->id . "'" . ')"><i class="ti-trash"></i></button>';
			} else {
				$delete_row = '';
			}
			$row[] = $edit_row . ' ' . $delete_row;
			$data[] = $row;
		}
		$output = array("draw" => $_POST['draw'], "recordsTotal" => $this->settings->count_all_group(), "recordsFiltered" => $this->settings->count_filtered_group(), "data" => $data,);
		echo json_encode($output);
	}
	//edit data function
	public function edit($id) {
		$data = $this->settings->get_group_alumni_id($id);
		echo json_encode($data);
	}
	//insert data function
	public function add() {
		$this->_validate('add');
		$data = array('name' => $this->input->post('name'), 'date_created' => date('Y-m-d'), 'user_created' => $this->session->userdata('user_id'));
		$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-save', 'link' => 'menu', 'activity' => 'Add group alumni', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
		$insert = $this->settings->save_group_alumni($data);
		echo json_encode(array("status" => TRUE));
		$this->logactivity->insertlog($data_log);
	}
	//update data function
	public function update() {
		$this->_validate('update');
		$data = array('name' => $this->input->post('name'), 'date_modified' => date('Y-m-d'), 'user_modified' => $this->session->userdata('user_id'));
		$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-pencil-alt', 'link' => 'menu', 'activity' => 'Edit group alumni', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
		$this->settings->update_group_alumni(array('id' => $this->input->post('id')), $data);
		$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}
	//delete function
	public function delete($id) {
		$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'menu', 'activity' => 'Delete group alumni', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
		$this->settings->delete_group_alumni($id);
		$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}
	//validate field form save
	private function _validate($con) {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('id') > 0) {
			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$query = $this->db->query("SELECT * FROM alumni_groups WHERE id =".$id." LIMIT 1");
			$data['temporer'] = $query->result_array();
			if ($data['temporer'][0]['name'] == $name){
				$this->form_validation->set_rules('name', 'nama group', 'required|trim');
			} else {
				$this->form_validation->set_rules('name', 'nama group', 'required|trim|is_unique[alumni_groups.name]');
			}
		} else {
			$this->form_validation->set_rules('name', 'nama group', 'required|trim|is_unique[alumni_groups.name]');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->run();
		if (form_error('name') != '') {
			$data['inputerror'][] = 'name';
			$data['error_string'][] = form_error('name');
			$data['status'] = FALSE;
		}
		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
}
/* end of file Alumni.php */
/* location: system/application/controllers/ */
