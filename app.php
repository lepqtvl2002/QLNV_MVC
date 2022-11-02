<?php

function controller($controllerName) {
    require_once "controllers/{$controllerName}.php";
    $controller = new $controllerName();
    return $controller;
}

// Dang Nhap
if (isset($_POST['dang_nhap'])) {
    $AuthController = controller('AuthController');
    $AuthController->Login();
    $layout = " ";
}

else if (isset($_POST['login'])) {
    $AuthController = controller('AuthController');
    $args = array();
    $args['username'] = $_POST['username'];
    $args['password'] = $_POST['password'];
    $AuthController->HandelLogin($args);
    $layout = " ";
}

// Dang Xuat
else if (isset($_POST['dang_xuat'])) {
    $AuthController = controller('AuthController');
    $AuthController->Logout();
}

// Xem Phong Ban
else if (isset($_POST['danh_sach_phong_ban'])) {
    $PhongBanController = controller('PhongBanController');
    $returned = $PhongBanController->Index();
    $data = $returned['data'];
    $view = $returned['view'];
}

// Them Phong Ban
else if (isset($_POST['them_phong_ban'])) {
    $PhongBanController = controller('PhongBanController');
    $returned = $PhongBanController->Create();
    $data = $returned['data'];
    $view = $returned['view'];
}
else if (isset($_POST['create_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['tenpb'] = $_POST['tenpb'];
    $args['mota'] = $_POST['mota'];
    $PhongBanController->HandelCreate($args);
}

// Chinh Sua Phong Ban
else if (isset($_POST['chinh_sua_phong_ban'])) {
    $PhongBanController = controller('PhongBanController');
    $arg = $_POST['idpb'];
    $returned = $PhongBanController->Edit($arg);
    $data = $returned['data'];
    $view = $returned['view'];
}
else if (isset($_POST['edit_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['idpb'] = $_POST['idpb'];
    $args['tenpb'] = $_POST['tenpb'];
    $args['mota'] = $_POST['mota'];
    $PhongBanController->HandelEdit($args);
}

// Xoa Phong Ban
else if (isset($_POST['xoa_phong_ban'])) {
    $PhongBanController = controller('PhongBanController');
    $arg = $_POST['idpb'];
    $returned = $PhongBanController->Delete($arg);
    $data = $returned['data'];
    $view = $returned['view'];
}
else if (isset($_POST['delete_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $idpb = $_POST['idpb'];
    $PhongBanController->HandelDelete($idpb);
}

// Tim Kiem Phong Ban
else if (isset($_POST['search_pb'])) {
    $PhongBanController = controller('PhongBanController');
    $args = array();
    $args['information'] = $_POST['information'];

    $returned = $PhongBanController->Index($args);
    $data = $returned['data'];
    $view = $returned['view'];
}

// Xem Nhan Vien Co Trong Phong Ban
else if (isset($_POST['nhan_vien_phong_ban'])) {
    $PhongBanController = controller('PhongBanController');
    $arg = $_POST['idpb'];
    $returned = $PhongBanController->Detail($arg);
    $data = $returned['data'];
    $view = $returned['view'];
}

// Them Nhan Vien
else if (isset($_POST['them_nhan_vien'])) {
    $NhanVienController = controller("NhanVienController");
    $returned = $NhanVienController->Create();
    $data = $returned['data'];
    $view = $returned['view'];
}

else if (isset($_POST['create'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];

    $NhanVienController->HandelCreate($args);
}

// Tim Kiem Nhan Vien
else if (isset($_POST['search_nv'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['information'] = $_POST['information'];
    $args['selection'] = $_POST['selection'];
    $returned = $NhanVienController->Index($args);
    $data = $returned['data'];
    $view = $returned['view'];
}

// Chinh Sua Nhan Vien
else if (isset($_POST['chinh_sua_nhan_vien'])) {
    $NhanVienController = controller("NhanVienController");
    $arg = $_POST['idnv'];
    $returned = $NhanVienController->Edit($arg);
    $data = $returned['data'];
    $view = $returned['view'];
}

else if (isset($_POST['edit'])) {
    $NhanVienController = controller("NhanVienController");
    $args = array();
    $args['idnv'] = $_POST['idnv'];
    $args['tennv'] = $_POST['tennv'];
    $args['idpb'] = $_POST['idpb'];
    $args['diachi'] = $_POST['diachi'];
    $NhanVienController->HandelEdit($args);
}
// Xoa Nhan Vien
else if (isset($_POST['xoa_nhan_vien'])) {
    $NhanVienController = controller("NhanVienController");
    $arg = $_POST['idnv'];
    $returned = $NhanVienController->Delete($arg);
    $data = $returned['data'];
    $view = $returned['view'];
}

else if (isset($_POST['delete'])) {
    $NhanVienController = controller("NhanVienController");
    $idnv = $_POST['idnv'];
    $NhanVienController->HandelDelete($idnv);
}

// Chon Nhieu Nhan Vien
else if (isset($_POST['chon_nhieu'])) {
    $NhanVienController = controller("NhanVienController");
    $returned = $NhanVienController->Choices();
    $data = $returned['data'];
    $view = $returned['view'];
}

else if (isset($_POST['delete_all'])) {
    $NhanVienController = controller("NhanVienController");
    $args = $_POST['st'];
    $NhanVienController->HandelDeleteAll($args);
}

// Danh Sach Nhan Vien
else {
    $NhanVienController = controller("NhanVienController");
    $returned = $NhanVienController->Index();
    $data = $returned['data'];
    $view = $returned['view'];
}
?>