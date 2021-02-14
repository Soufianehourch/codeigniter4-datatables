# DataTables server-side processing for CodeIgniter4.
## What is it?
A CodeIgniter4 library for building a Datatables server side processing SQL query.

**Links**

[CodeIgniter](https://codeigniter.com/)

[jQuery](https://jquery.com/)

[DataTables](https://datatables.net/)
## Requirements
- PHP Version 7.3 or newer
- MySQL 5.1+
- CodeIgniter 4.1.1+
- jQuery 3.5.1+
- Datatables 1.10.23+
## Installation
Copy the following two files to your application: **app/Helpers/formatter_helper.php** & **app/Libraries/DataTable.php**
## Sample usage
The following sample uses sakila dump downloaded from (https://dev.mysql.com/doc/index-other.html). You can also clone this repository and run it on your local machine to see an end to end working example.
### Model
```
<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
}
```
### View
```
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	<title>CodeIgniter4 DataTables</title>
</head>
<body>
	<table id="myTable" class="display">
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email address</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
	</table>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#myTable').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: 'http://localhost:8080/home/getcustomers'
			});
		} );
	</script>
</body>
</html>
```
### Controller
```
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
```
### Output
![Sample](/public/assets/images/sample.PNG)
## Notes
* Only zero-based column labelling is currently supported: 0 -> first column, 1 -> second column, etc.
* Data processors / formatters must be defined in formatter helper file. Example functions have been defined.