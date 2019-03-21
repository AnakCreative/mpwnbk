<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/banner';
    public function __construct() {
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
    public function index() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('mp-admin/alpha/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('you must be an administrator to view this page.');
        } else {
            $this->data['title_site'] = $this->settings->get_title_site();
            $user_id = $this->session->userdata('user_id');
            //start sidebar menu
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            // logo header
            $this->data['sub_header'] = "pengaturan";
            $this->data['content_header'] = "halaman home slider";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            //end page header
            $this->data['level_user'] = $this->settings->level_user();
            $this->data['parent_data'] = $this->settings->get_all();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            $this->data['page_slider_data'] = $this->settings->get_setting_page_slider();
            //-- slider page --//
            $this->data['slide_artikel'] = $this->settings->get_num_artikelslide();
            $this->data['slide_acara'] = $this->settings->get_num_acaraslide();
            $this->data['slide_info'] = $this->settings->get_num_infoslide();
            $this->data['slide_foto'] = $this->settings->get_num_fotoslide();
            $this->data['slide_video'] = $this->settings->get_num_videoslide();
            $this->data['slide_angkatan'] = $this->settings->get_num_angkatanslide();
            $this->data['slide_kontak'] = $this->settings->get_num_kontakslide();
            //-- slider page --//
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_pageheader', $this->data, true);
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
        $list = $this->settings->get_datatables_page();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $slider) {
            $no++;
            $row = array();
            $row[] = $slider->heading;
            if($slider->header_img!="") {
                $row[] = '<img width="40%" src="'.base_url() . "image/header/" . $slider->header_img.'"/>';
            } else {
                $row[] = '<img width="40%" src="'.base_url() . "image/header/".'"/>';
            }
            if ($edit == 1) {
                $edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_page_slide(' . "'" . $slider->id . "'" . ')"><i class="ti-pencil-alt"></i></button>';
                // $edit_row = '';
            } else {
                $edit_row = '';
            }
            if ($delete == 1) {
                $delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_slider_page(' . "'" . $slider->id . "'" . ')"><i class="ti-trash"></i></button>';
            } else {
                $delete_row = '';
            }
            $row[] = $edit_row . ' ' . $delete_row;
            $data[] = $row;
        }
        $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->settings->count_all_page(), "recordsFiltered" => $this->settings->count_filtered_page(), "data" => $data,);
        echo json_encode($output);
    }
    function edit($id){
        $data = $this->settings->get_id_page_slide($id);
        echo json_encode($data);
    }
    function update() {
        $this->validate('update'); // validasi file
        $data = $this->data_save('update');
        $insert = $this->settings->update_slidepage(array('id' => $this->input->post('id')), $data);
            $data_log = array(
                'user_id' => $this->session->userdata('user_id'),
                'user_name' => $this->session->userdata('first_name'),
                'link' => 'page slide',
                'class' => 'ti-plus',
                'activity' => 'adding page slider',
                "ip" => $this->session->userdata('ip'),
                "countries_sess" => $this->session->userdata('countries_sess')
            );
            $this->logactivity->insertlog($data_log);
        echo json_encode(array(
            "status" => TRUE
        ));
    }
    function data_save($type) {
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
		if (empty($_FILES['file_image'])) {

		} else {

			$this->image_path = realpath(APPPATH . '../image/posting');
			$this->image_path_url = base_url() . 'image/posting';

			if(!empty($this->input->post('id'))) {
                $this->image_path = realpath(APPPATH . '../image/header');
                
                $id=$this->input->post('id');

                if ($this->settings->check_pageslide_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_pageslide_img($id))) unlink($this->image_path . '/' . $this->settings->check_pageslide_img($id));

			}

			$config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

			$this->load->library('upload', $config);
            $this->upload->do_upload('file_image');
            if(!$this->upload->do_upload('file_image')){
                $error = $this->upload->display_errors();
                $errstr['file_image'] = $error;
                echo json_encode(array(
                    "status" => FALSE,
                    "message" => $errstr['file_image']
                ));
                exit();
            } else {
                // resize image
                $upload_data = $this->upload->data();
                $image_config["image_library"] = "gd2";
                $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
                $image_config['create_thumb'] = FALSE;
                $image_config['maintain_ratio'] = TRUE;
                $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
                $image_config['quality'] = "100%";
                $image_config['width'] = 1920;
                $image_config['height'] = 480;

                $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                $image_config['master_dim'] = ($dim > 0)? "height" : "width";

                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();
                $this->image_lib->clear();
            }
		}

        if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
        
		if ($image!=='') {
			$data = array(
                'heading' => $this->input->post('heading'), 
                'header_img'=> $image, 
                'subheading' => $this->input->post('subheading'), 
                $field_user => $user_id, 
                $field_date => $date);
		} else {
			$data = array(
                'heading' => $this->input->post('heading'), 
                'subheading' => $this->input->post('subheading'), 
                $field_user => $user_id, 
                $field_date => $date);
		}
		return $data;
    }
    private function validate($val)
    {
        $data                 = array();
        $data['error_string'] = array();
        $data['inputerror']   = array();
        $data['status']       = TRUE;

        if ($val == "add") {
            $this->form_validation->set_rules('heading', 'heading', 'required|trim');
            $this->form_validation->set_rules('subheading', 'subheading', 'required|trim');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_selected');
        } else {
            $this->form_validation->set_rules('heading', 'heading', 'required|trim');
            $this->form_validation->set_rules('subheading', 'subheading', 'required|trim');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim');
        }

        $this->form_validation->run();

        if ((form_error('heading') !== '')) {
            $data['inputerror'][]   = 'heading';
            $string                 = form_error('heading');
            $result                 = str_replace(array(
                '</p>',
                '<p>'
            ), '', $string);
            $data['error_string'][] = $result;
            $data['status']         = FALSE;
        }
        if ((form_error('subheading') !== '')) {
            $data['inputerror'][]   = 'subheading';
            $string                 = form_error('subheading');
            $result                 = str_replace(array(
                '</p>',
                '<p>'
            ), '', $string);
            $data['error_string'][] = $result;
            $data['status']         = FALSE;
        }
        $allowed = array(
            'gif',
            'png',
            'jpg',
            'jpeg',
            'GIF',
            'PNG',
            'JPG',
            'JPEG'
        );
        if (isset($_FILES['file_image'])) {
            $new = $_FILES['file_image']['name'];
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $data['inputerror'][]   = 'file_image';
                $string                 = 'Type File PNG JPG JPEG';
                $result                 = str_replace(array(
                    '</p>',
                    '<p>'
                ), '', $string);
                $data['error_string'][] = $result;
                $data['status']         = FALSE;
            }
        }
        if ((form_error('file_image') !== '')) {
            $data['inputerror'][]   = 'file_image';
            $string                 = form_error('file_image');
            $result                 = str_replace(array(
                '</p>',
                '<p>'
            ), '', $string);
            $data['error_string'][] = $result;
            $data['status']         = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
    function process_upload_file() {

         $this->image_path = realpath(APPPATH . '../image/header');
         $this->image_path_url = base_url() . 'image/header';

         $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

         $this->load->library('upload', $config);
         $this->upload->do_upload('file');
         // resize image
         $upload_data = $this->upload->data();
         $image_config["image_library"] = "gd2";
         $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['create_thumb'] = FALSE;
         $image_config['maintain_ratio'] = TRUE;
         $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['quality'] = "100%";
         $image_config['width'] = 1920;
         $image_config['height'] = 480;

         // $image_config['x_axis'] = '0';
         // $image_config['y_axis'] = '0';

         $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
         $image_config['master_dim'] = ($dim > 0)? "height" : "width";

         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         // $this->image_lib->crop();
         $this->image_lib->clear();

         $token = $this->input->post('token');
         $heading = $this->input->post('heading');
         $subheading = $this->input->post('subheading');
         $file_name = $upload_data['file_name'];

         $this->db->insert('slider_image',array('header_img'=> $file_name, 'token'=> $token, 'heading'=> $heading, 'subheading' => $subheading));
    }
    //untuk menghapus gambar
	function remove_slide_picture(){
		//ambil token gambar
		$token = $this->input->post('token');

		$foto = $this->db->get_where('slider_image',array('token'=>$token));

		if($foto->num_rows()>0){
			$query = $foto->row();
			$file = $query->header_img;
			if(file_exists($file = FCPATH.'/image/header/'.$file)){
				unlink($file);
			}
			$this->db->delete('slider_image',array('token'=>$token));

		}
		echo "{}";
	}
    //delete function
    public function delete($id) {
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'c_pageslide', 'activity' => 'Delete slider header', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));

        $this->image_path = realpath(APPPATH . '../image/header');

        if ($this->settings->check_pageslide_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_pageslide_img($id))) unlink($this->image_path . '/' . $this->settings->check_pageslide_img($id));

        $this->settings->delete_slider_page($id);
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }
}
/* end of file Banner.php */
/* location: system/application/controllers/ */
