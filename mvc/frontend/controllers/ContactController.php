<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';
class ContactController extends Controller {
    public function index() {
        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $emails = $_POST['emails'];
            $content = $_POST['content'];
            if (empty($title) || empty($content)){
                $this->error = 'Vui lòng điền đầy đủ thông tin';
            }
            elseif (!filter_var($emails, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email phải viết đúng định dạng';
            }
            if (empty($this->error)){
                $contact_model = new Contact();
                $contact_model->title = $title;
                $contact_model->emails = $emails;
                $contact_model->content = $content;
                $is_insert = $contact_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Gửi phản hồi thành công';

                } else {
                    $_SESSION['error'] = 'Gửi phản hồi thất bại';
                }
                header('Location: index.php?controller=contact&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/contacts/index.php');
        require_once 'views/layouts/main.php';

    }
}
?>
