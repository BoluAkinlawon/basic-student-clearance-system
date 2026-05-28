<?php include "includes/header.php";?>
<?php
include "config.php";
if(isset($_POST['submit'])){
	
	$id = $_GET['id'];
	echo $id."</br>";
	$query ="DELETE FROM graduates where id ='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		echo "Deleted Successfully"."</br>";
		
	}else{
		echo "error";
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value=""/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" name ="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
					<button><a href="index.php">Back</a></button>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>