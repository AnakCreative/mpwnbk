<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Angkatan extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/angkatan';
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
            //start sidebar menu
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            $this->data['sub_header'] = "alumni";
            $this->data['content_header'] = "angkatan";
            // logo header
            $this->data['title_site'] = $this->settings->get_title_site();
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
              $config['base_url'] = base_url().'mp-admin/angkatan?';   //url yang muncul ketika tombol pada paging diklik
              $config['total_rows'] = $this->settings->count_angkatan_array(); // jlh total article
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

              $this->data['pagination']=$this->pagination->create_links();

              $this->data['jlhpage']=$page;
              // end pagination
              // get article list
              $this->data['angkatan_data'] = $this->settings->get_angkatan_array($batas,$offset);
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_angkatan', $this->data, true);
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
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            $this->data['sub_header'] = "alumni";
            $this->data['content_header'] = $this->uri->segment(2);
            // logo header
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['parent_data'] = $this->settings->get_all();
            $this->data['title_site'] = $this->settings->get_title_site();
          // -- pagination settings -- \\
          $key= $this->input->get('key'); //method get key
          $page=$this->input->get('per_page');  //method get per_page

          $search=array(
              'a.angkatan'=> $key,
              'a.firstname'=> $key,
              'a.lastname'=> $key,
              'a.email'=> $key,
              'a.website'=> $key,
              'a.phone_number'=> $key,
			  'a.biography'=> $key
          ); //array pencarian yang akan dibawa ke model

          $batas=10; //jlh data yang ditampilkan per halaman
          if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
             $offset = 0;
          else:
             $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
          endif;

          $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
          $config['base_url'] = base_url().'mp-admin/angkatan?key='.$key;   //url yang muncul ketika tombol pada paging diklik
          $config['total_rows'] = $this->settings->count_angkatan_array_search($search); // jlh total barang
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

		  $this->data['total_rows'] = $this->settings->count_angkatan_array_search($search);
		  $this->data['search'] = $key;
          $this->data['angkatan_data'] = $this->settings->get_angkatan_array($batas,$offset,$search);
          // pagination
          $this->data['pagination'] = $this->pagination->create_links();
          //end pagination --//
		  //content view
		  $this->data['content'] = $this->load->view('ad-min/content/v_angkatan_search', $this->data, true);
		  //end content view
		  //main content
		  $this->load->view('ad-min/main/v_main', $this->data);
		  //end main content
        }
	}
    public function edit($id) {
      $data = $this->settings->get_id_angkatan($id);
      echo json_encode($data);
    }
    public function add() {

      $this->validate_add();	// validasi file

      if(empty($_FILES['file_image']['name'])) {
            $firstname = count($this->input->post('firstname'));
            for($i = 0; $i < $firstname; $i++) {
                $data = array (
                 'img' => "",
                 'date_created' => date("Y-m-d"),
                 'firstname' => $_POST['firstname'][$i],
                 'lastname' => $_POST['lastname'][$i],
                 'phone_number' => $_POST['phone'][$i],
                 'email' => $_POST['email'][$i],
                 'biography' => $_POST['biography'][$i],
                    'group' => $_POST['group'][$i],
                 'angkatan' => $_POST['angkatan'][$i],
                 'user_created' => $this->session->userdata('user_id'),
                 'website' => $_POST['website'][$i]
                );
                $insert = $this->settings->save_angkatan($data);
            }
            $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_angkatan', 'class' => 'ti-plus', 'activity' => 'adding angkatan', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
            $this->logactivity->insertlog($data_log);

        echo json_encode(array("status" => TRUE));

        } else {
        // cek berapa file yang akan di upload;
		$number_of_files = sizeof($_FILES['file_image']['name']);
		$firstname = count($this->input->post('firstname'));
        $files = $_FILES['file_image'];
		$errors = array();
        if(isset($_FILES['file_image'])){
             for($i = 0; $i < $firstname; $i++) {

             $this->image_path = realpath(APPPATH.'../image/alumni');
             $this->image_path_url = base_url().'image/alumni';
                $config = array(
                    'allowed_types' => 'jpg|gif|GIF|jpeg|png|JPG|JPEG|PNG',
                    'upload_path' 	=> $this->image_path,
                    'encrypt_name' 	=> TRUE
                );
                if(!empty($files['name'][$i])) {
                    $_FILES['file_image']['name'] 		= $files['name'][$i];
                    $_FILES['file_image']['type'] 		= $files['type'][$i];
                    $_FILES['file_image']['tmp_name'] 	= $files['tmp_name'][$i];
                    $_FILES['file_image']['error'] 		= $files['error'][$i];
                    $_FILES['file_image']['size'] 		= $files['size'][$i];
                        $this->load->library('upload');
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('file_image')) {
                            $upload_data = $this->upload->data();

                            $image_config["image_library"] = "gd2";
                            $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
                            $image_config['create_thumb'] = FALSE;
                            $image_config['maintain_ratio'] = TRUE;
                            $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
                            $image_config['quality'] = "100%";
                            $image_config['width'] = 940;
                            $image_config['height'] = 480;
                            $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                            $image_config['master_dim'] = ($dim > 0)? "height" : "width";
                            $this->load->library('image_lib');
                            $this->image_lib->initialize($image_config);
                            $this->image_lib->resize();

                            $data = array (
                             'img' => $upload_data["file_name"],
                             'date_created' => date("Y-m-d"),
                             'firstname' => $_POST['firstname'][$i],
                             'lastname' => $_POST['lastname'][$i],
                             'phone_number' => $_POST['phone'][$i],
                                'group' => $_POST['group'][$i],
                             'email' => $_POST['email'][$i],
                             'biography' => $_POST['biography'][$i],
                             'angkatan' => $_POST['angkatan'][$i],
                             'user_created' => $this->session->userdata('user_id'),
                             'website' => $_POST['website'][$i]
                            );
                        } else {
                            $data['upload_errors'][$i] = $this->upload->display_errors();
                        }

                    } else {
                        $data = array (
                         'img' => "",
                         'date_created' => date("Y-m-d"),
                         'firstname' => $_POST['firstname'][$i],
                         'lastname' => $_POST['lastname'][$i],
                         'phone_number' => $_POST['phone'][$i],
                         'email' => $_POST['email'][$i],
                            'group' => $_POST['group'][$i],
                         'biography' => $_POST['biography'][$i],
                         'angkatan' => $_POST['angkatan'][$i],
                         'user_created' => $this->session->userdata('user_id'),
                         'website' => $_POST['website'][$i]
                        );
                    }
                $insert = $this->settings->save_angkatan($data);
                }
            }
            $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_angkatan', 'class' => 'ti-plus', 'activity' => 'adding angkatan', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
            $this->logactivity->insertlog($data_log);

            echo json_encode(array("status" => TRUE));
        }

    }
    public function update() {
      $this->validate_edit();
      $data = $this->data_save('update');
      $update = $this->settings->update_angkatan(array('id' => $this->input->post('id')), $data);
      $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_angkatan', 'class' => 'ti-plus', 'activity' => 'update angkatan', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
      $this->logactivity->insertlog($data_log);
      echo json_encode(array("status" => TRUE));
    }
    public function delete($id) {
      $data = array('active' => 0, 'date_deleted' => date('Y-m-d'), 'user_deleted' => $this->session->userdata('user_id'));
      $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_angkatan', 'class' => 'ti-trash', 'activity' => 'delete angkatan', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

      $this->image_path = realpath(APPPATH . '../image/alumni');

      if ($this->settings->check_angkatan_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_angkatan_img($id))) unlink($this->image_path . '/' . $this->settings->check_angkatan_img($id));

      $this->settings->delete_angkatan($id);

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

         $this->image_path = realpath(APPPATH . '../image/alumni');
         $this->image_path_url = base_url() . 'image/alumni';

         if(!empty($this->input->post('id'))) {
            if ($this->settings->check_angkatan_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_angkatan_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_angkatan_img($this->input->post('id')));
         }

         $config = array('allowed_types' => 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG', 'upload_path' => $this->image_path, 'overwrite' => TRUE, 'encrypt_name' => TRUE);

         $this->load->library('upload', $config);
         $this->upload->do_upload('file_image');
         // resize image
         $upload_data = $this->upload->data();
         $image_config["image_library"] = "gd2";
         $image_config["source_image"] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['create_thumb'] = TRUE;
         $image_config['maintain_ratio'] = FALSE;
         $image_config['new_image'] = $this->image_path . '/' . $upload_data['file_name'];
         $image_config['quality'] = "100%";
         $image_config['width'] = 320;
         $image_config['height'] = 640;
         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         $this->image_lib->clear();
     }

     if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }

     if ($image!=='') {
         $data = array (
             'img' => $image,
             $field_date => $date,
             'firstname' => $this->input->post('firstname'),
             'lastname' => $this->input->post('lastname'),
             'group' => $this->input->post('group'),
             'phone_number' => $this->input->post('phone'),
             'email' => $this->input->post('email'),
             'biography' => $this->input->post('biography'),
             'angkatan' => $this->input->post('angkatan'),
             $field_user => $user_id,
             'website' => $this->input->post('website')
         );
     } else {
        $data = array (
             //'img' => "",
             $field_date => $date,
             'firstname' => $this->input->post('firstname'),
             'lastname' => $this->input->post('lastname'),
            'group' => $this->input->post('group'),
             'phone_number' => $this->input->post('phone'),
             'email' => $this->input->post('email'),
             'biography' => $this->input->post('biography'),
             'angkatan' => $this->input->post('angkatan'),
             $field_user => $user_id,
             'website' => $this->input->post('website')
         );
     }
     return $data;
    }

    public function generate_thumb($filename) {
    // if path is not given use default path //
      $this->image_path = realpath(APPPATH . '../image/alumni');
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
    public function validate_add(){
      $data = array();
      $data['error_string'] = array();
      $data['error_file'] = array();
      $data['file_id'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

         $firstname = $this->input->post('firstname');
         if(!empty($firstname))
            {
                foreach($firstname as $id => $value)
                {
                    $this->form_validation->set_rules('firstname['.$id.']', 'nama depan', 'trim|required');
                    $this->form_validation->set_rules('lastname['.$id.']', 'nama belakang', 'trim|required');
                    $this->form_validation->set_rules('angkatan['.$id.']', 'angkatan ke', 'trim|required');
                    $this->form_validation->set_rules('group['.$id.']', 'group', 'trim|required');
                    $this->form_validation->set_rules('biography['.$id.']', 'deskripsi tentang alumni', 'trim|required');
                    $this->form_validation->set_rules('file_image['.$id.']', 'berkas gambar', 'trim|callback_file_selected|callback_file_check');
                    //if (empty($_FILES['file_image'][$id]['name'])) {
                        //$this->form_validation->set_rules('file_image['.$id.']', 'berkas gambar', 'required');
                    //}
                    $this->form_validation->set_rules('phone['.$id.']', 'no telp/handphone', 'trim');
                    $this->form_validation->set_rules('email['.$id.']', 'email', 'trim|is_unique[alumni.email]');
                    $this->form_validation->set_rules('website['.$id.']', 'link url', 'trim|callback_unique_url|prep_url');
                }
            }

         $this->form_validation->set_error_delimiters('', '');
		 $this->form_validation->run();

         $loop = $this->input->post('firstname');
         if(!empty($loop))
            {
                foreach($loop as $id => $value)
                {
                    if(form_error('firstname['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'firstname['.$id.']';
                        $data['error_id'][] = 'firstname_'.$id.'';
                        $string = form_error('firstname['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('lastname['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'lastname['.$id.']';
                        $data['error_id'][] = 'lastname_'.$id.'';
                        $string = form_error('lastname['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('angkatan['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'angkatan['.$id.']';
                        $data['error_id'][] = 'angkatan_'.$id.'';
                        $string = form_error('angkatan['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('group['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'group['.$id.']';
                        $data['error_id'][] = 'group'.$id.'';
                        $string = form_error('group['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('phone['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'phone['.$id.']';
                        $data['error_id'][] = 'phone_'.$id.'';
                        $string = form_error('phone['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('biography['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'biography['.$id.']';
                        $data['error_id'][] = 'biography_'.$id.'';
                        $string = form_error('biography['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('email['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'email['.$id.']';
                        $data['error_id'][] = 'email_'.$id.'';
                        $string = form_error('email['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('website['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'website['.$id.']';
                        $data['error_id'][] = 'website_'.$id.'';
                        $string = form_error('website['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    $allowed =  array('png','jpg','jpeg','PNG','JPG','JPEG');
                    if (isset($_FILES['file_image'][$id])){
                        $new = $_FILES['file_image'][$id]['name'];
                        $ext = pathinfo($new, PATHINFO_EXTENSION);
                        if(!in_array($ext,$allowed) ) {
                            $data['inputerror'][] = 'file_image['.$id.']';
                            $data['error_id'][] = 'file_image_'.$id.'';
                            $data['file_id'][] = 'file_'.$id.'';
                            $string = 'Type File PNG JPG JPEG';
                            $result = str_replace(array('</p>', '<p>'),'',$string);
                            $data['error_string'][] = $result;
                            $data['error_file'][] = $result;
                            $data['status'] = FALSE;
                        }
                    }
                    if ((form_error('file_image['.$id.']') !== '')) {
                        $data['inputerror'][] = 'file_image['.$id.']';
                        $data['error_id'][] = 'file_image_'.$id.'';
                        $data['file_id'][] = 'file_'.$id.'';
                        $string = form_error('file_image['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['error_file'][] = $result;
                        $data['status'] = FALSE;
                    }
                }
            }

        if($data['status'] === FALSE){
            echo json_encode($data);
            exit();
		}
    }
    public function validate_edit() {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      $this->form_validation->set_rules('firstname', 'nama depan', 'required|trim');
      $this->form_validation->set_rules('lastname', 'nama belakang', 'required|trim');
      $this->form_validation->set_rules('website', 'link website', 'trim');
      $this->form_validation->set_rules('phone', 'link website', 'trim');
      $this->form_validation->set_rules('group', 'group', 'trim|required');
      $this->form_validation->set_rules('angkatan', 'angkatan ke', 'required|trim');
      $this->form_validation->set_rules('biography', 'biography', 'required|trim');
      $this->form_validation->set_rules('email', 'email', 'trim');

      $this->form_validation->run();

      if ((form_error('firstname') !== '')) {
          $data['inputerror'][] = 'firstname';
          $string = form_error('firstname');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
        if ((form_error('group') !== '')) {
            $data['inputerror'][] = 'group';
            $string = form_error('group');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['status'] = FALSE;
        }
      if ((form_error('lastname') !== '')) {
          $data['inputerror'][] = 'lastname';
          $string = form_error('lastname');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ((form_error('website') !== '')) {
          $data['inputerror'][] = 'website';
          $string = form_error('website');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ((form_error('phone') !== '')) {
          $data['inputerror'][] = 'phone';
          $string = form_error('phone');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ((form_error('angkatan') !== '')) {
          $data['inputerror'][] = 'angkatan';
          $string = form_error('angkatan');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ((form_error('biography') !== '')) {
          $data['inputerror'][] = 'biography';
          $string = form_error('biography');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ((form_error('email') !== '')) {
          $data['inputerror'][] = 'email';
          $string = form_error('email');
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
                $data['error_file'][] = $result;
                $data['status'] = FALSE;
            }
        }
        if ((form_error('file_image') !== '')) {
            $data['inputerror'][] = 'file_image';
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
    public function unique_url($key) {
        return $this->settings->validate_link_website_angkatan($key);
    }
    public function file_selected() {
        $this->form_validation->set_message('file_selected', 'foto diharuskan.');
        if (empty($_FILES['file_image']['name'])) {
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function file_check($str){
     $allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
     $mime = $_FILES['file_image']['type'];
        foreach($mime as $value) {
            if(isset($_FILES['file_image']['type']) && $_FILES['file_image']['type']!="") {
                if(in_array($value, $allowed_mime_type_arr)){
                    return TRUE;
                }else{
                    $this->form_validation->set_message('file_check', 'tipe file diharuskan gif/jpg/png file.');
                    return FALSE;
                }
            } else {
                $this->form_validation->set_message('file_check', 'foto diharuskan.');
                return FALSE;
            }
        }
    }
}
/* end of file Angkatan.php */
/* location: system/application/controllers/ */