<html>
 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> Employee View</h1>
                    </div>
<form action="empdocupload.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Employee Documents Upload</label>
                        <input type="file" name="file" size="50" />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Upload" />
                    </div>
</form>
<?php

 $targetfolder = "testupload/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

 }

 else {

 echo "Problem uploading file";

 }

}

else {

 echo "You may only upload PDFs, JPEGs or GIF files.<br>";

}

?>
</html>