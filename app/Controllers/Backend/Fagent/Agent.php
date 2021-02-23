<?php

namespace App\Controllers\Backend\Fagent;

class Agent extends BaseController
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

    public function get_link($id, $name)
    {
    }
    public function agent()
    {
        $data['agent_type'] = json_decode($this->session->session_admin['agent_type']);
        return view('backend/Vagent/adduser', $data);
    }

    public function user_all()
    {
        if ($this->request->getPost('id')) {
            $data = array(
                'userall' =>  $this->modelbackend->get_user_under($this->request->getPost('id'), 0, 0)
            );
        } else {
            $data = array(
                'userall' =>  $this->modelbackend->get_user_under($this->session->session_admin['agent_id'], 0, 0)
            );
        }
        return view('backend/Vagent/user_all', $data);
    }

    public function select_type()
    {
        //เลือกสถานะยูสเซอร์  [ 0 ยูสเปิด]  [1 ยูสปิด] [ 2 แสดทั้งหมดยูสเปิดและปิด]
        $type = $this->request->getPost('type');
        if ($type == 0) { //เงือนไขที่ 1 ถ้ัา type เท่ากับ 0  ให้แสดงข้อมูลที่อยู่ภายใต้ agent นั้นและ ให้แสดงเฉพาะสถานที่มีค่า เท่ากับ 0
            $status_open = $this->modelbackend->get_user_under($this->session->session_admin['agent_id'], 0, 0);
            $i = 0;
            $data = array();
            foreach (json_decode($status_open) as $item) {
                $r = 0;
                foreach ($item as $row) {
                    $data[] = (array)$row;
                    $r++;
                }
                $i++;
            }
            // array_push($data; $data_item);
            $re = array('code' => 200, 'data' => $data);
            echo json_encode($re);
            die;
        } else if ($type == 1) { //เงือนไขที่ 2 ถ้ัา type เท่ากับ 1 ให้แสดงข้อมูลที่อยู่ภายใต้ agent นั้นและ ให้แสดงเฉพาะสถานที่มีค่า เท่ากับ 1
            $i = 0;
            $status_open  = $this->modelbackend->get_user_under($this->session->session_admin['agent_id'], 0, 1);
            $data = array();
            foreach (json_decode($status_open) as $item) {
                $r = 0;
                foreach ($item as $row) {
                    $data[] = (array)$row;
                    $r++;
                }
                $i++;
            }
            $re = array('code' => 200, 'data' => $data);
            echo json_encode($re);
            die;
        } else { //เงือนไขที่ 3 ถ้า type ไม่เท่ากับ 1 และ 0 ให้แสดงข้อมูลที่อยู่ภายใต้ agent นั้นและ ให้แสดงทั้งหมดไม่ว่า status จะ 0 หรือ 1 
            $i = 0;
            $status_open = $this->modelbackend->get_user_underall($this->session->session_admin['agent_id'], 0);
            $data = array();
            foreach (json_decode($status_open) as $item) {
                $r = 0;
                foreach ($item as $row) {
                    $data[] = (array)$row;
                    $r++;
                }
                $i++;
            }

            $re = array('code' => 200, 'data' => $data);
            echo json_encode($re);
            die;
        }
    }


    public function select_agent()
    {
        if ($this->request->getPost('id') != null) {
            if ($this->request->getPost('id') != null) {
                $data = $this->modelbackend->editagent($this->request->getPost('id'), 0, $this->request->getPost('status'));
                $re = array('code' => 200, 'data' => $data);
            } else {
                $re = array('code' => 500, 'msg' => 'ไม่พบข้อมูล');
            }
        } else {
            $re = array('code' => 500, 'msg' => 'ไม่พบข้อมูล');
        }
        echo json_encode($re);
        die;
    }




    public function set_credit()
    {
        if ($this->request->getPost('id')) {
            $data = array(
                'userall' =>  $this->modelbackend->get_user_under($this->request->getPost('id'), 0, 0)
            );
        } else {
            $data = array(
                'userall' =>  $this->modelbackend->get_user_under($this->session->session_admin['agent_id'], 0, 0)
            );
        }


        return view('backend/Vagent/set_credit', $data);
    }

    public function set_commission()
    {

        $data['agent'] = json_decode($this->modelbackend->get_user_under($this->session->session_admin['agent_id'], 0, 0));
        // $data['agent']= json_decode($data['agent']->agent[0]->num_3upper);
        // echo '<pre>';
        // print_r($data);
        // die;
        return view('backend/Vagent/set_commission', $data);
    }

    public function edit_commission_multiple()
    {

        $data_update = [
            [
                'user_id' => $this->request->getPost('ag_id'),
                'column' =>
                [],
            ],
        ];
        $data = [];
        foreach ($this->request->getPost('data_edit') as $data) {

            $data_feild = [
                $data['name'] =>
                [
                    [
                        'field' => 'commission->' . $this->request->getPost('line'),
                        'dataUpdate' => $data['value']
                    ]
                ],
            ];

            array_push($data_update[0]['column'],  $data_feild);
        }

        $data_res = $this->modelagent->UpdateDataTb_cf($data_update, 'tb_cf_thai');

        if ($data_res) {
            $re = array('code' => 1, 'msg' => 'ทำรายการเรียบร้อย', 'data' => $data_res, 'type' => $this->request->getPost('field_edit'));
        } else {
            $re = array('code' => 0, 'msg' => 'ไม่สามารถทำรายการได้');
        }

        echo json_encode($re);
        die;
    }

    public function edit_commission_single()
    {

        $data_update = [
            [
                'user_id' => $this->request->getPost('ag_id'),
                'column' =>
                [
                    [
                        $this->request->getPost('name') =>
                        [
                            [
                                'field' => 'commission->' . $this->request->getPost('line'),
                                'dataUpdate' => $this->request->getPost('value')
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $data_res = $this->modelagent->UpdateDataTb_cf($data_update, 'tb_cf_thai');

        if ($data_res) {
            $re = array('code' => 1, 'msg' => 'ทำรายการเรียบร้อย', 'data' => $data_res, 'type' => $this->request->getPost('field_edit'));
        } else {
            $re = array('code' => 0, 'msg' => 'ไม่สามารถทำรายการได้');
        }

        echo json_encode($re);
        die;
    }

    public function edit_commission_all()
    {
        echo '<pre>';
        print_r($this->request->getPost());
        die;
        /*  $admin_parent = $this->db->table('tb_agent')->select('agent_id')->where('agent_parent', $this->session->session_admin['agent_id'])->get()->getResultArray();
        
        echo '<pre>';
        print_r($admin_parent);
        die; */
    }

    public function set_perbet()
    {
        return view('backend/Vagent/set_perbet');
    }

    public function set_share()
    {
        return view('backend/Vagent/set_share');
    }

    public function set_time()
    {
        return view('backend/Vagent/set_time');
    }


    // ==============  Register 
    public function register()
    {
        //เช็คว่า ระดับชั่น เป็นแบบไหน
        if ($this->request->getPost("level") != null) {
            switch ($this->request->getPost("level")) {
                case '1': //web  เก็บตรงชื่อผู้ใช้ แค่ 1 ช่อง
                    $agent_name = $this->request->getPost('username1');
                    break;
                case '2': // Suerper Senior แค่ 1 ช่อง
                    $agent_name = $this->request->getPost("username1");
                    break;
                case '3': // Senior แค่ 1 ช่อง
                    $agent_name = $this->request->getPost("username1");
                    break;
                case '4': // Master แค่ 1 ช่อง
                    $agent_name = $this->request->getPost("username1") . $this->request->getPost("username2");
                    break;
                case '5': // Agent1 แค่ 3 ช่อง
                    $agent_name = $this->request->getPost("username1") . $this->request->getPost("username2") . $this->request->getPost("username3");
                    break;
                case '6': // Agent2 แค่ 3 ช่อง
                    $agent_name = $this->request->getPost("username1") . $this->request->getPost("username2") . $this->request->getPost("username3");
                    break;
                case '7': // Agent3 แค่ 3 ช่อง
                    $agent_name = $this->request->getPost("username1") . $this->request->getPost("username2") . $this->request->getPost("username3");
                    break;
                case '8': // Member แค่ 3 ช่อง
                    $agent_name = $this->request->getPost("username1") . $this->request->getPost("username2") . $this->request->getPost("username3");
                    break;
            }  // end switch
            if ($this->request->getPost('level') == 8) { // ถ้า ระดับชั่น เท่า 8 ให้ไปบันทึกข้อมูลที่ tb_member
                //ตรวจสอบว่า username นี้มีอยู่ในระบบแล้วหรือยัง
                $builder = $this->db->table('tb_member')->where('tb_username', $this->request->getPost('m_username'))->countAllResults();
                if ($builder <= 0) {
                    $salt = $this->modelbackend->salt();
                    $pass = $this->modelbackend->hash_password($this->request->getPost('password'), $salt);
                    $data = array(
                        'member_name' => $agent_name, //ช่องเก็บตัวอักษร
                        'member_parent' => $this->request->getPost('under'), //ภายใต้
                        'member_type' => $this->request->getPost('level'), // ระดับชั่น
                        'member_username' => $this->request->getPost('m_username'), // username เข้าระบบ
                        'member_tel_mobile'  => $this->request->getPost('telephone'), //เบอร์มือถือ
                        'member_myname' => $this->request->getPost('m_name'), //ชื่อ
                        'member_mysername' => $this->request->getPost('lastname'), //นามสกุล
                        'member_dateofbirth' => strtotime(date('d-m-Y', strtotime($this->request->getPost('birth')))),  // เก็บวันที่เป็น timestamp
                        'member_pass' => $pass, //pass
                        'member_salt' => $salt, //pass
                        'member_credit' => $this->request->getPost('min_credit'), //เครดิตเริ้นต้น
                        'member_credit_max	' => $this->request->getPost('max_credit'), //เครดิตสูงสุด
                        'member_create_by' => $this->session->get('session_admin')['name'], //ใครเป็นคนสร้าง
                        'member_create_time' => time(), //วันที่สร้าง
                    );
                    if ($this->modelquery->adddata('tb_member', $data)) {
                        $re = array('code' => 200, 'msg' => 'Data saved successfully'); //status 200 บันทึกสำเร็จ
                    } else {
                        $re = array('code' => 0, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
                    }
                } else {
                    $re = array('code' => 0, 'msg' => 'This Username is already in the system.');
                }
            } else {
                //ตรวจสอบว่า username นี้มีอยู่ในระบบแล้วหรือยัง
                $builder = $this->db->table('tb_agent')->where('agent_username', $this->request->getPost('m_username'))->countAllResults();
                if ($builder <= 0) { // ถ้า เป็น 0  ให้ทำการบันทึกข้อมูล
                    $salt = $this->modelbackend->salt(); // เข้ารหัส password 
                    $pass = $this->modelbackend->hash_password($this->request->getPost('password'), $salt); //เปลี่ยนรหัสเป็นแบบ hash
                    $data = array(
                        'agent_name' => $agent_name, //ช่องเก็บตัวอักษร
                        'agent_parent' => $this->request->getPost('under'), //ภายใต้
                        'agent_type' => $this->request->getPost('level'), // ระดับชั่น
                        'agent_username' => $this->request->getPost('m_username'), // username เข้าระบบ
                        'agent_tel_mobile'  => $this->request->getPost('telephone'), //เบอร์มือถือ
                        'agent_myname' => $this->request->getPost('m_name'), //ชื่อ
                        'agent_mysername' => $this->request->getPost('lastname'), //นามสกุล
                        'agent_dateofbirth' => strtotime(date('d-m-Y', strtotime($this->request->getPost('birth')))),  // เก็บวันที่เป็น timestamp
                        'agent_pass' => $pass, //pass
                        'agent_salt' => $salt, //pass
                        'agent_credit' => $this->request->getPost('min_credit'), //เครดิตเริ้นต้น
                        'agent_credit_max	' => $this->request->getPost('max_credit'), //เครดิตสูงสุด
                        'agent_create_by' => $this->session->get('session_admin')['name'], //ใครเป็นคนสร้าง
                        'agent_create_time' => time(), //วันที่สร้าง
                    );
                    if ($this->modelquery->adddata('tb_agent', $data)) {
                        $re = array('code' => 200, 'msg' => 'Data saved successfully'); //status 200 บันทึกสำเร็จ
                    } else {
                        $re = array('code' => 0, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
                    }
                } else { //ถ้าไม่ใช่ ให้แจ้งเตือนว่า ยูสนี้มีในระบบแล้ว
                    $re = array('code' => 0, 'msg' => 'This Username is already in the system.');
                }
            }
        } else {
            $re = array('code' => 0, 'msg' => 'Please make a new list');
        }
        echo json_encode($re);
        die;
    }


    // ==============   get under list
    public function get_under_list()
    {
        $type = $this->request->getPost('type');
        $table = 'tb_agent';
        $Sessionid = $this->session->session_admin['agent_id'];
        $Sessionagent_type = $this->session->session_admin['agent_type'];
        switch ($type) {
            case '1': // WEB
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_id' => $Sessionid,
                    );
                } else {
                    $where = array(
                        'agent_id' => $Sessionid,
                        'agent_type' => 1,
                    );
                }
                break;
            case '2': // สร้าง Suerper Senior
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type' => 1,
                    );
                } else {
                    $where = array(
                        'agent_id' => $Sessionid,
                        'agent_type' => 1,
                    );
                }

                break;
            case '3': //  สร้าง Senior
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type' => 2,
                    );
                } else {
                    $idSuerperSenior = $this->modelquery->get_whereBy($table, array('agent_id' => $Sessionid));
                    $where = array(
                        'agent_parent' => $idSuerperSenior[0]->agent_id,
                        'agent_type' => 2,
                    );
                }
                break;
            case '4': // Master
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type' => 3,
                    );
                } else {
                    $idSuerperSenior = $this->modelquery->get_whereBy($table, array('agent_id' => $Sessionid));
                    $idSenior = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSuerperSenior[0]->agent_id));
                    $where = array(
                        'agent_parent' => $idSenior[0]->agent_id,
                        'agent_type' => 3,
                    );
                }
                break;
            case '5': // Agent 1
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type' => 4,
                    );
                } else {
                    $idSuerperSenior = $this->modelquery->get_whereBy($table, array('agent_id' => $Sessionid));
                    $idSenior = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSuerperSenior[0]->agent_id));
                    $idMaster = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSenior[0]->agent_id));
                    $where = array(
                        'agent_parent' => $idMaster[0]->agent_id,
                        'agent_type' => 4,
                    );
                }
                break;
            case '6': // Agent 2
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type' => 5,
                    );
                } else {
                    $idSuerperSenior = $this->modelquery->get_whereBy($table, array('agent_id' => $Sessionid));
                    $idSenior = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSuerperSenior[0]->agent_id));
                    $idMaster = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSenior[0]->agent_id));
                    $idAgent1 = $this->modelquery->get_whereBy($table, array('agent_parent' => $idMaster[0]->agent_id));
                    $where = array(
                        'agent_parent' => $idAgent1[0]->agent_id,
                        'agent_type' => 5,
                    );
                }
                break;
            case '7': // Agent 3
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type' => 6,
                    );
                } else {
                    $idSuerperSenior = $this->modelquery->get_whereBy($table, array('agent_id' => $Sessionid));
                    $idSenior = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSuerperSenior[0]->agent_id));
                    $idMaster = $this->modelquery->get_whereBy($table, array('agent_parent' => $idSenior[0]->agent_id));
                    $idAgent1 = $this->modelquery->get_whereBy($table, array('agent_parent' => $idMaster[0]->agent_id));
                    $idAgent2 = $this->modelquery->get_whereBy($table, array('agent_parent' => $idAgent1[0]->agent_id));
                    $where = array(
                        'agent_parent' => $idAgent2[0]->agent_id,
                        'agent_type' => 6,
                    );
                }
                break;

            case '8': // Member
                if ($Sessionagent_type == 0) {
                    $where = array(
                        'agent_type !=' => $Sessionagent_type,
                        'agent_type !=' => 8,
                    );
                } else {
                    $where = array(
                        'agent_parent =' => $Sessionid,
                    );
                }
                break;
        }


        $data = $this->modelquery->get_whereBy($table, $where);
        array_push($data, $this->modelquery->get_whereBy($table, array('agent_id' => $Sessionid))[0]);
        echo json_encode($data);
        die;
    }
    public function get_com_ByuserId()
    {
        echo json_encode($this->modelbackend->get_com_user($this->request->getPost('user_id')));
    }

    public function aaa()
    {

        echo "<pre>";
        $data = [
            //  --------------
            [
                'user_id' => 1,
                'column' =>
                [
                    [
                        'num_3upper' =>
                        [
                            [
                                'filds' => 'commission->A',
                                'dataUpdate' => 11
                            ],
                            [
                                'filds' => 'commission->B',
                                'dataUpdate' => 22
                            ],
                        ],
                    ],
                    [
                        'num_3under' =>
                        [
                            [
                                'filds' => 'commission->A',
                                'dataUpdate' => 33
                            ], [
                                'filds' => 'commission->B',
                                'dataUpdate' => 44
                            ],
                        ],
                    ],
                ],
            ],

            //  --------------
            [
                'user_id' => 3,
                'column' =>
                [
                    [
                        'num_3upper' =>
                        [
                            [
                                'filds' => 'minPerbet',
                                'dataUpdate' => 88
                            ],
                        ],
                    ],
                ],
            ],

        ];

        ($this->modelagent->updateData($data, 'tb_cf_thai'));

        die;
    }


    public function update_us()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        if ($this->request->getPost('u_id')) {
            if ($this->request->getPost('edit_password') == null) { //กรณีที่ลูกค้าไม่ต้องการเปลี่ยนรหัสผ่าน

                if (empty($this->request->getPost('edit_lineA'))) { //กรณีที่ไม่ทำการติ๊กช่อง line A
                    $line_A = '0';
                } else {
                    $line_A = $this->request->getPost('edit_lineA');
                }

                if (empty($this->request->getPost('edit_lineB'))) { //กรณีที่ไม่ทำการติ๊กช่อง line A
                    $line_B = '0';
                } else {
                    $line_B = $this->request->getPost('edit_lineB');
                }

                if (empty($this->request->getPost('edit_lineC'))) { //กรณีที่ไม่ทำการติ๊กช่อง line A
                    $line_C = '0';
                } else {
                    $line_C = $this->request->getPost('edit_lineC');
                }

                $data = array(
                    'agent_myname' => $this->request->getPost('edit_name'),
                    'agent_mysername' => $this->request->getPost('edit_last'),
                    'agent_tel_mobile' => $this->request->getPost('edit_phone'),
                    'agent_status' => $this->request->getPost('edit_status'),
                    'agent_suspend' => $this->request->getPost('edit_st_su'),
                    'agent_last_update' => time()
                );

                if ($this->modelquery->editdata('tb_agent', 'agent_id', $this->request->getPost('u_id'), $data)) {

                    $data = [

                        [
                            'user_id' => $this->request->getPost('u_id'),
                            'column' =>
                            [
                                [
                                    'status_line' =>
                                    [
                                        [
                                            'field' => 'status_line->A',
                                            'dataUpdate' => $line_A
                                        ],

                                        [
                                            'field' => 'status_line->B',
                                            'dataUpdate' => $line_B
                                        ],

                                        [
                                            'field' => 'status_line->C',
                                            'dataUpdate' => $line_C
                                        ],

                                    ],
                                ],

                            ],
                        ],

                    ];

                    $data_update = $this->modelagent->UpdateDataTb_cf($data, 'tb_cf_thai');

                    if ($data_update) {

                        $re = array('code' => 200, 'msg' => 'Data Update successfully'); //status 200 บันทึกสำเร็จ
                    } else {

                        $re = array('code' => 500, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
                    }
                } else {
                    $re = array('code' => 500, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
                }
            } else { // กรณีที่ลูกค้าต้องการเปลี่ยนรหัสผ่าน
                $salt = $this->modelbackend->salt(); // เข้ารหัส password 
                $pass = $this->modelbackend->hash_password($this->request->getPost('edit_password'), $salt); //เปลี่ยนรหัสเป็นแบบ hash

                if (empty($this->request->getPost('edit_lineA'))) { //กรณีที่ไม่ทำการติ๊กช่อง line A
                    $line_A = '0';
                } else {
                    $line_A = $this->request->getPost('edit_lineA');
                }

                if (empty($this->request->getPost('edit_lineB'))) { //กรณีที่ไม่ทำการติ๊กช่อง line A
                    $line_B = '0';
                } else {
                    $line_B = $this->request->getPost('edit_lineB');
                }
                if (empty($this->request->getPost('edit_lineC'))) { //กรณีที่ไม่ทำการติ๊กช่อง line A
                    $line_C = '0';
                } else {
                    $line_C = $this->request->getPost('edit_lineC');
                }

                $data = array(
                    'agent_pass' => $pass,
                    'agent_salt' => $salt,
                    'agent_myname' => $this->request->getPost('edit_name'),
                    'agent_mysername' => $this->request->getPost('edit_last'),
                    'agent_tel_mobile' => $this->request->getPost('edit_phone'),
                    'agent_status' => $this->request->getPost('edit_status'),
                    'agent_suspend' => $this->request->getPost('edit_st_su'),
                    'agent_last_update' => time()
                );

                if ($this->modelquery->editdata('tb_agent', 'agent_id', $this->request->getPost('u_id'), $data)) {

                    $data = [

                        [
                            'user_id' => $this->request->getPost('u_id'),
                            'column' =>
                            [
                                [
                                    'status_line' =>
                                    [
                                        [
                                            'field' => 'status_line->A',
                                            'dataUpdate' => $line_A
                                        ],

                                        [
                                            'field' => 'status_line->B',
                                            'dataUpdate' => $line_B
                                        ],

                                        [
                                            'field' => 'status_line->C',
                                            'dataUpdate' => $line_C
                                        ],

                                    ],
                                ],

                            ],
                        ],

                    ];

                    $data_update = $this->modelagent->UpdateDataTb_cf($data, 'tb_cf_thai');

                    if ($data_update) {

                        $re = array('code' => 200, 'msg' => 'Data Update successfully'); //status 200 บันทึกสำเร็จ
                    } else {

                        $re = array('code' => 500, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
                    }
                } else {
                    $re = array('code' => 500, 'msg' => 'Failed to save data'); // status 0 ไม่สำเร็จ
                }
            }
            echo json_encode($re);
            die;
        }
    }


    // function นี้อยู่ในหน้า สมาชิกทั้งหมดในส่วนของการตั้งค่า lottory
    public function setting_lottery()
    {
        print_r($_POST);
        die;
    }
    // END





}
