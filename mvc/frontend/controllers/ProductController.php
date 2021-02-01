<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class ProductController extends Controller {
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
            'controller' => 'product',
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
        public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=shop');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $products = $product_model->getById($id);
//        $product_model = new Product();
//        $productss = $product_model->getProductInHomePage();
        $this->content = $this->render('views/sshops/index.php', [
            'products' => $products,
//            '$productss' => $productss
        ]);
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
        require_once 'views/layouts/main.php';
    }



}