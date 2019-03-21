<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front_m extends CI_Model {

	//select data
	public function get_all($table)
	{
		return $this->db->get($table);
	}

	public function get_all_sort($table, $field, $sort)
	{
		$this->db->order_by($field, $sort);
		return $this->db->get($table);
	}

	//select data field max with condition
	public function get_max_by_with_condition($table, $fieldshow, $where)
	{
		$this->db->select_max($fieldshow);
		return $this->db->get_where($table, $where)->row($fieldshow);
	}

	//select data field max
	public function get_max_by($table, $fieldshow)
	{
		$this->db->select_max($fieldshow);
		return $this->db->get($table)->row($fieldshow);
	}

	//select data with limit
	public function get_all_limited_sort($table,$limit,$offset, $field, $sort)
	{
		$this->db->order_by($field, $sort);
		return $this->db->get($table, $limit, $offset);
	}

	//select data with limit
	public function get_all_limited($table,$limit,$offset)
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get($table, $limit, $offset);
	}

	//select data with condition character %%
	public function get_select_like($table,$kolom,$data)
	{
		$this->db->order_by('id', 'DESC');
		$this->db->like($kolom, $data);
		return $this->db->get($table);
	}

	//select data with condition
	public function get_select($table,$data)
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get_where($table, $data);
	}
	public function get_select_sort($table,$data,$field, $sort)
	{
		$this->db->order_by($field, $sort);
		return $this->db->get_where($table, $data);
	}

	//select data with condition and limited
	public function get_select_limited($table,$data,$limit,$offset)
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit($offset,$limit);
		$this->db->where($data);
		return $this->db->get($table);
	}

	//select data with condition and limited
	public function get_select_limited_sort($table,$data,$limit,$offset,$field, $sort)
	{
		$this->db->order_by($field, $sort);
		$this->db->limit($offset,$limit);
		$this->db->where($data);
		return $this->db->get($table);
	}

	//select data with condition, sort by and limited
	public function get_limited($table,$limit,$offset,$field,$sort)
	{
		$this->db->order_by($field, $sort);
		$this->db->limit($offset,$limit);
		return $this->db->get($table);
	}

	//insert data
	function insert_data($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	//update data
	function update_data($table,$data,$field_key)
	{
		return $this->db->update($table,$data,$field_key);
	}

	//delete data
	function delete_data($table,$data)
	{
		return $this->db->delete($table,$data);
	}

	//manual query
	function manual_query($q)
	{
		return $this->db->query($q);
	}

	/* Start Functional function */
	// check session
	function session()
	{
		if ($this->session->userdata('iduser') == '') {
			redirect(base_url().'control/login');
		}
	}
	function get_submenu_alumni()
	{
		$this->db->select('angkatan');
		$this->db->distinct();
		$this->db->order_by('angkatan', 'ASC');
		$this->db->from('alumni');
		return $this->db->get();
	}
	/* End Functional function */
}

/* End of file Front_m.php */
