<?php
class Model{
    public function ExecuteScalar($sql){
        require('connect.php');

        $result = $conn->query($sql);
        $record = $result->fetch_assoc();

        // Close connect      
        $conn->close();

        return $record;
    }

    public function ExecuteReader($sql) {
        require('connect.php');
        
        $arr = array();
        
        try {
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $element = array();
                    foreach ($row as $key => $value) {
                        $element[$key] = $value;                        
                    }
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

    public function ExecuteNonQuery($sql) {
        $result = false;
        require('connect.php');
        try {
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo $e;
        }

        // Close connect      
        $conn->close();
        return $result;
    }
}
?>