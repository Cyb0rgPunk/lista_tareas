<?php

namespace App\Models;

use CodeIgniter\Model;

class MTask extends Model
{
    protected $table            = 't_tasks';
    protected $primaryKey       = 'id_task';

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    //protected $protectFields    = true;
    protected $allowedFields    = ['id_category','id_status','title','description'];


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   // protected $deletedField  = 'deleted_at';

    public function getTask($data){
        $task = $this->db->table('t_task');
        $task->where($data);
        return $task->get()->getResultArray();
    }

    public function getTasks(){
        $task = $this->db->table('t_tasks');
        return $task->get()->getResultArray();
    }
}
