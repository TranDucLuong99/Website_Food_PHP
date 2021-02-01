<?php
require_once 'configs/PHPMailer/src/PHPMailer.php';
require_once 'configs/PHPMailer/src/SMTP.php';
require_once 'configs/PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
class PaymentController extends Controller {
    public function index() {
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            if (empty($fullname) || empty($address)
                || empty($mobile) || empty($email)) {
                $this->error =
                    'Fullname hoặc address hoặc email hoặc mobile ko đc để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email ko đúng định dạng';
            }
            if (empty($this->error)) {
                $order_model = new Order();
                $order_model->fullname = $fullname;
                $order_model->mobile = $mobile;
                $order_model->address = $address;
                $order_model->email = $email;
                $order_model->note = $note;
                $order_model->payment_status = 0;
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $product_id => $cart) {
                    $price_total += $cart['price'] * $cart['quantity'];
                }
                $order_model->price_total = $price_total;
                $order_id = $order_model->insert();
                $order_detail_model = new OrderDetail();
                foreach ($_SESSION['cart'] AS $product_id => $cart) {
                    $order_detail_model->order_id = $order_id;
                    $order_detail_model->product_id = $product_id;
                    $order_detail_model->quantity = $cart['quantity'];
                    $is_insert = $order_detail_model->insert();
                    var_dump($is_insert);
                }
                $body = $this->render('views/payments/mail_template_order.php');
                $this->sendMail($email, $body);
                if ($method == 0) {
                    $_SESSION['payment_info'] = [
                        'price_total' => $price_total,
                        'fullname' => $fullname,
                        'email' => $email,
                        'mobile' => $mobile
                    ];
                    header
                    ("Location: index.php?controller=payment&action=online");
                    exit();
                } else {
                    header
                    ("Location: index.php?controller=payment&action=thank");
                    exit();
                }
            }
        }
        $this->content =
            $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }
    public function thank(){
        $this->content =
            $this->render('views/payments/thank.php');
        require_once 'views/layouts/main.php';
    }
    //Phương thức gửi mail
    public function sendMail($email, $body) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tranducluong8899@gmail.com';           // SMTP username
            $mail->Password   = 'ntbhcleghmcgcljb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->setFrom('tranducluong8899@gmail.com',
                'Trần Đức Lương');
            $mail->addAddress($email);
            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');
//            $mail->addAttachment('');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Hóa đơn đơn hàng của bạn';
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function online() {
        $this->content =
            $this->render('configs/nganluong/index.php');
        echo $this->content;
    }
}