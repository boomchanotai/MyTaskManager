<?php
    include_once 'sys/engine.php'; 
    if(!isset($_SESSION['username'])){
        header("location: backend.php");
    } else {
    include_once 'header.include.php';
?>

    <div class="container">
        <h3>Task Manager</h3>
        <a href="backend.add.php"><button class="btn btn-submit">Add New Task</button></a>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่องาน</th>
                    <th>เจ้าของงาน</th>
                    <th>กำหนดส่ง</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
    $sql = $datamanager->getTasks();
    foreach ($sql as $key => $item) {
?>
                <tr>
                    <td><?php echo $key +1; ?></td>
                    <td><?php echo $item[1]; ?></td>
                    <td><?php echo $item[2]; ?></td>
                    <td><?php echo $item[3]; ?></td>
                    <td>
                        <a href="backend.show.php?id=<?php echo $item[0]; ?>"><button class="btn btn-show">show</button></a>
                        <a href="backend.edit.php?id=<?php echo $item[0]; ?>"><button class="btn btn-edit">edit</button></a>
                        <button id="btn-done-task-<?php echo $item[0]; ?>" class="btn btn-done">done</button>
                    </td>
                </tr>
<?php
    }
?>
            </tbody>
        </table>
    </div>
    <footer>
        <div>
            Copyright © 2020 All Right Reserved. <br>
            Create & Design by Chanotai Krajeam. <br>
            <a href="index.php">หน้าแรก, </a>
            <a href="logout.php">logout</a>
        </div>
    </footer>
<?php
    include_once 'footer.include.php';
    }
?>