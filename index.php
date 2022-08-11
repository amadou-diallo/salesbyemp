<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sales Reports</title>
    </head>
    <body>
    	<h1>Sales Reports</h1>
    	<br>
        <p>Select a Sales report to review</p><br>
        <form id='SalesByEmp' action='SalesByEmp.php' method='get'>
			<input type='submit' name='byemp' id='byemo' value='Salesperson Detail' />
		</form>
		<br>

		<form id='SalesTotByEmp' action='SalesTotByEmp.php' method='get'>
			<input type='submit' name='totbyemp' id='totbyemo' value='Salesperson Summary' />
		</form>
</html>
