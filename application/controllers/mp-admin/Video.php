<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {
    var $data;
    var $user_id;
    var $link = 'mp-admin/video';
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
            $user_id = $this->session->userdata('user_id');
            //start sidebar menu
            $this->data['title_site'] = $this->settings->get_title_site();
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            $this->data['sub_header'] = "kegiatan";
            $this->data['content_header'] = "video";
            // logo header
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['parent_data'] = $this->settings->get_all();


              // -- pagination settings -- \\
              $page=$this->input->get('per_page');
              $batas=5; //jlh data yang ditampilkan per halaman
              if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
                 $offset = 0;
              else:
                 $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
              endif;

              $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
              $config['base_url'] = base_url().'ad-min/c_video?';   //url yang muncul ketika tombol pada paging diklik
              $config['total_rows'] = $this->settings->count_video_array(); // jlh total article
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
              $this->data['video_data'] = $this->settings->get_video_array($batas,$offset);
              //end pagination --//
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_video', $this->data, true);
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
            $this->data['sub_header'] = "kegiatan";
            $this->data['content_header'] = "video";
            // logo header
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['parent_data'] = $this->settings->get_all();

          // -- pagination settings -- \\
          $key= $this->input->get('key'); //method get key
          $page=$this->input->get('per_page');  //method get per_page

          $search=array(
              'a.text'=> $key,
              'a.date_created'=> $key,
			  'a.embed_url'=> $key
          ); //array pencarian yang akan dibawa ke model

          $batas=5; //jlh data yang ditampilkan per halaman
          if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
             $offset = 0;
          else:
             $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
          endif;

          $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
          $config['base_url'] = base_url().'ad-min/c_video/?key='.$key;   //url yang muncul ketika tombol pada paging diklik
          $config['total_rows'] = $this->settings->count_video_array_search($search); // jlh total barang
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

		  $this->data['total_rows'] = $this->settings->count_video_array_search($search);
		  $this->data['search'] = $key;
          $this->data['video_data'] = $this->settings->get_video_array($batas,$offset,$search);
          // pagination
          $this->data['pagination'] = $this->pagination->create_links();
          //end pagination --//
		  //content view
		  $this->data['content'] = $this->load->view('ad-min/content/v_video_search', $this->data, true);
		  //end content view
		  //main content
		  $this->load->view('ad-min/main/v_main', $this->data);
		  //end main content
        }
	}
    public function readmore($id) {
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
          $this->data['sub_header'] = "kegiatan";
            $this->data['content_header'] = "video";
          // logo header
          $this->data['ic_logo'] = $this->settings->get_logo_header();
          $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
          //end page header
          $this->data['parent_data'] = $this->settings->get_all();
          $this->data['video_data'] = $this->settings->readmore_video($id);
          //content view
          $this->data['content'] = $this->load->view('ad-min/content/v_video_detail', $this->data, true);
          //end content view
          //main content
          $this->load->view('ad-min/main/v_main', $this->data);
          //end main content
      }
    }
    public function edit($id) {
      $data = $this->settings->get_id_video($id);
      echo json_encode($data);
    }
    public function add() {

      $this->validate_add();	// validasi file

      if(empty($_FILES['file_image']['tmp_name'])) {
            $title = count($this->input->post('text'));
            for($i = 0; $i < $title; $i++) {
                $data = array (
                 'thumbnail' => "",
                 'date_created' => date("Y-m-d"),
                 'text' => $_POST['text'][$i],
                 'user_created' => $this->session->userdata('user_id'),
                 'embed_url' => $_POST['embed_url'][$i]
                );
                $insert = $this->settings->save_video($data);
            }
            $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_video', 'class' => 'ti-plus', 'activity' => 'adding video', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
            $this->logactivity->insertlog($data_log);

        echo json_encode(array("status" => TRUE));

        } else {
        // cek berapa file yang akan di upload;
		$number_of_files = sizeof($_FILES['file_image']['tmp_name']);
		$title = count($this->input->post('text'));
        $files = $_FILES['file_image'];
		$errors = array();
        if(isset($_FILES['file_image'])){
             for($i = 0; $i < $title; $i++) {
             $this->image_path = realpath(APPPATH.'../image/video');
             $this->image_path_url = base_url().'image/video';
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
                            $data = array (
                             'thumbnail' => $upload_data["file_name"],
                             'date_created' => date("Y-m-d"),
                             'text' => $_POST['text'][$i],
                             'user_created' => $this->session->userdata('user_id'),
                             'embed_url' => $_POST['embed_url'][$i]
                            );
                        } else {
                            $data['upload_errors'][$i] = $this->upload->display_errors();
                        }

                    } else {
                        $data = array (
                         'thumbnail' => "",
                         'date_created' => date("Y-m-d"),
                         'text' => $_POST['text'][$i],
                         'user_created' => $this->session->userdata('user_id'),
                         'embed_url' => $_POST['embed_url'][$i]
                        );
                    }
                $insert = $this->settings->save_video($data);
                }
            }
            $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_video', 'class' => 'ti-plus', 'activity' => 'adding video', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
            $this->logactivity->insertlog($data_log);

            echo json_encode(array("status" => TRUE));
        }

    }
    public function update() {
      $this->validate_edit();
      $data = $this->data_save('update');
      if ($this->form_validation->run() == TRUE) {
          $update = $this->settings->update_video(array('id' => $this->input->post('id')), $data);
          $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_video', 'class' => 'ti-plus', 'activity' => 'update video', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));
          $this->logactivity->insertlog($data_log);

      }
      echo json_encode(array("status" => TRUE));
    }
    public function delete($id) {
      $data = array('active' => 0, 'date_deleted' => date('Y-m-d'), 'user_deleted' => $this->session->userdata('user_id'));
      $data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_video', 'class' => 'ti-trash', 'activity' => 'delete video', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

      $this->image_path = realpath(APPPATH . '../image/video');

      if ($this->settings->check_video_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_video_img($id))) unlink($this->image_path . '/' . $this->settings->check_video_img($id));

      $this->settings->delete_video($id);

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

         $this->image_path = realpath(APPPATH . '../image/video');
         $this->image_path_url = base_url() . 'image/video';

         if(!empty($this->input->post('id'))) {
            if ($this->settings->check_video_img($this->input->post('id')) != '' && file_exists($this->image_path . '/' . $this->settings->check_video_img($this->input->post('id')))) unlink($this->image_path . '/' . $this->settings->check_video_img($this->input->post('id')));
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
         $image_config['width'] = 370;
         $image_config['height'] = 350;
         $this->load->library('image_lib');
         $this->image_lib->initialize($image_config);
         $this->image_lib->resize();
         $this->image_lib->clear();
     }

     if (empty($upload_data['file_name'])){ $image=''; } else { $image = $upload_data['file_name']; }
     if ($image!=='') {
         $data = array('thumbnail' => $this->generate_thumb($image), 'text' => $this->input->post('text_edit'), 'embed_url'=> $this->input->post('embed_url_edit'), $field_user => $user_id, $field_date => $date);
     } else {
        $data = array('text' => $this->input->post('text_edit'), 'embed_url'=> $this->input->post('embed_url_edit'), $field_user => $user_id, $field_date => $date);
     }
     return $data;
    }

    public function generate_thumb($filename) {
    // if path is not given use default path //
      $this->image_path = realpath(APPPATH . '../image/video');
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
      $data['inputerror'] = array();
      $data['status'] = TRUE;

         $title = $this->input->post('text');
         if(!empty($title))
            {
                foreach($title as $id => $value)
                {
                    $this->form_validation->set_rules('text['.$id.']', 'judul', 'trim|required');
                    $this->form_validation->set_rules('embed_url['.$id.']', 'link url', 'trim|required|callback_unique_url|prep_url|callback_validate_youtube');
                }
            }

         $this->form_validation->set_error_delimiters('', '');
		 $this->form_validation->run();

         $loop = $this->input->post('text');
         if(!empty($loop))
            {
                foreach($loop as $id => $value)
                {
                    if(form_error('text['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'text['.$id.']';
                        $data['error_id'][] = 'text_'.$id.'';
                        $string = form_error('text['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    if(form_error('embed_url['.$id.']')!= '')
                    {
                        $data['inputerror'][] = 'embed_url['.$id.']';
                        $data['error_id'][] = 'embed_url_'.$id.'';
                        $string = form_error('embed_url['.$id.']');
                        $result = str_replace(array('</p>', '<p>'), '', $string);
                        $data['error_string'][] = $result;
                        $data['status'] = FALSE;
                    }

                    $allowed =  array('png','jpg','jpeg','PNG','JPG','JPEG');

                    if (isset($_FILES['file_image['.$id.']'])){
                        $new = $_FILES['file_image['.$id.']']['name'];

                        $ext = pathinfo($new, PATHINFO_EXTENSION);
                        if(!in_array($ext,$allowed) ) {
                            $data['inputerror'][] = 'file_image['.$id.']';
                            $data['error_id'][] = 'file_image_'.$id.'';
                            $string = 'Type File PNG JPG JPEG';

                            $result = str_replace(array('</p>', '<p>'),'',$string);
                            $data['error_string'][] = $result;
                            $data['status'] = FALSE;
                        }
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

      $this->form_validation->set_rules('text_edit', 'judul', 'required|trim');
      $this->form_validation->set_rules('embed_url_edit', 'link url', 'required|trim|prep_url|callback_validate_youtube');

      $this->form_validation->run();

      if ((form_error('text_edit') !== '')) {
          $data['inputerror'][] = 'text_edit';
          $string = form_error('text_edit');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      if ((form_error('embed_url_edit') !== '')) {
          $data['inputerror'][] = 'embed_url_edit';
          $string = form_error('embed_url_edit');
          $result = str_replace(array('</p>', '<p>'), '', $string);
          $data['error_string'][] = $result;
          $data['status'] = FALSE;
      }
      $allowed = array('gif', 'png', 'jpg', 'jpeg', 'GIF', 'PNG', 'JPG', 'JPEG');
        if (isset($_FILES['file_image_edit'])) {
            $new = $_FILES['file_image_edit']['name'];
            $ext = pathinfo($new, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $data['inputerror'][] = 'file_image_edit';
                $string = 'Type File PNG JPG JPEG';
                $result = str_replace(array('</p>', '<p>'), '', $string);
                $data['error_string'][] = $result;
                $data['status'] = FALSE;
            }
        }
        if ((form_error('file_image_edit') !== '')) {
            $data['inputerror'][] = 'file_image_edit';
            $string = form_error('file_image_edit');
            $result = str_replace(array('</p>', '<p>'), '', $string);
            $data['error_string'][] = $result;
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }

     }
	  public function validate_youtube($str){
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $str, $matches);
        if(!isset($matches[0])){ //if validation not passed
            $this->form_validation->set_message('validate_youtube', 'youtube link tidak bener periksa kembali');
            return FALSE;
        }else{ //if validation passed
            return TRUE;
        }
    }
    public function unique_url($key)
    {
        return $this->settings->validate_link_video($key);
    }
}
/* end of file Video.php */
/* location: system/application/controllers/ */
