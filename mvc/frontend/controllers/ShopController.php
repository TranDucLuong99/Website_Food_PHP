<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class ShopController extends Controller {
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
            'limit' => 6,
            'query_string' => 'page',
            'controller' => 'shop',
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
        $productss = $product_model->getProductInShopPage($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $getproduct_model = new  Product();
        $getproducts = $getproduct_model ->getProducts();
        $this->content = $this->render('views/shops/index.php', [
            'products' => $products,
            'productss' => $productss,
            'getproducts' => $getproducts,
            'pages' => $pages,
            'categories' => $categories
        ]);

        require_once 'views/layouts/main.php';
    }
    public function getNameProduct(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=shop');
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $categories = $category_model->getAll();
        $product_model = new Product();
        $product_names = $product_model->getNameProduct($id);
        $getproduct_model = new  Product();
        $getproducts = $getproduct_model ->getProducts();
        $this->content = $this->render('views/shops/getNameProduct.php', [
            'product_names' => $product_names,
            'getproducts' => $getproducts,
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function getPrice(){
        if (!isset($_GET['price'])){
            header('Location: index.php?controller=shop');
            exit();
        }
        $price = '';
        $prices = '';
        $pricee = $_GET['price'];
        if ($pricee == 1){
            $price = 0;
            $prices = 20000;
        }
        elseif ($pricee == 2){
            $price = 20000;
            $prices = 50000;
        }
        elseif ($pricee == 3){
            $price = 50000;
            $prices = 200000;
        }
        elseif ($pricee == 4){
            $price = 200000;
            $prices = 1000000;
        }
        $category_model = new Category();
        $categories = $category_model->getAll();
        $product_model = new Product();
        $productss = $product_model->getProductInShopPage();
        $product_price = $product_model->getPrice($price, $prices);
        $getproduct_model = new  Product();
        $getproducts = $getproduct_model ->getProducts();
        $this->content = $this->render('views/shops/getPrice.php', [
            'product_price' => $product_price,
            'productss' => $productss,
            'getproducts' => $getproducts,
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
    public function getPricee(){
        if (!isset($_GET['price_asc'])){
            header('Location: index.php?controller=shop');
            exit();
        }
        $price = $_GET['price_asc'];
        $key = '';
        if ($price == 1){
            $key .= 'ASC';
        }
        elseif ($price == 2){
            $key = 'DESC';
        }
        $category_model = new Category();
        $categories = $category_model->getAll();
        $product_model = new Product();
        $productss = $product_model->getProductInShopPage();
        $product_key = $product_model->getPricee($key);
        $getproduct_model = new  Product();
        $getproducts = $getproduct_model ->getProducts();
        $this->content = $this->render('views/shops/getPricee.php', [
            'product_key' => $product_key,
            'productss' => $productss,
            'getproducts' => $getproducts,
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';

    }

}