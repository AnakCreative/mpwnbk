<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ProfileSite extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/profilesite';
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
            $this->data['content_header'] = "profil website";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['profile_website'] = $this->settings->get_profilesite();
            $this->data['profile_website_poma'] = $this->settings->check_profilesite_poma();
            $this->data['profile_website_ksrpd'] = $this->settings->check_profilesite_ksrpd();
            $this->data['profile_website_visi'] = $this->settings->check_profilesite_visi();
            $this->data['profile_website_misi'] = $this->settings->check_profilesite_misi();
            $this->data['profile_website_about'] = $this->settings->check_profilesite_about();
            //end page header
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_profilewebsite', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function edit($id) {
      $data = $this->settings->get_id_profilewebsite($id);
      echo json_encode($data);
    }
    public function add() {
      $this->validate();
      $data = $this->data_save('add');
      if ($this->form_validation->run() == TRUE) {
          $insert = $this->settings->save_profilewebsite($data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_article', 'class' => 'ti-plus', 'activity' => 'adding profilewebsite', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);
      }
      echo json_encode(array("status" => TRUE));
    }
    public function update() {
      $this->validate();
      $data = $this->data_save('update');
      if ($this->form_validation->run() == TRUE) {
          $insert = $this->settings->update_profilewebsite(array('id' => $this->input->post('id')), $data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_article', 'class' => 'ti-plus', 'activity' => 'updating profilewebsite', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);
      }
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

      $date = date("Y-m-d h:i:s");

      /* --- images config --- */
     if (empty($_FILES['file_image'])) {

     } else {

         $this->image_path = realpath(APPPATH . '../image/profile');
         $this->image_path_url = base_url() . 'image/profile';

         if(!empty($this->input->post('id'))) {
            if ($this->settings->check_profilesite_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_profilesite_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_profilesite_img($this->input->post('id')));
         }

         $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

         $this->load->library('upload', $config);
         $this->upload->do_upload('file_image');
         // resize image
         $upload_data = $this->upload->data();
         $image_config["image_library"] = "gd2";
         $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['create_thumb'] = FALSE;
         $image_config['maintain_ratio'] = FALSE;
         $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['quality'] = "100%";
         $image_config['width'] = 740;
         $image_config['height'] = 420;
         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         $this->image_lib->clear();
     }

     if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
     if ($image!=='') {
         $data = array('description' => $this->input->post('text'), 'picture' => $image, 'flag' => $this->input->post('type'), $field_user => $user_id, $field_date => $date);
     } else {
        $data = array('description' => $this->input->post('text'), 'flag' => $this->input->post('type'), $field_user => $user_id, $field_date => $date);
     }
      return $data;
    }

    public function validate() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      $this->form_validation->set_rules('text', 'konten', 'required|trim');
      $this->form_validation->set_rules('type', 'kategori konten', 'required|trim|callback_flag_type');
      //$this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_selected|callback_file_size');
      $this->form_validation->set_rules('file_image', 'file gambar', 'trim');

      if ($this->input->post('id') > 0) {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $query = $this->db->query("SELECT * FROM company_profile WHERE id =".$id." LIMIT 1");
          $data['temporer'] = $query->result_array();
      if ($data['temporer'][0]['flag'] == $type){
          $this->form_validation->set_rules('type', 'kategori konten', 'required|trim');
      } else {
          $this->form_validation->set_rules('type', 'kategori konten', 'required|trim|is_unique[company_profile.flag]');
      }
      } else {
          $this->form_validation->set_rules('type', 'kategori konten', 'required|trim|is_unique[company_profile.flag]');
      }

      $this->form_validation->run();

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
       if ($_FILES['file_image']['size'] < 2000) {
            return FALSE;
        }else{
            return TRUE;
        }
   }
   public function file_selected() {
        $this->form_validation->set_message('file_selected', 'gambar diharuskan.');
        if (empty($_FILES['file_image']['name'])) {
            return FALSE;
        }else{
            return TRUE;
        }
    }
   public function flag_type($title) {
      return $this->settings->type_profilesite_clause($title);
   }

}
/* end of file ProfileSite.php */
/* location: system/application/controllers/ */