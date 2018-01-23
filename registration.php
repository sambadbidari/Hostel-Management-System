<?php
session_start();

include('includes/config.php');
//connectivity
require('config.php');

//captcha
$num1 = range(9,0);
	$num2 = range(9,0);
	$rnum1 = array_rand($num1);
	$rnum2 = array_rand($num2);
	$n1 = $num1[$rnum1];
	$n2 = $num2[$rnum2];
	$sum = $n1 + $n2;
	$res = $n1." + ".$n2;
if(isset($_POST['submit']))
{
if($_POST['c1']==$_POST['c2'])
{
	$n = $_POST['uname'];
	$pass = $_POST['upass'];
	$p = md5($pass);//encrypt pass
	$em = $_POST['umail'];
	$mob = $_POST['umob'];
	$add = $_POST['address'];
	//$img = $_FILES['file']['name'];
	
//check user if already exists
$q = "SELECT contactno FROM users WHERE contactno='$mob'";
$cq = mysqli_query($con,$q);
$ret = mysqli_num_rows($cq);
if($ret == true)
{
	echo"<script>alert('User with same Mobile no. already exists');</script>";
}
//insert into database
else
{
	$query = "insert into users (uname,upassword,email_id,contactno,districts) values(?,?,?,?,?)";
	$query1 = $mysqli->prepare($query);
	$query1->bind_param('sssis',$n,$p,$em,$mob,$add);
	$query1-> execute();	
	
	//mkdir("images/".$_POST['umail']);
	//move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_POST['umail']."/".$_FILES['file']['name']);
	echo"<script>alert('Student Succssfully register');</script>";
}
}
else
{
	echo '<script>alert("Wrong Verification Code, try again!")</script>';
}
}

//display details
if(isset($_POST['display']))
{
	$que = mysqli_query($con,"select * from users");
	
	echo "<div align='center'>";
	echo "<table border='1' bgcolor='#B2B8FF' width='500px'>";
	echo "<tr><th>User ID</th><th>UserName</th><th>Password<br>(Encrypted)</th><th>Email</th><th>Gender</th><th>Mobile No.</th><th>Image</th><th>Option</th></tr>";
	
	while($row= mysqli_fetch_array($que))
	{
	echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['uname']."</td>";
	echo "<td>".$row['upassword']."</td>";
	echo "<td>".$row['email_id']."</td>";
	echo "<td>".$row['contactno']."</td>";
	
	$e=$row['email'];
	$img=$row['image'];
	
	echo "<td><img src='images/$e/$img' width='70' height='70'/></td>";
	
	echo "<td><a href='edit.php'>Edit</a>&nbsp;&nbsp;
		<a href='delete.php?email=$e'>Delete</a>
	</td>";
	echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Student Hostel Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/regsidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					<br>
						<h2 class="page-title">Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
	

<div class="form-group">
<label class="col-sm-2 control-label">UserName : </label>
<div class="col-sm-8">
<input type="text" name="uname" id="uname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password : </label>
<div class="col-sm-8">
<input type="password" name="upass" id="upass"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email : </label>
<div class="col-sm-8">
<input type="email" name="umail" id="umail"  class="form-control" required="required">
</div>
</div>	




<div class="form-group">
<label class="col-sm-2 control-label">Contact&nbsp;No.: </label>
<div class="col-sm-8">
<input type="text" name="umob" id="umob"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">Address : </label>
<div class="col-sm-8">
<textarea name="address" id="address"  class="form-control" required="required"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Verification : </label>
<div class="col-sm-8">
	
<input type="hidden" name="c1" value="<?php echo $sum; ?>">
<input class="form-control" type="text" name="c2" autofocus placeholder="<?php
error_reporting(1);
echo $res." = ";
?>">
</div>
</div>	



<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="submit" Value="Register" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>


</html>