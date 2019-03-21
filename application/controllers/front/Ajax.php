<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	var $limit;

	function __construct() {
		parent::__construct();
		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'smtp.sendgrid.net';
		$config['smtp_port'] = 587;
		$config['smtp_user'] = 'apikey';
		$config['smtp_pass'] = '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';
		$config['mailtype']  = 'html';
		$config['crlf']  		 = '\r\n';
		$config['newline']   = '\r\n';

		$this->load->library('email', $config);
		$this->load->library('recaptcha');
		$this->load->model('front/front_m');
		$this->load->helper('toolkit');

		$this->limit = 6;
	}

	/*------------------------------*/
	/* 		  START JSON handling  		*/
	/*------------------------------*/
	public function contact()
	{
			if(!$this->input->is_ajax_request()) redirect(base_url('404'));
			$this->_valid_contact();

			$dataMail = array(
					'name' 					=> $this->input->post('pnjName'),
					'email' 				=> $this->input->post('pnjEmail'),
					'message'			 	=> $this->input->post('pnjMessage'),
					'date_created'	=> date('Y-m-d')
			);

		if($this->front_m->insert_data('contact_us',$dataMail)) {
			//load mail template
			$message 	= $this->load->view('front/email/question.php', $dataMail, TRUE);;

			$this->email->set_newline("\r\n");
			$this->email->from('mpwnbk@pnj.ac.id', 'MPWNBK no-reply');
			$this->email->to('mpwnbk@pnj.ac.id');
			$this->email->subject('Kontak Kami');
			$this->email->message($message);
			//Send Email
			if (!$this->email->send()){
				$result = FALSE;
				echo $this->email->print_debugger();
				exit();
			}else{
				echo json_encode(array('status' => true));
			}
		} else {
			echo json_encode(array('status' => false));
		}
	}

	public function more_acara()
	{
		if(!$this->input->is_ajax_request()) redirect(base_url('404'));
		$offset		=	$this->uri->segment(3);
		if(empty($offset)) {
			echo json_encode(array('status' => false));
			exit();
		}

		//get data from db
		$all = $this->front_m->get_select('posting',array('type'=>'event'));
		$acara = $this->front_m->get_select_limited_sort(
				'posting', //table
				array('type' => 'event'), //condition
				$offset, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($acara->result())) {
			$html = '';
			foreach($acara->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$html .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4">
										<div class="blog-item-wrapper">
												<div class="blog-item-img">
														<img src="'.base_url('image/posting/'.$row->thumb_file).'" alt="'.$row->title.'">
												</div>
												<div class="blog-item-text">
														<h3 class="small-title">'.$row->title.'</h3>
														<p>'.$text.'</p>
														<div class="blog-one-footer">
																<span class="date">'.date_id($row->date_created).'</span>
																<a href="'.base_url('info/artikel/detail/'.$row->id).'">Read More</a>
														</div>
												</div>
										</div>
								</div>';
			}
			$data['status'] = true;
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $offset + $this->limit;
			$data['posting'] = $html;
			echo json_encode($data);
		}
	}

	public function more_artikel()
	{
		if(!$this->input->is_ajax_request()) redirect(base_url('404'));
		$offset		=	$this->uri->segment(3);
		if(empty($offset)) {
			echo json_encode(array('status' => false));
			exit();
		}

		//get data from db
		$all = $this->front_m->get_select('posting',array('type'=>'article'));
		$artikel = $this->front_m->get_select_limited_sort(
				'posting', //table
				array('type' => 'article'), //condition
				$offset, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($artikel->result())) {
			$html = '';
			foreach($artikel->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$html .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4">
										<div class="blog-item-wrapper">
												<div class="blog-item-img">
														<img src="'.base_url('image/posting/'.$row->thumb_file).'" alt="'.$row->title.'">
												</div>
												<div class="blog-item-text">
														<h3 class="small-title">'.$row->title.'</h3>
														<p>'.$text.'</p>
														<div class="blog-one-footer">
																<span class="date">'.date_id($row->date_created).'</span>
																<a href="'.base_url('info/artikel/detail/'.$row->id).'">Read More</a>
														</div>
												</div>
										</div>
								</div>';
			}
			$data['status'] = true;
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $offset + $this->limit;
			$data['posting'] = $html;
			echo json_encode($data);
		}
	}

	public function more_foto()
	{
		if(!$this->input->is_ajax_request()) redirect(base_url('404'));
		$offset		=	$this->uri->segment(3);
		if(empty($offset)) {
			echo json_encode(array('status' => false));
			exit();
		}

		//get data from db
		$this->limit = 8;
		$all = $this->front_m->get_all('photo');
		$foto = $this->front_m->get_all_limited_sort(
				'photo', //table
				$offset, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($foto->result())) {
			$html = '';
			foreach($foto->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$html .= '<a class="list-foto col-md-3 col-lg-3 col-sm-3 col-xs-12 mix" href="'.base_url('image/event/'.$row->image).'">
											<div class="portfolio-item">
													<div class="portfolio-img">
															<img src="'.base_url('image/event/'.$row->image).'" alt="'.$row->title.'">
													</div>
													<div class="portfoli-content">
															<div class="sup-desc-wrap">
																	<div class="sup-desc-inner">
																			<div class="sup-meta-wrap">
																					<h4 class="sup-title">'.$row->title.'</h4>
																					<p class="sup-description">'.$text.'</p>
																			</div>
																	</div>
															</div>
													</div>
											</div>
									</a>';
			}
			$data['status'] = true;
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $offset + $this->limit;
			$data['foto'] = $html;
			echo json_encode($data);
		}
	}

	public function more_foto_alumni()
	{
		if(!$this->input->is_ajax_request()) redirect(base_url('404'));
		$offset		=	$this->uri->segment(3);
		if(empty($offset)) {
			echo json_encode(array('status' => false));
			exit();
		}

		//get data from db
		$this->limit = 8;
		$all = $this->front_m->get_all('photo_activities');
		$foto = $this->front_m->get_limited(
				'photo_activities', //table
				$offset, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($foto->result())) {
			$html = '';
			foreach($foto->result() as $row) {
				$html .= '<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 mix marketing planning">
											<div class="portfolio-item">
													<div class="portfolio-img">
															<img src="'.base_url('image/event/'.$row->picture).'" alt="">
													</div>
													<div class="portfoli-content">
															<div class="sup-desc-wrap">
																	<div class="sup-desc-inner">
																			<div class="sup-meta-wrap">
																					<a href="#"><h4 class="sup-title">'.$row->title.'</h4></a>
																			</div>
																	</div>
															</div>
													</div>
											</div>
									</div>';
			}
			$data['status'] = true;
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $offset + $this->limit;
			$data['foto'] = $html;
			echo json_encode($data);
		}
	}

	public function more_news()
	{
		if(!$this->input->is_ajax_request()) redirect(base_url('404'));
		$offset		=	$this->uri->segment(3);
		if(empty($offset)) {
			echo json_encode(array('status' => false));
			exit();
		}

		//get data from db
		$all = $this->front_m->get_select('posting',array('type'=>'info'));
		$news = $this->front_m->get_select_limited_sort(
				'posting', //table
				array('type' => 'info'), //condition
				$offset, //first row
				$this->limit,
				'date_created', //field sort
				'DESC' //short
		);
		if (!empty($news->result())) {
			$html = '';
			foreach($news->result() as $row) {
				$text = $row->text;
				if(strlen($text) > 100) $text = substr(strip_tags($row->text), 0, 100) . '...';
				$html .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4">
										<div class="blog-item-wrapper">
												<div class="blog-item-img">
														<img src="'.base_url('image/posting/'.$row->thumb_file).'" alt="'.$row->title.'">
												</div>
												<div class="blog-item-text">
														<h3 class="small-title">'.$row->title.'</h3>
														<p>'.$text.'</p>
														<div class="blog-one-footer">
																<span class="date">'.date_id($row->date_created).'</span>
																<a href="'.base_url('info/artikel/detail/'.$row->id).'">Read More</a>
														</div>
												</div>
										</div>
								</div>';
			}
			$data['status'] = true;
			$data['total_row'] = $all->num_rows();
			$data['offset'] = $offset + $this->limit;
			$data['posting'] = $html;
			echo json_encode($data);
		}
	}

	/*------------------------------*/
	/* 		  END JSON handling  			*/
	/*------------------------------*/




	/*------------------------------*/
	/* 		START FORM VALIDATION			*/
	/*------------------------------*/
	function _valid_contact()
	{
	    $data = array();
	    $data['error_string'] = array();
	    $data['inputerror'] = array();
	    $data['status'] = TRUE;

	    $this->form_validation->set_rules('pnjName', 'Name', 'required|trim');
	    $this->form_validation->set_rules('pnjEmail', 'Email', 'required|valid_email|trim');
	    $this->form_validation->set_rules('pnjMessage', 'Message', 'required|trim');
			$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_recaptcha');
	    $this->form_validation->set_error_delimiters('', '');
	    $this->form_validation->set_message('required','%s harus diisi');
	    $this->form_validation->set_message('valid_email','Format email salah');
			$this->form_validation->set_message('recaptcha', 'Captcha harus diisi');
	    $this->form_validation->run();

	    if(form_error('pnjName')!= '') {
	        $data['inputerror'][] = 'pnjName';
	        $data['error_string'][] = form_error('pnjName');
	        $data['status'] = FALSE;
	    }
	    if(form_error('pnjEmail')!= '') {
	        $data['inputerror'][] = 'pnjEmail';
	        $data['error_string'][] = form_error('pnjEmail');
	        $data['status'] = FALSE;
	    }
	    if(form_error('pnjMessage')!= '') {
	        $data['inputerror'][] = 'pnjMessage';
	        $data['error_string'][] = form_error('pnjMessage');
	        $data['status'] = FALSE;
	    }
			if(form_error('g-recaptcha-response')!= '')	{
					$data['inputerror'][] = 'g-recaptcha-response';
					$data['error_string'][] = form_error('g-recaptcha-response');
					$data['status'] = FALSE;
			}
	    if($data['status'] === FALSE) {
	        echo json_encode($data);
	        exit();
	    }
	}
	/*------------------------------*/
	/* 	  	END FORM VALIDATION		 	*/
	/*------------------------------*/


	/*------------------------------*/
	/* 	  START CAPTCHA VALIDATE  	*/
	/*------------------------------*/
	public function recaptcha($str='')
	{
			// Catch the user's answer
			$captcha_answer = $this->input->post('g-recaptcha-response');

			// Verify user's answer
			$response = $this->recaptcha->verifyResponse($captcha_answer);

			// Processing ...
			if ($response['success']) {
					return TRUE;
			} else {
					return FALSE;
			}
	}

	/*------------------------------*/
	/* 	   END CAPTCHA VALIDATE   	*/
	/*------------------------------*/
}
