<button onclick="navigation('NhanVien')">Chuyen</button>
<?php
$url = $_SERVER['PATH_INFO'];
if (empty($url)) {
    $url='/';
} 
echo $url."<br/>";
$arr = explode('/', $url);
$urlArr = array_filter($arr);
$urlArr = array_values($urlArr);

foreach($urlArr as $key => $value) {
    echo $value."<br/>";
}

$controller = $urlArr[0]."Controller";

if ($urlArr[1]) {
    $action = $urlArr[1];
} else {
    $action = "Index";
}

require_once "controllers/{$controller}.php";
$controller = new $controller();
$args = ['thang', 'diachi'];
$h = call_user_func([$controller, $action], $args);
// $h = $controller->Index();
echo $h['view'];
$data = $h['data'];
include $h['view'];

echo '<button onclick="navigation(\'PhongBan\')">Chuyen</button>';

?>
<script>
    function navigation(model){
        location.href = '/chuong_php/QLNV/test/' + model;
    }

</script>