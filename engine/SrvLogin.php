<?php
	require 'dao.php';

	class SrvLogin extends DAO{

		function __construct(){
			$this->startConection();
		}
		public function userExist($username){
			if($username == ""){
				die("Parameter 'username' is empty");
			}

			$resultSet = $this->daoQuery("select count(*) n from usuario where RFC = ?", array($username));

			if($resultSet[0]['n'] == '0'){
				return false;
			}

			if($resultSet[0]['n'] == '1'){
				return true;
			}
		}

		public function userActive($username){
			if($username == ""){
				die("Parameter 'username' is empty");
			}

			$resultSet = $this->daoQuery("select count(*) n from usuario where RFC = ?", array($username));

			if($resultSet[0]['n'] == '0'){
				return false;
			}

			if($resultSet[0]['n'] == '1'){
				return true;
			}
		}


		public function engineLogin($username, $password){
			if($username == "" && $password == ""){
				die("Invalid Parameters");
			}

			$resultSet = $this->daoQuery("SELECT COUNT(*) n FROM Usuario where RFC = (?)  and Contrasena = (?)", array($username, $password));

			if ($resultSet[0]['n'] == 1) {
				return true;
			}

			if ($resultSet[0]['n'] < 1) {
				return false;
			}
		}


      
       
		public function destroySessionData(){
			session_start();
			session_destroy();
		}


		public function getGroupBits(){
			session_start();
			return $_SESSION['bits'];
		}

		public function getPuesto(){
			session_start();
			return $_SESSION['puesto'];
		}

		public function getRealName(){
			session_start();
			return $_SESSION['name'];
		}

		public function getZonaR(){
			session_start();
			return $_SESSION['zona'];
		}


		public function getFechaI(){
			session_start();
			return $_SESSION['fi'];
		}

		public function getVacaciones(){
			session_start();
			return $_SESSION['dv'];
		}

		public function getVacacionesUsadas(){
			session_start();
			return $_SESSION['du'];
		}

		public function getVacacionesEstatus(){
			session_start();
			return $_SESSION['est'];
		}

		public function getEmail(){
			session_start();
			return $_SESSION['email'];
		}

		public function getImageSession(){
			session_start();
			return $_SESSION['imagen'];
		}



		public function updateAntiguedad($anti2){
		if (!isset($_SESSION)) {
			session_start();
		}

		$idUsuario = $_SESSION['userID'];

			$this->daoQuery("update USUARIOS set
											 antiguedad= ?
											 where id_usuario = ?", array($anti2, $idUsuario));
		}


		public function updateVacaciones($vacaNuevas, $estatusNuevo){
		if (!isset($_SESSION)) {
			session_start();
		}

		$idUsuario = $_SESSION['userID'];

			$this->daoQuery("update INFORMACION_VACACIONES set dias_disponibles= ?,
											 				   estatus = ?
											 				   where USUARIOS_id_usuario = ?", array($vacaNuevas, $estatusNuevo , $idUsuario));
		}

public function getVacacionesInfoUser(){
    if(!isset($_SESSION)){
     session_start();
    }

   $idUsuario = $_SESSION['userID'];
  
   $datos = $this->daoQuery("SELECT u.nombre_completo nc,
									                  i.dias_disponibles dd,
									                  i.dias_usados du
       							        FROM INFORMACION_VACACIONES i 
			              				      INNER JOIN USUARIOS u ON u.id_usuario = i.USUARIOS_id_usuario
     					              WHERE i.USUARIOS_id_usuario= ? ", array($idUsuario));

  $json = array();
  foreach ($datos as $key) {
  $json[] = array('nc' => $key['nc'],
                  'dd' => $key['dd'],
                  'du' => $key['du']);
}

echo json_decode($json);
}



	}

?>
