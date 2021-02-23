<?php

namespace App\Controllers\Backend\Fadmin;

class Admin extends BaseController
{

	protected $modelbackend;
	protected $leng;
	public function __construct()
	{
		$this->leng = service('request')->getLocale();
		$this->modelbackend = model('M_backend/M_backend');
		$this->session = \Config\Services::session();
        $request = \Config\Services::request();
		$this->db = \Config\Database::connect();
        if (!($this->session->has('session_admin'))) {
            header('Location: ' . base_url($this->leng . '/backend/Auth/login'));
            die;
        } else {
            $segment = explode('/', uri_string());
            $menu = $this->session->session_admin['menu'];
            $i = 0;

            foreach ($menu as $key => $value) {
                if ($value['parent_menu'] != 0) {
                    $g_link = explode('/', $value['menu_link']);

                    if (end($segment) == end($g_link)) {
                        break;
                    } else {
                        if ($request->getMethod() != 'get') {
                            break;
                        }
                        $i++;
                        if ($i > sizeof($menu)) {
                            break;
                            header('Location: ' . base_url($this->leng . '/backend'));
                            die;
                        }
                    }
                }
                $i++;
            }
        }
		
	}	
	public function index()
	{
		echo "sub";
	}

	public function turn_off_award()
    {
        return view('backend/Vadmin/turn_off_award');
	} 
	public function notices()
    {
        return view('backend/Vadmin/notices');
	} 
	public function canceled_lottery()
    {
        return view('backend/Vadmin/canceled_lottery');
	} 
	public function schedule()
    {
        return view('backend/Vadmin/schedule');
	} 
	public function thai_lottery_anagement()
    {
        return view('backend/Vadmin/thai_lottery_anagement');
	} 


}
