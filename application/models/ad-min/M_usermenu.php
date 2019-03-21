<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usermenu extends CI_Model {

    var $table = 'users';
    var $column = array('first_name','username','email');
    var $order = array('id' => 'desc');

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function _get_akses($id,$link){
		$query = $this->db->query("select b.add,b.update,b.delete,b.view from menu a inner join usermenu b on a.id = b.menu_id where b.user_id='". $id ."' and a.link = '".$link."'");
		return $query->result_array();
	}

    function _get_datatables_query()
    {
        $this->db->select('a.*,b.id as user_id,b.first_name,b.username,b.email');
        $this->db->from('users_groups a');
        $this->db->join('users b','a.user_id = b.id','left');
        $this->db->join('groups c','a.group_id = c.id','left');
		    $this->db->order_by("a.id", "desc");

        $i = 0;

        foreach ($this->column as $item)
        {
			if (isset($_POST['search'])){
				if($_POST['search']['value'])
				{
					if($i===0)
					{
						$this->db->group_start();
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column) - 1 == $i)
						$this->db->group_end();
				}
			}
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
		if (isset($_POST['length']) && isset($_POST['start'])){
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		}
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

	function get_user_menu($id=0){
		$lSQL = 'select id,idP,name,sum(add1)as add1,sum(view1)as view1,sum(update1)as update1,sum(delete1)as delete1 from ( ';
		$lSQL = $lSQL .'select id,0 as idP,a.name,0 as add1,0 as view1,0 as update1,0 as delete1 from menu a left join usermenu b on a.id = b.menu_id where a.parent_id = 0 ';
		$lSQL = $lSQL .'union all ';
		$lSQL = $lSQL .'select a.parent_id as id,id as idP,a.name,0 as add1,0 as view1,0 as update1,0 as delete1 from menu a left join usermenu b on a.id = b.menu_id where a.parent_id <> 0 ';
		$lSQL = $lSQL .'union all ';
		$lSQL = $lSQL .'select id,0 as idP,a.name,b.add as add1,b.view as view1,b.update as update1,b.delete as delete1 from menu a left join usermenu b on a.id = b.menu_id where b.user_id = '.$id.' and a.parent_id = 0 ';
		$lSQL = $lSQL .'union all ';
		$lSQL = $lSQL .'select a.parent_id as id,id as idP,a.name,b.add as add1,b.view as view1,b.update as update1,b.delete as delete1 from menu a left join usermenu b on a.id = b.menu_id where b.user_id = '.$id.' and a.parent_id <> 0 ';
		$lSQL = $lSQL .') temp3 group by id,idP,name order by id,idP';

		$query = $this->db->query($lSQL);
		return $query->result_array();
	}

    function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
