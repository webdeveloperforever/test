<html>
  <head>
  </head>
  <body>
  <table width="600" border="1" cellpadding="1" cellspacing="1">
  <th>RollNo</th>
  <th>Name</th>
  <th>Tutionfee</th>
  <th>Universityfee</th>
  <th>Total</th>
  <?php
$rollno=$_POST['rollno'];
$year=$_POST['year'];
$semester=$_POST['semester'];
if($rollno && $year && $semester)
{
error_reporting(0);
$conn = mysqli_connect('localhost','root','','project');
if($conn-> connect_error)
{
  die("connection failed  ".$conn-> connect_error);
}
$query="select count(id) as total from details where Rollno='$rollno'";
$result=mysqli_query($conn,$query);
$rows=mysqli_fetch_assoc($result);
$num_rows=$rows['total'];
if($num_rows!==0)
{
$sql1="select * from payment_details where Rollno='$rollno'";
$result1=mysqli_query($conn,$sql1);
if(isset($_POST['submit'])){
    while($rows1=mysqli_fetch_array($result1))
    {
    $dbrollno=$rows1['Rollno'];
  $dbyear=$rows1['Year'];
  $dbsemester=$rows1['Semester'];
  $name=$rows1['Name'];
  $tutionfee=$rows1['Tutionfee'];
  $universityfee=$rows1['Universityfee'];
  $total=$rows1['Total'];
      echo "<tr>";
      echo "<td><strong>".$dbrollno."</strong></td>";
      echo "<td>".$name."</td>";
      echo "<td><strong><u>".$tutionfee."</u></strong></td>";
      echo "<td><strong><u>".$universityfee."</u></strong></td>";
      echo "<td><strong>".$total."</strong></td>";
      echo "</tr>";
    }
    }
    echo "<br><a href=http://bit.ly/3bGMGt>CLICK HERE TO PAY THE FEES</a>";
}
else{
  die ("that roll no doesnot exist");
}
}
else{
 echo "please enter all the details";
}
?>
     </table>
    </body>
</html>