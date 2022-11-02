<?php
session_start();
?>
<div class="container">
    <button class="btn btn-link" onclick="navigate('NhanVien')">Danh sách nhân viên</button>
    <button class="btn btn-link" onclick="navigate('PhongBan')">Xem phòng ban</button>
    <?php
        if ($_SESSION['adminId'] != "") 
            echo '<button class="btn btn-link" onclick="navigate(\'NhanVien\',\'Create\')">Thêm nhân viên</button>',
            '<button class="btn btn-link" onclick="navigate(\'PhongBan\',\'Create\')">Thêm phòng ban</button>',
            '<button class="btn btn-link" onclick="navigate(\'NhanVien\',\'Choices\',)">Xóa nhiều</button>';
    ?>
</div>