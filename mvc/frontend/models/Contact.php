<?php
require_once 'models/Model.php';
class Contact extends Model {
    public $id;
    public $title;
    public $emails;
    public $content;
    public $created_at;
    public function insert(){

        $sql_insert = "insert into contacts(`title`, `emails`, `content`)
        value (:title, :emails, :content)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':title'  => $this->title,
            ':emails' => $this->emails,
            ':content' => $this->content,
        ];
        return $obj_insert->execute($arr_insert);
    }
}