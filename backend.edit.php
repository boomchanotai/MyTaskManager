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
        <div>
            <a href="backend.index.php"><button class="btn btn-done">< Back </button></a>
            <h3 style="display: inline;">Edit Task</h3>
        </div>
        <div class="inner">
                <input type="hidden" id="edit-id" value="<?php echo $sql['id']; ?>">
                <div>
                    <label for="edit-name">ชื่องาน</label>
                    <input type="text" id="edit-name" placeholder="ชื่องาน" value="<?php echo $sql['name']; ?>">
                </div>
                <div>
                    <label for="edit-owner">เจ้าของงาน</label>
                    <input type="text" id="edit-owner" placeholder="เจ้าของงาน" value="<?php echo $sql['customer']; ?>">
                </div>
                <div>
                    <label for="edit-deadline">กำหนดส่งงาน</label>
                    <input type="date" id="edit-deadline" placeholder="กำหนดส่งงาน" value="<?php echo $sql['deadline']; ?>">
                </div>
                <div>
                    <label for="edit-detail">รายละเอียด</label><br>
                    <textarea id="edit-detail" rows="10" placeholder="รายละเอียด" oninput="auto_grow(this)"><?php echo $sql['description']; ?></textarea>
                </div>
                <div>
                    <button class="btn btn-submit" id="edit-task">save</button>
                </div>
        </div>
    </div>
    <footer>
        <div>
            Copyright © 2020 All Right Reserved. <br>
            Create & Design by Chanotai Krajeam. <br>
            <a href="index.php">หน้าแรก, </a>
            <a href="logout.php">logout</a>
        </div>
    </footer>
    <script>
        function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
    </script>
<?php
    include_once 'footer.include.php';
    }
    }
?>