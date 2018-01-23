<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if($_POST['submit'])
{
$roomno=$_POST['room'];
$seater=$_POST['seater'];
$feespm=$_POST['fpm'];
$foodstatus=$_POST['foodstatus'];
$stayfrom=$_POST['stayf'];
$duration=$_POST['duration'];
$course=$_POST['course'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$emcntno=$_POST['econtact'];
$gurname=$_POST['gname'];
$gurrelation=$_POST['grelation'];
$gurcntno=$_POST['gcontact'];
$caddress=$_POST['address'];
$ccity=$_POST['city'];
$cstate=$_POST['state'];
$cpincode=$_POST['pincode'];
$paddress=$_POST['paddress'];
$pcity=$_POST['pcity'];
$pstate=$_POST['pstate'];
$ppincode=$_POST['ppincode'];


$namequery = "insert into name (firstName,middleName,lastName) values(?,?,?)";
$namequery1 = $mysqli->prepare($namequery);
$namequery1->bind_param('sss',$fname,$mname,$lname);
$namequery1-> execute();

$guardianquery = "insert into guardian (guardianName,guardianRelation,guardianContact,egycontactno) values(?,?,?,?)";
$guardianquery1 = $mysqli->prepare($guardianquery);
$guardianquery1->bind_param('ssii',$gurname,$gurrelation,$gurcntno,$emcntno);
$guardianquery1-> execute();

$studentquery = "insert into student_info(regno,gender, email_id, egycontactno) values (?,?,?,?)";
$studentquery1 = $mysqli->prepare($studentquery);
$studentquery1->bind_param('issi',$regno,$gender,$emailid,$emcntno);
$studentquery1-> execute();

$addressquery = "insert into address (corresCity, corresZone,pmntCity, pmntZone) values(?,?,?,?)";
$addressquery1 = $mysqli->prepare($addressquery);
$addressquery1->bind_param('ssss',$ccity,$cstate,$pcity,$pstate);
$addressquery1-> execute();

$feesquery = "insert into fees(feespm,stayfrom) values (?,?)";
$feesquery1 = $mysqli->prepare($feesquery);
$feesquery1->bind_param('is',$feespm,$stayfrom);
$feesquery1-> execute();

$query1="insert into  userregistration(regno,firstName,middleName,lastName,room_no,seater,contactno,stayfrom) values(?,?,?,?,?,?,?,?)";
$stmt1= $mysqli->prepare($query1);
$stmt1->bind_param('isssiiis',$regno,$fname,$mname,$lname,$roomno,$seater,$contactno,$stayfrom);
$stmt1->execute();

$getdepartmentid = "select department_id  from department where (dname='$course')";
$getdepartmentidquery = mysqli_query($con,$getdepartmentid);
while ($row=mysqli_fetch_array($getdepartmentidquery)){
	$did= $row['department_id'];
}

$getguardianid = "select guardian_id  from guardian where (guardianName='$gurname' AND guardianRelation='$gurrelation' AND guardianContact='$gurcntno' AND egycontactno='$emcntno')";
$getguardianidquery = mysqli_query($con,$getguardianid);
while ($row=mysqli_fetch_array($getguardianidquery)){
	$gid= $row['guardian_id'];
}



$getaddressid = "select address_id  from address where (corresCity='$ccity' AND corresZone='$cstate' AND pmntCity='$pcity' AND pmntZone='$pstate')";
$getaddressidquery = mysqli_query($con,$getaddressid);
while ($row=mysqli_fetch_array($getaddressidquery)){
	$addid= $row['address_id'];
}

$getnameid = "select name_id  from name where (firstName='$fname' AND middleName='$mname' AND lastName='$lname')";
$getnameidquery = mysqli_query($con,$getnameid);
while ($row=mysqli_fetch_array($getnameidquery)){
	$nid= $row['name_id'];
}

$getfeesid = "select fee_id  from fees where stayfrom='$stayfrom'";
$getfeesidquery = mysqli_query($con,$getfeesid);
while ($row=mysqli_fetch_array($getfeesidquery)){
	$fid= $row['fee_id'];
}

echo"<script>alert('Student Succssfully register');</script>";

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
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

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
						<h2 class="page-title">Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											
										
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Room no. </label>
<div class="col-sm-8">
<select name="room" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
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
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">Seater</label>
<div class="col-sm-8">
<input type="text" name="seater" id="seater"  class="form-control" readonly >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Fees Per Month</label>
<div class="col-sm-8">
<input type="text" name="fpm" id="fpm"  class="form-control" readonly>
</div>
</div>

	

<div class="form-group">
<label class="col-sm-2 control-label">Stay From</label>
<div class="col-sm-8">
<input type="date"  name="stayf" id="stayf"  class="form-control"  >
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Personal info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Department </label>
<div class="col-sm-8">
<select name="course" id="course" class="form-control" required> 
<option value="">Select Department</option>
<?php $query ="SELECT * FROM department";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->dname;?>"><?php echo $row->dname;?>&nbsp;&nbsp;(<?php echo $row->block;?>)</option>
<?php } ?>
</select> </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Registration No : </label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" required="required" >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Middle Name : </label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<select name="gender" class="form-control" required="required">
<option value="">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id : </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Emergency Contact: </label>
<div class="col-sm-8">
<input type="text" name="econtact" id="econtact"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guardian  Name : </label>
<div class="col-sm-8">
<input type="text" name="gname" id="gname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guardian  Relation : </label>
<div class="col-sm-8">
<input type="text" name="grelation" id="grelation"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guardian Contact no : </label>
<div class="col-sm-8">
<input type="text" name="gcontact" id="gcontact"  class="form-control" required="required">
</div>
</div>	

<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">Correspondense Address </h4> </label>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">City : </label>
<div class="col-sm-8">
<textarea name="city" id="city"  class="form-control" required="required"></textarea>
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">Zone </label>
<div class="col-sm-8">
<select name="state" id="state"class="form-control" required> 
<option value="">Select Zone</option>
<?php $query ="SELECT * FROM zone";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->zones;?>"><?php echo $row->zones;?></option>
<?php } ?>
</select> </div>
</div>							

	

<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">Permanent Address </h4> </label>
</div>


<div class="form-group">
<label class="col-sm-5 control-label">Permanent Address same as Correspondense address : </label>
<div class="col-sm-4">
<input type="checkbox" name="adcheck" value="1"/>
</div>
</div>




<div class="form-group">
<label class="col-sm-2 control-label">City : </label>
<div class="col-sm-8">
<textarea name="pcity" id="pcity"  class="form-control" required="required"></textarea>
</div>
</div>	

<div class="form-group">
<label class="col-sm-2 control-label">Zone </label>
<div class="col-sm-8">
<select name="pstate" id="pstate"class="form-control" required> 
<option value="">Select Zone</option>
<?php $query ="SELECT * FROM zone";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->zones;?>"><?php echo $row->zones;?></option>
<?php } ?>
</select> </div>
</div>							



<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
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
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'room_no='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</html>