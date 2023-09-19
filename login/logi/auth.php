<?php
	//inicio de sesion
	session_start();
	//validacion de los datos
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: index.php");
		exit();
	}
?>