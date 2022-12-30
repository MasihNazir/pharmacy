<?php

namespace App\Controllers;

use App\models\medsModel;
use App\models\uniteModel;
use App\models\companyModel;
use App\models\catagoryModel;
use App\models\medscrude;
use App\Controllers\BaseController;

class MedClass extends BaseController
{

    public function index()
    {
        $medsModel = new medsModel();
        $catagories = new catagoryModel();
        $unites = new uniteModel();
        $companies = new companyModel();

        $catagory = $catagories->where('active', '1')->findAll();
        $unite = $unites->where('active', '1')->findAll();
        $company =  $companies->findAll();
        $meds = $medsModel->where('active', '1')->findAll();
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');
        $data = [
            'meds' => $meds,
            'user_id' => $user_id,
            'companies' => $company,
            'unites' => $unite,
            'catagories' => $catagory,
        ];
        echo view('template/header');
        echo view('pharmacy/medsView', $data);
        echo view('template/footer');
    }
    public function deleted(){
        $medsModel = new medsModel();
        $meds = $medsModel->where('active', '0')->findAll();
        $data = [
            'meds' => $meds,
        ];
        echo view('template/header');
        echo view('pharmacy/medsDeleted', $data);
        echo view('template/footer');

    }
    public function reactivate($medId){
        $medsModel = new medsModel();
        $medsModel ->where('medicine_id', $medId)
        ->set(['active' => 1])
        ->update();

		$session = \Config\Services::session();
		$session->setFlashdata('medActivated', 'The Medicine Activated Successfully');
		return $this->response->redirect(site_url('/medClass/deleted'));


    }
    public function view($medId)
    {
        $catagories = new catagoryModel();
        $unites = new uniteModel();
        $companies = new companyModel();
        $catagory = $catagories->where('active', '1')->findAll();
        $unite = $unites->where('active', '1')->findAll();
        $company =  $companies->findAll();

        $medsModel = new medsModel();
        $meds = $medsModel->where('medicine_id', $medId)->first();

        $data = [
            'meds' => $meds,
            'campanies' => $company,
            'unites' => $unite,
            'catagories' => $catagory,

        ];
        echo view('template/header');
        echo view('pharmacy/medsEdit', $data);
        echo view('template/footer');
    }
    public function medsCreate()
    {
        $catagories = new catagoryModel();
        $unites = new uniteModel();
        $companies = new companyModel();

        $catagory = $catagories->where('active', '1')->findAll();
        $unite = $unites->where('active', '1')->findAll();
        $company =  $companies->findAll();

        $data = [
            'unites' => $unite,
            'catagories' => $catagory,
            'campanies' => $company,
        ];
        echo view('template/header');
        echo view('pharmacy/medsCreate', $data);
        echo view('template/footer');
    }
    public function store()
    {
        if ($this->request->getMethod() == "post") {
            $medsModel = new medsModel();
            $data = [
                'barcode' => $this->request->getPost("barcode"),
                'med_name' => $this->request->getPost("med_name"),
                'med_generic' => $this->request->getPost("med_generic"),
                'price_sale' => $this->request->getPost("price_sale"),
                'price_purchase' => $this->request->getPost("price_purchase"),
                'stock' => $this->request->getPost("stock"),
                'stock_minimum' => $this->request->getPost("stock_minimum"),
                'available' => $this->request->getPost("available"),
                'unit_id' => $this->request->getPost("unit_id"),
                'category_id' => $this->request->getPost("category_id"),
                'company_id' => $this->request->getPost("company_id"),
            ];
            $session = \Config\Services::session();
            $session->setFlashdata('Meds_save', 'The Medicine Insterted SuccessFully ');
            $medsModel->insert($data);
            return $this->response->redirect(site_url('/medicine'));
        }
    }
    public function update()
    {
        if ($this->request->getMethod() == "post") {
            $medsModel = new medsModel();
            $id = $this->request->getVar('medicine_id');
            $medName = $this->request->getPost("med_name");
            $data = [
                'barcode' => $this->request->getPost("barcode"),
                'med_name' => $medName,
                'med_generic' => $this->request->getPost("med_generic"),
                'price_sale' => $this->request->getPost("price_sale"),
                'price_purchase' => $this->request->getPost("price_purchase"),
                'stock' => $this->request->getPost("stock"),
                'stock_minimum' => $this->request->getPost("stock_minimum"),
                'available' => $this->request->getPost("available"),
                'unit_id' => $this->request->getPost("unit_id"),
                'category_id' => $this->request->getPost("category_id"),
                'company_id' => $this->request->getPost("company_id"),
            ];
            $session = \Config\Services::session();
            $session->setFlashdata('MedsUpdate', $medName . ' Medicine Updated SuccessFully');
            $medsModel->update($id, $data);
            return $this->response->redirect(site_url('/medicine'));
        }
    }
    public function delete($medId){
		$medsModel = new medsModel();
        $data = [
            'active' => 0
        ];  
        $medsModel->update($medId, $data);

		$session = \Config\Services::session();
		$session->setFlashdata('medDelete', 'The Medicine deleted Successfully');
		return $this->response->redirect(site_url('/medicine'));

    }
}
