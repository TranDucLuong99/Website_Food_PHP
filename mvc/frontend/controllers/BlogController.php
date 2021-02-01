<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
class BlogController extends Controller
{
    public function index()
    {
        $this->content = $this->render('views/blogs/index.php');
            require_once 'views/layouts/main.php';
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=new');
            exit();
        }
        $id = $_GET['id'];
        $new_model = new News();
        $new = $new_model->getById($id);
        $blog_model = new News();
        $blogs = $blog_model->getNew();
        $this->content = $this->render('views/blogs/index.php', [
            'new' => $new,
            'blogs' => $blogs
        ]);
//        echo "<pre>";
//        print_r($blogs);
//        echo "</pre>";
        require_once 'views/layouts/main.php';
    }
}