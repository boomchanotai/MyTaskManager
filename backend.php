<?php
    include_once 'sys/engine.php'; 
    if(isset($_SESSION['username'])){
        header("location: backend.index.php");
    } else {
        include_once 'header.include.php';
?>

    <div class="container">
        <div class="signin shadow">
            <div class="back"><a href="index.php">X</a></div>
            <h3>Admin</h3>
            <div>
                <label for="username">Username : </label>
                <input type="text" id="username" placeholder="Username">
            </div>
            <div>
                <label for="password">Password : </label>
                <input type="password" id="password" placeholder="Password">
            </div>
            <div><button class="btn btn-submit" id="signin">Sign in</button></div>
        </div>
    </div>

<?php
        include_once 'footer.include.php';
    }
?>