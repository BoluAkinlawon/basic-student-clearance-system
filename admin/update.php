<?php
//include "includes/header.php";
include "config.php";
$id =$_GET['id'];
echo $id."</br>";
if(isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	
	$query ="UPDATE graduates SET firstname ='$firstname', lastname ='$lastname', username ='$username', email ='$email', matric ='$matric' where id ='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		echo"Update Done";
		
	}else{
		echo"Sorry there was an error";
	}
	
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
		body{
		font-family: Candara;
		}
    </style>
</head>
<center>
<body>
    
                    <p>Please edit the input values and submit to update the record.</p>
					<center>
                    <fieldset style ="background:gray; height:; width:30%; border-radius:15px;">
    <form action = "" method ="post">
	<label for "firstname"></label><br>
	<input name ="firstname" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Firstname"></input><br>
	
	<label for "lastname"></label><br>
	<input name ="lastname" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Lastname"></input><br>
	
	<label for "username"></label><br>
	<input name ="username" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Username"></input><br>
	
	<label for "email"></label><br>
	<input name ="email" type ="email" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Email"></input><br>
	
	<label for "matric"></label><br>
	<input name ="matric" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Matric Number"></input><br>
	
	
	<br>
	<button name = "submit">Submit</button>
	<button><a href ="data.php">Cancel</a></button>
	</form>
	</fieldset>
	<button><a href="data.php">Back</a></button>
					</center>
                
</body>
</center>
</html>
<?php //include "includes/footer.php";?>