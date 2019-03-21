<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	var $limit, $API_key, $channelID;

	function __construct() {
		parent::__construct();

		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'pnjwnbk@gmail.com';
		$config['smtp_pass'] = 'pnj.wnbk01';
		$config['mailtype']  = 'html';
		$config['charset']   = 'iso-8859-1';

		$this->load->library('email', $config);
		$this->load->library('recaptcha');
		$this->load->model('front/front_m');
		$this->load->helper('toolkit');

		$this->limit = 6;

		//youtube
		//pnjwnbk@gmail.com
		$this->API_key    = 'AIzaSyAJNNIhknUHn1KILDGfh6IC7UzW7mP9sAc';
		$this->channelID  = 'UCW8WxZHKSIiF0duDpj7L5pg';

	}

	/* start load page */
	public function index()
	{
		$data['title'] 		= 'Home';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$this->uri->segment(2);	 //from url page
		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'home'))->row();
		//data slider
		$data['slider'] 		= $this->front_m->get_all('slider_image');
		//data header video
		$data['video'] 		= $this->front_m->get_all('slider_video')->row();
		//data logo & title
		$data['logo'] 			= $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  	= $this->front_m->get_submenu_alumni();

		//data direksi
		$direksi = $this->front_m->get_select('directive_home',array('position' => 'direksi'))->row();
		$url = '';
		if(!empty($direksi)) {
			$url = getYoutubeId($direksi->url);
			$data['direksi'] = array(
					'url' 				=> $url,
					'picture' 		=> $direksi->picture,
					'description' => $direksi->description,
					'name' 				=> $direksi->name
			);
			$data['direksi'] = (object) $data['direksi'];
		}
		//data new info
		$news = $this->front_m->get_select_limited_sort('posting',array('type'=>'info'),0, 2,'date_created','DESC');
		if (!empty($news->result())) {
			$no = 0;
			foreach($news->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 330) $text = substr(strip_tags($row->text), 0, 330) . '...';
				$number = array(
											'title'		=> $row->title,
											'text'		=> $text,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/news/detail/'.$row->id),
											'date' 		=> date_id($row->date_created)
									);
				$data['news'][$no] = (object) $number;
				$no++;
			}
		}
		//data new acara
		$event = $this->front_m->get_select_limited_sort('posting',array('type'=>'event'),0, 3,'date_created','DESC');
		if (!empty($event->result())) {
			$no = 0;
			foreach($event->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$number = array(
											'title'		=> $row->title,
											'text'		=> $text,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/acara/detail/'.$row->id),
											'date' 		=> date_id($row->date_created)
									);
				$data['event'][$no] = (object) $number;
				$no++;
			}
		}
		//data new foto
		$data['foto']  			= $this->front_m->get_all_limited_sort('photo',0,3,'date_created','DESC');
		//data advertise footer
		$data['advertise']  = $this->front_m->get_all_limited_sort('advertise',0,4,'date_created','DESC');

		$data['content'] 		= $this->load->view('front/content/home_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function about()
	{
		$data['title'] = 'About';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$this->uri->segment(2);	 //from url page
		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'about'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan'] = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise'] = $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//data direksi
		$direksi = $this->front_m->get_select('directive_home',array('position' => 'wakil'))->row();
		$url = '';
		if(!empty($direksi)) {
			$url = getYoutubeId($direksi->url);
			$data['direksi'] = array(
					'url' 				=> $url,
					'picture' 		=> $direksi->picture,
					'description' => $direksi->description,
					'name' 				=> $direksi->name
			);
			$data['direksi'] = (object) $data['direksi'];
		}

		//data about
		$data['about'] = $this->front_m->get_select('company_profile',array('flag' => 'about'))->row();
		//data visi
		$data['visi'] = $this->front_m->get_select('company_profile',array('flag' => 'visi'))->row();
		//data misi
		$data['misi'] = $this->front_m->get_select('company_profile',array('flag' => 'misi'))->row();
		//data ksrpd
		$data['ksrpd'] = $this->front_m->get_select('company_profile',array('flag' => 'ksrpd'))->row();
		//data poma
		$data['poma'] = $this->front_m->get_select('company_profile',array('flag' => 'poma'))->row();

		$data['content'] = $this->load->view('front/content/about_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function acara()
	{
		$data['title'] = 'Acara';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage'] 	= $this->uri->segment(2);	 //from url page
		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'info'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  = $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//get data
		$all = $this->front_m->get_select('posting',array('type'=>'event'));
		$acara = $this->front_m->get_select_limited_sort(
				'posting', //table
				array('type' => 'event'), //condition
				0, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($acara->result())) {
			$no = 0;
			foreach($acara->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$number = array(
											'title'		=> $row->title,
											'text'		=> $text,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/'.$data['subpage'].'/detail/'.$row->id),
											'date' 		=> date_id($row->date_created)
									);
				$data['posting'][$no] = (object) $number;
				$no++;
			}
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $this->limit;
		}

		$data['content'] 	= $this->load->view('front/content/posting_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function alumni()
	{
			$data['title'] = 'Alumni';
			$data['page']			=	$this->uri->segment(1); //from url after domain
			$data['subpage']	=	$uri = $this->uri->segment(2);	 //from url page
			//data meta tag
			$data['meta'] 		= $this->front_m->get_all('general_site')->row();
			//data background
			$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'alumni'))->row();
			//data logo & title
			$data['logo'] = $this->get_logotitle();
			//sub menu alumni
			$data['angkatan']  = $this->front_m->get_submenu_alumni();

			//data column all
			$uri = $this->uri->segment(2);
			$data['alumni']  	= $this->front_m->get_select('alumni',array('id'=>$uri))->row();

			//data foto activity
			$this->limit = 8;
			$all = $this->front_m->get_select('photo_activities', array('alumni_id'=>$uri));
			$foto = $this->front_m->get_select_limited(
					'photo_activities', //table
					array('alumni_id'=>$uri),
					0, //first row
					$this->limit
			);
			if (!empty($foto->result())) {
				$no = 0;
				foreach($foto->result() as $row) {
					$number = array(
												'title'		=> $row->title,
												'image'		=> base_url('image/event/'.$row->picture)
										);
					$data['foto'][$no] = (object) $number;
					$no++;
				}
				$data['total_row'] = $all->num_rows();
				$data['offset'] = $this->limit;
			}

			$data['content'] = $this->load->view('front/content/alumni_v',$data, true);
			$this->load->view('front/layout/main_v',$data);

	}

	public function angkatan()
	{
		$data['title'] = 'Angkatan';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$uri = $this->uri->segment(2);	 //from url page
		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'alumni'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  	= $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//data content
		$data['alumni']  	= $this->front_m->get_select_sort('alumni',array('angkatan'=> $uri),'firstname','ASC');

		$data['content'] = $this->load->view('front/content/angkatan_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function artikel()
	{
		$data['title'] = 'Artikel';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage'] 	= $this->uri->segment(2);	 //from url page
		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'info'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  = $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//get data
		$all = $this->front_m->get_select('posting',array('type'=>'article'));
		$acara = $this->front_m->get_select_limited_sort(
				'posting', //table
				array('type' => 'article'), //condition
				0, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($acara->result())) {
			$no = 0;
			foreach($acara->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$number = array(
											'title'		=> $row->title,
											'text'		=> $text,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/'.$data['subpage'].'/detail/'.$row->id),
											'date' 		=> date_id($row->date_created)
									);
				$data['posting'][$no] = (object) $number;
				$no++;
			}
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $this->limit;
		}

		$data['content'] 	= $this->load->view('front/content/posting_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function contact()
	{
		$data['title'] = 'Contact';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$this->uri->segment(2);	 //from url page
		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'kontak'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  	= $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//data content
		$data['contact']  = $this->front_m->get_all('site_information')->row();
		$data['location'] = $this->front_m->get_all('location')->row();

		//load view
		$data['content'] = $this->load->view('front/content/contact_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function detail()
	{
		$data['title'] = 'Detail';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$this->uri->segment(2);	 //from url page

		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'info'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  	= $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//data detail
		$uri = $this->uri->segment(4);
		$detail = $this->front_m->get_select('posting',array('id'=>$uri));
		$data['detail'] = null;
		if (!empty($detail->row())) {
				$row = $detail->row();
				$data['detail'] = (object) array(
							'title'		=> $row->title,
							'text'		=> $row->text,
							'image'		=> base_url('image/posting/'.$row->thumb_file),
							'date' 		=> date_id($row->date_created)
				);
				$text = $row->text;
				if(strlen($row->text) > 150) $text = substr(strip_tags($row->text), 0, 150);
				$data['meta'] = (object) array(
						'meta_tag_keywords'			=> str_replace(' ', ',',$row->title),
						'meta_tag_description'	=> $text
				);
		}

		//sidebar
		$lastevent = $this->front_m->get_select_limited_sort('posting',array('type'=>'event'),0,2,'date_created','DESC');
		if (!empty($lastevent->result())) {
			$no = 0;
			foreach($lastevent->result() as $row) {
				$number = array(
											'title'		=> $row->title,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/acara/detail/'.$row->id),
											'date' 		=> last_time($row->date_created)
									);
				$data['lastevent'][$no] = (object) $number;
				$no++;
			}
		}
		$lastnews = $this->front_m->get_select_limited_sort('posting',array('type'=>'info'),0,2,'date_created','DESC');
		if (!empty($lastnews->result())) {
			$no = 0;
			foreach($lastnews->result() as $row) {
				$number = array(
											'title'		=> $row->title,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/news/detail/'.$row->id),
											'date' 		=> last_time($row->date_created)
									);
				$data['lastnews'][$no] = (object) $number;
				$no++;
			}
		}
		$lastartikel	= $this->front_m->get_select_limited_sort('posting',array('type'=>'article'),0,2,'date_created','DESC');
		if (!empty($lastartikel->result())) {
			$no = 0;
			foreach($lastartikel->result() as $row) {
				$number = array(
											'title'		=> $row->title,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/artikel/detail/'.$row->id),
											'date' 		=> last_time($row->date_created)
									);
				$data['lastartikel'][$no] = (object) $number;
				$no++;
			}
		}

		$data['content'] 	= $this->load->view('front/content/posting_detail_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function foto()
	{
		$data['title'] 		= 'Foto';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$uri = $this->uri->segment(2);	 //from url page

		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'info'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan'] = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  	= $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//get data
		$this->limit = 8;
		$all = $this->front_m->get_all('photo');
		$foto = $this->front_m->get_all_limited_sort(
				'photo', //table
				0, //first row
				$this->limit,
				'position', //field sort
				'DESC' //short
		);
		if (!empty($foto->result())) {
			$no = 0;
			foreach($foto->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$number = array(
											'title'		=> $row->title,
											'text'		=> $text,
											'image'		=> base_url('image/event/'.$row->image)
									);
				$data['foto'][$no] = (object) $number;
				$no++;
			}
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $this->limit;
		}

		$data['content'] 	= $this->load->view('front/content/foto_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function news()
	{
		$data['title'] = 'News';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage'] 	= $this->uri->segment(2);	 //from url page

		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'info'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan']  = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  = $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//get data
		$all = $this->front_m->get_select('posting',array('type'=>'info'));
		$acara = $this->front_m->get_select_limited_sort(
				'posting', //table
				array('type' => 'info'), //condition
				0, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($acara->result())) {
			$no = 0;
			foreach($acara->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$number = array(
											'title'		=> $row->title,
											'text'		=> $text,
											'image'		=> base_url('image/posting/'.$row->thumb_file),
											'detail'	=> base_url('info/'.$data['subpage'].'/detail/'.$row->id),
											'date' 		=> date_id($row->date_created)
									);
				$data['posting'][$no] = (object) $number;
				$no++;
			}
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $this->limit;
		}

		$data['content'] 	= $this->load->view('front/content/posting_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function video()
	{
		$data['title'] 		= 'Video';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$uri = $this->uri->segment(2);	 //from url page

		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => 'info'))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan'] = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  	= $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		$newest = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=' . $this->channelID . '&maxResults=21&key=' . $this->API_key) );
		$no = 0;
		foreach($newest->items as $item){
			//Embed video
			if(!empty($item->id->videoId)){
				$number = array(
											'id'						=> $item->id->videoId,
											'title'					=> $item->snippet->title,
											'thumb'					=> $item->snippet->thumbnails->high->url,
											'views'					=> youtube_statistics($item->id->videoId,$this->API_key),
											'date' 					=> last_time(date('Y-m-d', strtotime($item->snippet->publishedAt)))
									);
				$data['newest'][$no] = (object) $number;
				$no++;
			}
		}

		$data['content'] 	= $this->load->view('front/content/video_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}

	public function konsentrasi()
	{
		$data['title'] = 'konsentrasi';
		$data['page']			=	$this->uri->segment(1); //from url after domain
		$data['subpage']	=	$uri = $this->uri->segment(2);	 //from url page

		//data meta tag
		$data['meta'] 		= $this->front_m->get_all('general_site')->row();
		//data background
		$data['bg'] 		= $this->front_m->get_select('background_site',array('page' => $uri))->row();
		//data logo & title
		$data['logo'] = $this->get_logotitle();
		//sub menu alumni
		$data['angkatan'] = $this->front_m->get_submenu_alumni();
		//data advertise footer
		$data['advertise']  	= $this->front_m->get_all_limited_sort('advertise',0,3,'date_created','DESC');

		//data konsentrasi
		$detail = $this->front_m->get_select('konsentrasi',array('flag'=>$uri));
		$data['detail'] = null;
		if (!empty($detail->row())) {
				$row = $detail->row();
				$data['detail'] = (object) array(
							'title'		=> $row->title,
							'text'		=> $row->description,
							'image'		=> base_url('image/background/'.$row->image)
				);
		}

		$data['content'] = $this->load->view('front/content/konsentrasi_v',$data, true);
		$this->load->view('front/layout/main_v',$data);
	}
	/* end load page */


  private function get_logotitle() {
	//data site setting
		$logo = $this->front_m->get_all_limited('ic_logo', 0, 1);
		if ($logo->num_rows() > 0) {
			return $logo->row();
		} else {
			return null;
		}
	}

  private function get_submenu_alumni() {
	//data site setting
		$logo = $this->front_m->get_submenu_alumni();
		if ($logo->num_rows() > 0) {
			return $logo->row();
		} else {
			return null;
		}
	}

	public function get_location(){
		//data location
		$location = $this->front_m->get_all_limited('location', 0, 1)->row();
		echo json_encode(array('lat'=> $location->latitude, 'lon' => $location->longitude));
	}

	private function _valid_contact()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('message', 'Message', 'required|max_length[200]|trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('required','Kolom %s harus diisi');
		$this->form_validation->set_message('valid_email','Email yang anda masukan tidak valid');
		$this->form_validation->set_message('max_length','Tidak boleh lebih dari 200 karakter');

		$this->form_validation->run();

		if(form_error('name')!= '') {
			$data['inputerror'][] = 'name';
			$data['error_string'][] = form_error('name');
			$data['status'] = FALSE;
		}
		if(form_error('email')!= '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = form_error('email');
			$data['status'] = FALSE;
		}
		if(form_error('message')!= '')	{
			$data['inputerror'][] = 'message';
			$data['error_string'][] = form_error('message');
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _valid_register()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('sekolah', 'Sekolah', 'required|trim');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('hp', 'No Handphone', 'required|numeric|trim');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
		$this->form_validation->set_rules('twitter', 'Twitter', 'trim');
		$this->form_validation->set_rules('facebook', 'facebook', 'trim');
		$this->form_validation->set_rules('line', 'Line', 'trim');
		$this->form_validation->set_rules('bbm', 'BBM', 'trim');
		$this->form_validation->set_rules('hari', 'Hari kursus', 'required|trim');
		$this->form_validation->set_rules('jam', 'Jam kursus', 'required|trim');
		$this->form_validation->set_rules('namaortu', 'Nama Orang Tua', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('notelp', 'No rumah', 'required|numeric|trim');
		$this->form_validation->set_rules('nohp', 'No Handphone Orang Tua', 'required|numeric|trim');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('required','%s harus diisi');
		$this->form_validation->set_message('valid_email','Email yang anda masukan tidak valid');
		$this->form_validation->set_message('numeric','Isikan hanya dengan nomer');

		$this->form_validation->run();

		if(form_error('nama')!= '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = form_error('nama');
			$data['status'] = FALSE;
		}
		if(form_error('ttl')!= '') {
			$data['inputerror'][] = 'ttl';
			$data['error_string'][] = form_error('ttl');
			$data['status'] = FALSE;
		}
		if(form_error('alamat')!= '')	{
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = form_error('alamat');
			$data['status'] = FALSE;
		}
		if(form_error('sekolah')!= '')	{
			$data['inputerror'][] = 'sekolah';
			$data['error_string'][] = form_error('sekolah');
			$data['status'] = FALSE;
		}
		if(form_error('kelas')!= '')	{
			$data['inputerror'][] = 'kelas';
			$data['error_string'][] = form_error('kelas');
			$data['status'] = FALSE;
		}
		if(form_error('hp')!= '')	{
			$data['inputerror'][] = 'hp';
			$data['error_string'][] = form_error('hp');
			$data['status'] = FALSE;
		}
		if(form_error('email')!= '')	{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = form_error('email');
			$data['status'] = FALSE;
		}
		if(form_error('twitter')!= '')	{
			$data['inputerror'][] = 'twitter';
			$data['error_string'][] = form_error('twitter');
			$data['status'] = FALSE;
		}
		if(form_error('facebook')!= '')	{
			$data['inputerror'][] = 'facebook';
			$data['error_string'][] = form_error('facebook');
			$data['status'] = FALSE;
		}
		if(form_error('line')!= '')	{
			$data['inputerror'][] = 'line';
			$data['error_string'][] = form_error('line');
			$data['status'] = FALSE;
		}
		if(form_error('bbm')!= '')	{
			$data['inputerror'][] = 'bbm';
			$data['error_string'][] = form_error('bbm');
			$data['status'] = FALSE;
		}
		if(form_error('hari')!= '')	{
			$data['inputerror'][] = 'hari';
			$data['error_string'][] = form_error('hari');
			$data['status'] = FALSE;
		}
		if(form_error('jam')!= '')	{
			$data['inputerror'][] = 'jam';
			$data['error_string'][] = form_error('jam');
			$data['status'] = FALSE;
		}
		if(form_error('namaortu')!= '')	{
			$data['inputerror'][] = 'namaortu';
			$data['error_string'][] = form_error('namaortu');
			$data['status'] = FALSE;
		}
		if(form_error('pekerjaan')!= '')	{
			$data['inputerror'][] = 'pekerjaan';
			$data['error_string'][] = form_error('pekerjaan');
			$data['status'] = FALSE;
		}
		if(form_error('notelp')!= '')	{
			$data['inputerror'][] = 'notelp';
			$data['error_string'][] = form_error('notelp');
			$data['status'] = FALSE;
		}
		if(form_error('nohp')!= '')	{
			$data['inputerror'][] = 'nohp';
			$data['error_string'][] = form_error('nohp');
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	function paging($total_rows,$limit,$base_url){
		$config['base_url'] 		= $base_url;
		$config['total_rows'] 		= $total_rows;
		$config['per_page'] 		= $limit;
		$config['uri_segment'] 		= 2;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] 		= FALSE;
		$config['last_link'] 		= FALSE;
		$config['attributes'] 		= array('class' => 'c-pager__link');
		$config['full_tag_open'] 	= '<div class="c-pager__inner">';
		$config['full_tag_close'] 	= '</div>';
		$config['num_tag_open'] 	= '<p class="c-pager__digit">';
		$config['num_tag_closen'] 	= '</p>';
		$config['cur_tag_open'] 	= '<p class="c-pager__block is_active">';
		$config['cur_tag_closen'] 	= '</p>';
		$config['prev_link'] 		= '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_open'] 	= '<p class="c-pager__digit">';
		$config['prev_tag_close'] 	= '</p>';
		$config['next_link'] 		= '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] 	= '<p class="c-pager__digit">';
		$config['next_tag_close'] 	= '</p>';
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}
