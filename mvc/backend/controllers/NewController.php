<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/News.php';
require_once 'models/Pagination.php';
class NewController extends Controller{
    public function index(){
        $new_model = new News();
        $count_total = $new_model->countTotal();
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 5,
            'query_string' => 'page',
            'controller' => 'new',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $news = $new_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);
        $pages = $pagination->getPagination();
        $category_model = new News();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
            'categories' => $categories,
            'pages' => $pages,
        ]);
        require_once 'views/layouts/main.php';
    }


    public function create()
    {
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];
            $status = $_POST['status'];
            //xử lý validate
            if (empty($title)) {
                $this->error = 'Không được để trống title';
            }  else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                $filename = '';
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-product-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products
                $new_model = new News();
                $new_model->category_id = $category_id;
                $new_model->title = $title;
                $new_model->summary = $summary;
                $new_model->avatar = $filename;
                $new_model->content = $content;
                $new_model->seo_title = $seo_title;
                $new_model->seo_description = $seo_description;
                $new_model->seo_keywords = $seo_keywords;
                $new_model->status = $status;
                $is_insert = $new_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=new');
                exit();
            }
        }

        //lấy danh sách category đang có trên hệ thống để phục vụ cho search
        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->content = $this->render('views/news/create.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';

    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=news');
            exit();
        }

        $id = $_GET['id'];
        $new_model = new News();
        $new = $new_model->getById($id);

        $this->content = $this->render('views/news/detail.php', [
            'new' => $new,
        ]);
//        echo "<pre>";
//        print_r($new);
//        echo "</pre>";

        require_once 'views/layouts/main.php';
    }
    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=new');
            exit();
        }
        $id = $_GET['id'];
        $new_model = new News();
        $new = $new_model->getById($id);
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];
            $status = $_POST['status'];
            //xử lý validate
            if (empty($title)) {
                $this->error = 'Không được để trống title';
            } else if ($_FILES['avatar']['error'] == 0) {
                //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                //làm tròn theo đơn vị thập phân
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            //nếu ko có lỗi thì tiến hành save dữ liệu
            if (empty($this->error)) {
                $filename = '';
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
                    $filename = time() . '-product-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                //save dữ liệu vào bảng products
                $new_model = new News();
                $new_model->category_id = $category_id;
                $new_model->title = $title;
                $new_model->summary = $summary;
                $new_model->avatar = $filename;
                $new_model->content = $content;
                $new_model->seo_title = $seo_title;
                $new_model->seo_description = $seo_description;
                $new_model->seo_keywords = $seo_keywords;
                $new_model->status = $status;
                $is_insert = $new_model->update($id);
                if ($is_insert) {
                    $_SESSION['success'] = 'Cập nhật dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Cập nhật dữ liệu thất bại';
                }
                header('Location: index.php?controller=new');
                exit();
            }
        }
        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->content = $this->render('views/news/update.php', [
            'categories' => $categories,
            'new' => $new,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=new');
            exit();
        }
        $id = $_GET['id'];
        $new_model = new News();
        $is_delete = $new_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=new');
        exit();
    }



}