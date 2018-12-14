<?php

$con=mysqli_connect("mysql.cs.nott.ac.uk","psxcz7","zcyzcy","psxcz7");
$db_select = mysqli_select_db("Student", $con);

session_start();
$username=$_POST['Username'];
$password = hash('sha256', $_POST['Password']);
$_SESSION['username'] = "$username";
$sql = "select * from Password where username = '$username' and password = '$password'";
$result= $con->query($sql); 

if ($result->num_rows > 0) {
     header('Location: http://mersey.cs.nott.ac.uk/~psxcz7/homepage.php');
     $username=$_POST['Username'];
     
}
else{
     header('Location: http://mersey.cs.nott.ac.uk/~psxcz7/loginfail.html');   
}

   



?>


