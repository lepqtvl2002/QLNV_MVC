<?php

class NhanVienModel {

    function __construct() {
    }

    public function getList($args = []) {
        require('connect.php');
        
        $information = $args['information'];
        $selection = $args['selection'];
        if ($selection == "") $selection = "tennv";

        $sql = "SELECT * FROM $dbname.nhanvien 
        INNER JOIN $dbname.phongban ON $dbname.nhanvien.idpb=$dbname.phongban.idpb";

        if ($information || $information == 0) $sql .= " WHERE $selection LIKE '%$information%'";
        
        $arr = array();
        
        try {
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $element = array();
                    $element['idnv'] = $row['idnv'];
                    $element['tennv'] = $row['tennv'];
                    $element['tenpb'] = $row['tenpb'];
                    $element['diachi'] = $row['diachi'];
                    
                    $arr[] = $element;
                }
            } else {
                echo "0 results";
            }
        } catch (Exception $e) {
            echo "$sql; ";
            echo $e;
        }
        
        // Close connect      
        $conn->close();
        
        return $arr;
    }
    
    public function getDetail($idnv = 1) {
        require('connect.php');
        $sql = "SELECT * FROM $dbname.nhanvien
        INNER JOIN $dbname.phongban ON $dbname.nhanvien.idpb=$dbname.phongban.idpb
        WHERE idnv=$idnv";

        $result = $conn->query($sql);
        $record = $result->fetch_assoc();
        
        // Close connect      
        $conn->close();

        return $record;
    }

    public function create($args) {
        require('connect.php');

        $tennv=$args['tennv'];
        $idpb=$args['idpb'];
        $diachi=$args['diachi'];

        $sql = "INSERT INTO $dbname.nhanvien VALUES (NULL ,'$tennv', '$idpb', '$diachi')";

        $result = false;
        try {
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo $e;
        }
        
        // Close connect      
        $conn->close();

        return $result;
    }

    public function edit($args) {
        require('connect.php');

        $idnv=$args['idnv'];
        $tennv=$args['tennv'];
        $idpb=$args['idpb'];
        $diachi=$args['diachi'];

        $sql = "UPDATE $dbname.nhanvien SET tennv='$tennv', idpb='$idpb', diachi='$diachi' WHERE idnv=$idnv";

        $result = false;
        try {
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo $e;
        }
        
        // Close connect      
        $conn->close();
        return $result;
    }

    public function delete($idnv) {
        require('connect.php');

        $sql = "DELETE FROM $dbname.nhanvien WHERE idnv='$idnv'";

        $result = false;
        try {
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo $e;
        }
        
        // Close connect      
        $conn->close();
        return $result;
    }

    public function deleteAll($args) {
        require('connect.php');

        $result = true;

        foreach ($args as $key => $value) {
            $sql = "DELETE FROM $dbname.nhanvien WHERE idnv='$value'";
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

?>