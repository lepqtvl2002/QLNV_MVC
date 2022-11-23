<?php
include_once 'Model.php';
class PhongBanModel extends Model {

    function __construct() {
    }
    
    public function getList($args = []) {
        $information = $args['information'];

        $sql = "SELECT * FROM DU_LIEU.phongban";
        if ($information || $information == 0) $sql .= " WHERE tenpb LIKE '%$information%'
        OR mota LIKE '%$information%'";
        
        $arr = $this->ExecuteReader($sql);
        return $arr;
    }

    public function getNhanVien($idpb = 1) {
        $sql = "SELECT * FROM DU_LIEU.nhanvien WHERE idpb=$idpb";

        $arr = $this->ExecuteReader($sql);
        return $arr;
    }
    
    public function getDetail($idpb = 1) {
        $sql = "SELECT * FROM DU_LIEU.phongban WHERE idpb=$idpb";
        
        $record = $this->ExecuteScalar($sql);
        return $record;
    }   

    public function create($args) {
        $tenpb = $args['tenpb'];
        $mota = $args['mota'];

        $sql = "INSERT INTO DU_LIEU.phongban VALUES (NULL, '$tenpb', '$mota')";
        
        $result = $this->ExecuteNonQuery($sql);
        return $result;
    }

    public function edit($args) {
        $idpb = $args['idpb'];
        $tenpb = $args['tenpb'];
        $mota = $args['mota'];

        $sql = "UPDATE DU_LIEU.phongban SET mota='$mota',tenpb='$tenpb' WHERE idpb = '$idpb'";
        
        $result = $this->ExecuteNonQuery($sql);
        return $result;
    }

    public function delete($idpb) {
        $sql = "DELETE FROM DU_LIEU.phongban WHERE idpb='$idpb'";
        
        $result = $this->ExecuteNonQuery($sql);
        return $result;
    }
}
?>