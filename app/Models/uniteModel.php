<?php namespace App\Models;
use CodeIgniter\Model;
//use CodeIgniter\Database\ConnectionInterface;

class uniteModel extends Model
{
   // protected $table = 'company';

    //protected $allowedFields = ['title', 'slug', 'body'];

    protected $table = 'unites';
    protected $allowedFields = ['unit', 'abr', 'active'];
    protected $primaryKey = 'unit_id'; 
}
