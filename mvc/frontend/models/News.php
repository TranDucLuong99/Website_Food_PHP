<?php
require_once 'models/Model.php';
class News extends Model{
    public function getNew($params = []) {
        $str_filter = '';
        if (isset($params['new'])) {
            $str_new = $params['new'];
            $str_filter .= " AND news.id IN $str_new";
        }
        $sql_select = "SELECT news.*, categories.name 
          AS category_name FROM news
          INNER JOIN categories ON news.category_id = categories.id
          WHERE news.status = 1 $str_filter";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }

    public function getName($title) {

        $sql_select = "SELECT news.*, categories.name 
          AS category_name FROM news
          INNER JOIN categories ON news.category_id = categories.id
          WHERE news.status = 1 and news.title like '%$title%'";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $newss = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $newss;
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*, categories.name AS category_name FROM news 
          INNER JOIN categories ON news.category_id = categories.id WHERE news.id = $id");
        $obj_select->execute();
        $new =  $obj_select->fetch(PDO::FETCH_ASSOC);
        return $new;
    }
}
