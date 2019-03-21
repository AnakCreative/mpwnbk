<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Informasi extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/informasi';
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
            return show_error('You must be an administrator to view this page.');
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
            $this->data['content_header'] = "informasi kontak kami";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['level_user'] = $this->settings->level_user();
            $this->data['parent_data'] = $this->settings->get_all();
            $this->data['information'] = $this->settings->get_setting_information();
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_information', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function information_save() {
        if ($this->input->is_ajax_request()) {

            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $result_arr['information'] = $new_value;
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['information'] = $new_value;
            $result_arr['information'] = $new_value;
            $this->settings->update_information_information(array('id' => $id), $data);
            
        }
        
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_information', 'class' => 'ti-plus', 'activity' => 'updating information', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        
        $this->logactivity->insertlog($data_log);

        echo json_encode($result_arr);
    }
    public function address_save() {
        if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $result_arr['address'] = $new_value;
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['address'] = $new_value;
            $result_arr['address'] = $new_value;
            $this->settings->update_address_information(array('id' => $id), $data);
        }
        
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_information', 'class' => 'ti-plus', 'activity' => 'updating information', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        
        $this->logactivity->insertlog($data_log);

        echo json_encode($result_arr);
    }
    public function phone_save() {
        if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $result_arr['phone'] = $new_value;
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['phone_number'] = $new_value;
            $result_arr['phone_number'] = $new_value;
            $this->settings->update_phone_information(array('id' => $id), $data);
        }
        
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_information', 'class' => 'ti-plus', 'activity' => 'updating information', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        
        $this->logactivity->insertlog($data_log);

        echo json_encode($result_arr);
    }
    public function email_save() {
        if ($this->input->is_ajax_request()) {
            $value = $this->input->get_post('value') ? $this->input->get_post('value') : '';
            $new_value = trim($value);
            $result_arr['email'] = $new_value;
            $id = $this->input->get_post('pk') ? $this->input->get_post('pk') : '';
            $data['email_address'] = $new_value;
            $result_arr['email_address'] = $new_value;
            $this->settings->update_email_information(array('id' => $id), $data);
        }
        
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_information', 'class' => 'ti-plus', 'activity' => 'updating information', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
        
        $this->logactivity->insertlog($data_log);

        echo json_encode($result_arr);
    }
}
/* end of file Informasi.php */
/* location: system/application/controllers/ */