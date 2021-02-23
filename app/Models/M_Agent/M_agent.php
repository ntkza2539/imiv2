<?php

namespace App\Models\M_agent;

use CodeIgniter\Model;

class M_agent extends Model
{
    protected $modelchecktable;
    protected $modelquery;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->modelchecktable =  model('M_backend/M_checktable');
        $this->modelquery = model('M_backend/M_query');
    }
    public function UpdateDataTb_cf($data, $table)
    {
        // print_r($data);
        // die;
        $returnData = [];
        foreach ($data as $key1 => $val1) {
            $myupdate = [];
            $data_old = ($this->modelquery->get_whereBy($table, ['user_id' => $val1['user_id']]))[0];
            $column = $val1['column'];
            $dataUpTo = null;
            foreach ($column as $key2 => $val2) {
                foreach ($val2 as $keyC => $valC) {
                    $dataUpTo = json_decode($data_old->$keyC);
                    foreach ($valC as $key3 => $val3) {
                        $filds = explode('->', $val3['field']);
                        if (sizeof($filds) == 1) {
                            $p1 = (strval($filds[0]));
                            $dataUpTo->$p1 = $val3['dataUpdate'];
                        }
                        if (sizeof($filds) == 2) {
                            $p1 = (strval($filds[0]));
                            $p2 = (strval($filds[1]));
                            $dataUpTo->$p1->$p2 = $val3['dataUpdate'];
                        }
                        if (sizeof($filds) == 3) {
                            $p1 = (strval($filds[0]));
                            $p2 = (strval($filds[1]));
                            $p3 = (strval($filds[2]));
                            $dataUpTo->$p1->$p2->$p3 = $val3['dataUpdate'];
                        }
                        if (sizeof($filds) == 4) {
                            $p1 = (strval($filds[0]));
                            $p2 = (strval($filds[1]));
                            $p3 = (strval($filds[2]));
                            $p4 = (strval($filds[3]));
                            $dataUpTo->$p1->$p2->$p3->$p4 = $val3['dataUpdate'];
                        }
                        if (sizeof($filds) == 5) {
                            $p1 = (strval($filds[0]));
                            $p2 = (strval($filds[1]));
                            $p3 = (strval($filds[2]));
                            $p4 = (strval($filds[3]));
                            $p5 = (strval($filds[4]));
                            $dataUpTo->$p1->$p2->$p3->$p4->$p5 = $val3['dataUpdate'];
                        }
                        // ส่งอัฟเดทตรงนี้
                    }
                    $myupdate["$keyC"] = json_encode($dataUpTo);
                    
                }
            }
            $ar = [
                'user_id' => $val1['user_id'],
                'FildsUp' => $myupdate
            ];
            array_push($returnData, $ar);
        }

        // loop update
        $DataRe = [];

        foreach ($returnData as $key => $val) {
            if ($this->db->table($table)->where('user_id', $val['user_id'])->set($val['FildsUp'])->update()) {
                $a = ['DataRe' => $val, 'user_id' => $val['user_id'], 'ch' => 200];
                array_push($DataRe, $a);
            } else {
                $a = ['DataRe' => $val, 'user_id' => $val['user_id'], 'ch' => 500];
                array_push($DataRe, $a);
            }
        }
        return $DataRe;
    }
}
