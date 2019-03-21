<?php defined('BASEPATH') OR exit('No direct script access allowed');
class PhotoActivities extends CI_Controller
{
    var $data;
    var $user_id;
    var $link = 'mp-admin/PhotoActivities';

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
            $this->data['content_header'] = "foto aktifitas alumni";
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['alumni'] = $this->settings->get_alumni();
            //end page header
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_activityphoto', $this->data, true);
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
        $list = $this->settings->get_photoactivity_group();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $photo) {
            $no++;
            $row = array();
            if($photo->picture!="") {
                $row[] = '<img width="40%" src="'.base_url() . "image/event/" . $photo->picture.'"/>';
            } else {
                $row[] = '<img width="40%" src="'.base_url() . "image/event/".'"/>';
            }
            $row[] = $this->settings->get_alumni_name($photo->alumni_id);
            $row[] = $photo->title;
            $row[] = $this->settings->get_user_admin($photo->user_created);
            $row[] = $photo->date_created;

            if ($edit == 1) {
                $edit_row = '<button class="btn btn-outline btn-primary" type="button" href="javascript:void()" title="edit" onclick="bttn_editing_photo_activity(' . "'" . $photo->id . "'" . ')"><i class="ti-pencil-alt"></i></button>';
            } else {
                $edit_row = '';
            }
            if ($delete == 1) {
                $delete_row = '<button class="btn btn-outline btn-danger" type="button"  href="javascript:void()" title="delete" onclick="bttn_delete_photo_activity(' . "'" . $photo->id . "'" . ')"><i class="ti-trash"></i></button>';
            } else {
                $delete_row = '';
            }
            $row[] = $edit_row . ' ' . $delete_row;
            $data[] = $row;
        }
        $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->settings->count_all_photo_activity(), "recordsFiltered" => $this->settings->count_filtered_photo_activity(), "data" => $data,);
        echo json_encode($output);
    }
    //edit data function
    public function edit($id) {
        $data = $this->settings->get_id_photo_activity($id);
        echo json_encode($data);
    }
    //insert data function
    public function add() {
        $this->_validate('add');
        $data = $this->data_save('add');
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-save', 'link' => 'menu', 'activity' => 'Add photo activity', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $insert = $this->settings->save_photo_activity($data);
        echo json_encode(array("status" => TRUE));
        $this->logactivity->insertlog($data_log);
    }
    //update data function
    public function update() {
        $this->_validate('update');
        $data = $this->data_save('update');
        $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'class' => 'ti-pencil-alt', 'link' => 'menu', 'activity' => 'Edit photo activity', "ip" => $this->session->userdata('ip_address'), "countries_sess" => $this->session->userdata('countries_sess'));
        $this->settings->update_photo_activity(array('id' => $this->input->post('id')), $data);
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
        if (empty($_FILES['file_image'])) {

        } else {

            $this->image_path = realpath(APPPATH . '../image/event');
            $this->image_path_url = base_url() . 'image/event';

            if(!empty($this->input->post('id'))) {
                if ($this->settings->check_photo_activity_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_photo_activity_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_photo_activity_img($this->input->post('id')));
                /* if ($this->settings->check_background_img_thumb($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_background_img_thumb($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_background_img_thumb($this->input->post('id'))); */
            }

            $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

            $this->load->library('upload', $config);
            $this->upload->do_upload('file_image');
            // resize image
            $upload_data = $this->upload->data();
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
            $image_config['create_thumb'] = FALSE;
            $image_config['maintain_ratio'] = TRUE;
            $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
            $image_config['quality'] = "100%";
            $image_config['width'] = 980;
            $image_config['height'] = 480;

            $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
            $image_config['master_dim'] = ($dim > 0)? "height" : "width";

            $this->load->library('image_lib');
            $this->image_lib->initialize($image_config);
            $this->image_lib->resize();
            $this->image_lib->clear();
        }

        if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
        if ($image!=='') {
            $data = array('alumni_id' => $this->input->post('alumni_id'), 'title' => $this->input->post('title'), /*'thumb_file' => $this->generate_thumb($image)*/ 'picture'=> $image, $field_user => $user_id, $field_date => $date);
        } else {
            $data = array('alumni_id' => $this->input->post('alumni_id'), 'title' => $this->input->post('title'), $field_user => $user_id, $field_date => $date);
        }
        return $data;
    }

    public function generate_thumb($filename) {
        // if path is not given use default path //
        $this->image_path = realpath(APPPATH . '../image/event');
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

        if ($this->settings->check_photo_activity_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_photo_activity_img($id))) unlink($this->image_path . '/' . $this->settings->check_photo_activity_img($id));

        $this->settings->delete_photo_activity($id);
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
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_selected|callback_file_size');

        } else {

            $this->form_validation->set_rules('title', 'judul', 'required|trim');
            $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_size');

        }


        $this->form_validation->run();

        if ((form_error('title') !== '')) {
            $data['inputerror'][] = 'title';
            $string = form_error('title');
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
            if ($_FILES['file_image']['size'] > 33304645) {
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

/* end of file PhotoActivites.php */
/* location: system/application/controllers/ */
