<?php 
session_start();
$aid=$_SESSION['id'];
require_once("includes/config.php");
if(!empty($_POST["room_no"])) 
{
$room_no=$_POST["room_no"];
$result ="SELECT count(*) FROM userregistration WHERE room_no=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('i',$room_no);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
echo "<span style='color:red'>$count. Seats already full.</span>";
else
	echo "<span style='color:red'>All Seats are Available</span>";
}

if(!empty($_POST["oldpassword"])) 
{
    $p =$_POST["oldpassword"];
$pass=md5($p);
$result ="SELECT password FROM admin WHERE password=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$pass);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$opass=$result;
if($opass==$pass) 
echo "<span style='color:green'> Password  matched .</span>";
else echo "<span style='color:red'> Password Not matched</span>";
}
?>
