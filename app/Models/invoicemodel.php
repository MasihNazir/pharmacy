<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class invoicemodel extends Model
{
   // protected $table = 'company';

    //protected $allowedFields = ['title', 'slug', 'body'];

    protected $table = 'invoices';
    protected $allowedFields = ['invoice_no', 'invoice_date', 'invoice_amount','company_id', 'detail','user_id'];
    protected $primaryKey = 'invoice_id'; 
}
