<?php
    include_once "sys/engine.php";

    unset($_SESSION['id']);
    unset($_SESSION['username']);
	unset($_SESSION['email']);
    session_destroy();

	header("location: index.php");
?>