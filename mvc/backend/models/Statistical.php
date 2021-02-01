<?php
require_once 'models/Model.php';

class Statistical extends Model{
    public function countPriceTotal(){
        $sql_select = "SELECT SUM(price_total) as tinh FROM orders";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $countPriceTotal = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $countPriceTotal;
    }
    public function countQuantity(){
        $sql_select = "SELECT SUM(quantity) as tinh FROM order_details";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $countQuantity = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $countQuantity;
    }
    public function countOrder(){
        $sql_select = "SELECT COUNT(order_id) as tinh FROM order_details";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $countOrder = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $countOrder;
    }
    public function countMax(){
        $sql_select = "SELECT product_id, MAX(SL) as tinh FROM (SELECT product_id, SUM(quantity) AS SL FROM order_details GROUP BY product_id) AS A";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $countMax = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $countMax;
    }
    public function getProduct(){
        $sql_select = "select * from products";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $products = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getProducts(){
        $sql_select = "SELECT *, SUM(quantity) as 'tong' FROM products INNER JOIN order_details ON products.id = order_details.product_id GROUP BY order_details.product_id";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $getproducts = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $getproducts;

    }



}