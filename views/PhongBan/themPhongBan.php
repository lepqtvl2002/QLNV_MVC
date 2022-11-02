<?php
if ($_SESSION["adminId"] == "") header("Location: http://localhost/chuong_php/QLNV/views/Auth/login");
?>
<form action="" method="post" class="container">
    <h2>Thêm phòng ban</h2>
    <label>Tên phòng ban</label>
    <input type="text" name="tenpb"/>
    <br/>

    <label>Mô tả</label>
    <input type="text" name="mota"/>
    <br/>
    
    <input class="btn btn-success" type="submit" value="Create" name="create_pb">  
    <a class="btn btn-outline-primary" href="./">Back</a>

</form>