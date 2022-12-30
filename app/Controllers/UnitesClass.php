<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\uniteModel;

class UnitesClass extends BaseController
{
    public function index()
    {
        $model = new uniteModel();
        $unites = $model->findAll();
        $session = \Config\Services::session();
        $user_id = $session->get('user_id');
        $data = [
            'unites' => $unites,
            'user_id' => $user_id
        ];
        echo view('template/header'); 
        echo view ('pharmacy/unitesView', $data); 
        echo view ('template/footer'); 
    }
    public function addUnite(){
        $uniteModel = new uniteModel();
		$data = [
			'unit' => $this->request->getVar('unite'),
			'abr'  => $this->request->getVar('abv'),
			'active'  => $this->request->getVar('active'),
		];
		$session = \Config\Services::session();
		$session->setFlashdata('uniteSuccess', 'The Unite Saved Successfully');

		$uniteModel->insert($data);

		return $this->response->redirect(site_url('/unites'));

    }
    public function delete($uniteId){
		$uniteModel = new uniteModel();
		$data['user'] = $uniteModel->where('unit_id', $uniteId)->delete($uniteId);
		$session = \Config\Services::session();
		$session->setFlashdata('uniteDelete', 'The Unite deleted Successfully');
		return $this->response->redirect(site_url('/unites'));

    }
    public function editeUnite($id){
        $uniteModel = new uniteModel();
		$data['unite'] = $uniteModel->where('unit_id', $id)->first();
		echo view('template/header');
		echo view('pharmacy/editUnite', $data);
		echo view('template/footer');

    }
    public function update(){
        $uniteModel = new uniteModel();
		$id = $this->request->getVar('uniteId');
		$data = [
			'unit' => $this->request->getVar('unit'),
			'abr'  => $this->request->getVar('abr'),
			'active'  => $this->request->getVar('active'),
		];
		$uniteModel->update($id, $data);
		$session = \Config\Services::session();
		$session->setFlashdata('uniteUpdate', 'The ('.$data['unit'].') Unite updated Successfully');
		return $this->response->redirect(site_url('/unites'));

    }
}
