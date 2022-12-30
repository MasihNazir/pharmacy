<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class companycrud 
{
    protected $db; 
    public function __constract(ConnectionInterface & $db){
        $this->db =& $db; 
    }

   //protected $table = 'company';
   //protected $primaryKey = 'id'; 
   //protected $allowedFields = ['name', 'address', 'phone','representative', 'rep_phone','image'];
   //protected $useTimestamps = true;
   //protected $updatedField  = 'updated_at';
   //protected $createdField  = 'created_at';

    function getcompany($id){
        $db      = \Config\Database::connect();
        $builder = $db->table('company'); 
        $builder->where('company.id', $id); 
        $builder->join('users', 'company.user_id = users.id');
        $result = $builder->get()->getResultArray(); 
        return $result; 

    } 
   //function add_debate(){
   //    {
   //       
   //       
   //        $data= [
   //           'company_id'=> $this->requeste()->post('company_id'),
   //           'invoice_no'=> $this->requeste()->post('invoice_no'),
   //           ''
   //        ]; 
   //        $db = \Config\Database::connect();
   //        $builder = $db->table('debate'); 
   //        $builder->insert($data); 





   //}  
}
?>