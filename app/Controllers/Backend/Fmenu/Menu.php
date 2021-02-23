<?php

namespace App\Controllers\Backend\Fmenu;

class Menu extends BaseController
{

	protected $modelbackend;
	protected $modelquery;
	protected $modelchecktable;
	protected $leng;
	public function __construct()
	{
		$this->leng = service('request')->getLocale();
		$this->modelbackend = model('M_backend/M_backend');
		$this->modelquery = model('M_backend/M_query');
		$this->modelchecktable = model('M_backend/M_checktable');
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
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
		$this->modelchecktable->checktable('tb_menu');
		$data['listmenu'] = json_encode($this->db->table('tb_menu AS t1') //select table
			->select('t1.*,t2.menu_name AS hname') //select value
			->join('tb_menu AS t2 ', 't2.menu_id = t1.parent_menu', 'left')
			->get() //limit
			->getResult()); //resultop()
		return view('backend/Vmenu/setmenu', $data);
	}

	public function add_menu()
	{

		$type = $this->request->getPost('type_menu');
		if ($type == 1) { //List

			$data = [
				'menu_name' => $this->request->getPost('list_menu'),
				'menu_icon' => $this->request->getPost('icon_menu'),
				'menu_link' => $this->request->getPost('link_menu'),
				'menu_group' => $this->request->getPost('group_menu'),
				'parent_menu' => 0
			];
			if ($this->modelquery->adddata('tb_menu', $data)) {
				header('Location: ' . base_url($this->leng . '/backend/Fmenu/index'));
				die;
			}
		} else { //Head and Sub

			$data = $this->db->table('tb_menu') //select table
				->where('menu_name', $this->request->getPost('head_menu'));

			if ($data->countAllResults() == 1) { //num_rows()
				$data = $this->db->table('tb_menu') //select table
					->where('menu_name', $this->request->getPost('head_menu'))
					->get()->getResult();
				$id = $data[0]->menu_id;
				$data_sub = [
					'menu_name' => $this->request->getPost('sub_menu'),
					'menu_icon' => $this->request->getPost('icon_menu'),
					'menu_link' => $this->request->getPost('link_menu'),
					'menu_group' => $this->request->getPost('group_menu'),
					'parent_menu' => $id
				];
				if ($this->modelquery->adddata('tb_menu', $data_sub)) {
					header('Location: ' . base_url($this->leng . '/backend/Fmenu/index'));
					die;
				}
			} else {
				$data_head = [
					'menu_name' => $this->request->getPost('head_menu'),
					'menu_icon' => $this->request->getPost('icon_menu'),
					'menu_link' => '',
					'menu_group' => $this->request->getPost('group_menu'),
					'parent_menu' => 0
				];
				if ($this->modelquery->adddata('tb_menu', $data_head)) {
					$id = $this->db->insertID();
					$data_sub = [
						'menu_name' => $this->request->getPost('sub_menu'),
						'menu_icon' => $this->request->getPost('icon_menu_sub'),
						'menu_link' => $this->request->getPost('link_menu'),
						'menu_group' => $this->request->getPost('group_menu'),
						'parent_menu' => $id
					];
					if ($this->modelquery->adddata('tb_menu', $data_sub)) {
						header('Location: ' . base_url($this->leng . '/backend/Fmenu/index'));
						die;
					}
				}
			}
		}
	}

	public function edit_menu()
	{
		// echo ' <pre>';
		// print_r($this->request->getPost());
		// die;

		$data = $this->db->table('tb_menu')
			->where('menu_id', $this->request->getPost('id_menu'));

		if ($data->countAllResults() == 1) {


			if ($this->request->getPost('link_menu_edit') == '') { // update header
				$data_update = array(
					'menu_name' => $this->request->getPost('head_menu_edit'),
					'menu_icon' => $this->request->getPost('icon_menu_edit'),
					'menu_link' => '',
					'menu_group' => $this->request->getPost('group_menu_edit'),
					'parent_menu' => 0
				);
			} else {

				if ($this->request->getPost('head_menu_edit') == '') {
					$parent_id = 0;
				} else {
					$parent_id = $this->db->table('tb_menu')
						->where('menu_name', $this->request->getPost('head_menu_edit'))
						->get()
						->getRow()->menu_id;
				}

				if ($parent_id == 0) { //update list
					$data_update = array(
						'menu_name' => $this->request->getPost('list_menu_edit'),
						'menu_icon' => $this->request->getPost('icon_menu_edit'),
						'menu_link' => $this->request->getPost('link_menu_edit'),
						'menu_group' => $this->request->getPost('group_menu_edit'),
						'parent_menu' => 0
					);
				} else {
					$data_update = array( //update sup
						'menu_name' => $this->request->getPost('sub_menu_edit'),
						'menu_icon' => $this->request->getPost('icon_menu_edit'),
						'menu_link' => $this->request->getPost('link_menu_edit'),
						'menu_group' => $this->request->getPost('group_menu_edit'),
						'parent_menu' => $parent_id
					);
				}

				if ($this->modelquery->editdata('tb_menu', 'menu_id', $this->request->getPost('id_menu'), $data_update)) {
					$re = array('code' => 1, 'msg' => 'ทำรายการเรียบร้อย');
				} else {
					$re = array('code' => 0, 'msg' => 'แก้ไขข้อมูลไม่สำเร็จ');
				}
			}
		} else {
			$re = array('code' => 0, 'msg' => 'ไม่มีข้อมูลใน Database');
		}
		echo json_encode($re);
		die;
	}

	public function check_name()
	{
		$name_menu = $this->request->getPost('name_headMenu');

		$data = $this->db->table('tb_menu') //select table
			->where('menu_name', $name_menu);
		if ($data->countAllResults() == 1) { //num_rows()
			$re = 1;
		} else {
			$re = 2;
		}
		echo json_encode($re);
		die;
	}

	public function get_name()
	{
		$parent_id = $this->request->getPost('parent_id');
		$data = $this->db->table('tb_menu') //select table
			->where('menu_id', $parent_id)
			->get()
			->getRow()->menu_name;
		echo json_encode(array('data' => $data));
		die;
	}
}
