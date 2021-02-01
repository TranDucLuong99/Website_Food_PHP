<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/Pagination.php';
class OrderController extends Controller
{
    public function index()
    {
        $order_model = new Order();
        $count_total = $order_model->countTotal();
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 10,
            'query_string' => 'page',
            'controller' => 'order',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $orders = $order_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();

        $this->content = $this->render('views/orders/index.php', [
            'orders' => $orders,
            'pages' => $pages
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID order không hợp lệ';
            header('Location: index.php?controller=order&action=index');
            exit();
        }
        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getOdersById($id);
        if (isset($_POST['submit'])){
            $name = $_POST['full_name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $note  = $_POST['note'];
            $payment_status = $_POST['status'];
            if (empty($name)||empty($address)||empty($email)||empty($mobile)){
                $this->error = 'Không được để trống';
            }
            if (empty($this->error)){
                $order_model = new Order();
                $order_model->fullname = $name;
                $order_model->address = $address;
                $order_model->email = $email;
                $order_model->mobile = $mobile;
                $order_model->note = $note;
                $order_model->payment_status = $payment_status;
                $order_model->update_at = date('Y-m-d H:i:s');
                $is_update = $order_model->update($id);
                if ($is_update){
                    $_SESSION['success'] = 'Update thành công';
                    header('location:index.php?controller=order&action=index');
                    exit();
                }
                else{
                    $_SESSION['error'] = 'Update thất bại';
                    header('location:index.php?controller=order&action=index');
                    exit();
                }
            }

        }
        $this->content = $this->render('views/orders/update.php',[
            'order' => $order
        ]);
        require_once 'views/layouts/main.php';
    }
    public function detail(){
        unset($_SESSION['order']);
        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getOrderDetail($id);
        if (!isset($_SESSION['order'][$id])){
            $_SESSION['order'][$id] = $order;
        }
        $this->content = $this->render('views/orders/detail.php',[
            'order' => $order
        ]);
        require_once 'views/layouts/main.php';
    }
    public function inhoadon(){
        $this->content = $this->render('views/orders/inhoadon.php');
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        $id = $_GET['id'];
        $model = new Order();
        $is_delete = $model->delete($id);
        if ($is_delete){
            $_SESSION['success'] = "xóa thành công";
        }
        else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        header('location: index.php?controller=order&action=index');
        exit();
    }

}
?>