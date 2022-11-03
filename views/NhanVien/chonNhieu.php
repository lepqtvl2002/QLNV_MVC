<?php
if ($_SESSION["adminId"] == "") header("Location:".__LOGIN_LOCATION__);
?>
<div class="container">
    <h2>Danh sách nhân viên</h2>
    <form action="" method="post">
        <table style="width:100%;">
            <thead style="text-align:left;">
                <tr>
                    <th>Id</th>
                    <th>Họ và tên</th>
                    <th>Phòng ban</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                <div class="container">
                    <button class="btn btn-danger" type="submit" name="delete_all">Xóa</button>
                    <button class="btn btn-success" type="button" onclick="SelectAll()">Chọn tất cả</button>
                    <button class="btn btn-warning" type="reset">Bỏ chọn tất cả</button>
                    <a class="btn btn-primary" href="./">Trở về</a>
                </div>
                <?php
                foreach ($data as $index => $arr) {
                    echo "<tr>";
                    foreach ($arr as $key => $value) {
                        echo "<td>{$value}</td>";
                    }
                    echo "<td>"
                    ."<input class='checkbox' type='checkbox' name='st[]' value='{$arr['idnv']}'>"
                    ."</td>";
                    echo "</tr>";
                } 
                ?>
            </tbody>
        </table> 
    </form>
</div>
<script>
    function SelectAll() {
        const checkboxes = document.querySelectorAll('.checkbox');
        checkboxes.forEach(checkbox => {checkbox.checked = true;});
    }
</script>
