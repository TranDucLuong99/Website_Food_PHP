<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class SshopController extends Controller {
    public function index() {
        $this->content =
            $this->render('views/sshops/index.php');
        require_once 'views/layouts/main.php';
    }
}