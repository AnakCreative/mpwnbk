<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Konsentrasi extends CI_Controller
{
    var $data;
    var $user_id;
    var $link = 'mp-admin/konsentrasi';

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
            $this->data['sub_header'] = "konten";
            $this->data['content_header'] = "konsentrasi";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            //end page header
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_konsentrasi', $this->data, true);
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
        $list = $this->settings->get_konsentrasi_group();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $konsentrasi) {
            $no++;
            $row = array();
            $row[] = $konsentrasi->title;
            $row[] = (strlen(strip_tags($konsentrasi->description)) > 120) ? substr(strip_tags($konsentrasi->description),0,120).' . . . ' : $konsentrasi->description;
            $row[] = $konsentrasi->flag;
            $row[] = $this->settings->get_user_admin($konsentrasi->user_created);
            $row[] = $konsentrasi->date_created;

            if ($edit == 1) {
                $edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_konsentrasi(' . "'" . $konsentrasi->id . "'" . ')"><i class="ti-pencil-alt"></i></button>';
            } else {
                $edit_row = '';
            }
            if ($delete == 1) {
                $delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_konsentrasi(' . "'" . $konsentrasi->id . "'" . ')"><i class="ti-trash"></i></button>';
            } else {
                $delete_row = '';
            }
            $row[] = $edit_row . ' ' . $delete_row;
            $data[] = $row;
        }
        $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->settings->count_all_konsentrasi(), "recordsFiltered" => $this->settings->count_filtered_konsentrasi(), "data" => $data,);
        echo json_encode($output);
    }
    //edit data function
    public function edit($id) {
        $data = $this->settings->get_id_konsentrasi($id);
        echo json_encode($data);
    }
    //insert data function
    public function add() {
        $this->_validate('add');
        $data = $this->data_save('add');
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-save', 'link' => 'menu', 'activity' => 'Add konsentrasi', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $insert = $this->settings->save_konsentrasi($data);
        echo json_encode(array("status" => TRUE));
        $this->logactivity->insertlog($data_log);
    }
    //update data function
    public function update() {
        $this->_validate('update');
        $data = $this->data_save('update');
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-pencil-alt', 'link' => 'menu', 'activity' => 'Edit konsentrasi', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->settings->update_konsentrasi(array('id' => $this->input->post('id')), $data);
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


        $data = array('flag' => $this->input->post('type'), 'title' => $this->input->post('title'), 'description' => $this->input->post('text'), $field_user => $user_id, $field_date => $date);


        return $data;
    }

    //delete function
    public function delete($id) {
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'menu', 'activity' => 'Delete konsentrasi', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->settings->delete_konsentrasi($id);
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate($val){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($val=="add") {

            $this->form_validation->set_rules('title', 'judul', 'required|trim');
            $this->form_validation->set_rules('text', 'deskripsi', 'required|trim');
            $this->form_validation->set_rules('type', 'tipe', 'required|trim');
            // $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_selected|callback_file_size');

        } else {

            $this->form_validation->set_rules('title', 'judul', 'required|trim');
            $this->form_validation->set_rules('text', 'deskripsi', 'required|trim');
            $this->form_validation->set_rules('type', 'tipe', 'required|trim');
            // $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_size');

        }


        if ($this->input->post('id') > 0) {
            $id = $this->input->post('id');
            $type = $this->input->post('type');
            $query = $this->db->query("SELECT * FROM konsentrasi WHERE id =".$id." LIMIT 1");
            $data['temporer'] = $query->result_array();
            if ($data['temporer'][0]['flag'] == $type){
                $this->form_validation->set_rules('type', 'tipe', 'required|trim');
            } else {
                $this->form_validation->set_rules('type', 'tipe', 'required|trim|is_unique[konsentrasi.flag]');
            }
        } else {
            $this->form_validation->set_rules('type', 'tipe', 'required|trim|is_unique[konsentrasi.flag]');
        }

        $this->form_validation->run();

        if ((form_error('title') !== '')) {
            $data['inputerror'][] = 'title';
            $string = form_error('title');
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

        if ((form_error('type') !== '')) {
            $data['inputerror'][] = 'type';
            $string = form_error('type');
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

/* end of file Konsentrasi.php */
/* location: system/application/controllers/ */