<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\userModel;

class Users extends BaseController
{
	public function index()
	{
		$model = new userModel();
		$users = $model->findAll();
		$data = [
			"users" => $users
		];

		//echo "<pre>";
		//print_r($users);  
		// echo "</pre>";
		//$data = 
		echo view('template/header');
		echo view('users_view', $data);
		echo view('template/footer');
	}

	public function show($id)
	{
		$userModel = new userModel();
		$data['user_obj'] = $userModel->where('id', $id)->first();
		//echo "<pre>"; 
		//print_r($id); 
		//echo "</pre>";
		echo view('template/header');
		echo view('users/edit', $data);
		echo view('template/footer');
	}

	public function store()
	{
		$userModel = new userModel();
		$data = [
			'firstname' => $this->request->getVar('firstname'),
			'lastname'  => $this->request->getVar('lastname'),
			'email'  => $this->request->getVar('email'),
			'password'  => $this->request->getVar('password'),
			'level'  => $this->request->getVar('level'),
		];
		$session = \Config\Services::session();
		$session->setFlashdata('success', 'The User inserted Successfully');

		$userModel->insert($data);

		return $this->response->redirect(site_url('/users'));
	}

	public function update()
	{
		$userModel = new userModel();
		$id = $this->request->getVar('id');
		$data = [
			'firstname' => $this->request->getVar('firstname'),
			'lastname'  => $this->request->getVar('lastname'),
			'email'  => $this->request->getVar('email'),
			'password'  => $this->request->getVar('password'),
			'level'  => $this->request->getVar('level'),
		];
		$userModel->update($id, $data);
		$session = \Config\Services::session();
		$session->setFlashdata('update', 'The User updated Successfully');
		return $this->response->redirect(site_url('/users'));
	}

	public function delete($id = null)
	{
		$userModel = new userModel();
		$data['user'] = $userModel->where('id', $id)->delete($id);
		$session = \Config\Services::session();
		$session->setFlashdata('delete', 'The User deleted Successfully');
		return $this->response->redirect(site_url('/users'));
	}

	public function upload_image()
	{
		$userModel = new userModel();

		$file = $this->request->getFile('files');
		if ($file->isValid()) {


			$file->move('uploads');
			$name = $file->getName();
			$id = $this->request->getVar('id');
			//echo $id; 
			//echo $name; 
			$userModel
				->where('id', $id)
				->set(['image' => $name])
				->update();
			$session = \Config\Services::session();
			$session->setFlashdata('image', 'the User Image uploaded successfully');
			return $this->response->redirect(site_url('/users/show/' . $id));
		}
	}
}
