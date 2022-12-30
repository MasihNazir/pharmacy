<?php namespace App\Models;

use CodeIgniter\Model;

class medsModel extends Model
{
    protected $table      = 'medicine';
    protected $primaryKey = 'medicine_id';

    protected $returnType     = 'array';
    //protected $useSoftDeletes = false;

    protected $allowedFields = ['barcode', 'med_name' , 'med_generic', 'price_sale', 'price_purchase', 'stock', 'stock_minimum','available', 'unit_id','category_id','company_id','active'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}