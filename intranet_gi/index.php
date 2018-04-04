<!doctype html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Tryg | Group Investment</title>

<!-- Favicon -->
<link rel="icon" 
      type="image/png" 
      href="images/Tryg_OK_24x24_32bit.png">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- My CSS
<link href="css/reports-styles5.css" rel="stylesheet" type="text/css"> -->
<link href="css/intranet.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/tryg_fonts.css" rel="stylesheet" type="text/css">

</head>

<body>
	<?php
		header('Content-Type: text/html; charset=UTF-8');
		ini_set('max_execution_time', 300); //300 seconds = 5 minutes

		//"Including" page with database connection info;
		require_once('db_class_local.php');
		
		//Creating obj of connection with DB
		$objDb = new db();
		$link = $objDb->conecta_mysql();

	?>
	
	<div class="container">
		<div class="row">
		<!-- Top -->
			<header>
				<div class="header clearfix">
					<div id="logo" class="image"><a href="http://intra.prd1.prdroot.net/home_page/index.html" target="_blank">&nbsp;</a></div>
					<div id="home" class="image"><a href="http://intra.prd1.prdroot.net/home_page/index.html" target="_blank">ask</a></div>
					<div id="title">
					  <h1>GROUP INVESTMENT</h1>
					</div>
				</div>

			</header>

		<!-- Menu -->
		
		<nav id="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="true">
					<span class="sr-only">Toggle-navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" aria-expanded="true">
				<ul class="nav nav-pills nav-justified">
					<li role="presentation" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cash Management<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>&nbsp</li>
						
							<!-- Loading Cash Management links -->
						
							<?php 

							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Cash management' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
					
							<li>&nbsp</li>
							
							<!-- END -->
						
						</ul>
						
					</li>
					<li role="presentation" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">External Reporting & Regnskab<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>&nbsp</li>
							
							<!-- Loading Regnskab links -->
						
							<?php 

							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Regnskab' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							<!-- END -->
							
							<li>&nbsp</li>
						
						</ul>
						
					</li>
					<li role="presentation" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Investment & Risk Allocation<span class="caret"></span></a>
<!-- here -->					
		<ul class="dropdown-menu">
            <li>
                <div class="row" style="width: 600px;">
                    <ul class="list-unstyled col-md-5 sub_column">
                        <li>&nbsp</li>
                        <!-- Loading Fri links -->
                        	<!-- Loading The Fri World links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'The Free World' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
									
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							<li>&nbsp</li>
							
							<!-- END -->
							
							<!-- Loading Macro and business cycle links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'Macro and business cycle' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
								
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							
							<li>&nbsp</li>
							
							<!-- END -->
							
							<!-- Loading Inflation and commodities links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'Inflation and commodities' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
								
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							
							<li>&nbsp</li>
							
							<!-- END -->
							
							<!-- Loading Equities links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'Equities' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
								
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							
							<li>&nbsp</li>
							
							<!-- END -->
							
							<!-- Loading Bonds links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'Bonds' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
								
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							
							<li>&nbsp</li>
							
							<!-- END -->
                    </ul>
                    
                    <ul class="list-unstyled col-md-6"  style="left: 35px;">
                       	<li>&nbsp</li>
							
							<!-- Loading Portfolio/cross asset and strategy links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'Portfolio/cross asset and strategy' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
								
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							
							<li>&nbsp</li>
							
							<!-- END -->
							
							<!-- Loading Positions links -->
							<?php 
							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_subsection, link_label, link_url FROM links WHERE link_section = 'Fri' AND link_subsection = 'Positions' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}
								
								echo "<li class='sub_title'><b>" . $messages_id[0]['link_subsection']. "</b></li>";

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							
							<li>&nbsp</li>
							
							<!-- END -->
                    </ul>
                </div>
            </li>
        </ul>
						
<!-- HERE -->		
						
					</li>
					<li role="presentation" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Match & Renteafdækning<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>&nbsp</li>
							
							<!-- Loading Match links -->
						
							<?php 

							//Checking quantity of reports currently in the db 
							$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Match' ORDER BY link_label";

							$resultado_id = mysqli_query($link,$sql);

							if($resultado_id){

								$messages_id = array();

								while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
									$messages_id[] = $registro;
								}

								foreach($messages_id as $msg){
									echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
								}
							}
							 else{
								 echo 'Error on searching the data base!';
							 }

							?>
							<!-- END -->
							
						<li>&nbsp</li>
						</ul>
					</li>
					<li role="presentation" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Treasury<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>&nbsp</li>
							
							<!-- Loading Treasury links -->
						
								<?php 

								//Checking quantity of reports currently in the db 
								$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Treasury' ORDER BY link_label";

								$resultado_id = mysqli_query($link,$sql);

								if($resultado_id){

									$messages_id = array();

									while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
										$messages_id[] = $registro;
									}

									foreach($messages_id as $msg){
										echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
									}
								}
								 else{
									 echo 'Error on searching the data base!';
								 }

								?>
							<!-- END -->
							
							<li>&nbsp</li>
						</ul>
						
					</li>
					<li role="presentation" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Infrastruktur<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>&nbsp</li>
							
							<!-- Loading Infrastruktur links -->
						
								<?php 

								//Checking quantity of reports currently in the db 
								$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Infrastruktur' ORDER BY link_label";

								$resultado_id = mysqli_query($link,$sql);

								if($resultado_id){

									$messages_id = array();

									while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
										$messages_id[] = $registro;
									}

									foreach($messages_id as $msg){
										echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
									}
								}
								 else{
									 echo 'Error on searching the data base!';
								 }

								?>
							<!-- END -->
							
							<li>&nbsp</li>
						</ul>
					</li>
				</ul>
				</div>
			</nav>
			
		<!-- Content -->
			<main>
				<br />
				<!-- Reports -->
				<h1>REPORTS</h1>
				<div id="rectangle" class="clear">
						<div class="row">
								<div class="col-lg-6"><img width="579px" height="190px" style="border: 0" src="\\TvgCcd002\Common2\Data.HK3\FONDS\A - Investeringsafdelingen\Rapportering\DagligRap\OverviewTable.jpeg" alt="Overview Portfolio"/></div>
								
								<div class="col-xs-12 col-lg-2 col-md-2 daily">
									<h2 class="clear">Daily Reports</h2>
									<ul class="items">
										<li><a href="http://10.200.11.39/reports/" target="_blank">Daily Reports [NEW!]</a></li>
										
							
									<!-- Loading Daily Reports links -->

										<?php 

										//Checking quantity of reports currently in the db 
										$sql = "SELECT link_label, link_url FROM links WHERE link_section LIKE '%IN-ALL-1' AND link_label LIKE '%Daily%' ORDER BY link_label";

										$resultado_id = mysqli_query($link,$sql);

										if($resultado_id){

											$messages_id = array();

											while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
												$messages_id[] = $registro;
											}

											foreach($messages_id as $msg){
												echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
											}
										}
										 else{
											 echo 'Error on searching the data base!';
										 }

										?>
									<!-- END -->
									</ul>	
								</div>
								
								<div class="col-xs-12 col-lg-2 col-md-2">
									<h2 class="clear">Macro Reports</h2>
									<ul class="items">
										<!-- Loading Macro Reports links -->
						
										<?php 
										//Checking quantity of reports currently in the db 
										$sql = "SELECT link_label, link_url FROM links WHERE link_section LIKE '%Rapporter' ORDER BY link_label";

										$resultado_id = mysqli_query($link,$sql);

										if($resultado_id){

											$messages_id = array();

											while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
												$messages_id[] = $registro;
											}

											foreach($messages_id as $msg){
												echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
											}
										}
										 else{
											 echo 'Error on searching the data base!';
										 }

										?>
										<!-- END col-md-offset-1 -->
									</ul>	
								</div>
								<div class="col-xs-12 col-lg-2 col-md-2 ">
								  <h2 class="clear">Historic Reports</h2>
										<div class="row">
											<div class="col-xs-4 col-md-4 historic">
												<ul class="items">
													
												<!-- Loading Historic Reports links -->

													<?php 
											
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section LIKE '%IN-ALL-1' AND link_label NOT LIKE '%Daily%'";

													$resultado_id = mysqli_query($link,$sql);
											
													$resulthalf = mysqli_num_rows($resultado_id);
													
													$resulthalf = $resulthalf / 2;
													
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section LIKE '%IN-ALL-1' AND link_label NOT LIKE '%Daily%' ORDER BY link_label limit {$resulthalf}";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												</ul>	
											</div>
											
											<div class="col-xs-6 col-md-4">
												<ul class="items">
													<!-- Loading Historic Reports links -->

													<?php 
																										
													//Checking quantity of reports currently in the db
													$sql = "SELECT * FROM (SELECT link_label, link_url FROM links WHERE link_section LIKE '%IN-ALL-1' AND link_label NOT LIKE '%Daily%' ORDER BY link_label DESC limit {$resulthalf}) AS T ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
											  </ul>	
										  </div>
								  </div>
								</div>
						</div>
				</div>
				
				<br />
				
				<!-- General Documents -->
				<h1>GENERAL DOCUMENTS</h1>
				<div id="rectangle" class="clear">
					<div class="row">
								<div class="col-md-2" style="left: -10px">
									<h2 class="clear">Administration</h2>
										<ul class="items">
										
											<!-- Loading Administration links -->

													<?php 
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Administration' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>
									
									<h2 class="clear">Batch</h2>
										<ul class="items">
										
											<!-- Loading Batch links -->

													<?php 
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Batch' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>
								</div>
								<div class="col-md-2 column-left">
									<h2 class="clear">Dokumentation</h2>
										<ul class="items">
										
											<!-- Loading Dokumentation links -->

													<?php 
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Dokumentation' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>	
								</div>
								
								<div class="col-md-2 column-left">
									<h2 class="clear">Personale</h2>
										<ul class="items">
										
											<!-- Loading Personale links -->

													<?php 
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Personale' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>
									
									<h2 class="clear">Portman</h2>
										<ul class="items">
										
											<!-- Loading Portman links -->

													<?php 
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Portman' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>	
								</div>
								
					  <div class="col-md-4 column-left">
						<h2 class="clear">Solvency 2</h2>
										<div class="row">
											<div class="col-xs-6 col-md-offset-0 col-md-6">
												<ul class="items" style="left: 10px;">
													
												<!-- Loading Solvency 2 col 1 links -->

													<?php 
											
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Solvency 2'";

													$resultado_id = mysqli_query($link,$sql);
											
													$resulthalf = mysqli_num_rows($resultado_id);
											
													$resulthalf = intval($resulthalf/2);
																										
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Solvency 2' ORDER BY link_label LIMIT {$resulthalf}";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												</ul>	
											</div>
											<div class="col-xs-6 col-md-6">
												<ul class="items">
													<!-- Loading Solvency 2 col 2 links -->

													<?php 
													$resulbegin = $resulthalf + 1;
													
													//Checking quantity of reports currently in the db
													$sql = "SELECT * FROM (SELECT link_label, link_url FROM links WHERE link_section = 'Solvency 2' ORDER BY link_label DESC LIMIT {$resulbegin}) AS T ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
											  </ul>	
										  </div>
					    </div>
					  </div>
								<div class="col-md-2 column-left">
									<h2 class="clear">Teknik</h2>
									<ul class="items">
										
											<!-- Loading Teknik links -->

													<?php 
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Teknik' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>	
									
									<h2 class="clear">Upload</h2>
										<ul class="items">
										
											<!-- Loading Upload links -->

													<?php 
											
													//Checking quantity of reports currently in the db
													$sql = "SELECT link_label, link_url FROM links WHERE link_section = 'Upload' ORDER BY link_label";

													$resultado_id = mysqli_query($link,$sql);		

													if($resultado_id){

														$messages_id = array();

														while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
															$messages_id[] = $registro;
														}

														foreach($messages_id as $msg){
															echo ("<li><a href='" . $msg['link_url'] . "' target='_blank'>" . $msg['link_label'] . "</a></li>");
														}
													}
													 else{
														 echo 'Error on searching the data base!';
													 }

													?>
												<!-- END -->
												
									</ul>	
								</div>
						</div>
				</div>
				

			</main>

		<!-- Footer -->
			<footer class="clear">
				<strong>Tryg Invest</strong>. GI, P40 | Klausdalsbrovej 601 | 2750 Ballerup

			</footer>
			<br />
			
		</div><!-- Main row -->
	</div><!-- Main container -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed
    <script src="js/bootstrap.min.js"></script> -->
</body>

</html>
