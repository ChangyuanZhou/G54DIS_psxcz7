<?php

session_start();
header("Content-Type:text/html; charset=utf8");

$con=mysqli_connect("mysql.cs.nott.ac.uk","psxcz7","zcyzcy","psxcz7");
$db_select = mysqli_select_db("Student", $con);
$username = $_SESSION["username"];

// echo $username;
$userID = "SELECT st_ID from Student where st_un = '$username' ";
$duration = "SELECT st_Duration from Student where st_un = '$username' ";
$name = "SELECT st_Name from Student where st_un = '$username' ";
$major = "SELECT st_Major from Student where st_un = '$username' ";
// $sql1 = "select st_Givenname from Student where st_un = '$username' ";
$result1= $con->query($userID);
mysqli_data_seek($result1,1);
$row=mysqli_fetch_row($result1);
$row=$row[0];
$_SESSION["userID"]="$row";

  $result2= $con->query($duration);
  mysqli_data_seek($result2,1);
  $row2=mysqli_fetch_row($result2);
  $row2=$row2[0]; 
  
  $result3= $con->query($name);
  mysqli_data_seek($result3,1);
  $row3=mysqli_fetch_row($result3);
  $row3=$row3[0];
  
  $result4= $con->query($major);
  mysqli_data_seek($result4,1);
  $row4=mysqli_fetch_row($result4);
  $row4=$row4[0];
  
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
  margin: 30px;
  padding: 0px;
  overflow: hidden;
  background-color: rgb(79, 121, 238);
  position: -webkit-sticky; /* Safari */
  position: center;
  top: 0;
  border-radius: 25px; 
}

.container {
  position: relative;
  float:left;
  color: white;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

li {
  float: left;
}


li a {
  display: block;
  color: white;
  text-align: center;
  padding: 21px 25px;
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
    background-image: url('head.jpg');
    background-size: cover; 
    display:block;
    border-radius: 60px;
    -webkit-border-radius:60px;
    -moz-border-radius:60px;
    position: relative;
    left:100% ;
    top:0%; 
}

.column {
  float: left;
  width: 20%;
  padding:20px;
  height:120px;
}

.column2 {
  float: left;
  width:25%;
  padding:80px;
  height:120px;
}
/* Clear floats after the columns */
.row {
  content: "";
  display: table;
  clear: both;
}


/* Style the footer */
.footer1 {
  background-color: #f1f1f1;
  padding: 60px;
 
  text-align: left;
}

.footer2 {
  background-color: #f1f1f1;
  padding: 60px;
 
  text-align: center;
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
<table>
  <td>
 <div>   
<div class="headimage"></div>
</td>
<td>
   <h1 style="position:relative;top:0%;left:80%;font-size:30px;"> <?php echo   $row3; ?></h1>    
   <div style="position:relative;top:0%;left:100%;font-size:20px;"><?php echo   $row4; ?></div> 
</td>
</div>
</table>
<ul>
<li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/homepage.php"  >Home</a></li>
  <li><a href="<?php echo $mymodules;  ?>"  >My Modules</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myassessment.php">My Assessment</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/mysurveys.php">My Surveys</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myprogression.php">My Progression</a></li>
  <li><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myaccount.php">My Account</a></li>
</ul>
</div>


 <!-- <table> <div class="container">
<td> <a href="http://mersey.cs.nott.ac.uk/~psxcz7/mymodules.php">
<img src="modules.png"  style="width:250px;height:200px; position:relative; left:30%;  border-radius: 25px;">
<div style="position:relative; top:30%;left:60%;" >My modules</div></a>

 </td>

<td style="float:left"><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myassessment.php">
<img src="assessment.png"  style="width:250px;height:200px; position:relative; left:34%;  border-radius: 25px;">
<div style="position:relative; top:30%;left:60%;" >My Assessment</div></a></td>

<td style="float:left"><a href="http://mersey.cs.nott.ac.uk/~psxcz7/mysurveys.php">
<img src="survey.png"  style="width:250px;height:200px; position:relative; left:40%; top:0%; border-radius: 25px; ">
<div style="position:relative; top:30%;left:75%;" >My Surveys</div></a></td>

<tr>
<td ><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myprogression.php">
<img src="proegression.png" alt="W3Schools.com" style="width:250px;height:200px; position:relative; left:80%;  border-radius: 25px; "></a></td>

<td><a href="http://mersey.cs.nott.ac.uk/~psxcz7/myaccount.php">
<img src="account.png" alt="W3Schools.com" style="width:250px;height:200px; position:relative; left:45%; top:0%; border-radius: 25px; "></a></td></tr>
</table> -->

<div>
<div class="raw"> 
    <div class="column">
    <div class="container">
      <a href=<?php echo $mymodules;  ?>>  <img src="modules.png"  style="width:250px;height:200px;   border-radius: 25px;">
      <div class="centered">  My modules</div></a></div></div>
 

    <div class="column">
    <div class="container">    
      <a href="http://mersey.cs.nott.ac.uk/~psxcz7/myassessment.php">  <img src="assessment.png"  style="width:250px;height:200px;   border-radius: 25px;">
      <div class="centered">  My Assessment</div></a></div></div>


    <div class="column">
    <div class="container">    
      <a href="http://mersey.cs.nott.ac.uk/~psxcz7/mysurveys.php">  <img src="survey.png"  style="width:250px;height:200px;    border-radius: 25px;">
      <div class="centered">  My Surveys</div></a></div></div>


<div class="raw">
    <div class="column2">
    <div class="container">
      <a href="http://mersey.cs.nott.ac.uk/~psxcz7/myprogression.php">  <img src="progression.png"  style="width:250px;height:200px;   border-radius: 25px;">
      <div class="centered">  My Progression</div></a></div></div>

      <div class="column2">
    <div class="container">    
      <a href="http://mersey.cs.nott.ac.uk/~psxcz7/myassessment.php">  <img src="account.png"  style="width:250px;height:200px;    border-radius: 25px;">
      <div class="centered">  My Account</div></a></div></div>
</div>
</div>



<!-- <div class="footer2">
  <a href="http://www.nottingham.ac.uk/utilities/copyright.aspx" title="Copyright" target="_blank">Copyright</a>
  <a href="http://www.nottingham.ac.uk/utilities/website-terms-of-use.aspx" title="Terms and Conditions" target="_blank">Terms and Conditions</a>
  <a href="http://www.nottingham.ac.uk/utilities/privacy.aspx" title="Privacy and Cookies" target="_blank">Privacy and Cookies</a>
  <a href="http://www.nottingham.ac.uk/utilities/posting-rules.aspx" title="Posting Rules" target="_blank">Posting Rules</a>
  <a href="http://www.nottingham.ac.uk/utilities/accessibility/accessibility.aspx" title="Accessibility" target="_blank">Accessibility</a>
  <a href="http://www.nottingham.ac.uk/utilities/foi.aspx" title="Freedom of Information" target="_blank">Freedom of Information</a>
</div>             -->
</body>
</html>

