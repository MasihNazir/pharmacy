<?php namespace App\Models;
use CodeIgniter\Model;
//use CodeIgniter\Database\ConnectionInterface;

class companyModel extends Model
{
   // protected $table = 'company';

    //protected $allowedFields = ['title', 'slug', 'body'];

    protected $table = 'company';
    protected $allowedFields = ['name', 'address', 'phone','representative', 'rep_phone','user_id','note'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $primaryKey = 'id'; 
}

