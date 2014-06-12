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
						print_r (/*'<script>alert(\''.*/$_POST/*.'\');</script>'*/);
						$metricsArray = explode("::", $metricHiddenField, -1);
						foreach($metricsArray as $metricString){
							$metricData = explode(";", $metricString, -1);
							$metrics[] = array(
								'id' => $metricData[0],
								'name' => $metricData[1],
								'description' => $metricData[2],
								'unit' => $metricData[3]
							);
							$metric = new Metric($metricData[0], $metricData[1], $metricData[3], "") ;
							// TODO Ajouter la description
							$metricObjectArray[] = $metric;
						}

						// Getting the IDs of the schedulers from the hidden field
						$schedulersIdsField = $_POST['schedulersIds'];
						$schedulersIds = explode(";", $schedulersIdsField, -1);

						$schedulerObjectArray = array();
						$guaranteeObjectArray = array();

						// Getting info from every scheduler
						foreach($schedulersIds as $id){
							$schedulerType = $_POST[$id.'_Type'];
							$stringCron = "";
							$arrayCron = $_POST[$id.'_Cron'];
							$numberOfDays = count($arrayCron);
							if($numberOfDays == 7){
								$stringCron = "every day";
							}else{
								for($i = 0; $i < $numberOfDays; $i++){
									$stringCron = $stringCron . $arrayCron[$i] . " ";
								}
							}
							$schedule = new Schedule($id, $_POST[$id.'_Start'], $_POST[$id.'_End'], $stringCron) ;
							$schedulerObjectArray[] = $schedule;
							foreach($metrics as $oneMetric){
								// If the checkbox is checked
								if($_POST[$id.'_'.$oneMetric['id'].'_Checkbox']){
									// Create the Objective from the form
									$objective = new Objective($schedulerType, 
										$oneMetric['id'], 
										$_POST[$id.'_'.$oneMetric['id'].'_Comparator'], 
										$_POST[$id.'_'.$oneMetric['id'].'_Treshold'], 
										$id, 
										"Mon1", 
										$_POST[$id.'_'.$oneMetric['id'].'_PercentageConfidence'], 
										$_POST[$id.'_'.$oneMetric['id'].'_Fuzziness'], 
										$_POST[$id.'_'.$oneMetric['id'].'_PercentageFuzziness'],
										"1800") ;

									// Penalties hardcoded for now
									$con = new Constant("0.1", "euro/request") ;
									$penalty = new Penalty("P1", "violation", "provider", $con) ;

									$guaranteeObjectArray[] = new Guarantee("G1", "provider", "1", $objective, $penalty) ;
								}
							}
						}

						$mon = new Monitoring("Mon1", "average", "60") ;
						$par = new Parameters($metricObjectArray, Array($mon), $schedulerObjectArray) ;
						$con2 = new Constant("0.1", "euro/interval") ;
						$all = new All($guaranteeObjectArray) ;
						$guas = new Guarantees($all) ;
						$tem = new Template("gold", "1.0", $par, $guas) ;
						$val = new Validity("2014", "2015") ;
						$csla = new Csla("SLA1", "gold", "2014", $val, $tem) ;

						$filename = 'test';
						$file = fopen("./contracts/".$filename.".xml", "w+") ;
						fwrite($file, $csla->toString()) ;
						fclose($file) ;

						echo '<p align="center"><a href="./contracts/'.$filename.'.xml">Contrat XML</a></p>';

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
