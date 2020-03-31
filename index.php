<?php
    include_once 'header.include.php';
?>
    <div class="container">
        <h2>Boom's Tasks manager</h2>
        <div class="item-list">
<?php
    $sql = $datamanager->getTasks();

    foreach ($sql as $key => $item) {
?>
            <div class="card">
                <h3><?php echo $key + 1 . ". " . $item[1]; ?></h3>
                <p>งานของ คุณ<?php echo $item[2]; ?></p>
                <p>กำหนดส่ง <?php echo $item[3]; ?></p>
            </div>
<?php
    }
?>
        </div>
    </div>
    <footer>
        <div>
            Copyright © 2020 All Right Reserved. <br>
            Create & Design by Chanotai Krajeam. <br>
            <a href="backend.php">ผู้ดูแลระบบ</a>
        </div>
    </footer>
<?php
    include_once 'footer.include.php';
?>