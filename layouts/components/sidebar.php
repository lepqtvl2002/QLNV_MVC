<?php
session_start();
?>
<form action="" method="post" class="container">
    <input class="btn btn-link" type="submit" value="Danh sách nhân viên" name="danhSachNhanVien">
    <input class="btn btn-link" type="submit" value="Xem phòng ban" name="danh_sach_phong_ban">
    <?php
        if ($_SESSION['adminId'] != "") 
            echo '<input class="btn btn-link" type="submit" value="Thêm nhân viên" name="them_nhan_vien"/>',
            '<input class="btn btn-link" type="submit" value="Thêm phòng ban" name="them_phong_ban">',
            '<input class="btn btn-link" type="submit" value="Xóa nhiều" name="chon_nhieu">';
    ?>
</form>