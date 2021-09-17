<?php 

	require 'SrvLogin.php';

	$instance = new SrvLogin();

	if (isset($_POST['getGroupBits'])) {
		$gb = $instance->getGroupBits();

		echo json_encode($gb);

		return;
	}

   

	if (isset($_POST['getRealName'])) {
		$gb = $instance->getRealName();

		echo utf8_encode($gb);

		return;
	}

	if (isset($_POST['getPuesto'])) {
		$gb = $instance->getPuesto();

		echo utf8_encode($gb);

		return;
	}

	if (isset($_POST['getZona'])) {
		$gb = $instance->getZona();
		echo json_encode($gb);
		return;
	}


	if (isset($_POST['getEmail'])) {
		$gb = $instance->getEmail();
		echo json_encode($gb);
		return;
	}

	if (isset($_POST['getFechaI'])) {
		$gb = $instance->getFechaI();
		echo json_encode($gb);
		return;
	}


///////////////////////////////////////////////////////////////
	if (isset($_POST['getVacaciones'])) {
		$gb = $instance->getVacaciones();
		echo json_encode($gb);
		return;
	}


	if (isset($_POST['getVacacionesUsadas'])) {
		$gb = $instance->getVacacionesUsadas();
		echo json_encode($gb);
		return;
	}



	if (isset($_POST['getVacacionesEstatus'])) {
		$gb = $instance->getVacacionesEstatus();
		echo json_encode($gb);
		return;
	}
/////////////////////////////////////////////////////////////

	if (isset($_POST['updateAntiguedad'])) {
		$instance->updateAntiguedad($_POST['anti2']);
	}

    if (isset($_POST['updateVacaciones'])){
		$instance->updateVacaciones($_POST['vacaNuevas'], $_POST['estatusNuevo']);
	}

if(isset($_POST['getVacacionesInfoUser'])){
  $inst->getVacacionesInfoUser();

}
	

	if (isset($_POST['resetSession'])) {
		$instance->destroySessionData();	
		return;	
	}	

	if(!$instance->userExist($_POST['user'])){
		echo json_encode("001");
		return;
	}

	if(!$instance->userActive($_POST['user'])){
		echo json_encode("006");
		return;
	}

	if ($instance->engineLogin($_POST['user'], $_POST['pass'])) {
		echo json_encode("004");
		

	}else{

		echo json_encode("002");
		
		return;
	}


?>