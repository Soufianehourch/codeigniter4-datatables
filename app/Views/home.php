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