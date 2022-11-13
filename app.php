<?php
$url = $_SERVER['PATH_INFO'];
if (empty($url)) {
    $url='/';
} 

$arr = explode('/', $url);
$urlArr = array_filter($arr);
$urlArr = array_values($urlArr);

if ($urlArr[0]) {
    $controller = $urlArr[0]."Controller";
} else {
    $controller = "NhanVienController";
}

if ($controller === "AuthController") {
    $layout = $noLayout;
}

if ($urlArr[1]) {
    $action = $urlArr[1];
} else {
    $action = "Index";
}

if ($urlArr[2]) {
    $arg = $urlArr[2];
} else {
    $arg = [];
}

require_once "controllers/{$controller}.php";
$controller = new $controller();
$h = call_user_func([$controller, $action], $arg);

$data = $h['data'];
$view = $h['view'];

// Dang Xuat
if (isset($_POST['logout'])) {
    require_once "controllers/AuthController.php";
    $AuthController = new AuthController();
    $AuthController->Logout();
}
?>