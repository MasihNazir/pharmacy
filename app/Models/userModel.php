<?php namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id'; 

    protected $allowedFields = ['firstname', 'lastname', 'email','password', 'level','image'];

    
}
