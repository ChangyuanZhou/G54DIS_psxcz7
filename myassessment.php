<html>
<head>
  <title> My Assessment </title>


<?php
session_start();
$userID = $_SESSION["userID"];
header("Content-Type:text/html; charset=utf8");
$con=mysqli_connect("mysql.cs.nott.ac.uk","psxcz7","zcyzcy","psxcz7");
$db_select = mysqli_select_db("Student", $con);
$username = $_SESSION["username"];
$userDuration=$_SESSION["userDuration"];
$duration = "SELECT st_Duration from Student where st_un = '$username' ";
$result3= $con->query($duration);
  mysqli_data_seek($result3,1);
  $row3=mysqli_fetch_row($result3);
  $row3=$row3[0]; 
  if ($row3==1){
    $mymodules="http://mersey.cs.nott.ac.uk/~psxcz7/mymodules.php";
}
if ($row3==2){
    $mymodules="http://mersey.cs.nott.ac.uk/~psxcz7/mymodules2.php";
}
?>



<style>


#Modules {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  text-align: center;
  width: 80%;
  position:center;
}

#Modules td, #Modules th {
  border: 1px solid #ddd;
  padding: 8px;
}

#Modules tr:nth-child(even){background-color: #f2f2f2;}

#Modules tr:hover {background-color: #ddd;}

#Modules th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}

#Modules th  {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}

p {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}

body {
font-size:22px;
}


p {
font-size:30px;
color:rgb(109,121,231)

}

/* p p{
float:left;

color:rgb(109,121,231)
} */


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
  padding: 22px 14px;
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
         <p style="position:absolute;top:3%;left:85%;color:red;font-size=25px;"> Log out   </p>
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

<h2> Released marks</h2>
<table id="Modules" >
  <tr>
    <th>Semester</th>
    <th>Module ID</th>
    <th>Title</th>
    <th>Credits</th>
    <th>Assessment</th>
    <th>Mark</th>
  </tr>

<?php
session_start();
header("Content-Type:text/html; charset=utf8");

$con=mysqli_connect("mysql.cs.nott.ac.uk","psxcz7","zcyzcy","psxcz7");
$db_select = mysqli_select_db("Student", $con);
$username = $_SESSION["username"];
$sql1= "SELECT m_Semester, m_ID, m_Title, m_Credit, m_Assessment, mark from Module, Enrolment, Student where Enrolment.sid=Student.st_ID and Enrolment.mids=Module.m_ID and Student.st_ID ='".$_SESSION["userID"]."' and Enrolment.year=1 and Enrolment.mark !=0  ORDER BY m_Semester";
$result1 = $con->query($sql1);
$credit = 0;
$score = 0;
$count = 0;
while ($row1 = $result1->fetch_assoc())
{
$sql2 = "SELECT l_Name from Module, Taught, Lecturer where Module.m_ID = Taught.midt and Lecturer.l_ID = Taught.lid and Taught.midt = '".$row1['m_ID']."'";
// echo $sql2;

$result2 = $con->query($sql2);
  $names = "";
  $credit = $credit +  $row1['m_Credit'];
  $score = $score + $row1['mark'];
  $count += 1;
  // while ($row2 = $result2->fetch_assoc()){
  //   $count += 1;
  //       if ($count < $result2->num_rows){
  //           $names .= ($row2['l_Name'].", ");
  //       }
  //       else{
  //       $names .= ($row2['l_Name']);
  //       }
  
  // }
echo "<tr>";
      echo "<td>". $row1["m_Semester"]."</td>";
      echo "<td>". $row1["m_ID"]."</td>";
      echo "<td>". $row1["m_Title"]."</td>";
      echo "<td>". $row1["m_Credit"]."</td>";
      echo "<td>". $row1["m_Assessment"]."</td>";
      echo "<td>". $row1["mark"]."</td>";
echo "</tr>";
  
}
$score = $score / $count;

echo "<table>";




// $sql= "SELECT st_ID, st_un, st_Major from Student where st_un = '$username' ";

//  $result = $con->query($sql1);

// if ($result->num_rows>0){
//   while ($row = $result->fetch_assoc()){
//     echo "<tr><td>". $row["m_Semester"] ."</td><td>". $row["m_ID"] ."</td><td>". $row["m_Title"]."</td><td>".$row["m_Credit"] ."</td></tr>";
//   }
//   echo "</table>";
// }
// else {
//   echo "0 result";
// }





$con-> close();
?>
<div> 
  <p style="Font-size:20px; position:center;"> You have gained <?php echo $credit ?> credits, with the average mark of <?php echo round($score,2)?> .
  </p>
</div>
</table>













<hr>

<h5 style="text-align:center"> Copyright©</h5>
                      


</body>
</html>

