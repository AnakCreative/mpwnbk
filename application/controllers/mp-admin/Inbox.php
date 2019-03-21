<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Inbox extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/inbox';
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language', 'smtp'));
        //models connection back-end
        $this->load->model('ad-min/M_settings', 'settings');
        $this->load->model('ad-min/M_logactivity', 'logactivity');
        $this->load->model('ad-min/M_menu', 'menu');
        $this->load->model('ad-min/M_user', 'user');
        //helper
        $this->load->helper('highlight'); 
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
            $this->data['title_site'] = $this->settings->get_title_site();
            $user_id = $this->session->userdata('user_id');
            //start sidebar menu
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            // logo header
            $this->data['sub_header'] = "hubungi kami";
            $this->data['content_header'] = "pesan";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['level_user'] = $this->settings->level_user();
            $this->data['parent_data'] = $this->settings->get_all();
            
            if ($this->input->post('keyword')!=''){
                $this->data['message_data'] = $this->settings->pencarian($this->input->post('keyword'));
            } else {
                $this->data['message_data'] = $this->settings->view('contact_us');
            }
            
            if ($this->uri->segment(3)=="") {
                $this->data['detail_message'] = "";
            } else {
                $this->data['detail_message'] = $this->setting->get_message_id($this->uri->segment(3));
            }
            
            //
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_message', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function detail($id) {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('ad-min/c_alpha/login', 'refresh');
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
            $this->data['content_header'] = $this->uri->segment(2);
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['level_user'] = $this->settings->level_user();
            $this->data['parent_data'] = $this->settings->get_all();
            
            if ($this->input->post('keyword')!=''){
                $this->data['message_data'] = $this->settings->pencarian($this->input->post('keyword'));
            } else {
                $this->data['message_data'] = $this->settings->view('contact_us');
            }
            
            if ($id == "") {
                $this->data['sub_header'] = 'pesan masuk';
                $this->data['detail_message'] = "";
            } else {
                $message = $this->settings->get_message_id($id);
                $this->data['sub_header'] = @$message[0]->name;
                $this->data['detail_message'] = $message;
            }
            
            
            $data = array('status' => 0, 'date_modified' => date('Y-m-d'), 'user_modified' => $this->session->userdata('user_id'));
            
            $this->settings->update_read_message(array('id' => $id), $data);
            //
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_message', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function delete_checkbox() {
        $this->validate();
        $dat = $this->input->post('forms');
        for ($i = 0; $i < sizeof($dat); $i++) {
            //print_r($dat[$i]);
            $this->settings->delete_message_data($dat[$i]);
        }
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'c_message', 'activity' => 'Delete message use check box', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }
    public function delete($id) {
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'c_message', 'activity' => 'Delete message by one id', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->settings->delete_message_by_id($id);
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }
    public function replyTo() {
        $this->_message_validate();
        $param = $this->input->post();
        echo json_encode(mailer($param), JSON_PRETTY_PRINT);
    }
    public function validate() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;
        
      $this->form_validation->set_rules('forms[]', 'tidak ada pilihan untuk di hapus', 'required|trim');

      $this->form_validation->run();

      if ((form_error('forms[]') !== '')) {
          $data['inputerror'][] = 'forms[]';
          $string = form_error('forms[]');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }

      if ($data['status'] === FALSE) {
        echo json_encode($data);
        exit();
      }  
   }
   public function _message_validate() {  

      $this->form_validation->set_rules('message', 'message', 'required|trim');
      $this->form_validation->run();

      if ((form_error('message') !== '')) {
          $string = form_error('message');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['message'] = $result;
          $data['status'] = FALSE;
          echo json_encode($data);
          exit();
      }
   }
}
/* end of file Inbox.php */
/* location: system/application/controllers/ */