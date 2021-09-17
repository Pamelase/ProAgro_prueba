<?php
	require 'config.inc.php';


	class DAO extends Conection{

		function __construct(){
			$this->startConection();
		}

		public function daoQuery($sql, $params = null, $aditionalOptions = null){
			try{
				$this->isEmpty($sql);
			}catch(Exception $e){
				echo $e->getMessage();
			}

			$query = sqlsrv_query($this->con, $sql, $params, $aditionalOptions);

			if( $query === false ) {
			    die( print_r( sqlsrv_errors(), true));
			}

			$toReturn = array();

			while($array = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
				$toReturn[] = $array;
			}

			return $toReturn;
		}

		public function daoTransact($sql, $params){
			try {
				$this->isEmpty($sql);
				$this->isEmpty($params);
			} catch (Exception $e) {
				die($e->getMessage());
			}

			$query = sqlsrv_query($this->con, $sql, $params);
			if( $query === false ) {
			    die( print_r( sqlsrv_errors(), true) );
			}

		}

		public function isEmpty($parameter){
			if(is_array($parameter)){
				if (count($parameter) <= 0) {
					throw new Exception("Fatal error, array parameter is empty", 1);
				}
			}else{
				if($parameter === ""){
					throw new Exception("Faltal error, missing statement", 1);
					
				}else{
					return $parameter;
				}
			}
		}
	}

?>
