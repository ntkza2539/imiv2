<?php

namespace App\Controllers\Backend\Fprofile;

class Profile extends BaseController
{
   protected $modelbackend;
   protected $modelquery;
   protected $modelchecktable;
   protected $leng;
   protected $modelagent;

   public function __construct()
   {

      $this->leng = service('request')->getLocale();
      $this->modelbackend = model('M_backend/M_backend');
      $this->modelquery = model('M_backend/M_query');
      $this->modelchecktable = model('M_backend/M_checktable');
      $this->modelagent = model('M_agent/M_agent');
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

      $data = array(
         'user' => json_decode($this->modelbackend->get_user($this->session->session_admin['agent_id'])),
      );
      return view('backend/Vprofile/setprofile', $data);
   }

   public function update_profile()
   {

      if ($this->request->getPost()) {
         if ($this->request->getPost('password') == null) {  //เงือนไขนี้ กรณีที่ลูกค้าไม่ต้องการเปลี่ยนรหัสผ่าน
          
            $data = array(
               'agent_myname' => $this->request->getPost('inputFirstName'),
               'agent_mysername' => $this->request->getPost('inputLastName'),
               'agent_email' => $this->request->getPost('inputLastEmail'),
               'agent_tel_mobile' => $this->request->getPost('inputMobile'),
               'agent_dateofbirth' => $this->request->getPost('inputbirth')
            );
            if ($sql =  $this->modelquery->editdata('tb_agent', 'agent_id', $this->session->session_admin['agent_id'], $data)) {
               $re = array('code' => 200, 'msg' => 'Data Update successfully'); //status 200 บันทึกสำเร็จ
            } else {
               $re = array('code' => 500, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
            }
         } else { //เงือนไขนี้กรณีที่ลูกค้าต้องการเปลี่ยนรหัสผ่าน
            $salt = $this->modelbackend->salt(); // เข้ารหัส password 
            $pass = $this->modelbackend->hash_password($this->request->getPost('password'), $salt); //เปลี่ยนรหัสเป็นแบบ hash
            $data = array(
               'agent_myname' => $this->request->getPost('inputFirstName'),
               'agent_mysername' => $this->request->getPost('inputLastName'),
               'agent_email' => $this->request->getPost('inputLastEmail'),
               'agent_tel_mobile' => $this->request->getPost('inputMobile'),
               'agent_dateofbirth' => $this->request->getPost('inputbirth'),
               'agent_salt' => $salt,
               'agent_pass' => $pass
            );
            if ($sql =  $this->modelquery->editdata('tb_agent', 'agent_id', $this->session->session_admin['agent_id'], $data)) {
               $re = array('code' => 200, 'msg' => 'Data Update successfully'); //status 200 บันทึกสำเร็จ
            } else {
               $re = array('code' => 500, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
            }
         }
      } else {
         $re = array('code' => 500, 'msg' => 'System error'); // status 0 ไม่สำเร็จ
      }
      echo json_encode($re);
      die;
   }
}
