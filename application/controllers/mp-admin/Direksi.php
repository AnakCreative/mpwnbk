<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Direksi extends CI_Controller
{
    var $data;
    var $user_id;
    var $link = 'mp-admin/direksi';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array(
            'ion_auth',
            'form_validation'
        ));
        $this->load->helper(array(
            'url',
            'language'
        ));
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
            $this->data['title_site']       = $this->settings->get_title_site();
            $user_id                        = $this->session->userdata('user_id');
            //start sidebar menu
            $this->data['menu_data']        = $this->settings->get_menu($user_id);
            $this->data['submenu_data']     = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses']            = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            // logo header
            $this->data['sub_header']       = "pengaturan";
            $this->data['content_header']   = "halaman direksi";
            $this->data['ic_logo']          = $this->settings->get_logo_header();
            //end page header
            $this->data['level_user']       = $this->settings->level_user();
            $this->data['parent_data']      = $this->settings->get_all();
            $this->data['favicon_logo']     = $this->settings->get_favicon_picture();
            $this->data['page_slider_data'] = $this->settings->get_setting_page_slider();
            //content view
            $this->data['content']          = $this->load->view('ad-min/content/v_direksi', $this->data, true);
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
        $list = $this->settings->get_director_group();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $director) {
            $no++;
            $row = array();
            $row[] = $director->name;
            $row[] = (strlen(strip_tags($director->description)) > 80) ? substr(strip_tags($director->description),0,80).' . . . ' : $director->description;
            $row[] = $director->position;
            if($director->picture!="") {
                $row[] = '<img width="30%" src="'.base_url() . "image/profile/" . $director->picture.'"/>';
            } else {
                $row[] = '<img width="30%" src="'.base_url() . "image/profile/".'"/>';
            }
            if ($edit == 1) {
                $edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_direksi(' . "'" . $director->id . "'" . ')"><i class="ti-pencil-alt"></i></button>';
            } else {
                $edit_row = '';
            }
            if ($delete == 1) {
                $delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_direksi(' . "'" . $director->id . "'" . ')"><i class="ti-trash"></i></button>';
            } else {
                $delete_row = '';
            }
            $row[] = $edit_row . ' ' . $delete_row;
            $data[] = $row;
        }
        $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->settings->count_all_director(), "recordsFiltered" => $this->settings->count_filtered_director(), "data" => $data);
        echo json_encode($output);
    }
    public function edit($id) {
      $data = $this->settings->get_id_direksi($id);
      echo json_encode($data);
    }
    public function add()
    {
        $this->validate('add'); // validasi file
        $data = $this->data_save('add');
        if ($this->form_validation->run() == TRUE) {
            $insert = $this->settings->save_direksi($data);

            $data_log = array(
                'user_id' => $this->session->userdata('user_id'),
                'user_name' => $this->session->userdata('first_name'),
                'link' => 'direksi',
                'class' => 'ti-plus',
                'activity' => 'adding direksi',
                "ip" => $this->session->userdata('ip'),
                "countries_sess" => $this->session->userdata('countries_sess')
            );
            $this->logactivity->insertlog($data_log);
        }
        echo json_encode(array(
            "status" => TRUE
        ));
    }
    public function update(){
        $this->validate('update'); // validasi file
        $data = $this->data_save('update');
        if ($this->form_validation->run() == TRUE) {
            $insert = $this->settings->update_direksi(array('id' => $this->input->post('id')), $data);
            $data_log = array(
                'user_id' => $this->session->userdata('user_id'),
                'user_name' => $this->session->userdata('first_name'),
                'link' => 'direksi',
                'class' => 'ti-plus',
                'activity' => 'adding direksi',
                "ip" => $this->session->userdata('ip'),
                "countries_sess" => $this->session->userdata('countries_sess')
            );
            $this->logactivity->insertlog($data_log);
        }
        echo json_encode(array(
            "status" => TRUE
        ));
    }
    public function delete($id) {
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-trash', 'link' => 'direksi', 'activity' => 'Delete director', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));

        $this->image_path = realpath(APPPATH . '../image/profile');

        if ($this->settings->check_director_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_director_img($id))) unlink($this->image_path . '/' . $this->settings->check_director_img($id));

        $this->settings->delete_direksi($id);
        $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }
    public function data_save($val){
        
      if ($val == 'add') {
          $field_user = 'user_created';
          $field_date = 'date_created';
      } else {
          $field_user = 'user_modified';
          $field_date = 'date_modified';
      }
        
      $date = date("Y-m-d");
        
        if (!empty($_FILES['file_image']['tmp_name'])) {
                $this->image_path     = realpath(APPPATH . '../image/profile');
                $this->image_path_url = base_url() . 'image/profile';
                $config               = array(
                    'allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG',
                    'upload_path' => $this->image_path,
                    'overwrite' => TRUE,
                    'encrypt_name' => TRUE
                );
                $this->load->library('upload', $config);
                $this->upload->do_upload('file_image');
                // -- resize image
                $upload_data                    = $this->upload->data();
                $image_config["image_library"]  = "gd2";
                $image_config["source_image"]   = $this->image_path . '/' . $upload_data['file_name'];
                $image_config['create_thumb']   = FALSE;
                $image_config['maintain_ratio'] = TRUE;
                $image_config['new_image']      = $this->image_path . '/' . $upload_data['file_name'];
                $image_config['quality']        = "100%";
                $image_config['width']          = 1920;
                $image_config['height']         = 480;

                // $image_config['x_axis'] = '0';
                // $image_config['y_axis'] = '0';

                $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                
                $image_config['master_dim'] = ($dim > 0) ? "height" : "width";

                $this->load->library('image_lib');
                $this->image_lib->initialize($image_config);
                $this->image_lib->resize();
                // $this->image_lib->crop();
                $this->image_lib->clear();
                $file_image = $upload_data['file_name'];
            } else {
                $file_image = "";
            }

            if($file_image==""){
                $data   = array(
                    'name' => $this->input->post('name'),
                    'url' => $this->input->post('url'),
                    'position' => $this->input->post('position'),
                    'description' => $this->input->post('description'),
                    'user_created' => $this->session->userdata('user_id'),
                    'date_created' => date("Y-m-d")
                );
            } else {
                $data   = array(
                    'picture' => $file_image,
                    'name' => $this->input->post('name'),
                    'url' => $this->input->post('url'),
                    'position' => $this->input->post('position'),
                    'description' => $this->input->post('description'),
                    'user_created' => $this->session->userdata('user_id'),
                    'date_created' => date("Y-m-d")
                );
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
            $this->form_validation->set_rules('name', 'nama', 'required|trim');
            $this->form_validation->set_rules('description', 'deskripsi', 'required|trim');
            $this->form_validation->set_rules('position', 'posisi', 'required|trim');
            $this->form_validation->set_rules('url', 'url', 'required|trim|prep_url|callback_validate_youtube');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_selected');
        } else {
            $this->form_validation->set_rules('name', 'nama', 'required|trim');
            $this->form_validation->set_rules('description', 'deskripsi', 'required|trim');
            $this->form_validation->set_rules('position', 'posisi', 'required|trim');
            $this->form_validation->set_rules('url', 'url', 'required|trim');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim');
        }

        $this->form_validation->run();

        if ((form_error('name') !== '')) {
            $data['inputerror'][]   = 'name';
            $string                 = form_error('name');
            $result                 = str_replace(array(
                '</p>',
                '<p>'
            ), '', $string);
            $data['error_string'][] = $result;
            $data['status']         = FALSE;
        }
        if ((form_error('description') !== '')) {
            $data['inputerror'][]   = 'description';
            $string                 = form_error('description');
            $result                 = str_replace(array(
                '</p>',
                '<p>'
            ), '', $string);
            $data['error_string'][] = $result;
            $data['status']         = FALSE;
        }
        if ((form_error('position') !== '')) {
            $data['inputerror'][]   = 'position';
            $string                 = form_error('position');
            $result                 = str_replace(array(
                '</p>',
                '<p>'
            ), '', $string);
            $data['error_string'][] = $result;
            $data['status']         = FALSE;
        }
        if ((form_error('url') !== '')) {
            $data['inputerror'][]   = 'url';
            $string                 = form_error('url');
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
    
    public function validate_youtube($str)
    {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $str, $matches);
        if (!isset($matches[0])) { //if validation not passed
            $this->form_validation->set_message('validate_youtube', 'youtube link tidak bener periksa kembali');
            return FALSE;
        } else { //if validation passed
            return TRUE;
        }
    }
    public function file_selected()
    {
        $this->form_validation->set_message('file_selected', 'gambar tidak boleh kosong.');
        if (empty($_FILES['file_image']['name'])) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
}
/* end of file Direksi.php */
/* location: system/application/controllers/ */