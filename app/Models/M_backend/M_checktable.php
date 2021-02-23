<?php namespace App\Models\M_backend;

use CodeIgniter\Model;
class M_checktable extends Model
{
    
    protected $forge;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->forge = \Config\Database::forge();
    }
    public function checktable($table)
    {
           
        if (! in_array($table, $this->db->listTables()) ) {
            switch ($table) {
                case 'test':
                    $fields = [
                        'test_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE,
                            'comment' => 'ไอดีทดสอบ'
                        ],
                        'test_name' => [
                            'type' => 'VARCHAR',
                            'constraint' => 50,
                            'comment' => 'ชื่อทดสอบ'
                        ],
                        'test_email' => [
                            'type' => 'VARCHAR',
                            'constraint' => 100,
                            'comment' => 'อีเมลทดสอบ'
                        ],
                        'test_password' => [
                            'type' => 'VARCHAR',
                            'constraint' => 150,
                            'comment' => 'รหัสทดสอบ'
                        ],
                    ];
                    $this->createTb($fields, $table,'test_id');
                    break;
                case 'tb_menu':
                    $fields = [
                        'menu_id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE,
                            'comment' => 'ไอดีเมนู',
                        ],
                        'menu_name' => [
                            'type' => 'VARCHAR',
                            'constraint' => 50,
                            'comment' => 'ชื่อเมนู',
                        ],
                        'menu_icon' => [
                            'type' => 'VARCHAR',
                            'constraint' => 50,
                            'comment' => 'ไอคอนเมนู',
                        ],
                        'menu_link' => [
                            'type' => 'VARCHAR',
                            'constraint' => 50,
                            'comment' => 'ลิงค์เมนู',
                        ],
                        'menu_group' => [
                            'type' => 'VARCHAR',
                            'constraint' => 50,
                            'comment' => 'กลุ่มเมนู',
                        ],
                        'parent_menu' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'comment' => 'ไอดีเมนูหลัก',
                        ]
                    ];
                    $this->createTb($fields, $table,'menu_id');
                    break;
                case 'tb_check_menu_admin':
                        $fields = [
                            'ch_menu_admin_id' => [
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE,
                                'comment' => 'ไอดีตาราง'
                            ],
                            'ch_menu_admin_admin_id' => [
                                'type' => 'INT',
                                'constraint' => 11,
                                'comment' => 'ไอดีแอดมิน'
                            ],
                            'ch_menu_admin_menu_id' => [
                                'type' => 'INT',
                                'constraint' => 11,
                                'comment' => 'ไอดีเมนู'
                            ],
                            'ch_menu_admin_status' => [
                                'type' => 'INT',
                                'constraint' => 11,
                                'comment' => 'สถาณะ'
                            ],
                        ];
                        $this->createTb($fields, $table,'ch_menu_admin_id');
                        break;
                case 'tb_admin_login':            
                        $fields = [
                            'admin_login_id' => [
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE,
                                'comment' => ''
                            ],
                            'admin_login_username' => [
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'comment' => ''
                            ],
                            'admin_login_nickname' => [
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'comment' => ''
                            ],
                            'admin_login_password' => [
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'comment' => ''
                            ],
                            'admin_login_salt' => [
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'comment' => ''
                            ],
                            'admin_login_name' => [
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'comment' => ''
                            ],
                            'admin_login_sername' => [
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'comment' => ''
                            ],
                            'admin_login_tel' => [
                                'type' => 'VARCHAR',
                                'constraint' => 15,
                                'comment' => ''
                            ],
                            'admin_login_last_login' => [
                                'type' => 'DATETIME',
                                'comment' => ''
                            ],
                            'admin_login_last_ip' => [
                                'type' => 'VARCHAR',
                                'constraint' => 11,
                                'comment' => ''
                            ],
                        ];
                        $this->createTb($fields, $table,'admin_login_id');
                    break;
                 default:
                    break;
                }
          
        }
        return true;
    }

    function createTb($fields,$table,$primarykey)
    {
        $this->forge->addField($fields);
        $this->forge->addKey($primarykey, TRUE);
        $this->forge->createTable($table);

    }

}


