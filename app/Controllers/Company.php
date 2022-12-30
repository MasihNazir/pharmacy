<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\companyModel;
use App\Models\invoicemodel;
use App\Models\invoicejoin;
use App\Models\companycrud;
use App\Models\credit;


class Company extends BaseController
{
	function __construct() {
		$session = session(); 
		if (!$session->get('logged_in'))
        {
            return view('login');
        }
    }
	public function index()
	{
		//$db = db_connect(); 
		$model = new companyModel();
		$companyList = $model->findAll();
		$session = \Config\Services::session();
		$user_id = $session->get('user_id');
		$data = [
			"companyList" => $companyList,
			'user_id' => $user_id
		];
		echo view('template/header');
		echo view('pharmacy/company_view', $data);
		echo view('template/footer');
	}

	//public function select(){

	//$model = new userModel();
	//$users = $model->findAll(); 
	//echo "<pre>";
	//print_r($users);  

	//}

	//--------------------------------------------------------------------


	public function view($id)
	{
		$db = db_connect();
		$model = new companycrud($db);
		$company = $model->getcompany($id);
		$invoices = new invoicemodel();
		$comInvoices = $invoices->where('company_id', $id)->findAll();
		$creditmodel = new credit();
		//$comCredit = $creditmodel->where('company_id', $id)->findAll(); 
		//$company = $model->find($id); 
		$model = new invoicejoin($db);
		$invoice = $model->getInvoices($id);
		$comCredit = $model->get_credits_by_company($id);
		$sumCompanyInvoice = $model->sumCompanyInvoice($id);
		$sumCompanyCredit = $model->sumCompanyCredit($id);

		//echo "<pre>";
		//print_r($creditByCompany);
		//echo "<pre>";



		if ($company) {

			$session = \Config\Services::session();
			$user_id = $session->get('user_id');
			$data = [
				'company' => $company,
				'company_id' => $id,
				'user_id' => $user_id,
				'comInvoices' => $comInvoices,
				'invoice' => $invoice,
				'invoices_total' => $sumCompanyInvoice,
				'comCredit' => $comCredit,
				'sumCompanyCredit' => $sumCompanyCredit,
			];
		};
		echo view('template/header');
		echo view('pharmacy/company', $data);
		echo view('template/footer');
	}
	public function new()
	{
		$companyModel = new companyModel();
		$data = [
			'name' => $this->request->getVar('name'),
			'phone'  => $this->request->getVar('phone'),
			'address'  => $this->request->getVar('address'),
			'representative'  => $this->request->getVar('rep_name'),
			'rep_phone'  => $this->request->getVar('rep_phone'),
			'user_id'  => $this->request->getVar('user_id'),
			'note'  => $this->request->getVar('note'),
		];
		$session = \Config\Services::session();
		$session->setFlashdata('company_success', 'The Company inserted Successfully');

		$companyModel->insert($data);

		return $this->response->redirect(site_url('/company'));
	}
	public function update()
	{
		$model = new companyModel();
		$id = $this->request->getVar('company_id');
		$data = [
			'name' => $this->request->getVar('name'),
			'phone'  => $this->request->getVar('phone'),
			'address'  => $this->request->getVar('address'),
			'representative'  => $this->request->getVar('rep_name'),
			'rep_phone'  => $this->request->getVar('rep_phone'),
			'note'  => $this->request->getVar('note'),
		];
		$model->update($id, $data);
		$session = \Config\Services::session();
		$session->setFlashdata('com_update', 'The Company Detail updated Successfully');
		return $this->response->redirect(site_url('/company/view/' . $id));
	}

	public function inv_reg()
	{
		$model = new invoicemodel();
		$data = [
			'invoice_no' => $this->request->getVar('invoice_no'),
			'invoice_date'  => $this->request->getVar('invoice_date'),
			'invoice_amount'  => $this->request->getVar('invoice_amount'),
			'detail'  => $this->request->getVar('detail'),
			'user_id'  => $this->request->getVar('user_id'),
			'company_id'  => $this->request->getVar('company_id'),

		];
		$company_id = $this->request->getVar('company_id');
		$session = \Config\Services::session();
		$session->setFlashdata('invoice_success', 'The Invoice Registerd Successfully');

		$model->insert($data);

		return $this->response->redirect(site_url('/company/view/' . $company_id));
	}

	public function delete_invoice($invoice_id, $company_id)
	{
		$model = new invoicemodel();
		$model->where('invoices.invoice_id', $invoice_id)->delete($invoice_id);
		$session = \Config\Services::session();
		$session->setFlashdata('invoice_delete', 'The invoice deleted Successfully');
		return $this->response->redirect(site_url('/company/view/' . $company_id));
	}
	public function bill_reg()
	{
		$model = new credit();
		$data = [
			'bill_no' => $this->request->getVar('bill_no'),
			'amount'  => $this->request->getVar('amount'),
			'company_id'  => $this->request->getVar('company_id'),
			'detail'  => $this->request->getVar('detail'),
		];
		$model->insert($data);
		$company_id = $this->request->getVar('company_id');
		$session = \Config\Services::session();
		$session->setFlashdata('bill_register', 'The Payment Registerd Successfully');
		return $this->response->redirect(site_url('/company/view/' . $company_id));
	}





	//	echo "<pre>";
	//	print_r($query); 


}
