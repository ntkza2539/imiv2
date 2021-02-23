<?php namespace App\Models\M_backend;

use CodeIgniter\Model;
class M_query extends Model
{
    protected $modelchecktable;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->uri = new \CodeIgniter\HTTP\URI();
        $this->modelchecktable =  model('M_backend/M_checktable'); 
    }
	public function getdatall($table){
        $this->modelchecktable->checktable($table);
        return ($this->db->table($table)->get()->getResult()) ;

	}
    public function adddata($table,$data){
        $this->modelchecktable->checktable($table);
        return ($this->db->table($table)->insert($data))?  $this->db->insertID(): false;
    }

    public function deldata($table,$keyid,$id){
        return ($this->db->table($table)->where($keyid, $id)->delete())?  true: false;
    }
    public function editdata($table,$keyid,$id,$data){
        $this->modelchecktable->checktable($table);
        return ($this->db->table($table)->where($keyid, $id)->set($data)->update())?  true: false;
    }
                             
    public function get_whereBy($table,$where)
    {// where = array  by = array
       $query = $this->db->table($table);
       foreach ($where as $key => $value) {
        $query->where($key,$value);
       }
        return ($query->get()->getResult()) ;
    }


}


