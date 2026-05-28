<?php include "includes/header.php";?>
<html>
<center>


<?php
$connection =mysqli_connect("localhost","root","");
$db =mysqli_select_db($connection, "graduate");

session_start();
if(!isset($_SESSION['matric'])){
	echo"You are not logged in to see content";
	header("location:login.php");
}else{
	
}



?>
<hr>
<div style ="height:42px; width:100%;">
<form action ="" method ="post" align ="right">
<button type ="submit" name ="logout" value ="logout"  style ="margin:5px;">Log Out</button>
</form>
</div>
<?php
if(isset($_POST['logout'])){
	session_destroy();
	header("location:login.php");
}
 echo "<p style ='margin:5px;' align =right>"."<a href =''  style ='background:white;'>Change password</a>"."</br>";
 //echo "<p style ='margin:5px;' align =right>".$_SESSION['phone']."</br>";

?>

<?php
$connection =mysqli_connect("localhost","root","");
$db =mysqli_select_db($connection, "graduate");
if(isset($_POST['submit'])){
	$post =$_POST['post'];
	$title =$_POST['title'];
    $category =$_POST['category'];	
	$session =$_SESSION['matric'];
	$query ="INSERT INTO post(title, category, post, matric) VALUES ('$title', '$category', '$post', '$session')";
	$query_run =mysqli_query($connection, $query);
	
		
}
?>
<html>
<fieldset style ="width:200px; height:auto;">
Create a post
<form action ="" method ="post">
Title<input name ="title" style="width: 250px; height: 30px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;"></input>
 Category<select name="category">
  <option value ="">--------------</option>
 <option value ="Education">Education</option>
 <option value =""></option>
  </select>
  <br>
  <br>
<textarea  name ="post" style="width: 250px; height: 200px; text=border: 1px solid brown; border-radius: 05px; padding: 20px 15px 20px 15px; margin: 10px 0px 15 px 0px;" required></textarea>
<input type ="submit" name ="submit"></input>
</form>
</fieldset>
</html>
<center>
<div style ="height:auto; width:65%; background:lightblue;" align ="left">
<?php
$connection =mysqli_connect("localhost","root","");
$db =mysqli_select_db($connection, "graduate");

$query2 ="SELECT DISTINCT date_time, post, matric from post where id is not null";
$query_run2 = $connection -> query($query2);

  if($query_run2 -> num_rows > 0){
      while($row = $query_run2 -> fetch_assoc()){
      echo "<p style ='color:black; margin:15px;'>".$row["matric"].": ".$row["post"]." ".$row["date_time"]."</br>";
	
	 
      }
        
  }
  else {
      echo "No messages yet";
  }

  $connection -> close();
?>
<div style ="background:white; height:5px; width:100%;">
</div

</div>
</center>
</html>

<?php include "includes/footer.php";?>