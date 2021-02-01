<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class HomeController extends Controller
{
//    public function index()
//    {
//        $product_model = new Product();
//        $count_total = $product_model->countTotal();
//        $query_additional = '';
//        if (isset($_GET['title'])) {
//            $query_additional .= '&title=' . $_GET['title'];
//        }
//        if (isset($_GET['category_id'])) {
//            $query_additional .= '&category_id=' . $_GET['category_id'];
//        }
//        $params = [
//            'total' => $count_total,
//            'limit' => 6,
//            'query_string' => 'page',
//            'controller' => 'home',
//            'action' => 'index',
//            'full_mode' => false,
//            'query_additional' => $query_additional,
//            'page' => isset($_GET['page']) ? $_GET['page'] : 1,
//        ];
//        $page = 1;
//        if (isset($_GET['page'])) {
//            $page = $_GET['page'];
//        }
//        $params['page'] = $page;
//        $products = $product_model->getProductInHomePage($params);
//        $pagination = new Pagination($params);
//        $pages = $pagination->getPagination();
//        $category_model = new Category();
//        $categories = $category_model->getAll();
//        $this->content = $this->render('views/homes/index.php', [
//            'products' => $products,
//            'pages' => $pages,
//            'categories' => $categories
//        ]);
////        echo "<pre>";
////        print_r($_GET);
////        echo "</pre>";
//
//        require_once 'views/layouts/main.php';
//    }
    public function index()
    {
        $product_model = new Product();
        $count_total = $product_model->countTotal();
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 8,
            'query_string' => 'page',
            'controller' => 'home',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $params['page'] = $page;
        $products = $product_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/homes/index.php', [
            'products' => $products,
            'pages' => $pages,
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
    public function searchData(){
        if (!isset($_GET['title'])){
            header('Location: index.php?controller=home');
            exit();
        }
        $title = $_GET['title'];
        $category_model = new Category();
        $categories = $category_model->getAll();
        $product_model = new Product();
        $productss = $product_model->getName($title);
        $this->content = $this->render('views/homes/search.php', [
            'productss' => $productss,
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
    public function getNameProduct(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=home');
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $categories = $category_model->getAll();
        $product_model = new Product();
        $product_names = $product_model->getNameProduct($id);
        $this->content = $this->render('views/homes/getNameProduct.php', [
            'product_names' => $product_names,
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
//    public function getProduct(){
//        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
//            $_SESSION['error'] = 'ID không hợp lệ';
//            header('Location: index.php?controller=home');
//            exit();
//        }
//        $id = $_GET['id'];
//        $category_model = new Category();
//        $categories = $category_model->getAll();
//        $product_model = new Product();
//        $product_names = $product_model->getNameProduct($id);
//        $this->content = $this->render('views/homes/sshops.php', [
//            'product_names' => $product_names,
//            'categories' => $categories
//        ]);
//        echo "<pre>";
//        print_r($product_names);
//        echo "</pre>";
//        require_once 'views/layouts/main.php';
//    }
}
?>