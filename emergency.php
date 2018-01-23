<?php
session_start();
//connectivity
require('config.php');

/*if($_SESSION['user']=="")
{
	header('location:index.php');
}*/

?>
<html>
<head>
<title>Kathmandu University</title>
<link rel="stylesheet" href="admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="admin/css/bootstrap-social.css">
	<link rel="stylesheet" href="admin/css/bootstrap-select.css">
	<link rel="stylesheet" href="admin/css/fileinput.min.css">
	<link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="admin/css/style.css">
<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
	<style type="text/css">.slideshow a#vlb{display:none}</style>
	<script type="text/javascript" src="engine/js/mootools.js"></script>
	<script type="text/javascript" src="engine/js/visualslideshow.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
    
    <style type="text/css" media="screen">
#horizontalmenu ul 
{
padding:1; margin:1; list-style:none;
}
#horizontalmenu li
{
float:left;
 position:relative;
 padding-right:89;
 display:block;
border:0px solid #CC55FF; 
border-style:inset;
margin-left:20px;
}
#horizontalmenu li ul
 {
display:none;
position:absolute;
}
#horizontalmenu li:hover ul{
    display:block;
    background:#C4C4C4;
height:auto; width:8em; 
}
#horizontalmenu li ul li
{
    clear:both;
border-style:none;}
</style>	
</head>
<table width="1050px" align="center"  border="1">
  <tbody>
    <tr>
      <th height="39" colspan="2" style="background-color:#4E4E4E"><div style="text-align:left;color:#FFFFFF"><b><font size="+3"><a href="index.php" style="text-decoration:none ; color:#FFFFFF">Kathmandu University</a></font></b><marquee direction="left" height="100%">
			Admission opens in new session.</marquee></div></th>
    </tr>
    <tr>
      <th height="317" colspan="2">
      <!--Slider-->
      <div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/kubus.jpg" height="375"  alt="The very first transportation of KU" title="The very first transportation of KU" id="wows1_0"/></li>
<li><img src="data1/images/frontku.jpg" alt="Kathmandu University" title="Kathmandu University" id="wows1_1"/></li>
<li><img src="data1/images/sun.png" alt="Sunset from KU" title="Sunset from KU" id="wows1_2"/></li>
<li><img src="data1/images/graduationday.jpg" alt="Graduation Day" title="Graduation Day" id="wows1_3"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="The very first transportation of KU"><img src="data1/tooltips/kubus.jpg" alt="The very first transportation of KU"/>1</a>
<a href="#" title="Kathmandu University"><img src="data1/tooltips/frontku.jpg" alt="Kathmandu University"/>2</a>
<a href="#" title="Sunset from KU"><img src="data1/tooltips/sun.png.jpg" alt="Sunset from KU"/>3</a>
<a href="#" title="Graduation Day"><img src="data1/tooltips/graduationday.jpg" alt="Graduation Day"/>4</a>
</div></div>
<span class="wsl"></span>
	<a href="#" class="ws_frame"></a>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
    <!--slider end-->
    
      </th>
    </tr>
    <tr>
      <td height="38" colspan="2" style="background-color:#6E68FF">
      	<div><a href="index.php" style="text-decoration:none ; color:#010101" id="horizontalmenu li"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HOME</b></a>
        <a href="profile.php?option=about" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ABOUT</b></a>
        <a href="profile.php?option=mfees" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MESS FEES</b></a>
        <a href="profile.php?option=rfees" style="text-decoration:none ; color:#010101"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ROOM FEES</b></a>
  <a href="logout.php" style="text-decoration:none;margin-left:150px;"><input type="submit" value="Logout" name="logout"></a></td>
    </tr>
    <tr>
      <td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top">
      	<?php
	@$opt = $_GET['option'];
	if($opt=="")
	{
	?>
    <html>
	<h1><center>Welcome <a href="profile.php"><?php echo $_SESSION['user']; ?></a></center></h1>
	<body>
		<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
										
											
											<th>Room No.</th>
											<th>Name</th>
											<th>Contact&nbsp;No.</th>
											<th>Sector</th>
										</tr>
									</thead>
									
									<tbody>
<?php
session_start();
include('admin/includes/config.php');
$aid=$_SESSION['id'];
$ret="select * from hostel_helplines";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->room_no;?></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->contactno;?></td>
<td><?php echo $row->sector;?></td>

										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>
	</body>
    </html>
	<?php
    error_reporting(1);
	}
	else{
	switch($opt)
	{
		case 'regs':
		include('registration.php')	;
		break;
		case 'login':
		include('login.php');
		break;
        case 'about':
		include('about.php');
		break;
		case 'contact':
		include('contact.php');
		break;
		case 'gallery':
		include('gallery.php');
		break;
		case 'course':
		include ('course.php');
		break;
		case 'mfees':
		include('mfees.php');
		break;
		case 'rfees':
		include('rfees.php');
		break;
		
	}}

	?>
	
      
      </td>
      <td width="343" style="background-color:#468EFF">
      <center><font size="+2"><b style="color:#191B7E"><div style="background-color:#969BFB">College Updates</div><br></b></font></center>
      	<marquee direction="up" height="100%" onMouseOver="this.stop();" onMouseOut="this.start();">
			<center><a href="" style="text-decoration:none"><font size="+1"><b>Campus Drive</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>News</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Sports Fest</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Quiz Competition</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Admission 2017</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Placement List</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Weekend Events</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Notice Board</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Summer Vacation</b></font></a></center><br>
            <center><a href="" style="text-decoration:none"><font size="+1"><b>Summer Training</b></font></a></center><br>
            <center><a href="index.php?option=course" style="text-decoration:none"><font size="+1"><b>Courses Offered</b></font></a></center><br>
            <center><a href="index.php?option=gallery" style="text-decoration:none"><font size="+1"><b>Gallery</b></font></a></center><br>
		</marquee>
      </td>
    </tr>
    
    <tr>
      <td height="25" colspan="2" style="background-color:#B8AFFF"><center><b>&copy; Kathmandu University Hostel 2017</b></center></td>
    </tr>
  </tbody>
</table>
</html>