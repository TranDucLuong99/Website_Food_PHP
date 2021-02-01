<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Code.php';
require_once 'models/Pagination.php';
class CodeController extends  Controller {
    public function index(){
        $code_model = new Code();
        $params = [
            'limit' => 5,
            'query_string' => 'page',
            'controller' => 'code',
            'action' => 'index',
            'full_mode' => FALSE,
        ];
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['name'])) {
            $params['query_additional'] = '&name=' . $_GET['name'];
        }

        $count_total = $code_model->countTotal();
        $params['total'] = $count_total;

        $params['page'] = $page;
        $pagination = new Pagination($params);
        $pages = $pagination->getPagination();

        $code = $code_model->getAllPagination($params);

        $this->content = $this->render('views/codes/index.php', [
            'codes' => $code,
            'pages' => $pages,
        ]);
     require_once 'views/layouts/main.php';
    }
    public function create()
    {

        //xử lý submit form
        if (isset($_POST['submit'])) {
            $code_name = $_POST['code_name'];
            $code_title = $_POST['code_title'];
            $discount = $_POST['discount'];
            $start_day = $_POST['start_day'];
            $expiration_day = $_POST['expiration_day'];
            $status = $_POST['status'];
            //xử lý validate
            if (empty($code_name)||empty($code_title)) {
                $this->error = 'Không được để trống Tên Code';
            }

            if (empty($this->error)) {
                $code_model = new Code();
                $code_model->code_name = $code_name;
                $code_model->code_title = $code_title;
                $code_model->discount = $discount;
                $code_model->start_day = $start_day;
                $code_model->expiration_day = $expiration_day;
                $code_model->status = $status;
                $is_insert = $code_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=code');
                exit();
            }
        }
        $this->content = $this->render('views/codes/create.php');
        require_once 'views/layouts/main.php';

    }
    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=code');
            exit();
        }

        $id = $_GET['id'];
        $code_model = new Code();
        $codes = $code_model->getCodeId($id);
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $code_name = $_POST['code_name'];
            $code_title = $_POST['code_title'];
            $discount = $_POST['discount'];
            $start_day = $_POST['start_day'];
            $expiration_day = $_POST['expiration_day'];
            $status = $_POST['status'];
            //xử lý validate
            if (empty($code_name)) {
                $this->error = 'Không được để trống title';
            }

            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {

                //save dữ liệu vào bảng products
                $code_model = new Code();
                $code_model->code_name = $code_name;
                $code_model->code_title = $code_title;
                $code_model->discount = $discount;
                $code_model->start_day = $start_day;
                $code_model->expiration_day = $expiration_day;
                $code_model->status = $status;
                $code_model->updated_at = date('Y-m-d H:i:s');

                $is_update = $code_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=code');
                exit();
            }
        }

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $code_model = new Code();
        $codes = $code_model->getAll();

        $this->content = $this->render('views/codes/update.php', [
            'codes' => $codes,

        ]);
        require_once 'views/layouts/main.php';
    }
    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=code');
            exit();
        }

        $id = $_GET['id'];
        $code_model = new Code();
        $is_delete = $code_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=code');
        exit();
    }
    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=code');
            exit();
        }

        $id = $_GET['id'];
        $code_model = new Code();
        $codes = $code_model->getCodeId($id);

        $this->content = $this->render('views/codes/detail.php', [
            'codes' => $codes
        ]);
        require_once 'views/layouts/main.php';
    }
}