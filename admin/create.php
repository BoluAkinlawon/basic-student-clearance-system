<?php include "includes/header.php";?>
<?php
// Include config file

  
  

?>


<?php 
include "config.php";
if(isset($_POST['submit'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	$password = $_POST['username'];
	
	$query = "INSERT INTO graduates(firstname, lastname, username, email, department, password) VALUES('$firstname', '$lastname', '$username', 'email', 'department','$password')";
	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		echo"Success";
		
	}else{
		echo"Sorry there was an error";
	}
	
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{
			font-family:verdana;
			button{
				text-decoration:none;
			}
		}
    </style>
</head>
<center>
<body style ="height:auto; width:100%;">
   
                        <h5>Create new Graduate Record</h5>
						<br><br><br>
                    </div>
					<br><br><br>
					<center>
                    <p>Please fill this form and submit to add graduate record to the database.</p>
					
                    <fieldset style ="background:gray; height:; width:30%; border-radius:15px;">
    <form action = "" method ="post">
	<label for "firstname"></label><br>
	<input name ="firstname" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Firstname" required></input><br>
	
	<label for "lastname"></label><br>
	<input name ="lastname" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Lastname" required></input><br>
	
	<label for "username"></label><br>
	<input name ="username" type ="text" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Username" required></input><br>
	
	<label for "email"></label><br>
	<input name ="email" type ="email" style ="height:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Email" required></input><br>
	
	<label for "department"></label><br>
	<input name ="department" type ="text" style ="hheight:30px; width:190px; border-radius:5px;  text-border:1px solid brown;" placeholder ="Department" required></input><br>
	
	
	<br>
	<button name = "submit">Submit</button>
	<button><a href ="data.php">Cancel</a></button>
	</form>
	<button><a href ="data.php">Back</a></button>
	</fieldset>
	</center>
	
<div style ="height:200px; width:100%; background:gray;"></div>
               
</body>
</center>
</html>
<?php include "includes/footer.php";?>