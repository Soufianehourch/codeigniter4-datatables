<?php

namespace App\Controllers;

use App\Libraries\DataTable;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		return view('home');
	}

	public function getCustomers()
	{
		$dataTable = new DataTable();
		$response = $dataTable->process('CustomerModel', [
			[
				'name' => 'first_name'
			],
			[
				'name' => 'last_name'
			],
			[
				'name' => 'email'
			],
			[
				'name' => 'active',
				'formatter' => 'set_status'
			],
			[
				'name' => 'customer_id',
				'formatter' => 'action_links'
			]
		]);
		
		return $this->setResponseFormat('json')->respond($response);
	}
}
