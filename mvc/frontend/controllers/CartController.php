<?php
//frontend/controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller {
    public function index() {
        if (isset($_POST['submit'])) {
            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                if ($_POST[$product_id] < 0) {
                    $_SESSION['error'] = 'Số lượng phải > 0';
                    header("Location: gio-hang-cua-ban.html");
                    exit();
                }
            }
            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                $_SESSION['cart'][$product_id]['quantity']
                    = $_POST[$product_id];
            }
        }
        $this->content =
            $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }
    public function add(){
        $produc_id = $_GET['product_id'];
        $product_model = new Product();
        $product = $product_model->getById($produc_id);
        $cart = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];

        if (isset($_SESSION['cart'])){
            $_SESSION['cart'][$produc_id] = $cart;
        }else{
            if (!array_key_exists($produc_id, $_SESSION['cart'])){
                $_SESSION['cart'][$produc_id] = $cart;
            }
            else{
                $_SESSION['cart'][$produc_id]['quantity']++;
            }
        }
    }
    public function delete() {
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
//        $_SESSION['success'] =
//            "Xóa sản phẩm có id = $product_id thành công";
        header("Location: gio-hang-cua-ban.html");
        exit();
    }

}