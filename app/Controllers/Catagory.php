<?php 
namespace App\Controllers; 

use App\Controllers\BaseController; 
use App\models\catagoryModel;

class Catagory extends BaseController{

public function index(){
    $catagoryModel = new catagoryModel();
    $catagory = $catagoryModel->where('active','1')->findAll();
    $session = \Config\Services::session();
    $user_id = $session->get('user_id');
    $data = [
        'catagory' => $catagory,
        'user_id' => $user_id
    ];
    echo view('template/header'); 
    echo view ('pharmacy/catagoryView', $data); 
    echo view ('template/footer'); 
}
public function update(){
    $catagoryModel = new catagoryModel();
    $catagoryId = $this->request->getVar('catagory_id');
    $data = ['catagory_name' => $this->request->getVar('catagory_name') ];
    $catagoryModel->update($catagoryId, $data);
    $session = \Config\Services::session();
    $session->setFlashdata('catagoryUpdate', 'The ('.$data['catagory_name'].') Catagory updated Successfully');
    return $this->response->redirect(site_url('/catagory'));
}

public function delete($catagoryId){
    $catagoryModel = new catagoryModel();
    //$catagoryId = $this->request->getVar('catagory_id');
    $data = ['active' => '0'];
    $catagoryModel->update($catagoryId, $data);
    $session = \Config\Services::session();
    $session->setFlashdata('catagoryDelete', 'The Catagory Deleted Successfully');
    return $this->response->redirect(site_url('/catagory'));
}

public function addCatagory(){
    $catagoryModel = new catagoryModel();
    $data = [
        'catagory_name' => $this->request->getVar('catagory_name'),
    ];
    $session = \Config\Services::session();
    $session->setFlashdata('addSuccess', 'The Catagory Saved Successfully');

    $catagoryModel->insert($data);

    return $this->response->redirect(site_url('/catagory'));


}




}
