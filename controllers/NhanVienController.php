<?php
require_once 'controllers/Controller.php';
class NhanVienController extends Controller
{
    function __construct()
    {
    }

    public function Index($args = [])
    {
        // Tim Kiem Nhan Vien
        if (isset($_POST['search_nv'])) {
            $args = array();
            $args['information'] = $_POST['information'];
            $args['selection'] = $_POST['selection'];
        }
        $model = $this->model('NhanVienModel');
        $data = $model->getList($args);
        $view = $this->render('NhanVien', 'danhSachNhanVien');
        return ['view' => $view, 'data' => $data];
    }

    function Create()
    {
        // Them Nhan Vien
        if (isset($_POST['create'])) {
            $args = array();
            $args['tennv'] = $_POST['tennv'];
            $args['idpb'] = $_POST['idpb'];
            $args['diachi'] = $_POST['diachi'];

            $this->HandelCreate($args);
        }
        $model = $this->model('PhongBanModel');
        $data = $model->getList();
        $view = $this->render('NhanVien', 'themNhanVien');
        return ['view' => $view, 'data' => $data];
    }

    function HandelCreate($args)
    {
        $model = $this->model('NhanVienModel');
        $result = $model->create($args);
        if ($result) {
            header("Location:" . __INDEX_LOCATION__);
        } else {
            echo "ERROR";
        }
    }

    function Edit($idnv = 1)
    {
        // Chinh Sua Nhan Vien
        if (isset($_POST['edit'])) {
            $args = array();
            $args['idnv'] = $idnv;
            $args['tennv'] = $_POST['tennv'];
            $args['idpb'] = $_POST['idpb'];
            $args['diachi'] = $_POST['diachi'];
            $this->HandelEdit($args);
        }
        $model = $this->model('NhanVienModel');
        $data = $model->getDetail($idnv);
        $model = $this->model('PhongBanModel');
        $phongbans = $model->getList();
        $data['phongbans'] = $phongbans;
        $view = $this->render('NhanVien', 'chinhSuaNhanVien');
        return ['view' => $view, 'data' => $data];
    }

    function HandelEdit($args)
    {
        $model = $this->model('NhanVienModel');
        $result = $model->edit($args);
        if ($result) {
            header("Location:" . __INDEX_LOCATION__);
        } else {
            echo "ERROR";
        }
    }

    function Delete($idnv = 1)
    {
        // Xoa Nhan Vien
        if (isset($_POST['delete'])) {
            $this->HandelDelete($idnv);
        }
        $model = $this->model('NhanVienModel');
        $data = $model->getDetail($idnv);
        $view = $this->render('NhanVien', 'xoaNhanVien');
        return ['view' => $view, 'data' => $data];
    }

    function HandelDelete($idnv)
    {
        $model = $this->model('NhanVienModel');
        $result = $model->delete($idnv);
        if ($result) {
            header("Location:" . __INDEX_LOCATION__);
        } else {
            echo "ERROR";
        }
    }

    function Choices()
    {
        // Xoa Nhieu Nhan Vien
        if (isset($_POST['delete_all'])) {
            $args = $_POST['st'];
            $this->HandelDeleteAll($args);
        }
        $model = $this->model('NhanVienModel');
        $data = $model->getList();
        $view = $this->render('NhanVien', 'chonNhieu');
        return ['view' => $view, 'data' => $data];
    }

    function HandelDeleteAll($args)
    {
        $model = $this->model('NhanVienModel');
        $result = $model->deleteAll($args);
        if ($result) {
        } else {
            echo "ERROR";
        }
    }
}
