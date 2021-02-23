<?php

namespace App\Controllers\Backend\Freport;

class Report extends BaseController
{

	protected $modelbackend;
	protected $modelquery;
	protected $leng;
	public function __construct()
	{
		$this->leng = service('request')->getLocale();
		$this->modelbackend = model('M_backend/M_backend');
		$this->modelquery = model('M_backend/M_query');
		$this->session = \Config\Services::session();
        $request = \Config\Services::request();
		$this->db = \Config\Database::connect();
        if (!($this->session->has('session_admin'))) {
            header('Location: ' . base_url($this->leng . '/backend/Auth/login'));
            die;
        } 
        else {
            $segment = explode('/', uri_string());
            $menu = $this->session->session_admin['menu'];
            $i=0;
            foreach ($menu as $key => $value) {
                $g_link = explode('/', $value['menu_link']);
                if (end($segment) == end($g_link)) {
                    break;
                }else{
                    if($request->getMethod() != 'get'){
                        break;
                    }
                     $i++;
                    if($i>sizeof($menu)){
                     header('Location: ' . base_url($this->leng . '/backend')); 
                     die;
                    } 
                }
                $i++;
            }
        }
		
	}	
	public function index()
	{
		echo "Freport";
	}

	public function report_win_lose_type()
    {
        $data['test']=$this->modelquery->getdatall('tb_cf_thai');
        return view('backend/Vreport/report_win_lose_type',$data);
	} 
	public function report_win_lose_member()
    {
        return view('backend/Vreport/report_win_lose_member');
    } 

	public function report_cutoff()
    {
        return view('backend/Vreport/report_cutoff');
    } 

	public function report_lottery()
    {
        return view('backend/Vreport/report_lottery');
    } 

	public function report_canceled()
    {
        return view('backend/Vreport/report_canceled');
    } 

	public function report_transaction()
    {
        return view('backend/Vreport/report_transaction');
    } 


}
