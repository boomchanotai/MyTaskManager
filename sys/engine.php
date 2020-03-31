<?php
    session_start();
    $conn = new mysqli ("localhost", "root", "", "taskmanager");
    require_once 'datamanager.php';
    $datamanager = new datamanager($conn);

?>