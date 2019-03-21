<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/advertise';
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
            $this->data['title_site'] = $this->settings->get_title_site();
            $user_id = $this->session->userdata('user_id');
            //start sidebar menu
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            $this->data['sub_header'] = "pengaturan";
            $this->data['content_header'] = "advertise";
            // logo header
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['parent_data'] = $this->settings->get_all();
			 // -- pagination settings -- \\
              $page=$this->input->get('per_page');
              $batas=10; //jlh data yang ditampilkan per halaman
              if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
                 $offset = 0;
              else:
                 $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
              endif;

              $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
              $config['base_url'] = base_url().'ad-min/c_advertise?';   //url yang muncul ketika tombol pada paging diklik
              $config['total_rows'] = $this->settings->count_advertise_array(); // jlh total article
              $config['per_page'] = $batas; //batas sesuai dengan variabel batas
              $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page

              $config['full_tag_open'] = '<ul class="pagination">';
              $config['full_tag_close'] = '</ul>';
              $config['first_link'] = '&laquo; First';
              $config['first_tag_open'] = '<li class="prev page">';
              $config['first_tag_close'] = '</li>';

              $config['last_link'] = 'Last &raquo;';
              $config['last_tag_open'] = '<li class="next page">';
              $config['last_tag_close'] = '</li>';

              $config['next_link'] = 'Next &rarr;';
              $config['next_tag_open'] = '<li class="next page">';
              $config['next_tag_close'] = '</li>';

              $config['prev_link'] = '&larr; Prev';
              $config['prev_tag_open'] = '<li class="prev page">';
              $config['prev_tag_close'] = '</li>';

              $config['cur_tag_open'] = '<li class="current"><a href="">';
              $config['cur_tag_close'] = '</a></li>';

              $config['num_tag_open'] = '<li class="page">';
              $config['num_tag_close'] = '</li>';
              $this->pagination->initialize($config);
            
              $this->data['total_rows'] = "";
		      $this->data['search'] = "";      

              $this->data['pagination']=$this->pagination->create_links();

              $this->data['jlhpage']=$page;
              // end pagination
              // get article list
              $this->data['advertise_data'] = $this->settings->get_advertise_array($batas,$offset);
            
            //print_r($this->data['photo_data']);die;
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_advertise', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function search() {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('ad-min/c_alpha/login', 'refresh');
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
            $this->data['content_header'] = $this->uri->segment(2);
            // logo header
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['parent_data'] = $this->settings->get_all();
            
          // -- pagination settings -- \\
          $key= $this->input->get('key'); //method get key
          $page=$this->input->get('per_page');  //method get per_page

          $search=array(
              'a.title'=> $key
          ); //array pencarian yang akan dibawa ke model

          $batas=10; //jlh data yang ditampilkan per halaman
          if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
             $offset = 0;
          else:
             $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
          endif;

          $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
          $config['base_url'] = base_url().'ad-min/c_advertise/?key='.$key;   //url yang muncul ketika tombol pada paging diklik
          $config['total_rows'] = $this->settings->count_advertise_array_search($search); // jlh total barang
          $config['per_page'] = $batas; //batas sesuai dengan variabel batas

          $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page

          $config['full_tag_open'] = '<ul class="pagination">';
          $config['full_tag_close'] = '</ul>';
          $config['first_link'] = '&laquo; First';
          $config['first_tag_open'] = '<li class="prev page">';
          $config['first_tag_close'] = '</li>';

          $config['last_link'] = 'Last &raquo;';
          $config['last_tag_open'] = '<li class="next page">';
          $config['last_tag_close'] = '</li>';

          $config['next_link'] = 'Next &rarr;';
          $config['next_tag_open'] = '<li class="next page">';
          $config['next_tag_close'] = '</li>';

          $config['prev_link'] = '&larr; Prev';
          $config['prev_tag_open'] = '<li class="prev page">';
          $config['prev_tag_close'] = '</li>';

          $config['cur_tag_open'] = '<li class="current"><a href="">';
          $config['cur_tag_close'] = '</a></li>';

          $config['num_tag_open'] = '<li class="page">';
          $config['num_tag_close'] = '</li>';

          $this->pagination->initialize($config);

          $this->data['jlhpage']=$page;
          // pagination
          
		  $this->data['total_rows'] = $this->settings->count_advertise_array_search($search);
		  $this->data['search'] = $key;
          $this->data['advertise_data'] = $this->settings->get_advertise_array($batas,$offset,$search);
          // pagination
          $this->data['pagination'] = $this->pagination->create_links();
          //end pagination --//
		  //content view
		  $this->data['content'] = $this->load->view('ad-min/content/v_advertise', $this->data, true);
		  //end content view
		  //main content
		  $this->load->view('ad-min/main/v_main', $this->data);
		  //end main content
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
     //--// data save for logo //--//
     /*// --- images config --- //*/
     if (empty($_FILES['file_image'])) {

     } else {

         $this->image_path = realpath(APPPATH . '../image/advertise');
         $this->image_path_url = base_url() . 'image/advertise';

         if(!empty($this->input->post('id'))) {
            if ($this->settings->check_adv_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_adv_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_adv_img($this->input->post('id')));
         }

         $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

         $this->load->library('upload', $config);
         $this->upload->do_upload('file_image');
         // resize image
         $upload_data = $this->upload->data();
         $image_config["image_library"] = "gd2";
         $image_config["source_image"] = $this->image_path .'/'. $upload_data['file_name'];
         $image_config['create_thumb'] = FALSE;
         $image_config['maintain_ratio'] = FALSE;
         $image_config['new_image'] = $this->image_path .'/'. $upload_data['file_name'];
         $image_config['quality'] = "100%";
         $image_config['width'] = 240;
         $image_config['height'] = 80;
         $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
         $image_config['master_dim'] = ($dim > 0)? "height" : "width";
         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         $this->image_lib->clear();
     }

     if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
         if ($image!=='') {
             $data = array (
                 'title' => $this->input->post('title'),
                 'adv_img' => $image,
                 $field_date => $date,
                 $field_user => $user_id
             );  
         } else {
            $data = array (
                 'title' => $this->input->post('title'),    
                 $field_date => $date,
                 $field_user => $user_id
             );  
         }
      //-- end function saving logo --//            
      return $data;
    }
    public function add() {
        $this->validate('add');
        $data = $this->data_save('add');
        $insert = $this->settings->save_advertise($data);
            $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_advertise', 'class' => 'ti-plus', 'activity' => 'adding advertise', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
            $this->logactivity->insertlog($data_log);
        echo json_encode(array("status" => TRUE));
    }
    public function edit($id) {
        $data = $this->settings->get_id_advertise($id);
        echo json_encode($data);
    }
    public function update() {
      $this->validate('update');
      $data = $this->data_save('update');
      $insert = $this->settings->update_advertise(array('id' => $this->input->post('id')), $data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_advertise', 'class' => 'ti-plus', 'activity' => 'updating advertise', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);
      echo json_encode(array("status" => TRUE)); 
    }
    public function delete($id) {
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_advertise', 'class' => 'ti-plus', 'activity' => 'updating advertise', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

          $this->image_path = realpath(APPPATH . '../image/advertise');

          if ($this->settings->check_adv_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_adv_img($id))) unlink($this->image_path . '/' . $this->settings->check_adv_img($id));

          $this->settings->delete_advertise($id);

          $this->logactivity->insertlog($data_log);
          echo json_encode(array("status" => TRUE));
    }
    public function validate($val) {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['file_id'] = array();
      $data['error_file'] = array();
      $data['status'] = TRUE;
        
      if($val=="add") {    
         $this->form_validation->set_rules('title', 'judul', 'required|trim');
         $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_size|callback_file_selected');
      } else {
         $this->form_validation->set_rules('title', 'judul', 'required|trim'); 
         $this->form_validation->set_rules('file_image', 'file gambar', 'trim|callback_file_size'); 
      }

      $this->form_validation->run();

        if ((form_error('title') !== '')) {
          $data['inputerror'][] = 'title';
          $data['error_id'][] = 'title';    
          $string = form_error('title');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
        }
        $allowed =  array('png','jpg','jpeg','PNG','JPG','JPEG');
        if (isset($_FILES['file_image'])){
            $new = $_FILES['file_image']['name'];
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                $data['inputerror'][] = 'file_image';
                $data['error_id'][] = 'file_image';
                $data['file_id'][] = 'file';
                $string = 'Type File PNG JPG JPEG';
                $result = str_replace(array('</p>', '<p>'),'',$string);
                $data['error_string'][] = $result;
                $data['error_file'][] = $result;
                $data['status'] = FALSE;
            }
        } 
        if ((form_error('file_image') !== '')) {
            $data['inputerror'][] = 'file_image';
            $data['error_id'][] = 'file_image';
            $data['file_id'][] = 'file';
            $string = form_error('file_image');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['error_file'][] = $result;
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }   
    }
    public function file_size() {
       $this->form_validation->set_message('file_size', 'ukuran gambar terlalu besar maximal 1mb.');
       if ($_FILES['file_image']['size'] < 1024) {
            return FALSE;
        }else{
            return TRUE;
        }   
   }
   public function file_selected() {  
        $this->form_validation->set_message('file_selected', 'gambar tidak boleh kosong.');
        if (empty($_FILES['file_image']['name'])) {
            return FALSE;
        }else{
            return TRUE;
        }     
    }      
}