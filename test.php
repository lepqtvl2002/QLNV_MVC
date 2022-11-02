<?php
$string = $_SERVER['PHP_SELF']; 
echo $string;
$arr = explode('/', $string);
foreach ($arr as $key => $value) {
    echo $value."<br/>";
}

require_once 'controllers/NhanVienController.php';
$Controller = new NhanVienController();
$h = $Controller->Index();
echo $h['view'];
$data = $h['data'];
include $h['view'];

?>