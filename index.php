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


</head>

<body>
<?php
include ("includes/header.php");
 ?>

	<div class="ts-main-content">
		<?php
include ("includes/regsidebar.php");
 ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
<br />
						<h2 class="page-title">Kathmandu University</h2>
						
						<div class="row">
						    <img src="images/kumain.jpg" alt="My Image" class="center-block" >
							<div class="col-md-12">
							    
								
								    <fieldset><center>
									
									<p class="lead"><br>Kathmandu University (KU) is an autonomous non-government, public institution. It is the third oldest university in Nepal, located in Dhulikhel, Kavrepalanchok District, about 30 km east of Kathmandu. KU was established in 1991 with the motto "Quality Education for Leadership". This university operates through its seven schools and from premises in Dhulikhel, Lalitpur and Bhaktapur.</p>

<p class="lead">The university provides undergraduate to postgraduate programs in the fields of engineering, science, management, arts, education,law and medical sciences. It provides undergraduate courses in engineering (Civil, Computer, Electrical & Electronics, Mechanical, Environmental, Geomatics, Chemical ), Science (Biotechnology, Computer Science, Environmental science, Pharmacy, Human biology & Applied physics), Managementanagement (Bachelors in Business Administration, executive MBA, Masters in Business Administration ...), Arts (music, media, community development, fine art, and economics), medical science(MBBS, MD/MS, Mch/DM in various medical specialties and subspecialities, B Sc Nursing, PCL Nursing, Bachelor in Nursing, BSc Midwifery, Bachelor in Physiotherapy BDS). Graduate courses in science, engineering, pharmacy, development and business administration are also offered.</p>
								
								    </center>
								    </fieldset>
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
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
	
	<script>
		
	window.onload = function(){

    
		// Line chart from swirlData for dashReport

		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 

		
		// Pie Chart from doughutData

		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});


		// Dougnut Chart from doughnutData

		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>

</html>