<?php
    include_once 'sys/engine.php'; 
    if(!isset($_SESSION['username'])){
        header("location: backend.php");
    } else {
    include_once 'header.include.php';
?>
    <div class="container">
        <div>
            <a href="backend.index.php"><button class="btn btn-done">< Back </button></a>
            <h3 style="display: inline;">Add New Task</h3>
        </div>
        <div class="inner">
                <div>
                    <label for="add-name">ชื่องาน</label>
                    <input type="text" id="add-name" placeholder="ชื่องาน">
                </div>
                <div>
                    <label for="add-owner">เจ้าของงาน</label>
                    <input type="text" id="add-owner" placeholder="เจ้าของงาน">
                </div>
                <div>
                    <label for="add-deadline">กำหนดส่งงาน</label>
                    <input type="date" id="add-deadline" placeholder="กำหนดส่งงาน">
                </div>
                <div>
                    <label for="add-detail">รายละเอียด</label><br>
                    <textarea id="add-detail" placeholder="รายละเอียด" oninput="auto_grow(this)"></textarea>
                </div>
                <div>
                    <button class="btn btn-submit" id="add-task">Add</button>
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
?>