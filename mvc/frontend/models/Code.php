<?php
require_once 'models/Model.php';
class Code extends Model {
    public function getDiscount($key_word){
        $obj_select = $this->connection->prepare("select * from codes where code_title like '$key_word'");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }
}