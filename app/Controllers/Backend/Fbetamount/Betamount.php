<?php

namespace App\Controllers\Backend\Fbetamount;

class Betamount extends BaseController
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
		echo "Betamount";
	}


	public function limit_number()
    {
       
        return view('backend/Vbetamount/limit_number');
    } 
	public function summary_bet()
    {
       
        return view('backend/Vbetamount/summary_bet');
	} 
	public function amount_bet_type()
    {
       
        return view('backend/Vbetamount/amount_bet_type');
	} 
	public function amount_bet_member()
    {
       
        return view('backend/Vbetamount/amount_bet_member');
    } 
	
	
	
}
