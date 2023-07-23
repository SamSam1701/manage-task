<?php
class Home extends Controller{



    public $model_home;
    public function __construct(){
       $this->model_home = $this->model('HomeModel');
    }

    public function page(){

        $role = $_SESSION['Role'];
        $userID = $_SESSION['UserID'];
        $this->data['sub_content']['role'] = $role;
        $this->data['sub_content']['userID'] = $userID;
        $this->data['content'] = 'home/index';
        $this->render('layouts/client_layout', $this->data);
    }

    public function index(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $loggedIn = $this->model_home->login($username, $password);
            if ($loggedIn != null) {
                $_SESSION['Role'] = $loggedIn['Role'];
                $_SESSION['UserID'] = $loggedIn['UserID'];
                header("Location: /Home/page");
                exit();
            } else {
                echo "Tên người dùng hoặc mật khẩu không chính xác.";
            }
        }
    
        $this->data['sub_content']['title'] = 'Chi tiet san pham';
        $this->data['content'] = 'Login/index';
        $this->render('layouts/client_layout', $this->data);
    }

    public function logout()
{
    // Xóa hết các biến session
    session_unset();
    
    // Hủy session
    session_destroy();
    
    // Chuyển hướng về trang đăng nhập
    header("Location: /");
    exit();
}

}