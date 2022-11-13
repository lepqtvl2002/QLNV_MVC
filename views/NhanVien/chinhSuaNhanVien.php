<?php 
if ($_SESSION["adminId"] == "") header("Location:".__LOGIN_LOCATION__);

    $idnv = $data['idnv'];
    $tennv = $data['tennv'];    
    $tenpb = $data['tenpb'];
    $diachi = $data['diachi'];    
?>
<div class="container">
    <form action="" method="POST">
        <h2>EDITING</h2>
        <label>Họ và tên</label>
        <input type="text" value="<?php echo $tennv; ?>" name="tennv"/>
        <br/>
        
        <label>Phòng ban</label>
        <select name="idpb" id="idpb">
        <?php
            foreach ($data['phongbans'] as $key => $value) {
                if ($value['tenpb'] == $tenpb)
                echo "<option selected value='" . $value['idpb'] . "'> " . $value['tenpb'] . "</option>";
                else 
                echo "<option value='" . $value['idpb'] . "'> " . $value['tenpb'] . "</option>";
            }
        ?>
        </select>
        <br/>
        
        <label>Địa chỉ</label>
        <input type="text" value="<?php echo $diachi; ?>" name="diachi"/>
        <br/>

        <hr/>
        
        <input class="btn btn-success" type="submit" value="Update" name="edit">
        <a class="btn btn-outline-primary" href="../">Back</a>

    </form>
</div>