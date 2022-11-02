<?php 
require_once 'controllers/Controller.php';
class NhanVienController extends Controller {
    function __construct() {
    }
    
    public function Index($args = []){
        $model = $this->model('NhanVienModel');
        $data = $model->getList($args);
        $view = $this->render('NhanVien', 'danhSachNhanVien');
        return ['view'=>$view,'data'=>$data];
    }

    function Create(){
        $model = $this->model('PhongBanModel');
        $data = $model->getList();
        $view = $this->render('NhanVien', 'themNhanVien');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelCreate($args){
        $model = $this->model('NhanVienModel');
        $result = $model->create($args);
        if($result){
            header("Location: http://localhost/chuong_php/QLNV");
        } else {
            echo "ERROR";
        }
    }

    function Edit($idnv = 1) {
        $model = $this->model('NhanVienModel');
        $data = $model->getDetail($idnv);
        $model = $this->model('PhongBanModel');
        $phongbans = $model->getList();
        $data['phongbans'] = $phongbans;
        $view = $this->render('NhanVien', 'chinhSuaNhanVien');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelEdit($args){
        $model = $this->model('NhanVienModel');
        $result = $model->edit($args);
        if($result){
            header("Location: http://localhost/chuong_php/QLNV");
        } else {
            echo "ERROR";
        }
    }

    function Delete($idnv = 1) {
        $model = $this->model('NhanVienModel');
        $data = $model->getDetail($idnv);
        $view = $this->render('NhanVien', 'xoaNhanVien');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelDelete($idnv){
        $model = $this->model('NhanVienModel');
        $result = $model->delete($idnv);
        if($result){
            header("Location: http://localhost/chuong_php/QLNV");
        } else {
            echo "ERROR";
        }
    }

    function Choices(){
        $model = $this->model('NhanVienModel');
        $data = $model->getList();
        $view = $this->render('NhanVien', 'chonNhieu');
        return ['view'=>$view,'data'=>$data];
    }

    function HandelDeleteAll($args){
        $model = $this->model('NhanVienModel');
        $result = $model->deleteAll($args);
        if($result){

        } else {
            echo "ERROR";
        }
    }
}
?>