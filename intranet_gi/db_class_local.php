<?php
	class db {
		
		//host
		private $host = 'localhost';
		
		//user
		private $usuario = 'root';
		
		//password
		private $senha = ''; //localhost
		
		//data base
		private $database = 'gi_reports';
		
		public function conecta_mysql(){
			
			//conection to db
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
			
			//define a charset between app e db
			mysqli_set_charset($con, 'UTF8');
			
			//verifies if there was a connection error
			if(mysqli_connect_errno()){
				echo 'Error trying to connect to database: '.mysqli_connect_error();
			}
			
			return $con;
			
		}
		
	}

?>