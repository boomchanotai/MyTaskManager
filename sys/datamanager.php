<?php

    require_once 'engine.php';

    class datamanager {

        public function __construct($conn){
            $this->conn = $conn;
        }

        public function signin(string $username, string $password){
            $this->username = $username;
            $this->password = $password;

            $stmt = "SELECT * FROM users WHERE username='$username'";
            $stmt = $this->conn->query($stmt);
            
            if($stmt->num_rows == 1){
                $stmt = $stmt->fetch_assoc();
                if($stmt['password'] == $password){

                    $_SESSION['id'] = $stmt['id'];
                    $_SESSION['username'] = $stmt['username'];
                    $_SESSION['email'] = $stmt['email'];
                    echo "success";
                } else {
                    echo "wrong";
                }

            } else {
                echo "wrong";
            }

        }

        public function getTasks (){
            $sql = "SELECT * FROM tasks WHERE status = '0'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_all();

            return $sql;

        }

        public function addtask(string $addname, string $addowner, string $adddeadline, string $adddetail){

            $this->addname = $addname;
            $this->addowner = $addowner;
            $this->adddeadline = $adddeadline;
            $this->adddetail = $adddetail;

            $stmt = $this->conn->prepare("INSERT INTO tasks (name, customer, deadline, description, status) 
            VALUES (?, ?, ?, ?, 0)");
            $stmt->bind_param("ssss", $addname, $addowner, $adddeadline, $adddetail);
            $stmt->execute();
            echo "success";
        }

        public function edittask(int $editid, string $editname, string $editowner, string $editdeadline, string $editdetail){

            $this->editid = $editid;
            $this->editname = $editname;
            $this->editowner = $editowner;
            $this->editdeadline = $editdeadline;
            $this->editdetail = $editdetail;

            $sql = "UPDATE tasks SET name = '$editname', customer = '$editowner', deadline = '$editdeadline', description = '$editdetail' WHERE id = '$editid' ";
            $sql = $this->conn->query($sql);
            if($sql){
                echo "success";
            }
        }

        public function getTaskInfo (int $id){
            $this->id = $id;
            $sql = "SELECT * FROM tasks WHERE id='$id'";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            return $sql;
        }

        public function getTaskList (){
            $getList = "SELECT MAX(ID) FROM tasks";
            $getList = $this->conn->query($getList);
            $getList = $getList->fetch_all();
            $getList = $getList[0][0];
            return $getList;
        }

        public function doneTask (int $id){
            $this->id = $id;
            $sql = "UPDATE tasks SET status='1' WHERE id='$id'";
            $sql = $this->conn->query($sql);
            if($sql){
                echo "success";
            }
        }

    }

?>