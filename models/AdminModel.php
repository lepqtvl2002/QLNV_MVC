<?php
include_once 'Model.php';
class AdminModel extends Model{
    function __construct() {
    }
    
    public function getList() {
        
        $sql = "SELECT * FROM DU_LIEU.adminpb"; 
        
        $arr = $this->ExecuteReader($sql);
        
        return $arr;
    }
    
    public function getDetail($id = 1) {
        $sql = "SELECT * FROM DU_LIEU.adminpb WHERE id = $id";
        $record = $this->ExecuteScalar($sql);

        return $record;
    }
}

?>