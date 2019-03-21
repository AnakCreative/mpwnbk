<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ConfigSite extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/ConfigSite';
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
            $this->data['content_header'] = "configurasi informasi";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            //end page header
            $this->data['level_user'] = $this->settings->level_user();
            $this->data['parent_data'] = $this->settings->get_all();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            $this->data['meta_data'] = $this->settings->get_meta_data();
            $this->data['logo_data'] = $this->settings->get_logo_data();
            $this->data['location'] = $this->settings->get_location_data();
            $this->data['slider_video'] = $this->settings->slider_video_data();
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_configsite', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function latitude_save() {
      if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['latitude'] = $new_value;
            $result_arr['latitude'] = $new_value;
            $this->settings->update_latitude(array('id' => $id), $data);
        }

        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating latitude', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->logactivity->insertlog($data_log);
        echo json_encode($result_arr);
    }
    public function longitude_save() {
      if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['longitude'] = $new_value;
            $result_arr['longitude'] = $new_value;
            $this->settings->update_longitude(array('id' => $id), $data);
        }

        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating longtitude', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->logactivity->insertlog($data_log);
        echo json_encode($result_arr);
    }
    public function logo_title_save() {
        if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['logo_title'] = $new_value;
            $result_arr['title'] = $new_value;
            $this->settings->update_logo_title(array('id' => $id), $data);
        }

        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating meta tag title', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->logactivity->insertlog($data_log);
        echo json_encode($result_arr);
    }
    public function logo_subtitle_save() {
      if ($this->input->is_ajax_request()) {
          $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
          $new_value = trim($value);
          $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
          $data['logo_subtitle'] = $new_value;
          $result_arr['title'] = $new_value;
          $this->settings->update_sublogo_title(array('id' => $id), $data);
      }

      $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating meta tag title', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
      $this->logactivity->insertlog($data_log);
      echo json_encode($result_arr);
    }
    public function video_banner_save() {
      if ($this->input->is_ajax_request()) {
          $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
          $new_value = trim($value);
          $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
          $data['url'] = $new_value;
          $result_arr['url'] = $new_value;
          $this->settings->update_slider_video(array('id' => $id), $data);
      }

      $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating meta tag title', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
      $this->logactivity->insertlog($data_log);
      echo json_encode($result_arr);
    }
    //-- logo website --//
    public function meta_tag_title_save() {
        if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['meta_tag_title'] = $new_value;
            $result_arr['title'] = $new_value;
            $this->settings->update_meta_tag_title(array('id' => $id), $data);
        }

        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating meta tag title', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->logactivity->insertlog($data_log);
        echo json_encode($result_arr);
    }
    public function meta_tag_keywords_save() {
      $this->validate();
      $data = $this->data_save('update');
      if ($this->form_validation->run() == TRUE) {
          $insert = $this->settings->update_meta_tag_keywords(array('id' => $this->input->post('id')), $data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating meta tag keywords', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);
      }
      echo json_encode(array("status" => TRUE));
    }
    public function meta_tag_descprtion_save() {
        if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['meta_tag_description'] = $new_value;
            $result_arr['description'] = $new_value;
            $this->settings->update_meta_tag_description(array('id' => $id), $data);
        }

        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating meta tag description', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

        $this->logactivity->insertlog($data_log);
        echo json_encode($result_arr);
    }
    public function save_logo_website() {
      $this->validate_logo();
      $data = $this->data_save_logo('update');
      //if ($this->form_validation->run() == TRUE) {
          $insert = $this->settings->update_logo_website(array('id' => $this->input->post('id')), $data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating logo website', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);
      //}
      echo json_encode(array("status" => TRUE));
    }
    public function save_favicon_website() {
      $this->validate_favicon();
      $data = $this->data_save_favicon('update');
      //if ($this->form_validation->run() == TRUE) {
          $insert = $this->settings->update_logo_website(array('id' => $this->input->post('id')), $data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-plus', 'activity' => 'updating favicon website', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);
      //}
      echo json_encode(array("status" => TRUE));
    }
    public function data_save_logo($type) {
      $user_id = $this->session->userdata('user_id');
      if ($type == 'add') {
          $field_user = 'user_created';
          $field_date = 'date_created';
      } else {
          $field_user = 'user_modified';
          $field_date = 'date_modified';
      }
      $date = date("Y-m-d");
     //--// data save for logo //--//
     /*// --- images config --- //*/
     if (empty($_FILES['logo_picture'])) {

     } else {

         $this->image_path = realpath(APPPATH . '../image/logo');
         $this->image_path_url = base_url() . 'image/logo';

         if(!empty($this->input->post('id'))) {
            if ($this->settings->check_logo_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_logo_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_logo_img($this->input->post('id')));
         }

         $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

         $this->load->library('upload', $config);
         $this->upload->do_upload('logo_picture');
         // resize image
         $upload_data = $this->upload->data();
         $image_config["image_library"] = "gd2";
         $image_config["source_image"] = $this->image_path .'/'. $upload_data['file_name'];
         $image_config['create_thumb'] = FALSE;
         $image_config['maintain_ratio'] = TRUE;
         $image_config['new_image'] = $this->image_path .'/'. $upload_data['file_name'];
         $image_config['quality'] = "100%";
         $image_config['width'] = 400;
         $image_config['height'] = 400;
         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         $this->image_lib->clear();
     }

     if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
         if ($image!=='') {
             $data = array (
                 'logo_picture' => $image,
                 $field_date => $date,
                 $field_user => $user_id
             );
         } else {
            $data = array (
                 $field_date => $date,
                 $field_user => $user_id
             );
         }
      //-- end function saving logo --//
      return $data;
    }
    public function data_save_favicon($type) {
      $user_id = $this->session->userdata('user_id');
      if ($type == 'add') {
          $field_user = 'user_created';
          $field_date = 'date_created';
      } else {
          $field_user = 'user_modified';
          $field_date = 'date_modified';
      }
      $date = date("Y-m-d");
      //-- data save for logo --//

      /* --- images config --- */
     if (empty($_FILES['favicon_picture'])) {

     } else {

         $this->image_path = realpath(APPPATH . '../image/logo');
         $this->image_path_url = base_url() . 'image/logo';
         if(!empty($this->input->post('id'))) {
            if ($this->settings->check_favicon_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_favicon_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_favicon_img($this->input->post('id')));
         }
         $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);
         $this->load->library('upload', $config);
         $this->upload->do_upload('favicon_picture');
         // resize image
         $upload_data = $this->upload->data();
         $image_config["image_library"] = "gd2";
         $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['create_thumb'] = FALSE;
         $image_config['maintain_ratio'] = TRUE;
         $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['quality'] = "100%";
         $image_config['width'] = 48;
         $image_config['height'] = 48;
         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         $this->image_lib->clear();
     }

     if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
         if ($image!=='') {
             $data = array (
                 'favicon_picture' => $image,
                 $field_date => $date,
                 $field_user => $user_id
             );
         } else {
            $data = array (
                 $field_date => $date,
                 $field_user => $user_id
             );
         }
      //-- end function saving logo --//
      return $data;
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
      $data = array('meta_tag_keywords' => $this->input->post('keywords'), $field_user => $user_id, $field_date => $date);
      return $data;
    }
    public function validate() {
      $data = array();
      $data['error_string'] = array();
      $data['error_id'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;
      $this->form_validation->set_rules('keywords', 'kata kunci', 'required|trim');
      $this->form_validation->run();
      if ((form_error('keywords') !== '')) {
          $data['inputerror'][] = 'keywords';
          $data['error_id'][] = 'keywords';
          $string = form_error('keywords');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ($data['status'] === FALSE) {
          echo json_encode($data);
          exit();
      }
    }
    public function validate_logo() {
      $data = array();
      $data['error_string'] = array();
      $data['error_id'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;
      $this->form_validation->set_rules('logo_picture', 'logo website', 'required|trim|callback_file_selected_logo|callback_file_check_logo');

      $this->form_validation->run();

        $allowed = array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG');
        if (isset($_FILES['logo_picture'])) {
            $new = $_FILES['logo_picture']['name'];
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $data['inputerror'][] = 'logo_picture';
                $string = 'Type File PNG JPG JPEG';
                $result = str_replace(array('</p>', '<p>'), '', $string);
                $data['error_string'][] = $result;
                $data['status'] = FALSE;
            }
        }
        if ((form_error('logo_picture') !== '')) {
            $data['inputerror'][] = 'logo_picture';
            $string = form_error('logo_picture');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['status'] = FALSE;
        }
    }
    public function file_selected_logo() {
        $this->form_validation->set_message('file_selected_logo', 'foto diharuskan.');
        if (empty($_FILES['logo_picture']['name'])) {
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function file_check_logo() {
     $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
     $mime = $_FILES['logo_picture']['type'];
        if(isset($_FILES['logo_picture']['type']) && $_FILES['logo_picture']['type']!="") {
            if(in_array($mime, $allowed_mime_type_arr)){
                return TRUE;
            }else{
                $this->form_validation->set_message('file_check_logo', 'tipe file diharuskan gif/jpg/png file.');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('file_check_logo', 'foto diharuskan.');
            return FALSE;
        }
    }
    public function validate_favicon() {
      $data = array();
      $data['error_string'] = array();
      $data['error_id'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;
      $this->form_validation->set_rules('favicon_picture', 'favicon website', 'required|trim|callback_file_selected_favicon|callback_file_check_favicon');
      $this->form_validation->run();

        $allowed = array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG');
        if (isset($_FILES['favicon_picture'])) {
            $new = $_FILES['favicon_picture']['name'];
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $data['inputerror'][] = 'favicon_picture';
                $string = 'Type File PNG JPG JPEG';
                $result = str_replace(array('</p>', '<p>'), '', $string);
                $data['error_string'][] = $result;
                $data['status'] = FALSE;
            }
        }
        if ((form_error('favicon_picture') !== '')) {
            $data['inputerror'][] = 'favicon_picture';
            $string = form_error('favicon_picture');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['status'] = FALSE;
        }
    }
    public function file_selected_favicon() {
        $this->form_validation->set_message('file_selected_favicon', 'foto diharuskan.');
        if (empty($_FILES['favicon_picture']['name'])) {
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function file_check_favicon() {
     $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
     $mime = $_FILES['favicon_picture']['type'];
        if(isset($_FILES['file_check_favicon']['type']) && $_FILES['favicon_picture']['type']!="") {
            if(in_array($mime, $allowed_mime_type_arr)){
                return TRUE;
            }else{
                $this->form_validation->set_message('file_check_favicon', 'tipe file diharuskan gif/jpg/png file.');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('file_check_favicon', 'foto diharuskan.');
            return FALSE;
        }
    }
}
/* end of file ConfigSite.php */
/* location: system/application/controllers/ */
