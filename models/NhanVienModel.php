<?php
require_once 'Model.php';
class NhanVienModel extends Model
{

    function __construct()
    {
    }

    public function getList($args = [])
    {
        $information = $args['information'];
        $selection = $args['selection'];
        if ($selection == "") $selection = "tennv";

        $sql = "SELECT idnv, tennv, tenpb, diachi FROM DU_LIEU.nhanvien 
        INNER JOIN DU_LIEU.phongban ON DU_LIEU.nhanvien.idpb=DU_LIEU.phongban.idpb";

        if ($information || $information == 0) $sql .= " WHERE $selection LIKE '%$information%'";
        
        $arr = $this->ExecuteReader($sql);

        return $arr;
    }

    public function getDetail($idnv = 1)
    {
        $sql = "SELECT * FROM DU_LIEU.nhanvien
        INNER JOIN DU_LIEU.phongban ON DU_LIEU.nhanvien.idpb=DU_LIEU.phongban.idpb
        WHERE idnv=$idnv";

        $record = $this->ExecuteScalar($sql);

        return $record;
    }

    public function create($args)
    {
        
        $tennv = $args['tennv'];
        $idpb = $args['idpb'];
        $diachi = $args['diachi'];
        
        $sql = "INSERT INTO DU_LIEU.nhanvien VALUES (NULL ,'$tennv', '$idpb', '$diachi')";

        $result = $this->ExecuteNonQuery($sql);
        return $result;
    }

    public function edit($args)
    {
        
        $idnv = $args['idnv'];
        $tennv = $args['tennv'];
        $idpb = $args['idpb'];
        $diachi = $args['diachi'];
        
        $sql = "UPDATE DU_LIEU.nhanvien SET tennv='$tennv', idpb='$idpb', diachi='$diachi' WHERE idnv=$idnv";
        
        $result = $this->ExecuteNonQuery($sql);
        return $result;
    }

    public function delete($idnv)
    {
        $sql = "DELETE FROM DU_LIEU.nhanvien WHERE idnv='$idnv'";

        $result = $this->ExecuteNonQuery($sql);
        return $result;
    }

    public function deleteAll($args)
    {
        require('connect.php');

        $result = true;

        foreach ($args as $key => $value) {
            $sql = "DELETE FROM DU_LIEU.nhanvien WHERE idnv='$value'";
            if ($conn->query($sql) === false) {
                $result = false;
                break;
            }
        }

        // Close connect      
        $conn->close();

        return $result;
    }
}
