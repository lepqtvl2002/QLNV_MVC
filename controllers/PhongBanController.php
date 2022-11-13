<?php
require_once 'controllers/Controller.php';
class PhongBanController extends Controller
{
    function __construct()
    {
    }

    function Index($args = [])
    {
        // Tim Kiem Phong Ban
        if (isset($_POST['search_pb'])) {
            $args = array();
            $args['information'] = $_POST['information'];
        }
        $model = $this->model('PhongBanModel');
        $data = $model->getList($args);
        $view = $this->render('PhongBan', 'danhSachPhongBan');
        return ['view' => $view, 'data' => $data];
    }

    function Detail($idpb = 1)
    {
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        $nhanviens = $model->getNhanVien($idpb);
        $data['nhanviens'] = $nhanviens;
        $view = $this->render('PhongBan', 'chiTietPhongBan');
        return ['view' => $view, 'data' => $data];
    }

    function Create()
    {
        // Them Phong Ban
        if (isset($_POST['create_pb'])) {
            $args = array();
            $args['tenpb'] = $_POST['tenpb'];
            $args['mota'] = $_POST['mota'];
            $this->HandelCreate($args);
        }
        $view = $this->render('PhongBan', 'themPhongBan');
        return ['view' => $view];
    }

    function HandelCreate($args)
    {
        $model = $this->model('PhongBanModel');
        $result = $model->create($args);
        if ($result) {
            header("Location:" . __INDEX_LOCATION__ . "/PhongBan");
        } else {
            echo "ERROR";
        }
    }

    function Edit($idpb = 1)
    {
        // Chinh Sua Phong Ban
        if (isset($_POST['edit_pb'])) {
            $args = array();
            $args['idpb'] = $idpb;
            $args['tenpb'] = $_POST['tenpb'];
            $args['mota'] = $_POST['mota'];
            $this->HandelEdit($args);
        }
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        $view = $this->render('PhongBan', 'chinhSuaPhongBan');
        return ['view' => $view, 'data' => $data];
    }

    function HandelEdit($args)
    {
        $model = $this->model('PhongBanModel');
        $result = $model->edit($args);
        if ($result) {
            header("Location:" . __INDEX_LOCATION__ . "/PhongBan");
        } else {
            echo "ERROR";
        }
    }

    function Delete($idpb = 1)
    {
        // Xoa Phong Ban
        if (isset($_POST['delete_pb'])) {
            $this->HandelDelete($idpb);
        }
        $model = $this->model('PhongBanModel');
        $data = $model->getDetail($idpb);
        $view = $this->render('PhongBan', 'xoaPhongBan');
        return ['view' => $view, 'data' => $data];
    }

    function HandelDelete($idpb)
    {
        $model = $this->model('PhongBanModel');
        $result = $model->delete($idpb);
        if ($result) {
            header("Location:" . __INDEX_LOCATION__ . "/PhongBan");
        } else {
            echo "ERROR";
        }
    }
}
