<?php

	class Conection{

		var $con;
		var $parameters = array("Database" => "PROAGRO", "UID" => "sa", "PWD" => "PameSelene", "ReturnDatesAsStrings" => true, "CharacterSet" => "UTF-8");
		var $serverName = "PAMEG\SQLEXPRESS";
		var $ipPublica = "";
		var $local = false;

		function __construct(){
			$this->startConection();
		}

		public function startConection(){
			$this->con = sqlsrv_connect($this->serverName, $this->parameters);
			if(!$this->con)
				die( print_r( sqlsrv_errors(), true));
			else
				return $this->con;
		}
	}

?>
