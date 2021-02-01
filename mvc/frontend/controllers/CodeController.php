<?php
require_once 'controllers/Controller.php';
require_once 'models/Code.php';
class CodeController extends Controller
{
    public function check()
    {
        $key_word = $_GET['sale'];
        $obj_discount = new Code();
        $discount = $obj_discount->getDiscount($key_word);
        if (!empty($discount)) {
            if (time() > strtotime($discount['start_day']) && time() < strtotime($discount['expiration_day'])) {
                if (!isset($_SESSION['discount'])) {
                    $_SESSION['discount'] = [
                        'discount' => $discount['discount']
                    ];
                    echo "Bạn được giảm " . $discount['discount'] . '%';
                } else {
                    echo "Bạn chỉ được dùng 1 mã giảm giá cho 1 đơn hàng";
                }
            } elseif (time() < strtotime($discount['start_day'])) {
                echo "Mã giảm giá của bạn chưa được kích hoạt";
            } elseif (time() > strtotime($discount['expiration_day'])) {
                echo "Mã giảm giá của bạn đã hết hạn";
            }
        }
        if (empty($discount)) {
            echo "Mã giảm giá của bạn không tồn tại";
        }
    }



}
