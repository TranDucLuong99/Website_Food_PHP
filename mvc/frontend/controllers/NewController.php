<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
class NewController extends Controller {
    public function index() {
        $new_model = new News();
        $news = $new_model->getNew();
        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function searchData(){
        if (!isset($_GET['title'])){
            header('Location: index.php?controller=shop');
            exit();
        }
        $title = $_GET['title'];
        $new_model = new News();
        $newss = $new_model->getName($title);
        $this->content = $this->render('views/news/search.php', [
            'newss' => $newss,
        ]);
        require_once 'views/layouts/main.php';
    }
}
