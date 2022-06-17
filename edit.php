<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for employee update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$EmpId=$_POST['EmpId'];
	$EmpName=$_POST['EmpName'];
	$email=$_POST['email'];
        $Designation=$_POST['Designation'];

	// update user data
	$result = mysqli_query($mysqli, "UPDATE employee SET EmpId='$EmpId',EmpName='$EmpName',email='$email',Designation='$Designation' WHERE id=$id");

	// Redirect to homepage to display updated employee in list
	header("Location: index.php");
}
?>
<?php
// Display selected employee data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech employee data based on id
$result = mysqli_query($mysqli, "SELECT * FROM employee WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$EmpId = $user_data['EmpId'];
        $EmpName = $user_data['EmpName'];
	$email = $user_data['email'];
	$Designation = $user_data['Designation'];
}
?>
<html>
<head>
	<title>Edit Employee Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="update_user" method="post" action="edit.php">
		<table border="0">
                        <tr>
				<td>EmpId</td>
				<td><input type="text" name="EmpId" value=<?php echo $EmpId;?>></td>
			</tr>
			<tr>
				<td>EmpName</td>
				<td><input type="text" name="EmpName" value=<?php echo $EmpName;?>></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr>
				<td>Designation</td>
				<td><input type="text" name="Designation" value=<?php echo $Designation;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>