<?php

namespace App\Models;

use CodeIgniter\Model;
//use CodeIgniter\Database\ConnectionInterface;

class clientsModel extends Model
{
    protected $table = 'clients';
    protected $allowedFields = ['name','address','email', 'number'];
    protected $primaryKey = 'client_id';
}
