<?php
require_once 'models/Model.php';
class Code extends Model
{
    public $id;
    public $code_name;
    public $code_title;
    public $discount;
    public $start_day;
    public $expiration_day;
    public $status;
    public $created_at;
    public $updated_at;

    public $str_search;
    public function insert()
    {
        $sql_insert = "Insert into codes(`code_name`, `code_title`, `discount`, `start_day`,`expiration_day`,`status`)
    value (:code_name, :code_title, :discount, :start_day, :expiration_day, :status )";
        $obj_insert = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':code_name' => $this->code_name,
            ':code_title' => $this->code_title,
            ':discount' => $this->discount,
            ':start_day' => $this->start_day,
            ':expiration_day' => $this->expiration_day,
            ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function __construct() {
        parent::__construct();
        if (isset($_GET['code_name']) && !empty($_GET['code_name'])) {
            $code_name = addslashes($_GET['code_name']);
            $this->str_search .= " AND codes.code_name LIKE '%$code_name%'";
        }
    }
    public function getAll($params = []) {
        //tạo 1 chuỗi truy vấn để thêm các điều kiện search
        //dựa vào mảng params truyền vào
        $str_search = 'WHERE TRUE';
        //check mảng param truyền vào để thay đổi lại chuỗi search
        if (isset($params['code_name']) && !empty($params['code_name'])) {
            $code_name = $params['name'];
            //nhớ phải có dấu cách ở đầu chuỗi
            $str_search .= " AND `code_name` LIKE '%$code_name%'";
        }
        if (isset($params['status'])) {
            $status = $params['status'];
            $str_search .= " AND `status` = $status";
        }
        //tạo câu truy vấn
        //gắn chuỗi search nếu có vào truy vấn ban đầu
        $sql_select_all = "SELECT * FROM codes $str_search";
        //cbi đối tượng truy vấn
        $obj_select_all = $this->connection
            ->prepare($sql_select_all);
        $obj_select_all->execute();
        $codes = $obj_select_all
            ->fetchAll(PDO::FETCH_ASSOC);
        return $codes;
    }




    public function getCodeId($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM codes WHERE id = $id");
        $obj_select->execute();
        $code = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $code;
    }

    public function update($id)
    {
        $obj_update = $this->connection->prepare("UPDATE codes SET `code_name` = :code_name, `code_title` = :code_title, `discount` = :discount, `start_day` = :start_day, `expiration_day` = :expiration_day, `status` = :status, `updated_at` = :updated_at 
         WHERE id = $id");
        $arr_update = [
            ':code_name' => $this->code_name,
            ':code_title' => $this->code_title,
            ':discount' => $this->discount,
            ':start_day' => $this->start_day,
            ':expiration_day' => $this->expiration_day,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];

        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM codes WHERE id = $id");
        $is_delete = $obj_delete->execute();


        return $is_delete;
    }

    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM codes");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function getAllPagination($params = [])
    {
        $limit = $params['limit'];
        $page = $params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM codes LIMIT $start, $limit");
        $obj_select->execute();
        $codes = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $codes;
    }
}