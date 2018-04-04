<?php

    // This file must be runned after a new file is dropped on the folder 
    // in order to check for new files in the folder and add them to the data base.

	ini_set('max_execution_time', 300); //300 seconds = 5 minutes

	require_once('db_class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	//Checking quantity of reports currently in the db 
	$sql1 = " SELECT COUNT(*) FROM reports ";

	$dados_db = mysqli_query($link,$sql1);
	$qt_reports_db = mysqli_fetch_array($dados_db);

//Statement of function to check a folder
function listaDiretoriosArquivos($dir, $maior_que = null, &$arquivos) {//use & to pass the variable by reference / passagem de variável por referência do escopo de chamada

	$ffs = scandir($dir);
	//var_dump($ffs);
	

	foreach($ffs as $ff){
		
		if($ff != '.' && $ff != '..'){
		//monta o array de arquivos e verifica a data de modificação dos mesmos p/ complementar os dados
		
			//$url_file = ($dir.'/'.$ff); //get the file's URL			
			
			//remove the folders from the search, leaving only yhe files
			if(!is_dir($dir.'/'.$ff)) { 

				//recupera arqs modificados somente na última hora se maior_que for definido na chamada da função
				if($maior_que != null && (filemtime($dir.'/'.$ff) > $maior_que)) {
					$arquivos[][$dir.'/'.$ff] = filemtime($dir.'/'.$ff);
				}
			}

			if(is_dir($dir.'/'.$ff)) {
				listaDiretoriosArquivos($dir.'/'.$ff, $maior_que, $arquivos); //se for um diretório faz uma chamada recursiva
			}
		
			$name_file = $ff; //get the file's name
			
			//classifies the file in Free, Match or Overview
			if ($name_file[0] === 'F'){
				$type_file = 'Free'; // Free150617.pdf
				$temp = substr($name_file, strlen($name_file)-5, 1);
				//echo $temp . ' / ';
				if($temp === 'F'){
					$fYear = substr($name_file, 4, 2);
					$fMonth = substr($name_file, 6, 2);
					$fDay = substr($name_file, 8, 2);
					$begYear = substr(date('Y'), 0, 2);
					$file_date = $fDay  . '/' . $fMonth . '/' . $begYear . $fYear;
					//echo $file_date . ' / ';
					$url_file = 'http://10.200.11.39/reports/Arkiv/' . $name_file;
					$date_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay;
					$label_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay . ', Foreløbig';
				}
				else{
					$fYear = substr($name_file, 4, 2);
					$fMonth = substr($name_file, 6, 2);
					$fDay = substr($name_file, 8, 2);
					$begYear = substr(date('Y'), 0, 2);
					$file_date = $fDay  . '/' . $fMonth . '/' . $begYear . $fYear;
					$url_file = 'http://10.200.11.39/reports/Arkiv/' . $name_file;
					$date_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay;
					$label_file = $date_file;
				}
			}
			elseif ($name_file[0] === 'M'){
				$type_file = 'Match'; //Match140206.pdf
				$temp = substr($name_file, strlen($name_file)-5, 1);
				//echo $temp . ' / ';
				if($temp === 'F'){
					$fYear = substr($name_file, 5, 2);
					$fMonth = substr($name_file, 7, 2);
					$fDay = substr($name_file, 9, 2);
					$begYear = substr(date('Y'), 0, 2);
					$file_date = $fDay  . '/' . $fMonth . '/' . $begYear . $fYear;
					$url_file = 'http://10.200.11.39/reports/Arkiv/' . $name_file;
					$date_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay;
					$label_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay . ', Foreløbig';
				}
				else{
					$fYear = substr($name_file, 5, 2);
					$fMonth = substr($name_file, 7, 2);
					$fDay = substr($name_file, 9, 2);
					$begYear = substr(date('Y'), 0, 2);
					$file_date = $fDay  . '/' . $fMonth . '/' . $begYear . $fYear;
					$url_file = 'http://10.200.11.39/reports/Arkiv/' . $name_file;
					$date_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay;
					$label_file = $date_file;
				}
				
			}
			else {
				$type_file = 'Overview'; // Overview160308.pdf
				$temp = substr($name_file, strlen($name_file)-5, 1);
				//echo $temp . ' / ';
				if($temp === 'F'){
					$fYear = substr($name_file, 8, 2);
					$fMonth = substr($name_file, 10, 2);
					$fDay = substr($name_file, 12, 2);
					$begYear = substr(date('Y'), 0, 2);
					$file_date = $fDay  . '/' . $fMonth . '/' . $begYear . $fYear;
					$url_file = 'http://10.200.11.39/reports/Arkiv/' . $name_file;
					$date_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay;
					$label_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay . ', Foreløbig';
				}
				else{
					$fYear = substr($name_file, 8, 2);
					$fMonth = substr($name_file, 10, 2);
					$fDay = substr($name_file, 12, 2);
					$begYear = substr(date('Y'), 0, 2);
					$file_date = $fDay  . '/' . $fMonth . '/' . $begYear . $fYear;
					$url_file = 'http://10.200.11.39/reports/Arkiv/' . $name_file;
					$date_file = $begYear . $fYear  . '-' . $fMonth . '-' . $fDay;
					$label_file = $date_file;
				}
			}
			
			$file_timestamp = filemtime($dir.'/'.$ff); //get the file's timestamp

			$file_data = date("d-m-Y", filemtime($dir.'/'.$ff)); 
			
			$dataP = explode('-', $file_data); //get date (data no formato (dd/mm/yyyy)
			$dataDB = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
			
			recordData($label_file, $type_file, $url_file, $date_file, $dataDB);

		}
	}
}

//creates variable to store data
$arquivos = array();

$maior_que = null; //variável deve armazenar o stamp de pesquisa para formar o array de retorno.
$maior_que = strtotime('-1 hour', time()); //time() que corresponde ao stamp atual - 1 hora

//Calling the function to check the folder for new files!
listaDiretoriosArquivos('C:/inetpub/wwwroot/reports/Arkiv', $maior_que, $arquivos);

//Printing the quantity of new files found.
$qt_files_in_folder = sizeof(scandir('C:/inetpub/wwwroot/reports/Arkiv'))-2;

echo $qt_files_in_folder - $qt_reports_db[0] . " files were added to the database.";


// Storing on the data base

function recordData($label_file, $type_file, $url_file, $date_file, $dataDB){
	require_once('db_class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$report_existe = false;

	//Checking if report is already in the db before inserting a new report 
	$sql = " SELECT * FROM reports WHERE report_link = '$url_file' ";
	
	$resultado_id = mysqli_query($link,$sql); // retorna false OU um resource
	
	if($resultado_id){ 
		
		$dados_reports = mysqli_fetch_array($resultado_id); // the fetch returns an array
		
		//report exists!
		if(isset($dados_reports['report_link'])){ //is there a 'report_link'? / no retorno do select, existe o campo 'report_link'?
			$report_existe = true;
		}
	
	}
	else{ //Checking if there's any query error
		echo "Error trying to find reports."; 
	}
	
	$erro = false;
	
	if($report_existe == false){
		//INSERT a new report in the db (returns true OR false)
		$sql = " INSERT INTO reports(report_name, report_type, report_link, date_file, date_add) values('$label_file', '$type_file', '$url_file', '$date_file', '$dataDB') ";

				//execute a query (connection, query)
				if (mysqli_query($link, $sql)){
				}
				else{
					echo 'Error trying to add new reports.' . $url_file . '<br>';
					$erro = true;
				}
	
	} 
	
}

?>
