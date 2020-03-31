<?php
    include_once 'sys/engine.php';
    if(!isset($_SESSION['username'])){
        header("location: backend.php");
    } else {

        $getList = $datamanager->getTaskList();

        if(!isset($_GET['id'])){
            header("location: backend.php");
        } elseif($_GET['id'] > $getList) {
            header("location: backend.php");
        } elseif($_GET['id'] <= 0){
            header("location: backend.php");
        } else {
    include_once 'header.include.php';

    $sql = $datamanager->getTaskInfo($_GET['id']);
?>

    <div class="container">
        <div class="task">
            <h3>Task Number #<?php echo $_GET['id']; ?></h3>
            <div>ชื่องาน : <?php echo $sql['name']; ?></div>
            <div>ลูกค้า : <?php echo $sql['customer']; ?></div>
            <div>Deadline : <?php echo $sql['deadline']; ?></div>
            <div>รายละเอียด :</div>
            <div class="description"><?php echo $sql['description']; ?></div>
            <div class="button">
                <a href="backend.index.php"><button class="btn btn-done">Back</button></a>
            </div>
        </div>
    </div>
    <footer>
        <div>
            Copyright © 2020 All Right Reserved. <br>
            Create & Design by Chanotai Krajeam. <br>
            <a href="index.php">หน้าแรก</a>
        </div>
    </footer>
<?php
    include_once 'footer.include.php';
    }
    }
?>