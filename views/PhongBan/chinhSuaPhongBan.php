<?php 
if ($_SESSION["adminId"] == "") header("Location:".__LOGIN_LOCATION__);

    $idpb = $data['idpb'];
    $tenpb = $data['tenpb'];    
    $mota = $data['mota'];
?>
<div class="container">
    <form action="" method="POST">
        <h2>EDITING</h2>
        <label>Tên phòng ban</label>
        <input type="text" value="<?php echo $tenpb; ?>" name="tenpb"/>
        <br/>
        
        <label>Mô tả</label>
        <input type="text" value="<?php echo $mota; ?>" name="mota"/>
        <br/>

        <hr/>
        
        <input class="btn btn-success" type="submit" value="Update" name="edit_pb">
        <a class="btn btn-outline-primary" href="../">Back</a>

    </form>
</div>