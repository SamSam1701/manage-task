<?php
use App\Controllers\Home;
class ChangeRole extends Controller {
    public $model_role;

    public function __construct(){
        $this->model_role = $this->model("RoleModel");
    }

    public function changeRolePage(){
        $this->data['sub_content']['title']='Change Role';
        $this->data['content'] ='changeRole/change_role';
        $this->render('layouts/client_layout', $this->data);
    }

    public function changeRole(){
        $userID =  $_SESSION['UserID'];
        $newRole = $_POST['role'];
        $this->model_role-> changeRole($userID, $newRole);
        $this->data['sub_content']['title']='Change Role';
        $this->data['content'] ='home/index';
        $this->render('layouts/client_layout', $this->data);
    }

    // public function changeRole()
    // {
    //     $userID = $_SESSION['UserID'];
    //     $newRole = $_POST['role'];
    //     $this->model_role->changeRole($userID, $newRole);
    //     session_unset();
    //     session_destroy();
    //     header("Location: /");
    //     exit();
    // }
}