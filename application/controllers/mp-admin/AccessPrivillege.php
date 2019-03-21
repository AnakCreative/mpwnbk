<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AccessPrivillege extends CI_Controller {
  var $data;
  var $user_id;
  var $link = 'mp-admin/AccessPrivillege';
  public function __construct() {
      parent::__construct();
      $this->load->database();
      $this->load->library(array('ion_auth', 'form_validation'));
      $this->load->helper(array('url', 'language'));
      //models connection back-end
      $this->load->model('ad-min/M_settings', 'settings');
      $this->load->model('ad-min/M_logactivity', 'logactivity');
      $this->load->model('ad-min/M_menu', 'menu');
      $this->load->model('ad-min/M_usermenu', 'usermenu');
      $this->load->model('ad-min/M_user', 'user');
      //end models connection back-end
      $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
      $this->lang->load('auth');
  }
    // redirect if needed, otherwise display the access privilege list
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
            $this->data['title_site'] = $this->settings->get_title_site();
            $this->data['menu_data'] = $this->settings->get_menu($user_id);
            $this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
            /* START insert update delete view access */
            $this->data['akses'] = $this->user->get_access($user_id, $this->link);
            /* STOP insert update delete view access */
            $this->data['sub_header'] = "master";
            $this->data['content_header'] = "hak akses";
            // logo header
            $this->data['ic_logo'] = $this->settings->get_logo_header();
            $this->data['favicon_logo'] = $this->settings->get_favicon_picture();
            //end page header
            $this->data['level_user'] = $this->settings->level_user();
            $this->data['parent_data'] = $this->settings->get_all();
            //content view
            $this->data['content'] = $this->load->view('ad-min/content/v_accessprivilege', $this->data, true);
            //end content view
            //main content
            $this->load->view('ad-min/main/v_main', $this->data);
            //end main content
        }
    }
    public function data_list() {
        /* START insert update delete view access */
        $user_id = $this->session->userdata('user_id');
        $link = "mp-admin/AccessPrivillege";
        $data['akses'] = $this->user->get_access($user_id, $this->link);
        /* STOP insert update delete view access */
        $edit = $data['akses'][0]['update'];
        $delete = $data['akses'][0]['delete'];
        $list = $this->usermenu->get_datatables();
        $data = array();
        if (isset($_POST['start'])) {
            $no = $_POST['start'];
            foreach ($list as $user) {
                $no++;
                $row = array();
                $row[] = $user->first_name;
                $row[] = $user->username;
                $row[] = $user->email;

                $userid = $user->id;
                if ($edit == 1) { // for show edit button
                    $edit_row = '<button class="btn btn-outline btn-primary" type="button"  href="javascript:void()" title="edit" onclick="bttn_editing_accessprivilege(' . "'" . $user->user_id . "'" . ')"><i class="ti-settings"></i></button>';
                } else {
                    $edit_row = '<button disabled class="btn btn-outline btn-primary" type="button"  href="javascript:void()" title="edit"><i class="ti-settings"></i></button>';
                }
                /* if ($delete == 1) { // for show delete button
                    $delete_row = '<button class="btn btn-outline btn-danger btn-icon" type="button"  href="javascript:void()" title="delete" onclick="account_pages()"><i class="ti-trash"></i></button>';
                } else {
                    $delete_row = '<button disabled class="btn btn-outline btn-danger btn-icon" type="button"  href="javascript:void()" title="delete"><i class="ti-trash"></i></button>';
                } */
                $row[] = $edit_row; //. ' ' . $delete_row;
                $data[] = $row;
            }
            $output = array("draw" => $_POST['draw'], "recordsTotal" => $this->usermenu->count_all(), "recordsFiltered" => $this->usermenu->count_filtered(), "data" => $data,);
        }
        echo json_encode($output);
    }
    //edit data function
    public function edit($id) {
        $data = $this->usermenu->get_user_menu($id);
        echo json_encode($data);
    }
    //changes view update delete add
    function first_link() {
        $user_id_session = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $id_user = $this->input->post('user_id');
        $query = $this->db->query("select id from menu where link = 0 LIMIT 1");
        $data['first_link'] = $query->result_array();
        if (count($data['first_link']) > 0) {
            $first_id = $data['first_link'][0]['id'];
            $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $first_id . " LIMIT 1");
            $data['first_link_menu'] = $query->result_array();
            if (count($data['first_link_menu']) < 1) {
                $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $first_id . ",1,1,1,1,1," . $date . "," . $user_id_session . ")");
            }
        }
    }
    function remove_menu_parent() {
        $parent_id = $this->input->post('parent_id');
        $id_user = $this->input->post('user_id');
        $session_id = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $query = $this->db->query("select sum(`add`+`view`+`delete`+`update`)as row_n from usermenu where menu_id in (select id from menu where parent_id = " . $parent_id . ") and user_id =" . $id_user . "");
        $data['check_count'] = $query->result_array();
        if (count($data['check_count']) > 0) {
            if ($data['check_count'][0]['row_n'] < 1) {
                $this->db->query("update usermenu set `view` = 0,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $parent_id . "");
            }
        }
    }
    function access_view_privilege() {
        $this->first_link();
        $session_id = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $id_user = $this->input->post('user_id');
        $menu_id = $this->input->post('menu_id');
        $parent_id = $this->input->post('parent_id');
        /* -- parent view menu -- */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $parent_id . " LIMIT 1");
        $data['check_menu_parent'] = $query->result_array();
        if (count($data['check_menu_parent']) > 0) {
            $this->db->query("update usermenu set `view` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $parent_id . "");
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $parent_id . ",0,1,0,0,1," . $date . "," . $session_id . ")");
        }
        /* -- child view menu -- */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $menu_id . " LIMIT 1");
        $data['check_menu_child'] = $query->result_array();
        if (count($data['check_menu_child']) > 0) {
            if ($data['check_menu_child'][0]['view'] == 0) {
                $this->db->query("update usermenu set `view` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            } else {
                $this->db->query("update usermenu set `view` = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            }
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $menu_id . ",0,1,0,0,1," . $date . "," . $session_id . ")");
        }
        $this->db->query("update usermenu set active = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where `add`=0 and `view`=0 and `delete`=0 and `update`=0");
        $this->db->query("update usermenu set active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where `view`=1 ");
        $this->remove_menu_parent();
        $data['status'] = TRUE;
        echo json_encode($data);
    }
    function access_add_privilege() {
        $this->first_link();
        $session_id = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $id_user = $this->input->post('user_id');
        $menu_id = $this->input->post('menu_id');
        $parent_id = $this->input->post('parent_id');
        /* --- check parent menu --- */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $parent_id . " LIMIT 1");
        $data['check_menu_parent'] = $query->result_array();
        if (count($data['check_menu_parent']) > 0) {
            $this->db->query("update usermenu set `view` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $parent_id . "");
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $parent_id . ",1,0,0,0,1," . $date . "," . $session_id . ")");
        }
        /* ---  child parent menu --- */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $menu_id . " LIMIT 1");
        $data['check_menu_child'] = $query->result_array();
        if (count($data['check_menu_child']) > 0) {
            if ($data['check_menu_child'][0]['add'] == 0) {
                $this->db->query("update usermenu set `add` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            } else {
                $this->db->query("update usermenu set `add` = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            }
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $user_id . "," . $menu_id . ",1,0,0,0,1," . $date . "," . $session_id . ")");
        }
        $this->db->query("update usermenu set active = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where `add`=0 and `view`=0 and `delete`=0 and `update`=0");
        $this->db->query("update usermenu set active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where `view`=1 ");
        $this->remove_menu_parent();
        $data['status'] = TRUE;
        echo json_encode($data);
    }
    function access_delete_privilege() {
        $this->first_link();
        $session_id = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $id_user = $this->input->post('user_id');
        $menu_id = $this->input->post('menu_id');
        $parent_id = $this->input->post('parent_id');
        /* --- check parent menu --- */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $parent_id . " LIMIT 1");
        $data['check_menu_parent'] = $query->result_array();
        if (count($data['check_menu_parent']) > 0) {
            $this->db->query("update usermenu set `view` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $parent_id . "");
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $parent_id . ",0,0,0,1,1," . $date . "," . $session_id . ")");
        }
        /* child */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $menu_id . " LIMIT 1");
        $data['check_menu_child'] = $query->result_array();
        if (count($data['check_menu_child']) > 0) {
            if ($data['check_menu_child'][0]['delete'] == 0) {
                $this->db->query("update usermenu set `delete` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            } else {
                $this->db->query("update usermenu set `delete` = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            }
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $menu_id . ",0,0,0,1,1," . $date . "," . $session_id . ")");
        }
        $this->db->query("update usermenu set active = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where `add`=0 and `view`=0 and `delete`=0 and `update`=0");
        $this->db->query("update usermenu set active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where `view`=1 ");
        $this->remove_menu_parent();
        $data['status'] = TRUE;
        echo json_encode($data);
    }
    function access_update_privilege() {
        $this->first_link();
        $session_id = $this->session->userdata('user_id');
        $date = date("Y-m-d");
        $id_user = $this->input->post('user_id');
        $menu_id = $this->input->post('menu_id');
        $parent_id = $this->input->post('parent_id');
        /* -- check parent menu -- */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $parent_id . " LIMIT 1");
        $data['check_menu_parent'] = $query->result_array();
        if (count($data['check_menu_parent']) > 0) {
            $this->db->query("update usermenu set `view` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $parent_id . "");
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $parent_id . ",0,0,1,0,1," . $date . "," . $session_id . ")");
        }
        /* child */
        $query = $this->db->query("select * from usermenu where user_id =" . $id_user . " and menu_id =" . $menu_id . " LIMIT 1");
        $data['check_menu_child'] = $query->result_array();
        if (count($data['check_menu_child']) > 0) {
            if ($data['check_menu_child'][0]['update'] == 0) {
                $this->db->query("update usermenu set `update` = 1,active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            } else {
                $this->db->query("update usermenu set `update` = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where user_id =" . $id_user . " and menu_id =" . $menu_id . "");
            }
        } else {
            $this->db->query("insert into usermenu(user_id,menu_id,`add`,`view`,`update`,`delete`,active,date_created,user_created) values(" . $id_user . "," . $menu_id . ",0,0,1,0,1," . $date . "," . $session_id . ")");
        }
        $this->db->query("update usermenu set active = 0,date_modified=" . $date . ",user_modified=" . $session_id . " where `add`=0 and `view`=0 and `delete`=0 and `update`=0");
        $this->db->query("update usermenu set active = 1,date_modified=" . $date . ",user_modified=" . $session_id . " where `view`=1 ");
        $this->remove_menu_parent();
        $data['status'] = TRUE;
        echo json_encode($data);
    }
}

/* end of file AccessPrivillege.php */
/* location: system/application/controllers/ */
