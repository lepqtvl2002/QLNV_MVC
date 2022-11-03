<?php 
require_once 'controllers/Controller.php';
class PhongBanController extends Controller { 
    function __construct() {
    }
    
    function Index($args = []){
        $model = $this->model('PhongBanModel');
        $data = $model->getList($args);
        $view = $this->render('PhongBan', 'danhSachPhongBan');
        return ['view'=>$view,'data'=>$data];
    }

    function Detail($idpb = 1) {
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        $nhanviens = $model->getNhanVien($idpb);
        $data['nhanviens'] = $nhanviens;
        $view = $this->render('PhongBan', 'chiTietPhongBan');
        return ['view'=>$view,'data'=>$data];
    }

    function Create() {
        $view = $this->render('PhongBan', 'themPhongBan');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelCreate($args) {
        $model = $this->model('PhongBanModel');
        $result = $model->create($args);
        if ($result) {
            header("Location:".__INDEX_LOCATION__."/PhongBan");
        } else {
            echo "ERROR";
        }
    }

    function Edit($idpb = 1) {
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        $view = $this->render('PhongBan', 'chinhSuaPhongBan');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelEdit($args){
        $model = $this->model('PhongBanModel');
        $result = $model->edit($args);
        if($result){
            header("Location:".__INDEX_LOCATION__."/PhongBan");
        } else {
            echo "ERROR";
        }
    }

    function Delete($idpb = 1) {
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        $view = $this->render('PhongBan', 'xoaPhongBan');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelDelete($idpb){
        $model = $this->model('PhongBanModel');
        $result = $model->delete($idpb);
        if($result){
            header("Location:".__INDEX_LOCATION__."/PhongBan");
        } else {
            echo "ERROR";
        }
    }
}
?>