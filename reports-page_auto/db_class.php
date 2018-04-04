<?php
	class db {

		// This file has the code with the connection to the data base.
		
		//host
		private $host = ''; //server
		
		//user
		private $usuario = ''; //user
		
		//password
		private $senha = ''; //password
		
		//data base
		private $database = 'gi_reports';
		
		public function conecta_mysql(){
			
			//connection to db
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
			
			//defines a charset between app e db
			mysqli_set_charset($con, 'utf8');
			
			//verifies if there was a connection error
			if(mysqli_connect_errno()){
				echo 'Error trying to connect to database: '.mysqli_connect_error();
			}
			
			return $con;
			
		}
		
	}

?>