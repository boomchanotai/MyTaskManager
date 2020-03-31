<?php

    require_once 'datamanager.php';

    $datamanager = new datamanager($conn);

    if(isset($_POST['type'])){

        if($_POST['type'] == "login"){

            $username = $conn->real_escape_string($_POST['username']);
            $password = md5($conn->real_escape_string($_POST['password']));

            $datamanager->signin($username, $password);

        } elseif($_POST['type'] == "addtask") {
            
            $addname = $conn->real_escape_string($_POST['addname']);
            $addowner = $conn->real_escape_string($_POST['addowner']);
            $adddeadline = $conn->real_escape_string($_POST['adddeadline']);
            $adddetail = $conn->real_escape_string($_POST['adddetail']);

            $datamanager->addtask($addname, $addowner, $adddeadline, $adddetail);

        } elseif($_POST['type'] == "edittask") {

            $editid = $conn->real_escape_string($_POST['editid']);
            $editname = $conn->real_escape_string($_POST['editname']);
            $editowner = $conn->real_escape_string($_POST['editowner']);
            $editdeadline = $conn->real_escape_string($_POST['editdeadline']);
            $editdetail = $conn->real_escape_string($_POST['editdetail']);

            $datamanager->edittask($editid, $editname, $editowner, $editdeadline, $editdetail);
        } elseif($_POST['type'] == "getTaskList"){
            $sql = $datamanager->getTaskList();
            echo $sql;
        } elseif($_POST['type'] == "donetask"){
            $datamanager->doneTask($_POST['id']);
        }

    } else {
        header("location: ../index.php");
    }
?>