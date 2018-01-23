<?php
session_start();
include('config.php');
include('admin/includes/config.php');

if(isset($_POST['login']))
{
	$radio_value = $_POST["value"];
//user check
if($radio_value == 'user')
{
	$u = $_POST['uname'];
	$pass = $_POST['upass'];
	$p = md5($pass);
	$_SESSION['user']=$u;
	$_SESSION['pass']=$p;
	$q = "SELECT * FROM users WHERE uname='$u' AND upassword='$p'";
	$cq = mysqli_query($con,$q);
	$ret = mysqli_num_rows($cq);
}
else{
	$u = $_POST['uname'];
	$pass = $_POST['upass'];
	if ($u == 'hostel' AND $pass == 'hostel'){
		echo "<script>document.location='admin/index.php'</script>";
	}

}

if($ret == true)
{
	$getemailid = "select email_id  from users where uname='$u'";
	$geteid = mysqli_query($con,$getemailid);
	while ($row=mysqli_fetch_array($geteid)){
	$eid= $row['email_id'];
}
	
	$access = "insert into userlog(uname,email_id) values (?,?)";
	$access1 = $mysqli->prepare($access);
	$access1->bind_param('ss',$u,$eid);
	$access1-> execute();
	
	echo "<script>document.location='profile.php'</script>";
	//echo "<center><h2 style='color:green'>ACCESS GRANTED</h2></center>";
}
else
{
	echo"<script>alert('ACCESS DENIED');</script>";
}
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
	<title>Login</title>
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
						<h2 class="page-title">Login </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill the criteria</div>
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
<label class="col-sm-2 control-label">Login As : </label>
<div class="col-sm-8">
<label><input type="radio" name="value" value="admin" id="admin" checked="checked" >Admin</label>
<label><input type="radio" name="value" value="user" id="user" >User</label>
</div>
</div>	





<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="login" Value="Login" class="btn btn-primary">
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