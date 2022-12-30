<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class medscrude 
{
    protected $db; 
    public function __constract(ConnectionInterface & $db){
        $this->db =& $db; 
    }
    function getmed($medId){
        $db      = \Config\Database::connect();
        $builder = $db->table('medicine'); 
        $builder->where('medicine.medicine_id', $medId); 
       // join('Table_1', 'Table_1.unique_id = Table_3.author', 'LEFT');
        $builder->join('company', 'company.company_id = medicine.company_id');
        $builder->join('catagory', 'catagory.catagory_id = medicine.category_id', 'LEFT');
        $builder->join('unites', ' unites.unit_id = medicine.unit_id', 'LEFT');
        $result = $builder->get()->getResultArray(); 
        return $result; 
        

        $this->db->select('*');
        $this->db->from('company'); 
        $this->db->join('catagory', 'sequence.id = distributions.sequence_id', 'left');
        $this->db->join('products', 'sequence.product_id=products.product_no');
        $this->db->join('regions', 'sequence.region_id=regions.id');
        $this->db->order_by('distributions.id','asc');         
        $query = $this->db->get(); 
        if($query->num_rows() != 0){
        return $query->result_array();
        } else {    
        return false;
        }

        

    } 
}
?>