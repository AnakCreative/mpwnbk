<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    function get_access($id,$link){
		$query = $this->db->query("select b.add,b.update,b.delete,b.view from menu a inner join usermenu b on a.id = b.menu_id where b.user_id='". $id ."' and a.link = '".$link."'");
		return $query->result_array();
	}

    function list_group(){
      $this->db->select('a.*');
  		$this->db->from('groups as a');
  		return $this->db->get()->result();
    }

    function get_super_user(){
      $this->db->from('users_groups as b');
      $this->db->where('b.group_id',1);
  		return $this->db->get()->num_rows();
    }

    function delete_group($id){
      $this->db->where('id', $id);
      $this->db->delete('groups');
    }

}
