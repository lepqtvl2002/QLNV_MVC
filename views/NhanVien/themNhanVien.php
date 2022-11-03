<?php
if ($_SESSION["adminId"] == "") header("Location:".__LOGIN_LOCATION__);
?>
<form action="" method="post" class="container">
    <h2>Thêm nhân viên</h2>
    <label>Họ tên</label>
    <input type="text" name="tennv" required/>
    <br/>
    
    <label>Phòng ban</label>
    <select name="idpb" id="idpb">
        <?php
            foreach ($data as $key => $value) {
                echo "<option value='" . $value['idpb'] . "'> " . $value['tenpb'] . "</option>";
            }
        ?>
    </select>
    <br/>
    
    <label>Địa chỉ</label>
    <input type="text" name="diachi" required/>
    <br/>
    
    <input class="btn btn-success" type="submit" value="Create" name="create">  
    <a class="btn btn-outline-primary" href="./">Back</a>

</form>