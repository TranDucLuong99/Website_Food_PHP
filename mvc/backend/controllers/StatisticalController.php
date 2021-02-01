<?php
require_once 'controllers/Controller.php';
require_once 'models/Statistical.php';
    class StatisticalController extends Controller{
        public function index(){
            $countPriceTotal_model = new Statistical();
            $countPriceTotal = $countPriceTotal_model->countPriceTotal();
            $countQuantity_model = new Statistical();
            $countQuantity = $countQuantity_model->countQuantity();
            $countOrder_model = new Statistical();
            $countOrder = $countOrder_model->countOrder();
            $countMax_model = new Statistical();
            $countMax = $countMax_model->countMax();
            $product_model = new Statistical();
            $products = $product_model->getProduct();
            $getproduct_model = new  Statistical();
            $getproducts = $getproduct_model ->getProducts();
            $this->content = $this->render('views/statistical/index.php', [
                    'countPriceTotal' => $countPriceTotal,
                    'countQuantity' => $countQuantity,
                    'countOrder' => $countOrder,
                    'countMax' => $countMax,
                    'getproducts' => $getproducts,
                    'products' => $products
                ]);
            require_once 'views/layouts/main.php';
        }
    }
?>

