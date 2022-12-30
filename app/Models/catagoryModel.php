<?php

namespace App\Models;

use CodeIgniter\Model;
//use CodeIgniter\Database\ConnectionInterface;

class catagoryModel extends Model
{
    protected $table = 'catagory';
    protected $allowedFields = ['catagory_name','active'];
    protected $primaryKey = 'catagory_id';
}
