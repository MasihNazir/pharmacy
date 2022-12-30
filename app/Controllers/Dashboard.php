<?php

namespace App\Controllers;

use App\Models\invoicejoin;

class Dashboard extends BaseController
{

	public function index()
	{
		$invoice = new invoicejoin();
		$totalcridet = $invoice->getSumCridit();
		$totalInvoice = $invoice->getSumInvoice();
		$sumCompanyCreditMonth = $invoice->sumCompanyCreditMonth(); 
		$sumInvoiceMonthly = $invoice->sumInvoiceMonthly(); 
		$total = $invoice->getCompanySum();
		$medTotal = $invoice->getMedSum();
		$data = [
			'totalcompany' => $total,
			'totalcridet' =>$totalcridet,
			'totalInvoice' =>$totalInvoice,
			'medTotal'=> $medTotal,
			'sumCompanyCreditMonth'=> $sumCompanyCreditMonth,
			'sumInvoiceMonthly' =>$sumInvoiceMonthly,
		];

		echo view('template/header');
		echo view('dashboard', $data);
		echo view('template/footer');
	}

	//--------------------------------------------------------------------

}
