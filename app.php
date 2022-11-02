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
    $layout = " ";
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

function controller($controllerName) {
    require_once "controllers/{$controllerName}.php";
    $controller = new $controllerName();
    return $controller;
}

// Dang Nhap
if (isset($_POST['login'])) {
    $AuthController = controller('AuthController');
    $args = array();
    $args['username'] = $_POST['username'];
    $args['password'] = $_POST['password'];
    $AuthController->HandelLogin($args);
    $layout = " ";
}

// Dang Xuat
if (isset($_POST['logout'])) {
    $AuthController = controller('AuthController');
    $AuthController->Logout();
}

// Them Phong Ban
if (isset($_POST['create_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['tenpb'] = $_POST['tenpb'];
    $args['mota'] = $_POST['mota'];
    $PhongBanController->HandelCreate($args);
}

// Chinh Sua Phong Ban
if (isset($_POST['edit_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['idpb'] = $_POST['idpb'];
    $args['tenpb'] = $_POST['tenpb'];
    $args['mota'] = $_POST['mota'];
    $PhongBanController->HandelEdit($args);
}

// Xoa Phong Ban
if (isset($_POST['delete_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $idpb = $_POST['idpb'];
    $PhongBanController->HandelDelete($idpb);
}

// Tim Kiem Phong Ban
if (isset($_POST['search_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['information'] = $_POST['information'];

    $returned = $PhongBanController->Index($args);
    $data = $returned['data'];
    $view = $returned['view'];
}

// Them Nhan Vien
if (isset($_POST['create'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];

    $NhanVienController->HandelCreate($args);
}

// Tim Kiem Nhan Vien
if (isset($_POST['search_nv'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['information'] = $_POST['information'];
    $args['selection'] = $_POST['selection'];
    $returned = $NhanVienController->Index($args);
    $data = $returned['data'];
    $view = $returned['view'];
}

// Chinh Sua Nhan Vien
if (isset($_POST['edit'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['idnv'] = $_POST['idnv'];
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];
    $NhanVienController->HandelEdit($args);
}
// Xoa Nhan Vien
if (isset($_POST['delete'])) {
    $NhanVienController = controller("NhanVienController");
    $idnv = $_POST['idnv'];
    $NhanVienController->HandelDelete($idnv);
}

// Xoa Nhieu Nhan Vien
if (isset($_POST['delete_all'])) {
    $NhanVienController = controller("NhanVienController");
    $args = $_POST['st'];
    $NhanVienController->HandelDeleteAll($args);
}
?>