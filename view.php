<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employee Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM employee WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $EmpId   = $user["EmpId"];
            $EmpName    = $user["EmpName"];
            $email       = $user["email"];
            $Designation = $user["Designation"];
        } else {
            header("location: index.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: index.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> Employee View</h1>
                    </div>
                    <div class="form-group">
                        <label>Employee Id</label>
                        <p class="form-control-static"><?php echo $EmpId ?></p>
                    </div>
                    <div class="form-group">
                        <label>Employee Name</label>
                        <p class="form-control-static"><?php echo $EmpName ?></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $email ?></p>
                    </div>
                    <div class="form-group">
                        <label>Designation</label>
                        <p class="form-control-static"><?php echo $Designation ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>