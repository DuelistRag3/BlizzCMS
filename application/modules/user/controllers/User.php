<?php
/**
 * BlizzCMS
 *
 * @author  WoW-CMS
 * @copyright  Copyright (c) 2017 - 2020, WoW-CMS.
 * @license https://opensource.org/licenses/MIT MIT License
 * @link    https://wow-cms.com
 * @since   Version 1.0.1
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function login()
	{
		if (!$this->wowmodule->getLoginStatus())
			redirect(base_url(),'refresh');

		if ($this->wowauth->isLogged())
			redirect(base_url(),'refresh');


		if ($this->wowgeneral->getExpansionAction() == 1)
		{
			if($this->wowgeneral->getEmulatorAction() == 1){
				$data = array(
					'pagetitle' => lang('tab_login'),
					'recapKey' => $this->config->item('recaptcha_sitekey'),
					'lang' => $this->lang->lang(),
				);
	
				$this->template->build('login2', $data);
			}else{
			
				$data = array(
				'pagetitle' => lang('tab_login'),
				'recapKey' => $this->config->item('recaptcha_sitekey'),
				'lang' => $this->lang->lang(),
			);
				$this->template->build('login1', $data);
			}
		}
		else
		{
			$data = array(
				'pagetitle' => lang('tab_login'),
				'recapKey' => $this->config->item('recaptcha_sitekey'),
				'lang' => $this->lang->lang(),
			);

			$this->template->build('login2', $data);
		}
	}

	public function verify1()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		echo $this->user_model->checklogin($username, $password);
	}

	public function verify2()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		echo $this->user_model->checkloginbattle($email, $password);
	}



	public function register()
	{
		if (!$this->wowmodule->getRegisterStatus())
			redirect(base_url(),'refresh');

		if ($this->wowauth->isLogged())
			redirect(base_url(),'refresh');

		$data = array(
			'pagetitle' => lang('tab_register'),
			'recapKey' => $this->config->item('recaptcha_sitekey'),
			'lang' => $this->lang->lang(),
		);

		$this->template->build('register', $data);
	}

	public function newaccount()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		echo $this->user_model->insertRegister($username, $email, $password, $repassword);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}

	public function recovery()
	{
		if (!$this->wowmodule->getRecoveryStatus())
			redirect(base_url(),'refresh');

		if ($this->wowauth->isLogged())
			redirect(base_url(),'refresh');

		$data = array(
			'pagetitle' => lang('tab_reset'),
			'recapKey' => $this->config->item('recaptcha_sitekey'),
			'lang' => $this->lang->lang(),
		);

		$this->template->build('recovery', $data);
	}

	public function forgotpassword()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		echo $this->user_model->sendpassword($username, $email);
	}

	public function activate($key)
	{
		echo $this->user_model->activateAccount($key);
	}

	public function panel()
	{
		if (!$this->wowmodule->getUCPStatus())
			redirect(base_url(),'refresh');

		if (!$this->wowauth->isLogged())
			redirect(base_url(),'refresh');

		$data = array(
			'pagetitle' => lang('tab_account'),
			'lang' => $this->lang->lang(),
		);

		$this->template->build('panel', $data);
	}

	public function settings()
	{
		if (!$this->wowmodule->getUCPStatus())
			redirect(base_url(),'refresh');

		if (!$this->wowauth->isLogged())
			redirect(base_url(),'refresh');

		$data = array(
			'pagetitle' => lang('tab_account'),
			'lang' => $this->lang->lang(),
		);

		$this->template->build('settings', $data);
	}

	public function newusername()
	{
		$username = $this->input->post('newusername');
		$renewusername = $this->input->post('renewusername');
		$password = $this->input->post('password');

		echo $this->user_model->changeUsername($username, $renewusername, $password);
	}

	public function newpass()
	{
		$oldpass = $this->input->post('oldpass');
		$newpass = $this->input->post('newpass');
		$renewpass = $this->input->post('renewpass');
		echo $this->user_model->changePassword($oldpass, $newpass, $renewpass);
	}

	public function newemail()
	{
		$newemail = $this->input->post('newemail');
		$renewemail = $this->input->post('renewemail');
		$password = $this->input->post('password');
		echo $this->user_model->changeEmail($newemail, $renewemail, $password);
	}

	public function newavatar()
	{
		$avatar = $this->input->post('avatar');
		echo $this->user_model->changeAvatar($avatar);
	}
}
