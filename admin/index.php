<?php
	session_start();
	if (isset($_SESSION["admin"])) {
		header("location: ../menu-admin.php");
	}  else {
		header("location: ../admin.php");
	}
?>