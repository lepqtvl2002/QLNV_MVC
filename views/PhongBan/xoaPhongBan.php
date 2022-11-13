<?php 
if ($_SESSION["adminId"] == "") header("Location:".__LOGIN_LOCATION__);

    $idpb = $data['idpb'];
    $tenpb = $data['tenpb'];    
    $mota = $data['mota'];
?>
<div class="container">
    <form action="" method="POST">
        <h2>DELETE</h2>
        <h4>Ban co chac chan muon xoa ban ghi nay?</h4>
        
        <b>Thêm phòng ban : </b>
        <span><?php echo $tenpb; ?></span>
        <br/>
        
        <b>Mô tả : </b>
        <span><?php echo $mota; ?></span>
        <br/>

        <hr/>
        
        <input class="btn btn-danger" type="submit" value="Delete" name="delete_pb">
        <a class="btn btn-outline-primary" href="../">Back</a>

    </form>
</div>