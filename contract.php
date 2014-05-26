<!DOCTYPE HTML>
<?php

	require "php/class_Csla.php" ;
	require "php/class_Validity.php" ;
	require "php/class_Template.php" ;
	require "php/class_Parameters.php" ;
	require "php/class_Metric.php" ;
	require "php/class_Monitoring.php" ;
	require "php/class_Schedule.php" ;
	require "php/class_Guarantees.php" ;
	require "php/class_Guarantee.php" ;
	require "php/class_All.php" ;
	require "php/class_Any.php" ;
	require "php/class_Objective.php" ;
	require "php/class_Constant.php" ;
	require "php/class_Penalty.php" ;
	
?>
<!--
	Prologue 1.2 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cloud Service Licence Agreement</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header" class="skel-panels-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/cloud_48.png" alt="" /></span>
							<h1 id="title">Cloud Services</h1>
							<span class="byline">Cloud Service Level Agreement</span>
						</div>


					<!-- Nav -->
						<nav id="navUp">
							<ul class="container">
								<li>Metrics</li>
								<li>Scheduler</li>
								<li class="actualPage">Contract</li>
							</ul>
						</nav>
						
				</div>
			
			</div>

		<!-- Main -->
			<div id="main">
			
					<section id="top" class="one">
						<h2 class="title">Contract</h2>
					</section>
					
					<?php
						// Getting the metrics from the hidden field
						$metrics = array();
						$metricObjectArray = array();

						$metricHiddenField = $_POST['hiddenMetrics'];
						$metricsArray = explode("::", $metricHiddenField, -1);
						foreach($metricsArray as $num => $metricString){
							$metricData = explode(";", $metricString, -1);
							$metrics[$num] = array(
								'id' => $metricData[0],
								'name' => $metricData[1],
								'description' => $metricData[2],
								'unit' => $metricData[3]
							);
							$metricObjectArray[] = new Metric($metrics[$num]['name'], $metrics[$num]['description'], $metrics[$num]['unit'], "") ;
						}

						// Getting the IDs of the schedulers from the hidden field
						$schedulersIdsField = $_POST['schedulersIds'];
						$schedulersIds = explode(";", $schedulersIdsField, -1);

						$schedulerObjectArray = array();

						// Getting info from every scheduler
						foreach($schedulersIds as $id){
							$schedulerObjectArray[] = new Schedule($id, $_POST[$id.'_Start'], $_POST[$id.'_End'], "every day") ;
						}


						$mon = new Monitoring("Mon1", "average", "60") ;
						$met1 = new Metric("Rt", "Response Time", "second", "") ;
						$met2 = new Metric("Av", "Availability", "percentage", "30") ;
						$par = new Parameters($metricObjectArray, Array($mon), $schedulerObjectArray) ;
						$obj1 = new Objective("per-interval", "Rt", "lessOrEqual", "3", "Sch1", "Mon1", "90", "0.5", "10", "1800") ;
						$con1 = new Constant("0.1", "euro/request") ;
						$pen1 = new Penalty("P1", "violation", "provider", $con1) ;
						$gua1 = new Guarantee("G1", "provider", "1", $obj1, $pen1) ;
						$obj2 = new Objective("per-interval", "Av", "greaterOrEqual", "95", "Sch1", "Mon1", "90", "1", "10", "1800") ;
						$con2 = new Constant("0.1", "euro/interval") ;
						$pen2 = new Penalty("P2", "violation", "provider", $con2) ;
						$gua2 = new Guarantee("G2", "provider", "2", $obj2, $pen2) ;
						$all = new All(Array($gua1,$gua2)) ;
						$guas = new Guarantees($all) ;
						$tem = new Template("gold", "1.0", $par, $guas) ;
						$val = new Validity("2014", "2015") ;
						$csla = new Csla("SLA1", "gold", "2014", $val, $tem) ;

						$filename = 'test';
						$file = fopen("./contracts/".$filename.".xml", "w+") ;
						fwrite($file, $csla->toString()) ;
						fclose($file) ;

						echo '<p align="center"><a href="./contracts/'.$filename.'.xml">Contrat XML</a></p>';

						//echo $csla->toString();
						


					?>




					
		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; 2014 EMN. All rights reserved.</p>
						<ul class="menu">
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				
			</div>

	</body>
</html>
