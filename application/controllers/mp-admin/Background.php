<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Background extends CI_Controller
{
    var $data;
    var $user_id;
    var $link = 'mp-admin/background';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
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
    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('mp-admin/app/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('you must be an administrator to view this page.');
        } else {
            $user_id = $this->session->userdata('user_id');

            $this->data['title_site'] = $this->settings->get_title_site();
            //start sidebar menu
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            // logo header
            $this->data['sub_header'] = "pengaturan";
            $this->data['content_header'] = "gambar background";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            //end page header
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_background', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function data_list()
    {
        /* START insert update delete view akses */
        $user_id = $this->session->userdata('user_id');
        $data['akses'] = $this->user->get_access($user_id, $this->link); //get access for menu content settings
        /* STOP insert update delete view akses */
        $edit = $data['akses'][0]['update'];
        $delete = $data['akses'][0]['delete'];
        $list = $this->settings->get_background_group();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $background) {
            $no++;
            $row = array();
            if($background->image!="") {
                $row[] = '<img width="40%" src="'.base_url() . "image/background/" . $background->image.'"/>';
            } else {
                $row[] = '<img width="40%" src="'.base_url() . "image/background/".'"/>';
            }
            $row[] = $background->page;
            $row[] = $this->settings->get_user_admin($background->user_created);
            $row[] = $background->date_created;

            if ($edit == 1) {
                $edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_background(' . "'" . $background->id . "'" . ')"><i class="ti-pencil-alt"></i></button>';
            } else {
                $edit_row = '';
            }
            if ($delete == 1) {
                $delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_background(' . "'" . $background->id . "'" . ')"><i class="ti-trash"></i></button>';
            } else {
                $delete_row = '';
            }
            $row[] = $edit_row . ' ' . $delete_row;
            $data[] = $row;
        }
        $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->settings->count_all_background(), "recordsFiltered" => $this->settings->count_filtered_background(), "data" => $data,);
        echo json_encode($output);
    }
    //edit data function
    public function edit($id) {
        $data = $this->settings->get_id_background($id);
        echo json_encode($data);
    }
    //insert data function
    public function add() {
        $this->_validate('add');
        $data = $this->data_save('add');
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-save', 'link' => 'menu', 'activity' => 'Add background', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $insert = $this->settings->save_background($data);
        echo json_encode(array("status" => TRUE));
        $this->logactivity->insertlog($data_log);
    }
    //update data function
    public function update() {
        $this->_validate('update');
        $data = $this->data_save('update');
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-pencil-alt', 'link' => 'menu', 'activity' => 'Edit background', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->settings->update_background(array('id' => $this->input->post('id')), $data);
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
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

        /* --- images config --- */
		$this->image_path = realpath(APPPATH . '../image/background');
		$this->image_path_url = base_url() . 'image/background';

		$config['upload_path']          = $this->image_path;
        $config['encrypt_name']         = TRUE;
		$config['overwrite']            = TRUE;
		$config['allowed_types']        = 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG';
		$config['max_size']             = 1000;
		$config['max_width']            = 1980;
		$config['max_height']           = 1840;

        $this->load->library('upload');
        $this->upload->initialize($config);

		if ( ! $this->upload->do_upload('file_image'))
		{
			echo json_encode(array('status' => FALSE, 'message' => $this->upload->display_errors()));
			exit();
		}
		else
		{
			if(!empty($this->input->post('id'))) {
				if ($this->settings->check_background_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_background_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_background_img($this->input->post('id')));
			}

			$file_upload = array('upload_data' => $this->upload->data());
			if (empty($file_upload['upload_data']['file_name'])){
				$image = '';
			} else {
				$image = $file_upload['upload_data']['file_name'];
			}

			if ($image!=='') {
				$data = array(
                    'page' => $this->input->post('type'), 
                    'image'=> $image, 
                    $field_user => $user_id, 
                    $field_date => $date
                );
			} else {
				$data = array(
                    'page' => $this->input->post('type'), 
                    $field_user => $user_id, 
                    $field_date => $date
                );
			}
            
			return $data;
		}
    }

    public function generate_thumb($filename) {
        // if path is not given use default path //
        $this->image_path = realpath(APPPATH . '../image/background');
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

    //delete function
    public function delete($id) {
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'direksi', 'activity' => 'Delete background', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));

        $this->image_path = realpath(APPPATH . '../image/background');

        if ($this->settings->check_background_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_background_img($id))) unlink($this->image_path . '/' . $this->settings->check_background_img($id));

        $this->settings->delete_background($id);
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate($val){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($val=="add") {

            $this->form_validation->set_rules('type', 'halaman', 'required|trim');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_selected');

        } else {

            $this->form_validation->set_rules('type', 'halaman', 'required|trim');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim');

        }


        if ($this->input->post('id') > 0) {
            $id = $this->input->post('id');
            $type = $this->input->post('type');
            $query = $this->db->query("SELECT * FROM background_site WHERE id =".$id." LIMIT 1");
            $data['temporer'] = $query->result_array();
            if ($data['temporer'][0]['page'] == $type){
                $this->form_validation->set_rules('type', 'halaman', 'required|trim');
            } else {
                $this->form_validation->set_rules('type', 'halaman', 'required|trim|is_unique[background_site.page]');
            }
        } else {
            $this->form_validation->set_rules('type', 'halaman', 'required|trim|is_unique[background_site.page]');
        }

        $this->form_validation->run();

        if ((form_error('type') !== '')) {
            $data['inputerror'][] = 'type';
            $string = form_error('type');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['status'] = FALSE;
        }

        $allowed = array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG');
        if (isset($_FILES['file_image'])) {
            $new = $_FILES['file_image']['name'];
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $data['inputerror'][] = 'file_image';
                $string = 'Type File PNG JPG JPEG';
                $result = str_replace(array('</p>', '<p>'), '', $string);
                $data['error_string'][] = $result;
                $data['status'] = FALSE;
            }
        }
        if ((form_error('file_image') !== '')) {
            $data['inputerror'][] = 'file_image';
            $string = form_error('file_image');
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
        $this->form_validation->set_message('file_size', 'ukuran gambar terlalu besar maximal 2mb.');
        if(!empty($_FILES['file_image']['name'])){
            if ($_FILES['file_image']['size'] < 262144) {
                return FALSE;
            }else{
                return TRUE;
            }
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
}

/* end of file Background.php */
/* location: system/application/controllers/ */
