<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class credit extends Model
{
    // protected $table = 'company';
    //protected $allowedFields = ['title', 'slug', 'body'];

    protected $table = 'credit';
    protected $allowedFields = ['bill_no', 'amount', 'company_id', 'detail'];
    protected $primaryKey = 'bill_id'; 
}
