<?php
require_once 'models/Model.php';
class Product extends Model {
  //Lấy ra danh sách sản phẩm tại trang Home
    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $price;
    public $new_price;
    public $discount;
    public $amount;
    public $summary;
    public $content;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $status;
    public $created_at;
    public $updated_at;
    public $str_search = '';
  public function getProductInHomePage($params = []) {
    $str_filter = '';
    if (isset($params['category'])) {
      $str_category = $params['category'];
      $str_filter .= " AND categories.id IN $str_category";
    }
    if (isset($params['price'])) {
      $str_price = $params['price'];
      $str_filter .= " AND $str_price";
    }
    $sql_select = "SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE products.status = 1 $str_filter";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();

    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
    public function getName($title) {
        $sql_select = "SELECT products.*, categories.name 
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE products.status = 1 and products.title like '%$title%'";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $productss = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $productss;
    }
    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE TRUE $this->str_search
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        LIMIT $start, $limit
                        ");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getPrice($price, $prices)
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE products.price between $price and $prices order by products.price asc 
                        ");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $product_price = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $product_price;
    }
    public function getPricee($key){
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        ORDER BY products.price $key
                        ");
        $arr_select = [];
        $obj_select->execute($arr_select);
        $product_key = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $product_key;
    }

    public function getAll() {
        $sql_select_all = "SELECT * FROM categories WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getNameProduct($id) {
        $sql_select = "SELECT products.*, categories.name
          AS category_name FROM products
          INNER JOIN categories ON products.category_id = categories.id
          WHERE products.status = 1 and products.category_id = $id order by products.price asc" ;
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $product_names = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $product_names;
    }


  //Lấy ra danh sách sản phẩm tại trang Shop
  public function getProductInShopPage($params = []) {
    $str_filter = '';
    if (isset($params['category'])) {
        $str_category = $params['category'];
        $str_filter .= " AND categories.id IN $str_category";
    }
    if (isset($params['price'])) {
        $str_price = $params['price'];
        $str_filter .= " AND $str_price";
    }
    $sql_select = "SELECT products.*, categories.name 
      AS category_name FROM products
      INNER JOIN categories ON products.category_id = categories.id
      WHERE products.status = 1  order by `price` ASC $str_filter";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
  public function getProducts(){
      $sql_select = "SELECT *, SUM(quantity) as 'tong' FROM products INNER JOIN order_details ON products.id = order_details.product_id GROUP BY order_details.product_id";
      $obj_select = $this->connection->prepare($sql_select);
      $obj_select->execute();
      $getproducts = $obj_select->fetchAll(PDO::FETCH_ASSOC);
      return $getproducts;

  }
  public function detail(){

  }
//  public function getcode(){
//      $sql_select = "Select * from codes";
//      $obj_select = $this->connection->prepare($sql_select);
//      $obj_select->execute();
//      $code = $obj_select->fetchAll(PDO::FETCH_ASSOC);
//      return $code;
//  }

  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");
    $obj_select->execute();
    return $obj_select->fetch(PDO::FETCH_ASSOC);
  }
    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
}

