<?php
session_start();
include('includes/config.php');

if($_POST['submit'])
{
    $username = $_POST['username'];
    $roomno = $_POST['room'];
    $problems = $_POST['problems'];
    
    $enquiry = "insert into enquiry(username,room_no,problems) values (?,?,?)";
    $enquiry1 = $mysqli -> prepare($enquiry);
    $enquiry1->bind_param('sis',$username,$roomno,$problems);
    $enquiry1->execute();
    
    echo"<script>alert('Problems Submitted');</script>";
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
	<title>Enquiry</title>
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
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					<br>
						<h2 class="page-title">Enquiry </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill your Problems</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
	

<div class="form-group">
<label class="col-sm-2 control-label">UserName : </label>
<div class="col-sm-8">
<input type="text" name="username" id="username"  class="form-control" value="<?php echo $_SESSION['user'] ?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Room&nbsp;No. : </label>
<div class="col-sm-8">
<select name="room" " id="room" class="form-control"  onChange="getSeater(this.value);"  required> 
<option value="">Select Room</option>
<?php $query ="SELECT * FROM rooms";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->room_no;?>"> <?php echo $row->room_no;?></option>
<?php } ?>
</select> 
</div>
</div>
	

<div class="form-group">
<label class="col-sm-2 control-label">Problems : </label>
<div class="col-sm-8">
<textarea type="text" style="height:150px"class="form-control" id="problems" name="problems" placeholder="Problems"></textarea>
</div>
</div>


<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="submit" Value="Submit" class="btn btn-primary">
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


