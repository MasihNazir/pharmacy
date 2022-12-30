<?php

namespace App\Controllers;
use App\Models\clientsModel;

use App\Controllers\BaseController;

class Clients extends BaseController
{

    public function index()
    {
        $clientsModel = new clientsModel();

        $clients = $clientsModel->findAll();
      
        $data = [
            'clients' => $clients,
        ];
        echo view('template/header');
        echo view('pharmacy/clientsView', $data);
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
    public function edit($clientId)
    {
    
        $clientsModel = new clientsModel();
        $client = $clientsModel->where('client_id', $clientId)->first();

        $data = [
            'client' => $client,
        ];
        echo view('template/header');
        echo view('pharmacy/clientEdit', $data);
        echo view('template/footer');
    }
    public function clientCreate()
    {
        echo view('template/header');
        echo view('pharmacy/clientCreate');
        echo view('template/footer');
    }
    public function store()
    {
        $clientsModel = new clientsModel();
        if ($this->request->getMethod() == "post") {
           
            $data = [
                'name' => $this->request->getPost("name"),
                'number' => $this->request->getPost("number"),
                'address' => $this->request->getPost("address"),
                'email' => $this->request->getPost("email"),
            ];
            $session = \Config\Services::session();
            $session->setFlashdata('clientSave', 'The Client Insterted SuccessFully ');
            $clientsModel->insert($data);
            return $this->response->redirect(site_url('/clients'));
        }
    }
    public function update()
    {
        if ($this->request->getMethod() == "post") {
            $clientsModel = new clientsModel();
            $clientId = $this->request->getVar('client_id');
            $data = [
                'name' => $this->request->getPost("name"),
                'number' =>$this->request->getPost("number"),
                'address' => $this->request->getPost("address"),
                'email' => $this->request->getPost("email"),  
            ];
            $session = \Config\Services::session();
            $session->setFlashdata('clientUpdate','The Client Updated SuccessFully');
            $clientsModel->update($clientId, $data);
            return $this->response->redirect(site_url('/clients'));
        }
    }
    public function delete($clientId){
        $clientsModel = new clientsModel();
        $clientsModel->delete($clientId);

		$session = \Config\Services::session();
		$session->setFlashdata('clientDelete', 'The Client deleted Successfully');
		return $this->response->redirect(site_url('/clients'));

    }
}
