<?php
namespace App\Controllers\Backend;

class Auth extends BaseController
{
	protected $modelbackend;
	protected $leng;
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->modelbackend = model('M_backend/M_backend');
		$this->leng = service('request')->getLocale();
	}
	public function login()
	{
		$random_alpha = md5(rand());
		$captcha_code = substr($random_alpha, 0, 6);
		$data['c']  = $_SESSION['captcha_code'] = $captcha_code;

		return view('backend/login',$data);
	}
	public function checklogin()
	{
		
		if($this->request->getPost('captcha') == $this->request->getPost('confm_captcha')){
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');
			$users = $this->modelbackend->login(
					$username,
					$password
				);
			if($users['status']=='Success!'){
					header('Location:'.base_url($this->leng.'/backend'));
			}else{
				header('Location:'.base_url($this->leng.'/backend/Auth/login'));
			}
		}else{
			header('Location:'.base_url($this->leng.'/backend/Auth/login'));
		}
		
		
		
		  
		die;
	}
	public function logout()
	{
		$this->session->destroy();
		header('Location: '.base_url($this->leng.'/backend/Auth/login'));
		die;
	}


	


}
