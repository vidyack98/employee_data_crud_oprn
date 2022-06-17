<?php
// Create database connection using config file
include_once("config.php");

// Fetch all employee data from database
$result = mysqli_query($mysqli, "SELECT * FROM employee ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Add New Employee</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Name</th> <th>Mobile</th> <th>Email</th> <th>Update</th>
    </tr>
    <?php
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$user_data['EmpId']."</td>";
        echo "<td>".$user_data['EmpName']."</td>";
        echo "<td>".$user_data['email']."</td>";
        echo "<td>".$user_data['Designation']."</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>