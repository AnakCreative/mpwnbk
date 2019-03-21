<?php defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
	var $link = "mp-admin/app/account";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language','openssl_class'));

		//models connection back-end
		$this->load->model('ad-min/m_settings', 'settings');
		$this->load->model('ad-min/m_logactivity', 'logactivity');
		$this->load->model('ad-min/m_user', 'user');
		//end models connection back-end

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	// redirect if needed, otherwise display the user list
	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('mp-admin/app/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('you must be an administrator to view this page.');
		}
		else
		{
			//-- user id
			$user_id = $this->session->userdata('user_id');
			//start sidebar menu
			$this->data['menu_data'] = $this->settings->get_menu($user_id);
			$this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
			$link = 0;
			//page header
			$this->data['sub_header'] = "administrator";
			$this->data['content_header'] = $this->uri->segment(2);
			//print_r($this->data['content_header']);die;
			$this->data['page_header'] = $this->settings->get_page_dashboard($link);
			$this->data['ic_logo'] = $this->settings->get_logo_header();
			$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
			$this->data['title_site'] = $this->settings->get_title_site();
			$this->data['akses'] = $this->user->get_access($user_id,$this->link);
			//end page header
			//dashboard data
			$this->data['message'] = $this->settings->contactus_num();
			$this->data['message_today'] = $this->settings->contactus_today();
			$this->data['message_yesterday'] = $this->settings->contactus_yesterday();
			$this->data['photo'] = $this->settings->photo_num();
			$this->data['photo_today'] = $this->settings->photo_today();
			$this->data['photo_yesterday'] = $this->settings->photo_yesterday();
			$this->data['alumni'] = $this->settings->alumni_num();
			$this->data['alumni_today'] = $this->settings->alumni_today();
			$this->data['alumni_yesterday'] = $this->settings->alumni_yesterday();
			$this->data['posting'] = $this->settings->posting_num();
			$this->data['posting_today'] = $this->settings->posting_today();
			$this->data['posting_yesterday'] = $this->settings->posting_yesterday();
			$this->data['activities_data'] = $this->logactivity->get_admin_activities();
			$this->data['description'] = $this->settings->general_meta_description();
			$this->data['cpu_load'] = $this->cpu_load();
			//content view
			$this->data['content'] = $this->load->view('ad-min/content/v_alpha', $this->data, true);
			//end content view
			//main content
			$this->load->view('ad-min/main/v_main', $this->data);
			//end main content
		}
	}

	// log the user in
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('mp-admin/app/index', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('mp-admin/app/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'placeholder' => lang('login_identity_label'),
				'class' => 'form-control',
				//'required' => '',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'class' => 'form-control',
				//'required' => '',
				'placeholder' => 'credentials',
				'type' => 'password',
			);

			$this->data['title_site'] = $this->settings->get_title_site();

			$this->data['activities_data'] = $this->logactivity->get_admin_activities();

			$this->_render_page('ad-min/login', $this->data);
		}
	}

	// log the user out
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('mp-admin/app/login', 'refresh');
	}

	// change password
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			// render
			$this->_render_page('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	// forgot password
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$this->data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'class' => 'form-control',
				'placeholder' => 'enter e-mail',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['activities_data'] = $this->logactivity->get_admin_activities();
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('ad-min/forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

				if($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("mp-admin/app/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("mp-admin/app/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("mp-admin/app/forgot_password", 'refresh');
			}
		}
	}

	// reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form
			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]|trim|callback_valid_password');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required|trim');

			if ($this->form_validation->run() == false)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'class' => 'form-control',
					'placeholder' => 'enter new password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name'    => 'new_confirm',
					'id'      => 'new_confirm',
					'type'    => 'password',
					'class' => 'form-control',
					'placeholder' => 'enter confirm password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				$this->data['activities_data'] = $this->logactivity->get_admin_activities();
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->_render_page('ad-min/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("mp-admin/app/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('mp-admin/app/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("mp-admin/app/forgot_password", 'refresh');
		}
	}


	// activate the user
	public function activate($id, $code=false)
	{
		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("mp-admin/app/account", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("mp-admin/app/account", 'refresh');
		}
	}

	//deactivate the user
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required|trim');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric|trim');

		if ($this->form_validation->run() == FALSE)
		{

			//print_r($this->data['csrf']);die;

			//user id check after login successfully
			$userid = $this->session->userdata('user_id');
			//start sidebar menu
			$this->data['menu_data'] = $this->settings->get_menu($userid);
			$this->data['submenu_data'] = $this->settings->get_sub_menu($userid);
			$link = 'mp-admin/app/'.$this->uri->segment(3);

			if(empty($this->settings->get_parent($link))){
				//page header
				$this->data['page_header'] = $this->settings->get_parent($link);
				//end page header
			} else {
				$this->data['page_header'] = "";
			}

			$this->data['title_site'] = $this->settings->get_title_site();

			$this->data['content_header'] = $this->uri->segment(2);
			//print_r($this->data['content_header']);die;
			$this->data['ic_logo'] = $this->settings->get_logo_header();
			$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
			//page settings maintenance,seo urls & enable history
			$data['page_settings'] = $this->settings->get_page_settings();
			//end page settings maintenance,seo urls & enable history
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();
			//content view
			$this->data['content'] = $this->load->view('ad-min/deactivate_user', $this->data, true);
			//end content view
			//main content
			$this->_render_page('ad-min/main/v_main', $this->data);
			// $this->load->view('back-end/layout/main_v', $this->data);
			//end main content

			//$this->_render_page('back-end/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				/*if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}*/

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('mp-admin/app/account', 'refresh');
		}
	}

	//create a new user
	public function create_user()
	{
		$userid = $this->session->userdata('user_id');
		$this->data['title'] = $this->lang->line('create_user_heading');
		$this->data['sub_header'] = $this->lang->line('create_user_heading');
		/* START insert update delete view access */
			$this->data['akses'] = $this->user->get_access($userid,$this->link);
			/* STOP insert update delete view access */

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('mp-admin/app/login', 'refresh');
		}

		$tables = $this->config->item('tables','ion_auth');
		$identity_column = $this->config->item('identity','ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|trim');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|trim');
		if($identity_column!=='email')
		{
			$this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'trim|required|is_unique['.$tables['users'].'.'.$identity_column.']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|trim');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('departement', $this->lang->line('create_user_validation_departement_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]|callback_valid_password|trim');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required|trim');

		if ($this->form_validation->run() == true)
		{
			$email    = strtolower($this->input->post('email'));
			$identity = ($identity_column==='email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'departement'    => $this->input->post('departement'),
				'phone'      => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("mp-admin/account", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'placeholder' => 'first_name',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'placeholder' => 'last_name',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['identity'] = array(
				'name'  => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'placeholder' => 'identity',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'placeholder' => 'email',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['departement'] = array(
				'name'  => 'departement',
				'id'    => 'departement',
				'type'  => 'text',
				'placeholder' => 'departement',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('departement'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'placeholder' => 'phone',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'placeholder' => 'password',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'placeholder' => 'confirm password',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			//user id check after login successfully
			$userid = $this->session->userdata('user_id');
			//start sidebar menu
			$this->data['menu_data'] = $this->settings->get_menu($userid);
			$this->data['submenu_data'] = $this->settings->get_sub_menu($userid);
			$link = 0;
			$this->data['title_site'] = $this->settings->get_title_site();
			$this->data['content_header'] = $this->uri->segment(2);
			$this->data['ic_logo'] = $this->settings->get_logo_header();
			$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
			//page header
			$this->data['page_header'] = $this->settings->get_page_dashboard($link);
			//end page header
			//page settings maintenance,seo urls & enable history
			$this->data['page_settings'] = $this->settings->get_page_settings();
			//end page settings maintenance,seo urls & enable history
			//content view
			$this->data['content'] = $this->load->view('ad-min/create_user', $this->data, true);
			//end content view
			//main content
			$this->load->view('ad-min/main/v_main', $this->data);
			//end main content
		}
	}
	//edit a user
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');
		$this->data['sub_header'] = $this->lang->line('edit_user_heading');

		$userid = $this->session->userdata('user_id');
		$this->data['akses'] = $this->user->get_access($userid,$this->link);

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('mp-admin/app/account', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();


		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|trim');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|trim');
		$this->form_validation->set_rules('description', $this->lang->line('edit_user_validation_description_label'), 'required|trim');
		$this->form_validation->set_rules('avatar', $this->lang->line('edit_user_validation_avatar_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			//if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			//{
			//show_error($this->lang->line('error_csrf'));
			//}
			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]|trim|callback_valid_password');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required|trim');
			}

			if ($this->form_validation->run() === TRUE)
			{

				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'description'    => $this->input->post('description'),
					'phone'      => $this->input->post('phone'),
					'email'      => $this->input->post('email'),
				);


				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					//update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages() );
					if ($this->ion_auth->is_admin())
					{
						redirect('mp-admin/app/account', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors() );
					if ($this->ion_auth->is_admin())
					{
						redirect('mp-admin/app/account', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
				}
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'placeholder' => 'first_name',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('first_name', $user->first_name)
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'placeholder' => 'last_name',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('last_name', $user->last_name)
		);
		$this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'email',
			'placeholder' => 'email',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('email', $user->email)
		);
		$this->data['description'] = array(
			'name'  => 'description',
			'id'    => 'description',
			'type'  => 'text',
			'placeholder' => 'description',
			'rows'        => '10',
			'cols'        => '10',
			'style'       => 'width:100%',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('description', $user->description)
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'placeholder' => 'phone',
			'maxlength' => '14',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('phone', $user->phone)
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'placeholder' => 'password',
			'class' => 'form-control'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'placeholder' => 'password_confirm',
			'class' => 'form-control',
			'type' => 'password'
		);

		//-- user id
		$this->data['title_site'] = $this->settings->get_title_site();
		//-- user id
		$user_id = $this->session->userdata('user_id');
		//start sidebar menu
		$this->data['menu_data'] = $this->settings->get_menu($user_id);
		$this->data['submenu_data'] = $this->settings->get_sub_menu($user_id);
		$link = 0;
		//page header
		$this->data['content_header'] = $this->uri->segment(2);
		//print_r($this->data['content_header']);die;
		$this->data['page_header'] = $this->settings->get_page_dashboard($link);
		$this->data['ic_logo'] = $this->settings->get_logo_header();
		$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
		//end page header
		//content view
		$this->data['content'] = $this->load->view('ad-min/edit_user', $this->data, true);
		//end content view
		//main content
		$this->load->view('ad-min/main/v_main', $this->data);
		//end main content
	}

	// create a new group
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

		if ($this->form_validation->run() == TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	//edit a group
	public function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('mp-admin/app/account', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('mp-admin/app/account', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|trim');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("mp-admin/app/account", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'placeholder' => 'group_name',
			'class' => 'form-control',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'placeholder' => 'group_name',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		//user id check after login successfully
		$userid = $this->session->userdata('user_id');

		//start sidebar menu
		$this->data['menu_data'] = $this->settings->get_menu($userid);
		$this->data['submenu_data'] = $this->settings->get_sub_menu($userid);

		$link = 'back-end/admin/'.$this->uri->segment(3);'"';

		if(empty($this->settings->get_parent($link))){
			//page header
			$this->data['page_header'] = $this->settings->get_parent($link);
			//end page header
		} else {
			$this->data['page_header'] = "";
		}
		$this->data['title_site'] = $this->settings->get_title_site();
		$this->data['content_header'] = $this->uri->segment(2);
		$this->data['ic_logo'] = $this->settings->get_logo_header();
		$this->data['favicon_logo'] = $this->settings->get_favicon_picture();
		//page settings maintenance,seo urls & enable history
		$data['page_settings'] = $this->settings->get_page_settings();
		//end page settings maintenance,seo urls & enable history
		//content view
		$this->data['content'] = $this->load->view('ad-min/edit_group', $this->data, true);
		//end content view

		//main content
		$this->_render_page('ad-min/main/v_main', $this->data);
		//end main content
	}


	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

	public function ic_logo_settings() {
		$data = $this->settings->get_logo_picture();
		echo json_encode($data);
	}

	public function favicon_logo_settings() {
		$data = $this->settings->get_favicon_picture();
		echo json_encode($data);
	}

	//checksession user login
	public function checksession()
	{
		if(!empty($this->session->userdata('user_id')))
		{
			echo json_encode(array("session" => TRUE));
		}
		else
		{
			echo json_encode(array("session" => FALSE));
		}

	}

	//user list for account data administrator
	public function account()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('mp-admin/app/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('you must be an administrator to view this page.');
		}
		else
		{
			//user id check after login successfully
			//print_r($this->session->userdata('user_id'));die;
			$userid = $this->session->userdata('user_id');
			//start sidebar menu
			$data['menu_data'] = $this->settings->get_menu($userid);
			$data['submenu_data'] = $this->settings->get_sub_menu($userid);

			$link = 'mp-admin/app/'.$this->uri->segment(3);

			//page header
			$data['content_header'] = $this->uri->segment(2);
			//print_r($this->data['content_header']);die;
			$data['ic_logo'] = $this->settings->get_logo_header();
			$data['favicon_logo'] = $this->settings->get_favicon_picture();

			//page header
			$data['header_title'] = "account administrator";
			$data['page_header'] = $this->settings->get_parent($link);
			$data['sub_header'] = 'Account management';
			//end page header

			/* START insert update delete view access */
			$data['akses'] = $this->user->get_access($userid,$this->link);
			/* STOP insert update delete view access */
			$data['title_site'] = $this->settings->get_title_site();
			//page settings maintenance,seo urls & enable history
			$data['page_settings'] = $this->settings->get_page_settings();
			//end page settings maintenance,seo urls & enable history

			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
			$data['users'] = $this->ion_auth->users()->result();

			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			// $data['group_super_user'] = $this->user->get_super_user();

			//content view
			$data['content'] = $this->load->view('ad-min/content/v_account', $data, true);
			//end content view

			//main content
			$this->load->view('ad-min/main/v_main', $data);
			//end main content
		}

	}

	//validation password
	public function valid_password($password = '')
	{
		$password = trim($password);
		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
		if (empty($password))
		{
			$this->form_validation->set_message('valid_password', 'The {field} field is required.');
			return FALSE;
		}
		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
			return FALSE;
		}
		if (preg_match_all($regex_uppercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
			return FALSE;
		}
		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
			return FALSE;
		}
		if (preg_match_all($regex_special, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
			return FALSE;
		}
		return TRUE;
	}
	//-- page --//
	public function delete_favicon($id) {
		$data = array('favicon_picture' => "", 'date_deleted' => date('Y-m-d'), 'user_deleted' => $this->session->userdata('user_id'));
		$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-trash', 'activity' => 'delete logo favicon', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

		$this->image_path = realpath(APPPATH . '../image/logo');

		if ($this->settings->check_favicon_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_favicon_img($id))) unlink($this->image_path . '/' . $this->settings->check_favicon_img($id));

		$update = $this->settings->delete_favicon(array('id' => $id), $data);

		$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}
	public function delete_logo($id) {
		$data = array('logo_picture' => "", 'date_deleted' => date('Y-m-d'), 'user_deleted' => $this->session->userdata('user_id'));
		$data_log = array('user_id' => $this->session->userdata('user_id'), 'user_name' => $this->session->userdata('first_name'), 'link' => 'c_configsite', 'class' => 'ti-trash', 'activity' => 'delete logo favicon', "ip" => $this->session->userdata('ip'), "countries_sess" => $this->session->userdata('countries_sess'));

		$this->image_path = realpath(APPPATH . '../image/logo');

		if ($this->settings->check_logo_img($id) != '' && file_exists($this->image_path . '/' . $this->settings->check_logo_img($id))) unlink($this->image_path . '/' . $this->settings->check_logo_img($id));

		$update = $this->settings->delete_logo(array('id' => $id), $data);

		$this->logactivity->insertlog($data_log);
		echo json_encode(array("status" => TRUE));
	}
	//-- end page --//
	public function site_location_map() {
		$data = $this->settings->get_location_lt_lg();
		echo json_encode($data);
	}
	//-- dashboard --//
	public function _getServerLoadLinuxData()
	{
		if (is_readable("/proc/stat"))
		{
			$stats = @file_get_contents("/proc/stat");

			if ($stats !== false)
			{
				// Remove double spaces to make it easier to extract values with explode()
				$stats = preg_replace("/[[:blank:]]+/", " ", $stats);

				// Separate lines
				$stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
				$stats = explode("\n", $stats);

				// Separate values and find line for main CPU load
				foreach ($stats as $statLine)
				{
					$statLineData = explode(" ", trim($statLine));

					// Found!
					if
					(
						(count($statLineData) >= 5) &&
						($statLineData[0] == "cpu")
					)
					{
						return array(
							$statLineData[1],
							$statLineData[2],
							$statLineData[3],
							$statLineData[4],
						);
					}
				}
			}
		}

		return null;
	}

	// returns server load in percent (just number, without percent sign)
	public function getServerLoad()
	{
		$load = null;

		if (stristr(PHP_OS, "win"))
		{
			$cmd = "wmic cpu get loadpercentage /all";
			@exec($cmd, $output);

			if ($output)
			{
				foreach ($output as $line)
				{
					if ($line && preg_match("/^[0-9]+\$/", $line))
					{
						$load = $line;
						break;
					}
				}
			}
		}
		else
		{
			if (is_readable("/proc/stat"))
			{
				// Collect 2 samples - each with 1 second period
				// See: https://de.wikipedia.org/wiki/Load#Der_Load_Average_auf_Unix-Systemen
				$statData1 = $this->_getServerLoadLinuxData();
				sleep(1);
				$statData2 = $this->_getServerLoadLinuxData();

				if
				(
					(!is_null($statData1)) &&
					(!is_null($statData2))
				)
				{
					// Get difference
					$statData2[0] -= $statData1[0];
					$statData2[1] -= $statData1[1];
					$statData2[2] -= $statData1[2];
					$statData2[3] -= $statData1[3];

					// Sum up the 4 values for User, Nice, System and Idle and calculate
					// the percentage of idle time (which is part of the 4 values!)
					$cpuTime = $statData2[0] + $statData2[1] + $statData2[2] + $statData2[3];

					// Invert percentage to get CPU time, not idle time
					$load = 100 - ($statData2[3] * 100 / $cpuTime);
				}
			}
		}

		return $load;
	}

	//----------------------------
	public function cpu_load() {
		$cpuLoad = $this->getServerLoad();
		if (is_null($cpuLoad)) {
			return "CPU load not estimateable (maybe too old Windows or missing rights at Linux or Windows)";
		}
		else {
			return $cpuLoad . "%";
		}
	}
}
/* end of file App.php */
/* location: system/application/controllers/ */
