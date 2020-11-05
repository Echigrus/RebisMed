<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header('Location: http://f90443p8.beget.tech/index.php');
?>