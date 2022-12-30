<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class invoicejoin 
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

    function getInvoices($company_id){
        $db      = \Config\Database::connect();
        $builder = $db->table('invoices'); 
        $builder->where('invoices.company_id', $company_id);
        
        $builder->join('users', 'invoices.user_id = users.id');
        $result = $builder->get()->getResult(); 
        return $result; 

    } 
    function sumCompanyInvoice($company_id){
        $db      = \Config\Database::connect();
        $builder = $db->table('invoices'); 
        $builder->select('SUM(invoice_amount) as total'); 
        $builder->where('company_id', $company_id); 
       // $builder->selectSum()('invoice_amount');
        return $builder->get()->getResult(); 
    }

    function sumCompanyCredit($company_id){
        $db      = \Config\Database::connect();
        $builder = $db->table('credit'); 
        $builder->select('SUM(amount) as totalAmount'); 
        $builder->where('company_id', $company_id); 
       // $builder->selectSum()('invoice_amount');
        return $builder->get()->getResult(); 
    }

    function get_credits_by_company($company_id){
        $db = \Config\Database::connect();
        $builder = $db->table('credit');
        $builder->select('*')
        ->where('company_id', $company_id)
        ->orderBy('created_at', 'DESC');
    return $builder->get()->getResult();
    }
    function getCompanySum(){
        $db = \Config\Database::connect();
        $builder = $db->table('company'); 
        $builder->selectCount('name'); 
        $builder->countAllResults(''); 
        return $builder->get()->getResult(); 
    }
    function getMedSum(){
        $db = \Config\Database::connect();
        $builder = $db->table('medicine'); 
        $builder->selectCount('med_name'); 
        $builder->countAllResults(''); 
        return $builder->get()->getResult(); 
    }
    function getSumCridit(){
        $db = \Config\Database::connect();
        $builder = $db->table('credit'); 
        $builder->select('SUM(amount) as totalAmount'); 
        return $builder->get()->getResult(); 
    }
    function getSumInvoice(){
        $db = \Config\Database::connect();
        $builder = $db->table('invoices'); 
        $builder->select('SUM(invoice_amount) as totalAmount'); 
        return $builder->get()->getResult(); 
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


   function sumCompanyCreditMonth(){
    $db = \Config\Database::connect();
    $builder = $db->query('SELECT DATE_FORMAT(created_at, "%Y %M") AS date, sum(amount) AS total FROM credit GROUP BY MONTH(created_at)');
    return $builder->getResult(); 
}
function sumInvoiceMonthly (){
    $db = \Config\Database::connect();
    $builder = $db->query('SELECT DATE_FORMAT(created_at, "%Y %M") AS date, sum(invoice_amount) AS total FROM invoices GROUP BY MONTH(created_at)');
    return $builder->getResult(); 

}

}
?>