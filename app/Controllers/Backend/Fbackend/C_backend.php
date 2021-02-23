<?php

namespace App\Controllers\Backend\Fbackend;

class C_backend extends BaseController
{

	protected $modelquery;
	protected $leng;
	public function __construct()
	{
		$this->leng = service('request')->getLocale();
		$this->modelquery =  model('M_backend/M_query');
		$this->session = \Config\Services::session();
		if (!($this->session->has('session_admin'))) {
			header('Location: ' . base_url($this->leng . '/backend/Auth/login'));
			die;
		}
	}

	public function index()
	{

		return view('backend/home');
	}
	public function mytest()
	{
			echo 5;
			die;
	}
	public function test()
	{

		$data['data'] = ($this->loadData());
		return view('backend/test', $data);
	}
	public function loadData()
	{
		return json_encode($this->modelquery->getdatall('test'));
	}
	//--------------------------------------------------------------------
	public function adddata()
	{
		$data = [
			'test_name' => $this->request->getPost('name'),
			'test_email'  => $this->request->getPost('email'),
			'test_password'  => $this->request->getPost('password')
		];

		if ($InsertId = $this->modelquery->adddata('test', $data)) {
			$data['test_id'] = $InsertId;
			echo json_encode(array('status' => true, 'data' => $data));
		} else {
			echo json_encode(array('status' => false, 'data' => null));
		}
		die;
	}
	public function deletedata($table, $keyid, $id)
	{

		if ($this->modelquery->deldata($table, $keyid, $id)) {
			echo json_encode(array('status' => true));
		} else {
			echo json_encode(array('status' => false));
		}
		die;
	}

	public function editdata()
	{
		$data = [
			'test_name' => $this->request->getPost('nameE'),
			'test_email' => $this->request->getPost('emailE'),
			'test_password' => $this->request->getPost('passwordE'),
		];
		// =============================  table , keyid  , id , data
		if ($this->modelquery->editdata('test', 'test_id', $this->request->getPost('sentId'), $data)) {
			$data['test_id'] = $this->request->getPost('sentId');
			echo json_encode(array('status' => true, 'data' => $data));
		} else {
			echo json_encode(array('status' => false, 'data' => null));
		}
		die;
	}

	public function test2()
	{
		echo 1;
	}
}
