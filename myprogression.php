<?php


session_start();
header("Content-Type:text/html; charset=utf8");

$con=mysqli_connect("mysql.cs.nott.ac.uk","psxcz7","zcyzcy","psxcz7");
$db_select = mysqli_select_db("Student", $con);
$username = $_SESSION["username"];
$sql1 = "select st_Givenname from Student where st_un = '$username' ";
$result1= $con->query($sql1);
$duration = "SELECT st_Duration from Student where st_un = '$username' ";
$result2= $con->query($duration);
  mysqli_data_seek($result2,1);
  $row2=mysqli_fetch_row($result2);
  $row2=$row2[0]; 
  if ($row2==1){
    $mymodules="http://mersey.cs.nott.ac.uk/~psxcz7/mymodules.php";
}
if ($row2==2){
    $mymodules="http://mersey.cs.nott.ac.uk/~psxcz7/mymodules2.php";
}
?>



<html>
<head>
<style>


body {
  font-size:22px;
}


p {
  font-size:30px;
  color:rgb(109,121,231)

}

p p{
  float:left;
  font-size:30px;
  color:rgb(109,121,231)
}


ul {
  list-style-type: none;
  margin: 50px;
  padding: 0px;
  overflow: hidden;
  background-color: rgb(79, 121, 238);
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  border-radius: 25px; 
}

li {
  float: left;
}


li a {
  display: block;
  color: white;
  text-align: center;
  padding: 22px 10px;
  text-decoration: none;
}

li a:hover {
  background-color: rgb(6, 0, 65);
}

.active {
  background-color: #4CAF50;
}




.headimage{
    width:120px;
    height:120px;
    margin: 0px;
    background-image: url('peggy.jpg');
    background-size: cover; 
    display:block;
    border-radius: 60px;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    position: relative;
    left:10% ;
    top:3%; 
}


</style>
</head>
<body>
  <table><tr>
  <td><a href="http://www.nottingham.ac.uk">
        <img src="logo.png" style="width:253px;height:94px;border:0;">
      </a></td>

    <a herf="http://www.nottingham.ac.uk">
        <img src="user.jpg" style=" width:50px; height:50px; border:0; position:absolute;top:5%;left:72%;">
      </a>
    <td>  
        <p style="position:absolute;top:3%;left:76%;"> <?php   echo $_SESSION["username"]?>   </p>
    </td>
    <td>  
          <a href="http://mersey.cs.nott.ac.uk/~psxcz7/">
         <p style="position:absolute;top:3%;left:85%;color:red;"> Log out   </p>
    </td>
   </tr></table>   

<hr>
<!-- <div class="headimage"></div>     -->







<ul>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/homepage.php">Home</a></li>
  <li><a href="<?php echo $mymodules;  ?>"  >My Modules</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myassessment.php">My Assessment</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/mysurveys.php">My Surveys</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myprogression.php">My Progression</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myaccount.php">My Account</a></li>
</ul>
<div>

<hr>

<h5 style="text-align:center"> Copyright©</h5>
                


</body>
</html>

