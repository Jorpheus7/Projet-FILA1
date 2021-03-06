<!DOCTYPE HTML>
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
		<script src="js/manageSchedulersHTMLForm.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body onload='init();'">

	<?php
		// Getting the IDs of the metrics from the hidden field
		$metricIdsField = $_POST['metricIds'];
		$metricIds = explode(";", $metricIdsField, -1);

		$tempHidden = "";

		// Getting info from every metric
		foreach($metricIds as $id){
			$metricName = $_POST[$id.'_Name'];
			$metricDescription = $_POST[$id.'_Description'];
			$metricUnit = $_POST[$id.'_Unit'];

			// TODO Remplacer ce mécanisme par de l'AJAX ou autre...
			$tempHidden = $tempHidden 
				. $id . ";"
				. $metricName . ";"
				. $metricDescription . ";"
				. $metricUnit . "::";
		}
		
	?>

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
								<li class="actualPage">Scheduler</li>
								<li>Contract</li>
							</ul>
						</nav>
					<!-- Nav -->
						<nav id="nav">
							<!--
								Prologue's nav expects links in one of two formats:
								1. Hash link (scrolls to a different section within the page)
								   <li><a href="#foobar" id="foobar-link" class="skel-panels-ignoreHref"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>
								2. Standard link (sends the user to another page/site)
								   <li><a href="http://foobar.tld"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>
							-->
							
							<!-- Hidden field used to increments the id of the item -->
							<input type="hidden" id="itemActualId" value="0" />
							
							<!-- Section where the menu items will be generated  -->
							<ul id="items">
								<!-- Auto-generated items comes here -->
								
								<li id="insertItemTag"></li>
							</ul>
							<ul>
								<li><a href="#"  class="skel-panels-ignoreHref" id="addSchedulerRequest"  onclick="addScheduler('request');"><span class="fa fa-plus-circle"></span>Add by Request</a></li>
								<li><a href="#"  class="skel-panels-ignoreHref" id="addSchedulerInterval"  onclick="addScheduler('interval');"><span class="fa fa-plus-circle"></span>Add by Interval</a></li>
							</ul>
						</nav>
						
				</div>
			
			</div>

		<!-- Main -->
			<div id="main">
			
					<section id="top" class="one">
						<h2 class="title">Schedulers</h2>
					</section>
					
					<form id="schedulersForm" method="post" action="contract.php">
						<!-- Hidden field containing the IDs of the actuals metrics -->
						<?php echo "<input type=\"hidden\" id=\"hiddenMetrics\" name=\"hiddenMetrics\" value=\"".$tempHidden."\" />"; ?>
						<input type="hidden" id="schedulersIds" name="schedulersIds" value=""/>
						<div id="schedulers">
						<!-- Auto-generated sections -->
						
							<div id="insertTag"></div>
						</div>
						<div align="right"><input class="submitButton" type="submit" value="Validate"/></div>
					</form>
					
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
