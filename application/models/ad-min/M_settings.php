<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// -- settings -- \\
class M_settings extends CI_Model {
    //settings page\\
    //--- time elapsed string ---\\
    function time_elapsed_string($datetime, $full = false)
	{
		$today = time();
		$createdday = strtotime($datetime);
		$datediff = abs($today - $createdday);
		$difftext = "";
		$years = floor($datediff / (365 * 60 * 60 * 24));
		$months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
		$days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
		$hours = floor($datediff / 3600);
		$minutes = floor($datediff / 60);
		$seconds = floor($datediff);
		//year checker
		if ($difftext == "") {
			if ($years > 1) $difftext = $years . ' ' . 'tahun yang lalu';
			elseif ($years == 1) $difftext = $years . ' ' . 'tahun yang lalu';
		}
		//month checker
		if ($difftext == "") {
			if ($months > 1) $difftext = $months . ' ' . 'bulan yang lalu';
			elseif ($months == 1) $difftext = $months . ' ' . 'bulan yang lalu';
		}
		//month checker
		if ($difftext == "") {
			if ($days > 1) $difftext = $days . ' ' . 'hari yang lalu';
			elseif ($days == 1) $difftext = $days . ' ' . 'hari yang lalu';
		}
		//hour checker
		if ($difftext == "") {
			if ($hours > 1) $difftext = $hours . ' ' . 'jam yang lalu';
			elseif ($hours == 1) $difftext = $hours . ' ' . 'jam yang lalu';
		}
		//minutes checker
		if ($difftext == "") {
			if ($minutes > 1) $difftext = $minutes . ' ' . 'menit yang lalu';
			elseif ($minutes == 1) $difftext = $minutes . ' ' . 'menit yang lalu';
		}
		//seconds checker
		if ($difftext == "") {
			if ($seconds > 1) $difftext = $seconds . ' ' . 'detik yang lalu';
			elseif ($seconds == 1) $difftext = $seconds . ' ' . 'detik yang lalu';
		}
		echo $difftext;
	}
    function type_profilesite_clause($title) {
          $this->db->select('a.flag');
          $this->db->from('company_profile a');
          $this->db->where('a.flag', $title);
          $query = $this->db->get();
          if($query->num_rows() > 0){
            $this->form_validation->set_message('flag_type', 'kategori sudah dipakai "'.$title.'" periksa kembali');
            return FALSE;
          } else {
            return TRUE;
          }
    }
    function save_profilewebsite($data) {
        $this->db->insert('company_profile', $data);
        return $this->db->insert_id();
    }
    function update_profilewebsite($where, $data) {
        $this->db->update('company_profile', $data, $where);
		return $this->db->affected_rows();
    }
    function check_profilesite_img($id) {
        $this->db->from('company_profile');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->picture;
    }
    function get_id_profilewebsite($id) {
        $this->db->select('a.*');
        $this->db->from('company_profile as a');
        $this->db->where('a.id', $id);
        return $this->db->get()->row();
    }
    //slide header check
    function get_num_artikelslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'artikel');
        return $this->db->get()->num_rows();
    }
    function get_num_acaraslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'acara');
        return $this->db->get()->num_rows();
    }
    function get_num_infoslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'info');
        return $this->db->get()->num_rows();
    }
    function get_num_fotoslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'foto');
        return $this->db->get()->num_rows();
    }
    function get_num_videoslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'video');
        return $this->db->get()->num_rows();
    }
    function get_num_angkatanslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'alumni');
        return $this->db->get()->num_rows();
    }
    function get_num_kontakslide() {
        $this->db->from('slider_image as a');
        // $this->db->where('a.page', 'contact');
        return $this->db->get()->num_rows();
    }
    function slider_video_data() {
        $this->db->from('slider_video');
        return $this->db->get()->result();
    }
    function get_profilesite() {
        $query = $this->db->query("SELECT * FROM company_profile");
		return $query->result();
    }
    function check_profilesite_poma() {
        $this->db->from('company_profile as a');
        $this->db->where('a.flag', 'poma');
        return $this->db->get()->num_rows();
    }
    function check_profilesite_visi() {
        $this->db->from('company_profile as a');
        $this->db->where('a.flag', 'visi');
        return $this->db->get()->num_rows();
    }
    function check_profilesite_misi() {
        $this->db->from('company_profile as a');
        $this->db->where('a.flag', 'misi');
        return $this->db->get()->num_rows();
    }
    function check_profilesite_ksrpd() {
        $this->db->from('company_profile as a');
        $this->db->where('a.flag', 'ksrpd');
        return $this->db->get()->num_rows();
    }
    function check_profilesite_about() {
        $this->db->from('company_profile as a');
        $this->db->where('a.flag', 'about');
        return $this->db->get()->num_rows();
    }
    function contactus_num() {
        $query = $this->db->query("SELECT * FROM contact_us");
		return $query->num_rows();
    }
    function contactus_today() {
		$this->db->from('contact_us as a');
		$this->db->where('a.date_created', date('Y-m-d'));
		return $this->db->get()->num_rows();
    }
    function contactus_yesterday() {
		$this->db->from('contact_us as a');
		$this->db->where('a.date_created', date('Y-m-d',strtotime("-1 days")));
		return $this->db->get()->num_rows();
    }
    function photo_num() {
        $query = $this->db->query("SELECT * FROM photo");
		return $query->num_rows();
    }
    function photo_today() {
		$this->db->from('photo as a');
		$this->db->where('a.date_created', date('Y-m-d'));
		return $this->db->get()->num_rows();
    }
    function photo_yesterday() {
		$this->db->from('photo as a');
		$this->db->where('a.date_created', date('Y-m-d',strtotime("-1 days")));
		return $this->db->get()->num_rows();
    }
    function alumni_num() {
        $query = $this->db->query("SELECT * FROM alumni");
		return $query->num_rows();
    }
    function alumni_today() {
		$this->db->from('alumni as a');
		$this->db->where('a.date_created', date('Y-m-d'));
		return $this->db->get()->num_rows();
    }
    function alumni_yesterday() {
		$this->db->from('alumni as a');
		$this->db->where('a.date_created', date('Y-m-d',strtotime("-1 days")));
		return $this->db->get()->num_rows();
    }
    function posting_num() {
        $query = $this->db->query("SELECT * FROM posting");
		return $query->num_rows();
    }
    function posting_today() {
		$this->db->from('posting as a');
		$this->db->where('a.date_created', date('Y-m-d'));
		return $this->db->get()->num_rows();
    }
    function posting_yesterday() {
		$this->db->from('posting as a');
		$this->db->where('a.date_created', date('Y-m-d',strtotime("-1 days")));
		return $this->db->get()->num_rows();
    }
    function general_meta_description() {
        $this->db->from('general_site');
		return $this->db->get()->row()->meta_tag_description;
    }
    function get_menu($user_id) {
		$this->db->select('b.class,b.name,b.link,b.parent_id,b.id');
		$this->db->from('usermenu as a');
		$this->db->join('menu as b', 'a.menu_id = b.id','left');
		$this->db->where('a.user_id', $user_id);
		$this->db->where('b.parent_id',0);
		$this->db->where('b.active', 1);
		$this->db->where('a.view', 1);
		$this->db->where('b.level', 1);
		return $this->db->get()->result_array();

	}
    //-- submenu --\\
	function get_sub_menu($user_id) {
		$this->db->select('b.class,b.name,b.link,b.parent_id,b.id');
		$this->db->from('usermenu as a');
		$this->db->join('menu as b', 'a.menu_id = b.id','left');
		$this->db->where('a.user_id', $user_id);
		$this->db->where('b.active', '1');
		$this->db->where('a.view', '1');
		$this->db->where('b.level', 1);
		return $this->db->get()->result_array();

	}
    //-- name menu --\\
	function get_name_menu($user_id,$link)
	{
		$this->db->select('c.name');
		$this->db->from('usermenu as a');
		$this->db->join('menu as b', 'a.menu_id = b.id','left');
		$this->db->join('menu as c', 'b.parent_id= c.parent_id','left');
		$this->db->where('a.user_id', $user_id);
		$this->db->where('b.link', $link);
		$this->db->where('b.active', '1');
		$this->db->where('a.view', '1');
		$this->db->where('b.level', 1);
		return $this->db->get()->result_array();
	}
  function level_user(){
    $this->db->select('a.id,a.name');
		$this->db->from('level_user as a');
		return $this->db->get()->result_array();
  }
    //-- parent menu --\\
  function get_all(){
		$query = $this->db->query("SELECT id,name FROM menu WHERE parent_id=0 and active=1");
		return $query->result_array();
	}
    //-- users groups --\\
    function get_all_groups(){
		$query = $this->db->query("SELECT * FROM groups");
		return $query->result_array();
	}
	function get_parent($link){
		$query = $this->db->query("SELECT * FROM menu where id = (SELECT parent_id FROM menu where link='".$link."')");
    return $query->result();
	}

    function get_page_dashboard($link){
      $query = $this->db->query("SELECT * FROM menu where link='".$link."'");
      return $query->result();
    }
	public function get_parent_id($id){
		return $this->db->query("SELECT * FROM menu WHERE id='".$id."'");

	}
    //-- theme --\\
    function get_theme($user_id) {
		$this->db->select('a.user_id,a.header,a.sidebar,a.background');
		$this->db->from('themes as a');
		$this->db->where('a.user_id', $user_id);
		return $this->db->get()->result_array();
	}
    function get_images_background($user_id) {
		$this->db->select('a.user_id,a.images');
		$this->db->from('background_themes as a');
		$this->db->where('a.user_id', $user_id);
		return $this->db->get()->result_array();
	}
    function images_background() {
		$this->db->select('a.user_id,a.images');
		$this->db->from('background_themes as a');
		return $this->db->get()->result_array();
	}
    // -- settings page -- \\
    // -- administrator settings --\\
    function check_file($id)
    {
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->image;
    }
    //-- profile picture --\\
    function get_session_id($id)
    {
        $this->db->select('a.*');
        $this->db->from('users as a');
        $this->db->where('a.id',$id);
        return $this->db->get()->row();
    }
    function update_avatar($where, $data)
	{
        $this->db->update('users', $data, $where);
        return $this->db->affected_rows();
	}
    //-- end profile picture --\\
    //-- settings page --\\
  function get_page_settings() {
		$this->db->select('a.id,a.maintenance_mode');
		$this->db->from('site_settings as a');
		return $this->db->get()->result_array();
	}

  function get_logo_header() {
    $this->db->select('a.id,a.logo_picture');
    $this->db->from('ic_logo as a');
    return $this->db->get()->result();
  }
  //-- function article content manajement system --//
  //-- pagination --//
  function get_posting_array($batas =null,$offset=null,$key=null) {
    $this->db->select('a.*,a.id as posting_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('posting as a');
    $this->db->order_by('a.id', 'DESC');
    if($batas != null){
       $this->db->limit($batas,$offset);
    }
    if ($key != null) {
       $this->db->or_like($key);
    }
    $query = $this->db->get();

    //cek apakah ada barang
    if ($query->num_rows() > 0) {
        return $query->result();
    }
  }
  function count_posting_array(){
    $this->db->select('a.*,a.id as posting_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('posting as a');
    $query = $this->db->get()->num_rows();
    return $query;
  }
  function count_posting_array_search($orlike) {
    $this->db->or_like($orlike);
    $this->db->select('a.*,a.id as posting_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('posting as a');
    $query = $this->db->get();
    return $query->num_rows();
  }
  function get_id_posting($id) {
    $this->db->select('a.*');
    $this->db->from('posting as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_posting($id) {
    $this->db->select('a.*,b.*,a.id as posting_id');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('posting as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_posting($id) {
    $this->db->where('id', $id);
    $this->db->delete('posting');
  }
  function update_posting($where, $data) {
		$this->db->update('posting', $data, $where);
		return $this->db->affected_rows();
	}
  function update_slider_video($where, $data) {
    $this->db->update('slider_video', $data, $where);
		return $this->db->affected_rows();
  }
  function save_posting($data) {
    $this->db->insert('posting', $data);
    return $this->db->insert_id();
  }
  function check_posting_img($id) {
    $this->db->from('posting');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->img;
  }
  function check_posting_img_thumb($id) {
    $this->db->from('posting');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->thumb_file;
  }
  function title_posting_clause($title, $type) {
      $this->db->select('a.title,a.type');
      $this->db->from('posting a');
      $this->db->where('title', $title);
      $this->db->where('type', $type);
      $query = $this->db->get();
      if($query->num_rows() > 0){
        $this->form_validation->set_message('title_posting', 'judul sudah dipakai "'.$type.'" periksa kembali');
        return FALSE;
      } else {
        return TRUE;
      }
  }

  //-- end function posting --//
  //-- function info content manajement system --//
  function get_info_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as info_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('info as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}
	function count_info_array(){
		$this->db->select('a.*,a.id as info_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('info as a');
	    $query = $this->db->get()->num_rows();
	    return $query;
    }
	function count_info_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as info_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('info as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}
  function get_id_info($id) {
    $this->db->select('a.*');
    $this->db->from('info as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_info($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('info as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_info($id) {
    $this->db->where('id', $id);
    $this->db->delete('info');
  }
  function update_info($where, $data) {
		$this->db->update('info', $data, $where);
		return $this->db->affected_rows();
	}
  function save_info($data) {
    $this->db->insert('info', $data);
		return $this->db->insert_id();
  }
  function check_info_img($id) {
    $this->db->from('info');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->img;
  }
//-- end function info ---//

//-- function poma cms --//
  function get_poma_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as poma_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('poma as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}

	function count_poma_array(){
		$this->db->select('a.*,a.id as poma_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('poma as a');
	    $query = $this->db->get()->num_rows();
	    return $query;
	}

	function count_poma_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as poma_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('poma as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}
  function get_id_poma($id) {
    $this->db->select('a.*');
    $this->db->from('poma as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_poma($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('poma as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_poma($id) {
    $this->db->where('id', $id);
    $this->db->delete('poma');
  }
  function update_poma($where, $data) {
		$this->db->update('poma', $data, $where);
		return $this->db->affected_rows();
	}
  function save_poma($data) {
    $this->db->insert('poma', $data);
		return $this->db->insert_id();
  }
  function check_poma_img($id) {
    $this->db->from('poma');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->img;
  }
  //--function ksrpd --//
  function get_ksrpd_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as ksprd_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('ksrpd as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}

	function count_ksrpd_array(){
		$this->db->select('a.*,a.id as ksprd_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('ksrpd as a');
	    $query = $this->db->get()->num_rows();
	    return $query;
	}

	function count_ksrpd_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as ksprd_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('ksrpd as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}

  function get_id_ksrpd($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('ksrpd as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_ksrpd($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('ksrpd as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_ksrpd($id) {
    $this->db->where('id', $id);
    $this->db->delete('ksrpd');
  }
  function update_ksrpd($where, $data) {
		$this->db->update('ksrpd', $data, $where);
		return $this->db->affected_rows();
	}
  function save_ksrpd($data) {
    $this->db->insert('ksrpd', $data);
		return $this->db->insert_id();
  }
  function check_ksrpd_img($id) {
    $this->db->from('ksrpd');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->img;
  }
  //-- end function ksrpd --//
  //-- function video --//
  function get_video_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as video_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('video as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}

	function count_video_array(){
		$this->db->select('a.*,a.id as video_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('video as a');
	    $query = $this->db->get()->num_rows();
	    return $query;
	}

	function count_video_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as video_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('video as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}

  function get_id_video($id) {
    $this->db->select('a.*,a.id as video_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('video as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_video($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('video as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_video($id) {
    $this->db->where('id', $id);
    $this->db->delete('video');
  }
  function update_video($where, $data) {
	return $this->db->update('video', $data, $where);
	//return $this->db->affected_rows();
  }
  function save_video($data) {
    return $this->db->insert('video', $data);
	// return $this->db->insert_id();
  }
  function check_video_img($id) {
    $this->db->from('video');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->thumbnail;
  }
  function youtube_thumb($url, $frame, $width) {
	 // memecah text urlnya untuk mengambil id videonya
	 $video = explode("=",$url);

	 // dapet deh....
	 $id = $video[1];

	 // ambil gambar dari alamat yang sudah dituju....
		return '<img class="image img-responsive" src="http://img.youtube.com/vi/' . $id . '/'.$frame.'.jpg" width="'.$width.'">';
  }
  function validate_link_video($key){
    $this->db->select('a.id');
    $this->db->from('video a');
    $this->db->where('embed_url',$key);
    $query = $this->db->get();
     if($query->num_rows() > 0){
        $this->form_validation->set_message('unique_url', 'youtube link sudah dipakai periksa kembali');
        return false;
     } else {
        return true;
     }
  }
  //--end function video --//
  //--function angkatan --//
    function get_angkatan_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as alumni_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('alumni as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}

	function count_angkatan_array(){
		$this->db->select('a.*,a.id as alumni_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('alumni as a');
	    $query = $this->db->get()->num_rows();
	    return $query;
	}

	function count_angkatan_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as alumni_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('alumni as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}

  function get_alumni(){
      $this->db->select('a.*');
      $this->db->from('alumni as a');
      return $this->db->get()->result();
  }
  function get_alumni_id($search){
      $this->db->select('a.id,a.firstname,a.lastname');
      $this->db->from('alumni as a');
      $this->db->like('a.firstname', $search);
      return $this->db->get()->result();
  }
  function get_id_angkatan($id) {
    $this->db->select('a.*');
    $this->db->from('alumni as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_angkatan($id) {
    $this->db->select('a.*,b.*,a.id as alumni_id');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('alumni as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_angkatan($id) {
    $this->db->where('id', $id);
    $this->db->delete('alumni');
  }
  function update_angkatan($where, $data) {
	return $this->db->update('alumni', $data, $where);
	//return $this->db->affected_rows();
  }
  function save_angkatan($data) {
    return $this->db->insert('alumni', $data);
	// return $this->db->insert_id();
  }
  function check_angkatan_img($id) {
    $this->db->from('alumni');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->img;
  }
  function validate_link_website_angkatan($key) {
    $this->db->select('a.id');
    $this->db->from('alumni a');
    $this->db->where('website',$key);
    $query = $this->db->get();
     if($query->num_rows() > 0){
        $this->form_validation->set_message('unique_url', 'link sudah dipakai periksa kembali');
        return false;
     } else {
        return true;
     }
  }
    //-- function photo --//
    function get_photo_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as photo_id,a.image as photo_img,b.*');
        $this->db->join('users as b', 'a.user_created = b.id','left');
        $this->db->from('photo as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}

	function count_photo_array(){
		$this->db->select('a.*,a.id as photo_id,a.image as photo_img,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('photo as a');
	    $query = $this->db->get()->num_rows();
	    return $query;
	}

	function count_photo_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as photo_id,a.image as photo_img,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('photo as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}

  function get_id_photo($id) {
    $this->db->select('a.*');
    $this->db->from('photo as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_photo($id) {
    $this->db->select('a.*,b.*,a.id as photo_id');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('photo as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_photo($id) {
    $this->db->where('id', $id);
    $this->db->delete('photo');
  }
  function update_photo($where, $data) {
	return $this->db->update('photo', $data, $where);
	//return $this->db->affected_rows();
  }
  function save_photo($data) {
    return $this->db->insert('photo', $data);
	// return $this->db->insert_id();
  }
  function save_photo_activities($data) {
      return $this->db->insert('photo_activities', $data);
  }
  function check_photo_img($id) {
    $this->db->from('photo');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->image;
  }
  //-- end function --//
  //-- function information--//
  function get_setting_information() {
    $this->db->select('a.*');
    $this->db->from('site_information as a');
    return $this->db->get()->result();
  }
  function update_information_information($where, $data) {
    return $this->db->update('site_information', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_address_information($where, $data) {
    return $this->db->update('site_information', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_phone_information($where, $data) {
    return $this->db->update('site_information', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_email_information($where, $data) {
    return $this->db->update('site_information', $data, $where);
    //return $this->db->affected_rows();
  }
  //-- end function --//
  //-- function header --//
    function get_header_array($batas =null,$offset=null,$key=null) {
	    $this->db->select('a.*,a.id as header_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('slider_image as a');
	    if($batas != null){
	       $this->db->limit($batas,$offset);
	    }
	    if ($key != null) {
	       $this->db->or_like($key);
	    }
	    $query = $this->db->get();

	    //cek apakah ada info
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    }
	}

	function count_header_array(){
    $this->db->select('a.*,a.id as header_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('slider_image as a');
    $query = $this->db->get()->num_rows();
    return $query;
	}

	function count_header_array_search($orlike) {
	    $this->db->or_like($orlike);
	    $this->db->select('a.*,a.id as header_id,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('slider_image as a');
	    $query = $this->db->get();
	    return $query->num_rows();
	}

  function get_id_header($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('slider_image as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->row();
  }
  function readmore_header($id) {
    $this->db->select('a.*,b.*');
    $this->db->join('users as b', 'a.user_created = b.id','left');
    $this->db->from('slider_image as a');
    $this->db->where('a.id', $id);
    return $this->db->get()->result();
  }
  function delete_header($id) {
    $this->db->where('id', $id);
    $this->db->delete('slider_image');
  }
  function update_header($where, $data) {
		$this->db->update('slider_image', $data, $where);
		return $this->db->affected_rows();
	}
  function save_header($data) {
    $this->db->insert('slider_image', $data);
		return $this->db->insert_id();
  }
  function check_header_img($id) {
    $this->db->from('slider_image');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->header_img;
  }

  private function _get_datatables_query_page() {

        $column = array('heading','header_img');
        $order = array('id' => 'desc');

		$this->db->from('slider_image');

		$i = 0;

		foreach ($column as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
  }

  function get_datatables_page() {
    $this->_get_datatables_query_page();
    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered_page() {
    $this->_get_datatables_query_page();
    $query = $this->db->get();
    return $query->num_rows();
  }

  function count_all_page() {
    $this->db->from('slider_image');
    return $this->db->count_all_results();
  }
 //-- end function --//
 //-- function general site --//
  function get_title_site() {
    $this->db->from('ic_logo');
    $query = $this->db->get();
    return $query->row()->logo_title;
  }
  function delete_favicon($where, $data) {
    $this->db->update('ic_logo', $data, $where);
		return $this->db->affected_rows();
  }
  function delete_logo($where, $data) {
    $this->db->update('ic_logo', $data, $where);
		return $this->db->affected_rows();
  }
  function get_location_lt_lg(){
    $this->db->select('a.*');
    $this->db->from('location as a');
    return $this->db->get()->row();
  }
  // --- favicon settings --//
  function get_meta_data() {
    $this->db->select('a.*');
    $this->db->from('general_site as a');
    return $this->db->get()->result();
  }
  function get_logo_data() {
    $this->db->select('a.*');
    $this->db->from('ic_logo as a');
    return $this->db->get()->result();
  }
  function get_setting_page_slider() {
    $this->db->select('a.*');
    $this->db->from('slider_image as a');
    return $this->db->get()->result();
  }
  function get_location_data() {
    $this->db->select('a.*');
    $this->db->from('location as a');
    return $this->db->get()->result();
  }
  function check_logo_img($id) {
    $this->db->from('ic_logo');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->logo_picture;
  }
  function check_favicon_img($id) {
    $this->db->from('ic_logo');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->favicon_picture;
  }
  function get_logo_picture() {
    $this->db->select('a.logo_picture,a.id');
    $this->db->from('ic_logo as a');
    return $this->db->get()->row();
  }
  function get_favicon_picture() {
    $this->db->select('a.favicon_picture,a.id');
    $this->db->from('ic_logo as a');
    return $this->db->get()->row();
  }
  function update_meta_tag_title($where, $data) {
    return $this->db->update('general_site', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_logo_title($where, $data) {
    return $this->db->update('ic_logo', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_sublogo_title($where, $data) {
    return $this->db->update('ic_logo', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_latitude($where, $data) {
    return $this->db->update('location', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_longitude($where, $data) {
    return $this->db->update('location', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_logo_website($where, $data) {
    return $this->db->update('ic_logo', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_meta_tag_keywords($where, $data) {
    return $this->db->update('general_site', $data, $where);
    //return $this->db->affected_rows();
  }
  function update_meta_tag_description($where, $data) {
    return $this->db->update('general_site', $data, $where);
    //return $this->db->affected_rows();
  }
 //-- end function --//
 //-- function mail --//
 function get_mail() {
    $this->db->select('a.*');
    $this->db->from('contact_us as a');
    return $this->db->get()->result();
 }
 //-- searching mail --//
  public function view($table){
        return $this->db->get($table);
    }

  public function pencarian($keyword){
        return $this->db->query("SELECT * FROM contact_us where MATCH (name, email, message) against ('$keyword' IN BOOLEAN MODE)");
    }
  //-- end function mail search --//
  function delete_message_data($id) {
    $this->db->where('id', $id);
    $this->db->delete('contact_us');
  }
  function delete_message_by_id($id) {
    $this->db->where('id', $id);
    $this->db->delete('contact_us');
  }
  function get_message_id($id) {
    $this->db->select('a.*');
    $this->db->where('id', $id);
    $this->db->from('contact_us as a');
    return $this->db->get()->result();
  }
  function delete_slider_page($id) {
    $this->db->where('id', $id);
    $this->db->delete('slider_image');
  }
  function update_read_message($where, $data) {
    return $this->db->update('contact_us', $data, $where);
  }
  function check_pageslide_img($id) {
    $this->db->from('slider_image');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row()->header_img;
  }
//advertise
  function get_advertise_array($batas =null,$offset=null,$key=null) {
        $this->db->select('a.*,a.id as advertise_id,b.*');
        $this->db->join('users as b', 'a.user_created = b.id','left');
        $this->db->from('advertise as a');
        if($batas != null){
           $this->db->limit($batas,$offset);
        }
        if ($key != null) {
           $this->db->or_like($key);
        }
        $query = $this->db->get();

        //cek apakah ada barang
        if ($query->num_rows() > 0) {
            return $query->result();
        }
  }
   function count_advertise_array(){
        $this->db->select('a.*,a.id as advertise_id,b.*');
        $this->db->join('users as b', 'a.user_created = b.id','left');
        $this->db->from('advertise as a');
        $query = $this->db->get()->num_rows();
        return $query;
   }
   function count_advertise_array_search($orlike) {
        $this->db->or_like($orlike);
        $this->db->select('a.*,a.id as advertise_id,b.*');
        $this->db->join('users as b', 'a.user_created = b.id','left');
        $this->db->from('advertise as a');
        $query = $this->db->get();
        return $query->num_rows();
   }
   public function check_adv_img($id){
        $this->db->from('advertise');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->adv_img;
   }
   function get_id_advertise($id) {
        $this->db->select('a.*,b.*,a.id as advertise_id');
        $this->db->join('users as b', 'a.user_created = b.id','left');
        $this->db->from('advertise as a');
        $this->db->where('a.id', $id);
        return $this->db->get()->row();
   }
   function update_advertise($where, $data) {
	 return $this->db->update('advertise', $data, $where);
	 //return $this->db->affected_rows();
   }
   function save_advertise($data) {
     return $this->db->insert('advertise', $data);
	 // return $this->db->insert_id();
   }
   function delete_advertise($id) {
     $this->db->where('id', $id);
     $this->db->delete('advertise');
   }

   private function get_query_group_alumni()
   {
        $column = array('name','date_created','user_created','date_modified','user_modified','date_deleted','user_deleted');
        $order = array('id' => 'desc');

		$this->db->from('alumni_groups as a');
        $this->db->select('a.*');
		$i = 0;

		foreach ($column as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_alumni_group()
	{
		$this->get_query_group_alumni();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

    function count_filtered_group()
	{
		$this->get_query_group_alumni();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all_group()
	{
		$this->db->from('alumni_groups as a');
		return $this->db->count_all_results();
	}
   function get_group_alumni_id($id) {
      $this->db->select('a.*');
      $this->db->where('id', $id);
      $this->db->from('alumni_groups as a');
      return $this->db->get()->row();
   }
   function update_group_alumni($where, $data) {
	 return $this->db->update('alumni_groups', $data, $where);
	 //return $this->db->affected_rows();
   }
   function save_group_alumni($data) {
     return $this->db->insert('alumni_groups', $data);
	 // return $this->db->insert_id();
   }
   function delete_group_alumni($id) {
     $this->db->where('id', $id);
     $this->db->delete('alumni_groups');
   }
   function get_id_page_slide($id){
     $this->db->where('id', $id);
     $this->db->from('slider_image');
     return $this->db->get()->row();
   }
   function update_slidepage($where, $data){
     return $this->db->update('slider_image', $data, $where);
   }
   //-- direksi
   function get_datatables_director(){
        $column = array('a.name','a.description','a.position','a.picture','a.url','a.date_created','a.user_created');
        $order = array('a.id' => 'desc');

		$this->db->from('directive_home as a');
        $this->db->select('a.*');
		$i = 0;

		foreach ($column as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
   }

    function get_director_group()
    {
        $this->get_datatables_director();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   function count_all_director() {
       $this->db->from('directive_home');
       return $this->db->count_all_results();
   }

   function count_filtered_director() {
       $this->get_datatables_director();
       $query = $this->db->get();
       return $query->num_rows();
   }

    //-- facilities
    function get_datatables_facilities(){
        $column = array('a.title','a.description','a.picture','a.flag','a.date_created','a.user_created');
        $order = array('a.id' => 'desc');

        $this->db->from('company_profile as a');
        $this->db->where('a.flag','fasilitas');
        $this->db->select('a.*');
        $i = 0;

        foreach ($column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_facilities_group()
    {
        $this->get_datatables_facilities();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_all_facilities() {
        $this->db->from('directive_home');
        return $this->db->count_all_results();
    }

    function count_filtered_facilities() {
        $this->get_datatables_facilities();
        $query = $this->db->get();
        return $query->num_rows();
    }

    //-- konsentrasi

    function get_datatables_konsentrasi(){
        $column = array('a.title','a.description','a.flag','a.date_created','a.user_created');
        $order = array('a.id' => 'desc');

        $this->db->from('konsentrasi as a');
        $this->db->select('a.*');
        $i = 0;

        foreach ($column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_konsentrasi_group()
    {
        $this->get_datatables_konsentrasi();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_all_konsentrasi() {
        $this->db->from('konsentrasi');
        return $this->db->count_all_results();
    }

    function count_filtered_konsentrasi() {
        $this->get_datatables_konsentrasi();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function check_konsentrasi_img($id) {
        $this->db->from('konsentrasi');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->image;
    }
    function get_id_konsentrasi($id) {
        $this->db->where('id', $id);
        $this->db->from('konsentrasi');
        return $this->db->get()->row();
    }
    function save_konsentrasi($data){
        return $this->db->insert('konsentrasi', $data);
    }
    function update_konsentrasi($where, $data){
        return $this->db->update('konsentrasi', $data, $where);
    }
    function delete_konsentrasi($id) {
        $this->db->where('id', $id);
        $this->db->delete('konsentrasi');
    }
    //-- alumni activity
    function get_datatables_photo_activity(){
        $column = array('alumni_id','a.picture','a.title','a.date_created','a.user_created');
        $order = array('a.id' => 'desc');

        $this->db->from('photo_activities as a');
        $this->db->select('a.*');
        $i = 0;

        foreach ($column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_photoactivity_group()
    {
        $this->get_datatables_photo_activity();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_all_photo_activity() {
        $this->db->from('photo_activities');
        return $this->db->count_all_results();
    }

    function count_filtered_photo_activity() {
        $this->get_datatables_photo_activity();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function check_photo_activity_img($id) {
        $this->db->from('photo_activities');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->picture;
    }
    function get_id_photo_activity($id) {
        $this->db->where('id', $id);
        $this->db->from('photo_activities');
        return $this->db->get()->row();
    }
    function save_photo_activity($data){
        return $this->db->insert('photo_activities', $data);
    }
    function update_photo_activity($where, $data){
        return $this->db->update('photo_activities', $data, $where);
    }
    function delete_photo_activity($id) {
        $this->db->where('id', $id);
        $this->db->delete('photo_activities');
    }

    //-- background

    function get_datatables_background(){
        $column = array('a.image','a.page','a.date_created','a.user_created');
        $order = array('a.id' => 'desc');

        $this->db->from('background_site as a');
        $this->db->select('a.*');
        $i = 0;

        foreach ($column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_background_group()
    {
        $this->get_datatables_background();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_all_background() {
        $this->db->from('background_site');
        return $this->db->count_all_results();
    }

    function count_filtered_background() {
        $this->get_datatables_background();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function check_background_img($id) {
        $this->db->from('background_site');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->image;
    }
    function get_id_background($id) {
        $this->db->where('id', $id);
        $this->db->from('background_site');
        return $this->db->get()->row();
    }
    function save_background($data){
        return $this->db->insert('background_site', $data);
    }
    function update_background($where, $data){
        return $this->db->update('background_site', $data, $where);
    }
    function delete_background($id) {
        $this->db->where('id', $id);
        $this->db->delete('background_site');
    }

    function get_user_admin($id) {
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->username;
    }

    function get_alumni_name($id) {
        $this->db->select('a.firstname,a.lastname');
        $this->db->from('alumni a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        $fullname = '';
        foreach ($query->result() as $row) {
            $fullname.= $row->firstname . '&nbsp;';
            $fullname.= $row->lastname . '&nbsp;';
        }
        return $fullname;
    }

    function check_director_img($id) {
       $this->db->from('directive_home');
       $this->db->where('id',$id);
       $query = $this->db->get();
       return $query->row()->picture;
   	}
   function get_id_direksi($id) {
	 $this->db->where('id', $id);
	 $this->db->from('directive_home');
	 return $this->db->get()->row();
   }
   function save_direksi($data){
     return $this->db->insert('directive_home', $data);
   }
   function update_direksi($where, $data){
     return $this->db->update('directive_home', $data, $where);
   }
   function delete_direksi($id) {
     $this->db->where('id', $id);
     $this->db->delete('directive_home');
   }
   // new datatable
    public function fetchPhoto($start, $length, $orderby, $ordertype, $search) {
        $this->db->start_cache();
		$select = array('a.title','a.text','a.image');
		$this->db->select('a.id, '.implode(',',$select).', a.date_created, a.position');
		$this->db->from('photo as a');
//		$this->db->join('users as b', 'a.user_created = b.id', 'left');
		$this->db->order_by('a.id', 'DESC');

		$res['total_all'] = $this->db->count_all_results();

		if(!empty($search))
		{
			$this->db->group_start();
			foreach($select as $k=>$s)
			{
				$this->db->or_like('LOWER('.$s.')',$search);
			}
			$this->db->group_end();
		}

		$this->db->stop_cache();

		if(!empty($orderby) && empty($ordertype)){
			$this->db->order_by($orderby, 'ASC');
		} else if(empty($orderby) && !empty($ordertype)){
			$this->db->order_by('a.id', $ordertype);
		} else {
			$this->db->order_by('a.id','DESC');
		}


		if($length > 0){
			$this->db->limit($length, $start);
		}

		$querysql = $this->db->get();
		$res['data'] = $querysql->result_array();
		$res['total_filter'] = $this->db->count_all_results();
		$this->db->flush_cache();

		if($querysql){
			$query['status'] = TRUE;
			$query['total_all'] = $res['total_all'];
			$query['total_filter'] = $res['total_filter'];
			$query['data'] = $res['data'];

		} else {
			$data['status'] = FALSE;
			$query['total_all'] = $res['total_all'];
			$query['total_filter'] = $res['total_filter'];
			$query['message'] = 'something went wrong. If this persist, contact our support.';
		}

		return $query;
		exit();
    }
	public function fetchArticle($start, $length, $orderby, $ordertype, $search) {
		$this->db->start_cache();
		$select = array('a.title','a.text','a.img','a.thumb_file','a.meta_tag_title','a.meta_tag_keywords','a.meta_tag_description');
		$this->db->select('a.id, '.implode(',',$select).', a.date_created, a.type');
		$this->db->from('posting as a');
//		$this->db->join('users as b', 'a.user_created = b.id', 'left');
		$this->db->order_by('a.id', 'DESC');

		$res['total_all'] = $this->db->count_all_results();

		if(!empty($search))
		{
			$this->db->group_start();
			foreach($select as $k=>$s)
			{
				$this->db->or_like('LOWER('.$s.')',$search);
			}
			$this->db->group_end();
		}

		$this->db->stop_cache();

		if(!empty($orderby) && empty($ordertype)){
			$this->db->order_by($orderby, 'ASC');
		} else if(empty($orderby) && !empty($ordertype)){
			$this->db->order_by('a.id', $ordertype);
		} else {
			$this->db->order_by('a.id','DESC');
		}


		if($length > 0){
			$this->db->limit($length, $start);
		}

		$querysql = $this->db->get();
		$res['data'] = $querysql->result_array();
		$res['total_filter'] = $this->db->count_all_results();
		$this->db->flush_cache();

		if($querysql){
			$query['status'] = TRUE;
			$query['total_all'] = $res['total_all'];
			$query['total_filter'] = $res['total_filter'];
			$query['data'] = $res['data'];

		} else {
			$data['status'] = FALSE;
			$query['total_all'] = $res['total_all'];
			$query['total_filter'] = $res['total_filter'];
			$query['message'] = 'something went wrong. If this persist, contact our support.';
		}

		return $query;
		exit();
	}
}
