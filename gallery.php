
<?php
session_start();
include ('includes/config.php');

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
	
	<title>Home Page</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
        <link href="css/jquery.bsPhotoGallery.css" rel="stylesheet">
    
  </head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Bree+Serif);
      body {
        background:#ebebeb;
      }
      ul {
          padding:0;
          margin:0;
      }
      ul li {
          list-style:none;
          margin-bottom:10px;
      }
    .text {
      /*font-family: 'Bree Serif';*/
      color:#666;
      font-size:11px;
      margin-bottom:10px;
      padding:0;
      background:#fff;
    }
  </style>
  <body>
    <?php
include ("includes/header.php");
 ?>

	<div class="ts-main-content">
		<?php
include ("includes/regsidebar.php");
 ?><center>
    <div class="container" style="padding:85px 0 0 0;">
        

        <ul class="row first">
            <li>
                <img alt="Rocking the night away" src="images/kubus.jpg">
                
            </li>
            <li>
                <img alt="Yellow sign"  src="images/frontku.jpg">
                
            </li>
            <li>
                <img alt="Colors"  src="images/graduationday.jpg">
                 
            </li>
            <li>
                <img alt="Retro party"  src="images/kubh.jpg">
                
            </li>
            
            
            

  </ul>




    </div> <!-- /container -->


</center>
        </div>


<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
        <script src="css/jquery.bsPhotoGallery.js"></script>


  </body>


</html>