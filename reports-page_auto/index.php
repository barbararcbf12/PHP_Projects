<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Group Investment - REPORTS</title>

<link href="css/reports-styles.css" rel="stylesheet" type="text/css">

<!-- Tryg icons and fonts -->
<link href="css/fonts.css" rel="stylesheet" type="text/css">
<link rel="icon" 
      type="image/png" 
      href="images/ico.png">
      
<script src="js/w3data.js"></script>

<!-- Comments to get the Details tag working on IE -->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>
	<?php

		ini_set('max_execution_time', 300); //300 seconds = 5 minutes

		//require_once('load_links.php');
		require_once('db_class.php');

		
		//Creating obj of connection with DB
		$objDb = new db();
		$link = $objDb->conecta_mysql();

		function replaceMonth($m){
			switch($m){
				case 1:
					echo "<div class='display-month'>Januar</div>";
					break;
				case 2:
					echo "<div class='display-month'>Februar</div>";
					break;
				case 3:
					echo "<div class='display-month'>Marts</div>";
					break;
				case 4:
					echo "<div class='display-month'>April</div>";
					break;
				case 5:
					echo "<div class='display-month'>Maj</div>";
					break;
				case 6:
					echo "<div class='display-month'>June</div>";
					break;
				case 7:
					echo "<div class='display-month'>Juli</div>";
					break;
				case 8:
					echo "<div class='display-month'>August</div>";
					break;
				case 9:
					echo "<div class='display-month'>September</div>";
					break;
				case 10:
					echo "<div class='display-month'>Oktober</div>";
					break;
				case 11:
					echo "<div class='display-month'>November</div>";
					break;
				case 12:
					echo "<div class='display-month'>December</div>";
					break;
			}
		}
	?>

<div id="container">

<!-- begin of HEADER section -->
	<header>
		<div id="header">
				<div id="logo" class="image">&nbsp;</div>
				<div id="title"><h1>Group Investment <span class="text-light">| REPORTS</span></h1></div>
		</div>
	</header>
	
<!-- end of HEADER section -->

<!-- ******************************************************************************************* -->
<!-- ******************************************************************************************* -->

<!-- begin of MAIN section = REPORTS -->

	<section class="clear">
	<div id="column_box">
		<div id="main" class="clear">

<!-- ******************************************************************************************* -->		
<!-- TOTAL OVERVIEW -->
			<div id="column">
				<h1>Return & Risk<br><span class="h1">total overview</span></h1>
				<br>
				<!-- Include file overview.php <div>-->
					
					<?php 

						//Checking quantity of reports currently in the db 
						$sql = " SELECT id_report, report_name, report_type, report_link, YEAR(date_file) as date_year, MONTH(date_file) as date_month FROM reports WHERE report_type = 'Overview' ORDER BY YEAR(date_file) DESC, MONTH(date_file) DESC, DAY(date_file) DESC";

						$resultado_id = mysqli_query($link,$sql);
						
						if($resultado_id){
			
							$messages_id = array();
			
							while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
								$messages_id[] = $registro;
							}
							
							$title = $messages_id[0]['date_month'] . $messages_id[0]['date_year'];
							$title_year = $messages_id[0]['date_year'];

							//PRINT LATEST YEAR 
							echo "<details open><summary class='padding-year' role='button' aria-expanded='true'><strong>" . $messages_id[0]['date_year'] . "</strong></summary>";
							
							//PRINT LATEST MONTH
							echo "<details open><summary class='padding-month' role='button' aria-expanded='true'>";
							echo replaceMonth($messages_id[0]['date_month']);
							echo "</summary><ul>";

							foreach($messages_id as $msg){
								$msg_year = $msg['date_year'];
								if($title != $msg['date_month'] . $msg['date_year']){
									if ($msg_year != $title_year){ 
										echo '</ul></details></details>';
										//PRINT YEAR
										echo "<details><summary class='padding-year' role='button' aria-expanded='true'><strong>" . $msg['date_year'] . "</strong></summary>"; 
										//PRINT MONTH
										echo "<details><summary class='padding-month' role='button' aria-expanded='true'>";
										echo replaceMonth($msg['date_month']); 
										//PRINT DAY
										echo ("</summary><ul><li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
										$title = $msg['date_month'] . $msg['date_year'];
										$title_year = $msg['date_year'];
									} 
									else{
										echo '</ul></details>';
										//PRINT MONTH
										echo "<details><summary class='padding-month' role='button' aria-expanded='true'>";
										echo replaceMonth($msg['date_month']); 
										//PRINT DAY
										echo ("</summary><ul><li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
										$title = $msg['date_month'] . $msg['date_year'];
										$title_year = $msg['date_year'];
									}
								}
								else{
									echo ("<li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
								}
							}
						}
						 else{
							echo 'Error on searching the data base!';
						}

					?>
						
				<br>
				
			</div>
			
<!-- END - TOTAL OVERVIEW -->

<!-- ******************************************************************************************* -->

<!-- RETURN FREE -->
			<div id="column">
				<h1>Return<br><span class="h1">free</span></h1>
				<br>
				<!-- Include file free.php <div>-->
					
					<?php 

						//Checking quantity of reports currently in the db 
						$sql = " SELECT id_report, report_name, report_type, report_link, YEAR(date_file) as date_year, MONTH(date_file) as date_month FROM reports WHERE report_type = 'Free' ORDER BY YEAR(date_file) DESC, MONTH(date_file) DESC, DAY(date_file) DESC";

						$resultado_id = mysqli_query($link,$sql);
						
						if($resultado_id){
			
							$messages_id = array();
			
							while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
								$messages_id[] = $registro;
							}
							
							$title = $messages_id[0]['date_month'] . $messages_id[0]['date_year'];
							$title_year = $messages_id[0]['date_year'];

							//PRINT LATEST YEAR 
							echo "<details open><summary class='padding-year' role='button' aria-expanded='true'><strong>" . $messages_id[0]['date_year'] . "</strong></summary>";
							
							//PRINT LATEST MONTH
							echo "<details open><summary class='padding-month' role='button' aria-expanded='true'>";
							echo replaceMonth($messages_id[0]['date_month']);
							echo "</summary><ul>";

							foreach($messages_id as $msg){
								$msg_year = $msg['date_year'];
								if($title != $msg['date_month'] . $msg['date_year']){
									if ($msg_year != $title_year){ 
										echo '</ul></details></details>';
										//PRINT YEAR
										echo "<details><summary class='padding-year' role='button' aria-expanded='true'><strong>" . $msg['date_year'] . "</strong></summary>"; 
										//PRINT MONTH
										echo "<details><summary class='padding-month' role='button' aria-expanded='true'>";
										echo replaceMonth($msg['date_month']); 
										//PRINT DAY
										echo ("</summary><ul><li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
										$title = $msg['date_month'] . $msg['date_year'];
										$title_year = $msg['date_year'];
									} 
									else{
										echo '</ul></details>';
										//PRINT MONTH
										echo "<details><summary class='padding-month' role='button' aria-expanded='true'>";
										echo replaceMonth($msg['date_month']); 
										//PRINT DAY
										echo ("</summary><ul><li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
										$title = $msg['date_month'] . $msg['date_year'];
										$title_year = $msg['date_year'];
									}
								}
								else{
									echo ("<li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
								}
							}
						}
						 else{
							echo 'Error on searching the data base!';
						}

					?>
				<br>
			</div>
<!-- END - RETURN FREE -->

<!-- ******************************************************************************************* -->

<!-- RETURN MATCH -->
			<div id="column">
				<h1>Return<br><span class="h1">match</span></h1>
				<br>
					<!-- Include file match.php <div>-->
				
					<?php 

						//Checking quantity of reports currently in the db 
						$sql = " SELECT id_report, report_name, report_type, report_link, YEAR(date_file) as date_year, MONTH(date_file) as date_month FROM reports WHERE report_type = 'Match' ORDER BY YEAR(date_file) DESC, MONTH(date_file) DESC, DAY(date_file) DESC";

						$resultado_id = mysqli_query($link,$sql);
						
						if($resultado_id){
			
							$messages_id = array();
			
							while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
								$messages_id[] = $registro;
							}
							
							$title = $messages_id[0]['date_month'] . $messages_id[0]['date_year'];
							$title_year = $messages_id[0]['date_year'];

							//PRINT LATEST YEAR 
							echo "<details open><summary class='padding-year' role='button' aria-expanded='true'><strong>" . $messages_id[0]['date_year'] . "</strong></summary>";
							
							//PRINT LATEST MONTH
							echo "<details open><summary class='padding-month' role='button' aria-expanded='true'>";
							echo replaceMonth($messages_id[0]['date_month']);
							echo "</summary><ul>";

							foreach($messages_id as $msg){
								$msg_year = $msg['date_year'];
								if($title != $msg['date_month'] . $msg['date_year']){
									if ($msg_year != $title_year){ 
										echo '</ul></details></details>';
										//PRINT YEAR
										echo "<details><summary class='padding-year' role='button' aria-expanded='true'><strong>" . $msg['date_year'] . "</strong></summary>"; 
										//PRINT MONTH
										echo "<details><summary class='padding-month' role='button' aria-expanded='true'>";
										echo replaceMonth($msg['date_month']); 
										//PRINT DAY
										echo ("</summary><ul><li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
										$title = $msg['date_month'] . $msg['date_year'];
										$title_year = $msg['date_year'];
									} 
									else{
										echo '</ul></details>';
										//PRINT MONTH
										echo "<details><summary class='padding-month' role='button' aria-expanded='true'>";
										echo replaceMonth($msg['date_month']); 
										//PRINT DAY
										echo ("</summary><ul><li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
										$title = $msg['date_month'] . $msg['date_year'];
										$title_year = $msg['date_year'];
									}
								}
								else{
									echo ("<li><a href=" . $msg['report_link'] . " target = '_blank' >".$msg['report_name']."</a></li>");
								}
							}
						}
						 else{
							echo 'Error on searching the data base!';
						}

					?>
				
				
				<br>
			</div>
<!-- END - RETURN MATCH -->
		</div>
	</div>
	</section>
	
<!-- end of MAIN section -->

<!-- ******************************************************************************************* -->
<!-- ******************************************************************************************* -->

<!-- begin of FOOTER section -->
	<footer class="clear">
		<strong>Group Investment Tryg</strong>. GI, P40 | Klausdalsbrovej 601 | 2750 Ballerup
	</footer>
<!-- end of FOOTER section -->

<!-- ******************************************************************************************* -->
<!-- ******************************************************************************************* -->
	
	<br>

<!-- begin of Script for Including HTML files -->
<script>
	w3IncludeHTML();
</script>
<!-- END - Script for Including HTML files -->

<!-- Details scripts for IE -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script src="js/jquery.details.js"></script>
		
		
		<script>
			$(function() {
				// Add conditional classname based on support
				$('html').addClass($.fn.details.support ? 'details' : 'no-details');
				// Emulate <details> where necessary and enable open/close event handlers
				$('details').details();
			});
		</script>
<!-- END - Details scripts for IE -->


</div>
</body>
</html>
