<?php

namespace App\Models\M_backend;

use CodeIgniter\Model;

class M_backend extends Model
{
	protected $modelchecktable;
	protected $modelquery;
	protected $lotto;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->db = \Config\Database::connect();
		$this->modelquery = model('M_backend/M_query');
		$this->uri = new \CodeIgniter\HTTP\URI();
		$this->modelchecktable =  model('M_backend/M_checktable');
		// ****** 0 = หวยรัฐบาล 
		$this->lotto = ['tb_cf_thai','tb_cf_hanoi'];
	}

	public function find_users_by_user($username)
	{
		$this->modelchecktable->checktable('tb_admin_login');
		$this->modelchecktable->checktable('tb_agent');


		$user = ($this->db->table('tb_agent')->where('agent_username', $username)->get()->getRow());
		return  $user;
	}
	public function login($username, $password)
	{

		$resp = array();
		if (empty($username) && empty($password)) {
			$resp['status'] = 'error';
			$resp['message'] = 'no input your password !!';
			return $resp;
		}
		$users = $this->find_users_by_user($username);
		if ($users) {
			if ($this->hash_password($password, $users->agent_salt) != $users->agent_pass) {
				$resp['status'] = 'warning';
				$resp['message'] = 'incorrect password !!';
				return $resp;
			}


			// set session
			if ($this->_set_session($users)) {
				$resp['status'] = 'Success!';
				$resp['message'] = 'login completed !';
				return $resp;
			} else {
				$resp['status'] = 'error';
				$resp['message'] = 'system error !!';
				return $resp;
			}
		} else {
			$resp['status'] = 'warning';
			$resp['message'] = 'password undefind !!';
			return $resp;
		}
	}

	private function _set_session($users)
	{
		$groupmenu = $this->db->table('tb_menu')->select('menu_group')
			->groupBy('menu_group')
			->orderBy('menu_group', 'ASC')
			->get()->getResultArray();

		if ($users->agent_type != 0) {
			$mymenu = $this->db->table('tb_check_menu_admin')->select('*')
				->join('tb_menu ', 'tb_menu.menu_id = tb_check_menu_admin.ch_menu_admin_menu_id')
				->where('ch_menu_admin_admin_id', ($users->agent_id));
		} else {
			$mymenu = $this->db->table('tb_menu');
		}
		$mymenu =  $mymenu->get()->getResultArray();

		$set_session = array(
			'groupmenu' => $groupmenu,
			'menu' => $mymenu,
			'agent_id' => $users->agent_id,
			'agent_name' => $users->agent_name,
			'agent_username' => $users->agent_username,
			'agent_type' => $users->agent_type,
			'agent_parent' => $users->agent_parent,
			'agent_tel_mobile' => $users->agent_tel_mobile,
			'agent_myname' => $users->agent_myname,
			'agent_mysername' => $users->agent_mysername,
			'agent_dateofbirth' => $users->agent_dateofbirth,
			'agent_pass' => $users->agent_pass,
			'agent_salt' => $users->agent_salt,
			'agent_credit' => $users->agent_credit,
			'agent_credit_max' => $users->agent_credit_max,
			'agent_rank' => $users->agent_rank,
			'agent_point' => $users->agent_point,
			'agent_token' => $users->agent_token,
			'agent_online' => $users->agent_online,
			'agent_status' => $users->agent_status,
			'agent_create_by' => $users->agent_create_by,
			'agent_create_time' => $users->agent_create_time,
			'agent_last_update' => $users->agent_last_update,
			'agent_last_ip' => $users->agent_last_ip,
			'agent_last_login' => $users->agent_last_login,
		);



		$this->session->set('session_admin', $set_session);
		if ($this->session->has('session_admin')) {
			return true;
		} else {
			return false;
		}
	}

	public function salt()
	{
		$raw_salt_len = 16;
		$buffer = '';

		$bl = strlen($buffer);
		for ($i = 0; $i < $raw_salt_len; $i++) {
			if ($i < $bl) {
				$buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
			} else {
				$buffer .= chr(mt_rand(0, 255));
			}
		}

		$salt = $buffer;

		$base64_digits = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
		$bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$base64_string = base64_encode($salt);
		$salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

		$salt = substr($salt, 0, 31);

		return $salt;
	}

	public function hash_password($password, $salt)
	{
		if (empty($password)) {
			return false;
		}

		return sha1($password . $salt);
	}

	// ดึง ยูสภายใต้ที่ส่งมา 
	// ส่งไอดีมา และ  ประเภท 
	public function get_user_under($id, $id_lotto, $status)
	{
		$agent = $this->db->table('tb_agent')
			->join($this->lotto[$id_lotto], $this->lotto[$id_lotto] . '.user_id = tb_agent.agent_id', 'left')
			->where('agent_parent', $id)
			->where('agent_status', $status)
			->get()->getResult();
		$member = $this->db->table('tb_member')
			->join($this->lotto[$id_lotto], $this->lotto[$id_lotto] . '.user_id = tb_member.member_id', 'left')
			->where('member_parent', $id)
			->where('member_status', $status)
			->get()->getResult();
		return json_encode(array("agent" => $agent, "member" => $member));


	}

	// แสดงสามาชิกทั้งหมด ไม่ว่าจะเป็น status 0 หรือ 1
	public function get_user_underall($id, $id_lotto)
	{
		$agent = $this->db->table('tb_agent')
			->join($this->lotto[$id_lotto], $this->lotto[$id_lotto] . '.user_id = tb_agent.agent_id', 'left')
			->where('agent_parent', $id)
			->get()->getResult();

		$member = $this->db->table('tb_member')
			->join($this->lotto[$id_lotto], $this->lotto[$id_lotto] . '.user_id = tb_member.member_id', 'left')
			->where('member_parent', $id)
			->get()->getResult();
		return json_encode(array("agent" => $agent, "member" => $member));

	}


	// นับจำนวน status ว่า มียูสไหน เปิด หรือ ปิด กี่ยูส
	public function count_user_under($type){
		$cagent = $this->db->table('tb_agent')
				->where('agent_status', $type)
				->countAllResults();
	    return json_encode(array("cagent" => $cagent));
	}


	// ดึงค่าคอม โดยไอดี
	public function get_com_user($id)
	{
		$data=[];
		foreach ($this->lotto as $key => $value) {
			$member = $this->db->table($value)
					->where('user_id', $id)
					->get()->getResult();
					array_push($data,['tb_cf'=>$value,'list'=>$member[0]]);
		}
		
		return json_encode($data);
	}

	// function นี้สำหรับดึงข้อมูลโปรไฟล์
	public function get_user($id){
		
		$agent = $this->db->query('SELECT*FROM tb_agent WHERE agent_id = "'.$id.'" ')->getRow();
		return json_encode($agent);
	}

	// function นี้ใช้สำหรับ หน้า สมาชิกทั้ง หมด จะเป็นการดุึงข้อมูลมาแก้ไข
	public function editagent($id,$id_lotto,$status){
	
		$agent = $this->db->table('tb_agent')
			->join($this->lotto[$id_lotto], $this->lotto[$id_lotto] . '.user_id = tb_agent.agent_id', 'left')
			->where('agent_id', $id)
			->where('agent_status', $status)
			->get()->getResult();

		$member = $this->db->table('tb_member')
			->join($this->lotto[$id_lotto], $this->lotto[$id_lotto] . '.user_id = tb_member.member_id', 'left')
			->where('member_id', $id)
			->where('member_status', $status)
			->get()->getResult();
		return json_encode(array("agent" => $agent, "member" => $member));
	
	}

}
