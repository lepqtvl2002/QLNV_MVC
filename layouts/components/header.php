<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a onclick="navigate()" class="btn navbar-brand">Trang chủ</a>
        
        <form action="" method="post" class="d-flex">
            <?php
            if ($_SESSION['adminId'] == "") echo '<button type="button" class="btn btn-success" onclick="navigate(\'Auth\', \'Login\')">Đăng nhập</button>';
            else echo "<button type='submit' name='logout' class='btn btn-danger'>Đăng xuất</button>";
            ?>
        </form>

    </div>

</nav>