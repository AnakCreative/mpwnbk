<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends CI_Controller {
	var $data;
	var $user_id;
	var $link = 'mp-admin/article';
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->load->helper(array('url', 'language','openssl_class'));
		//models connection back-end
		$this->load->model('ad-min/M_settings', 'settings');
		$this->load->model('ad-min/M_logactivity', 'logactivity');
		$this->load->model('ad-min/M_menu', 'menu');
		$this->load->model('ad-min/M_user', 'user');
		//end models connection back-end
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	// redirect if needed, otherwise display the menu list
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
			$this->data['content_header'] = "posting";
			// logo header
			$this->data['ic_logo'] = $this->settings->get_logo_header();
			$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
			//end page header
			$this->data['parent_data'] = $this->settings->get_all();
			//content view
			$this->data['content'] = $this->load->view('ad-min/content/v_posting', $this->data, true);
			//end content view
			//main content
			$this->load->view('ad-min/main/v_main', $this->data);
			//end main content
		}
	}
	public function article() {
		if (!$this->input->is_ajax_request()) show_404();
		// -- start -- //
		$data = array();
		//-- setup datatables --//
		$start = $this->input->post('start');
		$length = $this->input->post('length');

		$orderby = $this->input->post('order[0][column]');
		$ordertype = $this->input->post('order[0][dir]');

		$search = $this->input->post('search[value]');
		//-- end --//

		/* START insert update delete view akses */
		$user_id = $this->session->userdata('user_id');
		$akses['akses'] = $this->user->get_access($user_id, $this->link); //get access for menu content settings
		/* STOP insert update delete view akses */

		$edit = $akses['akses'][0]['update'];
		$delete = $akses['akses'][0]['delete'];

		$value = $this->settings->fetchArticle($start, $length, $orderby, $ordertype, $search);
		// -- datatables --//

		foreach ($value['data'] as $key) {
			$start ++;
			$row = array();
			$row[] = $start;

			$row[] = $key['title'];
			$row[] = $key['meta_tag_title'];
			$row[] = $key['meta_tag_keywords'];
			$row[] = $key['meta_tag_description'];
//			$row[] = $key['username'];
			$row[] = $key['date_created'];
			$row[] = $key['type'];

			if ($edit == 1) {
				$edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_posting(' . "'" . encrypt_decrypt('encrypt', $key['id']) . "'" . ')"><i class="ti-pencil-alt"></i></button>';
			} else {
				$edit_row = '';
			}
			if ($delete == 1) {
				$delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_posting(' . "'" . encrypt_decrypt('encrypt', $key['id']) . "'" . ')"><i class="ti-trash"></i></button>';
			} else {
				$delete_row = '';
			}
			$row[] = $edit_row . ' ' . $delete_row;
			$data[] = $row;
		}

		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $value['total_all'],
			"recordsFiltered" => $value['total_filter'],
			"data" => $data,
		);
		echo json_encode($output, JSON_PRETTY_PRINT);
		// -- end of datatables --//
	}
	public function edit() {
		$id = $this->input->post('id');
		$data = $this->settings->get_id_posting(encrypt_decrypt('decrypt', $id));
		echo json_encode($data);
	}
	public function add() {
		$this->validate('add');
		$data = $this->data_save('add');
		$insert = $this->settings->save_posting($data);
			$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'post', 'class' => 'ti-plus', 'activity' => 'adding posting', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
			$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}
	public function update() {

		// print_r($_FILES['file_image']['size']);die;

		$this->validate('update');
		$data = $this->data_save('update');
		$insert = $this->settings->update_posting(array('id' => encrypt_decrypt('decrypt', $this->input->post('id'))), $data);
			$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'post', 'class' => 'ti-plus', 'activity' => 'adding posting', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
			$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}
	public function delete($id) {
		$data = array('active' => 0, 'date_deleted' => date('Y-m-d'), 'user_deleted' => $this->session->userdata('id'));
		$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'post', 'class' => 'ti-trash', 'activity' => 'delete posting', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

		$this->image_path = realpath(APPPATH . '../image/posting');

		if ($this->settings->check_posting_img(encrypt_decrypt('decrypt', $id)) != '' && file_exists($this->image_path . '/' . $this->settings->check_posting_img(encrypt_decrypt('decrypt', $id)))) unlink($this->image_path . '/' . $this->settings->check_posting_img(encrypt_decrypt('decrypt', $id)));

		if ($this->settings->check_posting_img_thumb(encrypt_decrypt('decrypt', $id)) != '' && file_exists($this->image_path . '/' . $this->settings->check_posting_img_thumb(encrypt_decrypt('decrypt', $id)))) unlink($this->image_path . '/' . $this->settings->check_posting_img_thumb(encrypt_decrypt('decrypt', $id)));

		$this->settings->delete_posting(encrypt_decrypt('decrypt', $id));

		$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}

	function ajax_resize_file() {
        if (!$this->input->is_ajax_request()) show_404();
        require_once(APPPATH.'libraries/class.fileuploader.php');

        $file_ = $this->input->post('_file');
        $fileuploader_ = $this->input->post('fileuploader');
        $editor_ = $this->input->post('_editor');

        if (isset($fileuploader_) && isset($file_) && isset($editor_)) {
            $file = set_realpath('image/posting/').$file_;
            
            if (is_file($file)) {
                $editor = json_decode($editor_, true);

                Fileuploader::resize($file, null, null, null, (isset($editor['crop']) ? $editor['crop'] : null), 100, (isset($editor['rotation']) ? $editor['rotation'] : null));
            }
        }
    }

    function remove__file() {
        // call to upload the files
		// unlink the files
		// !important only for preloaded files
		// you will need to give the array with appendend files in 'files' option of the FileUploader
		$postFile = $this->input->post('file');
        if (isset($postFile)) {
            $file = set_realpath('image/posting/') . str_replace(array('/', '\\'), '', $postFile);
            
            if(file_exists($file))
                unlink($file);
        }
    }

	public function data_save($type) {
		$user_id = $this->session->userdata('user_id');
		if ($type == 'add') {
			$field_user = 'user_created';
			$field_date = 'date_created';
		} else {
			$field_user = 'user_modified';
			$field_date = 'date_modified';
		}
		$date = date("Y-m-d");

		//library file uploader
		require_once(APPPATH.'libraries/class.fileuploader.php');
        // initialize FileUploader
        
        $isAfterEditing = false;
        $uploader_file = $this->input->post('fileuploader');
        $editor__ = $this->input->post('_editorr');

        // if after editing
        if (isset($uploader_file) && isset($editor__)) {
            $isAfterEditing = true;
        }
        
        // initialize FileUploader
        $FileUploader = new FileUploader('file_image', array(
            'limit' => null,
            'maxSize' => null,
            'fileMaxSize' => 1,
            'extensions' => null,
            'required' => false,
            'uploadDir' => set_realpath('image/posting/'),
            'title' => 'name',
            'replace' => $isAfterEditing,
            'editor' => array(
                'maxWidth' => 1280,
                'maxHeight' => 720,
                'crop' => false,
                'quality' => 90
            ),
            'listInput' => true,
            'files' => null
        ));
	
		// call to upload the files
		$data = $FileUploader->upload();

		// if uploaded and success
		if($data['isSuccess'] && count($data['files']) > 0) {
			// get uploaded files
			$uploadedFiles = $data['files'];
		}
		// if warnings
		if($data['hasWarnings']) {
			// get warnings
			$warnings = $data['warnings'];
            echo json_encode(array("status" => FALSE, "message" => $warnings));
			exit;
		}

		// get the fileList
		$fileList = $FileUploader->getFileList();

		$this->image_path = realpath(APPPATH . '../image/posting');
		$this->image_path_url = base_url() . 'image/posting';

		if(!empty(encrypt_decrypt('decrypt', $this->input->post('id')))) {
			if ($this->settings->check_posting_img(encrypt_decrypt('decrypt', $this->input->post('id'))) != '' && file_exists($this->image_path . '/' . $this->settings->check_posting_img(encrypt_decrypt('decrypt', $this->input->post('id'))))) unlink($this->image_path . '/' . $this->settings->check_posting_img(encrypt_decrypt('decrypt', $this->input->post('id'))));
			if ($this->settings->check_posting_img_thumb(encrypt_decrypt('decrypt', $this->input->post('id'))) != '' && file_exists($this->image_path . '/' . $this->settings->check_posting_img_thumb(encrypt_decrypt('decrypt', $this->input->post('id'))))) unlink($this->image_path . '/' . $this->settings->check_posting_img_thumb(encrypt_decrypt('decrypt', $this->input->post('id'))));
		}

		if (empty($fileList)) { 
			$data = array('type' => $this->input->post('type'), 'title' => $this->input->post('title'), 'text' => $this->input->post('text'), 'meta_tag_title' => $this->input->post('meta_tag_title'), 'meta_tag_keywords' => $this->input->post('meta_tag_keywords'), 'meta_tag_description'=> $this->input->post('meta_tag_description'), $field_user => $user_id, $field_date => $date);
		} else { 
			$data = array('type' => $this->input->post('type'), 'thumb_file' => $fileList[0]['name'], 'img'=> $fileList[0]['name'], 'title' => $this->input->post('title'), 'text' => $this->input->post('text'), 'meta_tag_title' => $this->input->post('meta_tag_title'), 'meta_tag_keywords' => $this->input->post('meta_tag_keywords'), 'meta_tag_description'=> $this->input->post('meta_tag_description'), $field_user => $user_id, $field_date => $date); 
		}
		return $data;
	}

	public function generate_thumb($filename) {
		// if path is not given use default path //
		$this->image_path = realpath(APPPATH . '../image/posting');
		$config_thumb['image_library'] = 'gd2';
		$config_thumb['source_image'] = $this->image_path . '/' . $filename;
		$config_thumb['create_thumb'] = TRUE;
		$config_thumb['maintain_ratio'] = FALSE;
		$config_thumb['quality'] = "100%";
		$config_thumb['width'] = 370;
		$config_thumb['height'] = 350;

		$this->load->library('image_lib');
		$this->image_lib->initialize($config_thumb);


		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
			return FALSE;
		}
		$this->image_lib->clear();
		// get file extension //
		preg_match('/(?<extension>\.\w+)$/im', $filename, $matches);
		$extension = $matches['extension'];
		// thumbnail //
		$thumbnail = preg_replace('/(\.\w+)$/im', '', $filename) . '_thumb' . $extension;
		return $thumbnail;
	}

	public function validate($val) {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($val=="add") {
			$this->form_validation->set_rules('title', 'judul', 'required|trim|callback_title_posting');
			$this->form_validation->set_rules('text', 'konten', 'required|trim');
			$this->form_validation->set_rules('type', 'kategori konten', 'required|trim');
			$this->form_validation->set_rules('fileuploader-list-file_image', 'image file', 'trim|required');
		} else {
			$this->form_validation->set_rules('title', 'judul', 'required|trim');
			$this->form_validation->set_rules('text', 'konten', 'required|trim');
			$this->form_validation->set_rules('type', 'kategori konten', 'required|trim');
			$this->form_validation->set_rules('fileuploader-list-file_image', 'image file', 'trim');
		}

		$this->form_validation->run();

		if ((form_error('title') !== '')) {
			$data['inputerror'][] = 'title';
			$string = form_error('title');
			$result = str_replace(array('</p>', '<p>'), '', $string);
			$data['error_string'][] = $result;
			$data['status'] = FALSE;
		}
		if ((form_error('type') !== '')) {
			$data['inputerror'][] = 'type';
			$string = form_error('type');
			$result = str_replace(array('</p>', '<p>'), '', $string);
			$data['error_string'][] = $result;
			$data['status'] = FALSE;
		}
		if ((form_error('text') !== '')) {
			$data['inputerror'][] = 'text';
			$string = form_error('text');
			$result = str_replace(array('</p>', '<p>'), '', $string);
			$data['error_string'][] = $result;
			$data['status'] = FALSE;
		}
		if ((form_error('fileuploader-list-files') !== '')) {
            $data['inputerror'][] = 'fileuploader-list-files';
            $data['error_id'][] = 'fileuploader-list-files';
            $string = form_error('fileuploader-list-files');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['status'] = FALSE;
        }
		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
	public function file_size() {
//        print_r($_FILES['file_image']['size']);die;
		if(!empty($_FILES['file_image']['name'])){
			$this->form_validation->set_message('file_size', 'ukuran gambar terlalu besar maximal 3mb.');
			if ($_FILES['file_image']['size'] < 4334645) {
				return TRUE;
			}else{
				return false;
			}
		} else {
			$this->form_validation->set_message('file_size', 'gambar tidak boleh kosong.');
			return FALSE;
		}
	}
	public function file_selected() {
		$this->form_validation->set_message('file_selected', 'gambar tidak boleh kosong.');
		if (empty($_FILES['file_image']['name'])) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function title_posting($title) {
		$type = $this->input->post('type');
		return $this->settings->title_posting_clause($title,$type);
	}
}
/* end of file Article.php */
/* location: system/application/controllers/ */
