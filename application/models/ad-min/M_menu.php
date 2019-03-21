<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

    var $table = 'menu';
    var $column = array('name','class','link','level','parent_id');
    var $order = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	private function _get_datatables_query()
	{

		$this->db->from($this->table);
		$this->db->where('active', 1);

		$i = 0;

		foreach ($this->column as $item) // loop column
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

				if(count($this->column) - 1 == $i) //last loop
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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
    //jsgrid get database
    function jsgrid()
    {
        $this->db->select('a.*,a.class as icon');
		$this->db->from('menu as a');
		return $this->db->get()->result();

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

	function get_id($id)
	{
		$this->db->select('name, link, class, parent_id, level, active');
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function update($where, $data)
	{
		return $this->db->update($this->table, $data, $where);
		//return $this->db->affected_rows();
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
    function delete_parent_id($id)
	{
		$this->db->where('parent_id', $id);
		$this->db->delete($this->table);
	}
    
    function checkparent_id($id)
    {
        $this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row()->parent_id;
    }

}
