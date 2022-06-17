<html>
<head>
	<title>Add Employees</title>
</head>

<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>EmpId</td>
				<td><input type="text" name="EmpId"></td>
			</tr>
			<tr>
				<td>EmpName</td>
				<td><input type="text" name="EmpName"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Designation</td>
				<td><input type="text" name="Designation"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php

	// Check If form submitted, insert form data into employee table.
	if(isset($_POST['Submit'])) {
		$EmpId = $_POST['EmpId'];
		$EmpName = $_POST['EmpName'];
		$email = $_POST['email'];
		$Designation = $_POST['Designation'];

		// include database connection file
		include_once("config.php");

		// Insert employee data into table
		$result = mysqli_query($mysqli, "INSERT INTO employee(EmpId,EmpName,email,Designation) VALUES('$EmpId','$EmpName','$email','$Designation')");

		// Show message when employee added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>