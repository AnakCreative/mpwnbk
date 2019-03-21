<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logactivity extends CI_Model {

    var $table = 'logging';
    var $column = array('user_name','aktifitas','date');
    var $order = array('id' => 'desc');

	function insertlog($data_log)
	{
		$user_id	=$data_log['user_id'];
		$user_nama	=$data_log['user_name'];
		$log	=$data_log['activity'];
		$timezone 	= new DateTimeZone("Asia/Jakarta");//Untuk menyesuaikan dengan jam indonesia
		$dat 		= new DateTime();//Untuk menyesuaikan dengan jam indonesia
		$dat->setTimezone($timezone);//Untuk menyesuaikan dengan jam indonesia
		$date		=date('Y-m-d');
		$time		=$dat->format('H:i:s'); // format jam dipanggil disini
		$class =$data_log['class'];
		$link =$data_log['link'];


        if (empty($data_log['ip'])) {

			$ip = "127.0.0.1";
			$countries_sess = "unknown";

		} else if (empty($data_log['countries_sess'])) {

			$ip = "127.0.0.1";
			$countries_sess = "unknown";


		} else {
			$ip =$data_log['ip'];
			$countries_sess =$data_log['countries_sess'];
		}

		$data_log	=array(
            'user_id'=>$user_id,
            'user_name' =>$user_nama,
            'aktifitas' =>$log,
            'class' =>$class,
            'link' =>$link,
            'date'=>$date,
            'time'=>$time,
            'ip'=>$ip,
            'from'=>$countries_sess
		);

		$this->db->insert($this->table,$data_log);

		$tanggal 		= date('Ymd');
		$filename 		= $tanggal.".txt";
		$file 			= $_SERVER['DOCUMENT_ROOT']."/log/".$filename ;
		/* $handle			= fopen($file,"a+");
		$somecontent 	= $user_id."|".$user_nama."|".$activity."|".$date."|".$time."\r\n\r\n";
		fwrite($handle,$somecontent);
		fclose($handle); */
	}

	function _get_datatables_query()
    {
        $this->db->from($this->table);
		$this->db->order_by("id", "desc");
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
	function delete($id)
    {
		$this->db->where('id', $id);
        $this->db->delete($this->table);
	}
    function get_admin_activities() 
    {
        $this->db->select('a.*,b.username,b.image');
        $this->db->join('users as b', 'a.user_id = b.id','left');
        $this->db->from('logging as a');
        $this->db->order_by('a.id', 'DESC');
        $this->db->limit(4);
        return $this->db->get()->result();
    }
}
